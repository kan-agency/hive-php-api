<?php

declare(strict_types=1);

namespace Kan\Hive\Service;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Psr7\Response as GuzzleResponse;
use GuzzleHttp\RequestOptions as GuzzleRequestOptions;
use Kan\Hive\Helper\Response;

class Client
{
    /**
     * @var string
     */
    const ENDPOINT = 'https://beekeeper-uk.hivehome.com/1.0/';

    /**
     * @var Access
     */
    private $access;

    public function __construct(
        Access $access
    ) {
        $this->access = $access;
    }

    /**
     * Create the default guzzle instance with generic headers.
     */
    public static function instance(
        array $headers = []
    ): Guzzle {
        return new Guzzle([
            'headers' => array_merge(
                $headers,
                [
                    'Accept' => '*/*',
                    'Content-Type' => 'application/json',
                    'Origin' => 'https://my.hivehome.com',
                ]
            ),
        ]);
    }

    /**
     * Generate a full URL using a specific endpoint.
     */
    public static function url(
        string $endpoint
    ): string {
        return implode(
            '',
            [
                static::ENDPOINT,
                trim($endpoint, ' /'),
            ]
        );
    }

    /**
     * Make a "GET" request.
     */
    public function get(
        string $endpoint
    ): array {
        $response = $this->request(
            'GET',
            $endpoint
        );

        return Response::getData($response);
    }

    /**
     * Make a "POST" request.
     */
    public function post(
        string $endpoint,
        array $params = []
    ): bool {
        $response = $this->request(
            'POST',
            $endpoint,
            $params
        );

        return 200 === $response->getStatusCode();
    }

    /**
     * Create the instance of the guzzle client, and perform
     * the desired request.
     */
    private function request(
        string $type,
        string $endpoint,
        array $params = []
    ): GuzzleResponse {
        $response = Client::instance(array_merge(
            $this->access->getHeaders(),
            [
                // ...
            ]
        ))->request(
            $type,
            static::url($endpoint),
            [
                GuzzleRequestOptions::JSON => $params,
            ]
        );

        return $response;
    }
}
