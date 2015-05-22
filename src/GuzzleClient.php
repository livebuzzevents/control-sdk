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
use GuzzleHttp\Message\Request;

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
     * Execute POST HTTP request
     *
     * @param       $method
     * @param array $request
     *
     * @return array|bool|float|int|string
     * @throws ResponseException
     * @throws ServerException
     * @throws UnauthorizedException
     */
    public function post($method, array $request = [])
    {
        $request = $this->guzzle->createRequest(
            'POST',
            $this->credentials->getEndpoint() . $method,
            ['body' => $this->buildRequest($request)]
        );

        return $this->executeRequestAndParseResponse($request);
    }

    /**
     * Build on top of the request and sends the required data for rest authorization
     *
     * @param array $request
     *
     * @return array
     */
    protected function buildRequest(array $request = [])
    {
        $request['api_key'] = $this->credentials->getApiKey();

        return $request;
    }

    /**
     * @param Request $request
     *
     * @return array|bool|float|int|string
     * @throws ErrorException
     * @throws ResponseException
     * @throws ServerException
     * @throws UnauthorizedException
     */
    private function executeRequestAndParseResponse(Request $request)
    {
        try {
            $response = $this->guzzle->send($request);

            return $response->json();
        } catch (GuzzleClientException $e) {

            $response = $e->getResponse();

            if ($response->getStatusCode() === 400 || $response->getStatusCode() === 422) {
                throw new ErrorException($response->json()['error']);
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
     * Executes GET HTTP request
     *
     * @param       $method
     * @param array $request
     *
     * @return array|bool|float|int|string
     * @throws ResponseException
     * @throws ServerException
     * @throws UnauthorizedException
     */
    public function get($method, array $request = [])
    {
        $request = $this->guzzle->createRequest(
            'GET',
            $this->credentials->getEndpoint() . $this->credentials->getOrganizationId() . '/' . $method,
            ['query' => $this->buildRequest($request)]
        );

        return $this->executeRequestAndParseResponse($request);
    }

    /**
     * Executes DELETE HTTP request
     *
     * @param       $method
     * @param array $request
     *
     * @return array|bool|float|int|string
     * @throws ResponseException
     * @throws ServerException
     * @throws UnauthorizedException
     */
    public function delete($method, array $request = [])
    {
        $request = $this->guzzle->createRequest(
            'DELETE',
            $this->credentials->getEndpoint() . $method,
            ['query' => $this->buildRequest($request)]
        );

        return $this->executeRequestAndParseResponse($request);
    }
}