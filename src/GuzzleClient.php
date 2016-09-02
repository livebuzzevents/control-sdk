<?php namespace Buzz\Control;

use Buzz\Control\Contracts\Client;
use Buzz\Control\Exceptions\ErrorException;
use Buzz\Control\Exceptions\ResponseException;
use Buzz\Control\Exceptions\ServerException;
use Buzz\Control\Exceptions\UnauthorizedException;
use Exception;
use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Exception\ClientException as GuzzleClientException;
use GuzzleHttp\Exception\ServerException as GuzzleServerException;

/**
 * Class Client
 *
 * @package LiveBuzz
 */
class GuzzleClient implements Client
{
    /**
     * @var Guzzle
     */
    protected $guzzle;

    /**
     * @param Guzzle $guzzle
     */
    public function __construct(Guzzle $guzzle = null)
    {
        $this->guzzle = $guzzle ?: new Guzzle();
    }

    /**
     * @param       $verb
     * @param       $url
     * @param array $request
     *
     * @return mixed
     * @throws ErrorException
     * @throws ResponseException
     * @throws ServerException
     * @throws UnauthorizedException
     */
    public function request($verb, $url, array $request = [])
    {
        try {
            $response = $this->guzzle->request(
                $verb,
                $url,
                $this->buildRequest($verb, $request)
            );

            $contents = $response->getBody()->getContents();

            if (empty($contents)) {
                return $contents;
            }

            $decodedResponse = json_decode($contents, true);

            if ((json_last_error() == JSON_ERROR_NONE)) {
                return $decodedResponse;
            } else {
                throw new ResponseException('Unexpected error! Response not valid JSON!');
            }
        } catch (GuzzleClientException $e) {
            $response = $e->getResponse();
            $contents = $response->getBody()->getContents();

            if ($response->getStatusCode() === 400 || $response->getStatusCode() === 422) {
                throw new ErrorException(json_decode($contents, true)['error']);
            } elseif ($response->getStatusCode() === 401) {
                throw new UnauthorizedException($contents);
            } elseif ($response->getStatusCode() === 404) {
                throw new ResponseException('Resource not found! Check you host!');
            } else {
                throw new ResponseException('Unexpected error! Invalid response code!');
            }
        } catch (GuzzleServerException $e) {
            if ($e->getCode() == 503) {
                throw new ErrorException('System in maintenance mode!');
            }

            throw new ServerException('Unexpected error! Please contact LiveBuzz for more information!');
        } catch (Exception $e) {
            throw new ResponseException($e->getMessage());
        }
    }

    /**
     * Build on top of the request and sends the required data for rest authorization
     *
     * @param array $request
     *
     * @return array
     */
    protected function buildRequest($verb, array $request = [])
    {
        $result = [
            'headers' => [
                'Accept' => 'application/json',
            ],
        ];

        if (in_array($verb, ['post', 'put'])) {
            foreach ($request as $key => $value) {
                if (is_resource($value)) {
                    $request[$key] = base64_encode(file_get_contents($request[$key]));
                }
            }

            $result['json'] = $request;
        } elseif (in_array($verb, ['get', 'delete'])) {
            $result['query'] = $request;
        }

        return $result;
    }
}