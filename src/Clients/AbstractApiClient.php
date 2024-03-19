<?php

namespace App\Http\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

abstract class AbstractApiClient
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'verify'   => true,
            'base_uri' => 'https://api.zibal.ir/v1/facility',
            'timeout'  => 5.0,
        ]);
    }

    /**
     * Send a GET request to the specified URI.
     *
     * @param string $uri
     * @param array $options
     * @return array
     * @throws GuzzleException
     */
    protected function get(string $uri, array $options = []): array
    {
        $response = $this->client->request('GET', $uri, $options);
        return $this->processResponse($response);
    }

    /**
     * Send a POST request to the specified URI.
     *
     * @param string $uri
     * @param array $data
     * @return array
     * @throws GuzzleException
     */
    protected function post(string $uri, array $data = []): array
    {
        $response = $this->client->request('POST', $uri, ['json' => $data]);
        return $this->processResponse($response);
    }

    /**
     * Send a PUT request to the specified URI.
     *
     * @param string $uri
     * @param array $data
     * @return array
     * @throws GuzzleException
     */
    protected function put(string $uri, array $data = []): array
    {
        $response = $this->client->request('PUT', $uri, ['json' => $data]);
        return $this->processResponse($response);
    }

    /**
     * Process the HTTP response from a request.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return array
     */
    protected function processResponse($response): array
    {
        $body = $response->getBody();
        // Assumes response to be JSON
        return json_decode($body, true);
    }
}
