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
     * @var Credentials
     */
    protected $credentials;
    /**
     * @var Guzzle
     */
    protected $guzzle;

    /**
     * @param Credentials $credentials
     * @param Guzzle      $guzzle
     */
    public function __construct(Credentials $credentials, Guzzle $guzzle = null)
    {
        $this->credentials = $credentials;
        $this->guzzle      = $guzzle ?: new Guzzle();
    }

    /**
     * @param       $verb
     * @param       $method
     * @param array $request
     *
     * @return mixed
     * @throws ErrorException
     * @throws ResponseException
     * @throws ServerException
     * @throws UnauthorizedException
     */
    public function request($verb, $method, array $request = [])
    {
        try {
            $response = $this->guzzle->request(
                $verb,
                $this->getEndpoing($method),
                $this->buildRequest($verb, $request)
            );

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleClientException $e) {

            $response = $e->getResponse();
            $contents = $response->getBody()->getContents();
            if ($response->getStatusCode() === 400 || $response->getStatusCode() === 422) {
                throw new ErrorException(json_decode($contents, true)['error']);
            } elseif ($response->getStatusCode() === 401) {
                throw new UnauthorizedException("Invalid API key or your IP is not in the whitelist!");
            } elseif ($response->getStatusCode() === 404) {
                throw new ResponseException('Resource not found! Check you endpoint url!');
            } else {
                throw new ResponseException('Unexpected error! Invalid response code!');
            }
        } catch (GuzzleServerException $e) {
            throw new ServerException('Unexpected error! Please contact LiveBuzz for more information!');
        } catch (Exception $e) {
            throw new ResponseException($e->getMessage());
        }
    }

    /**
     * @param $method
     *
     * @return string
     */
    private function getEndpoing($method)
    {
        return $this->credentials->getEndpoint() . $this->credentials->getOrganizationId() . '/' . $method;
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
        $request['api_key'] = $this->credentials->getApiKey();

        $result = [];

        if (in_array($verb, ['post', 'put'])) {
            foreach ($request as $key => $value) {
                if (is_resource($value)) {
                    $result['multipart'][] = [
                        'name'     => $key,
                        'contents' => $value
                    ];
                } else {
                    $result['form_params'][$key] = $value;
                }
            }

            /**
             * @todo
             * Bug if guzzle. send as get parameters if file exists
             */
            if (!empty($result['multipart'])) {
                $result['query'] = $result['form_params'];
                unset($result['form_params']);
            }
        } elseif (in_array($verb, ['get', 'delete'])) {
            $result['query'] = $request;
        }

        return $result;
    }
}