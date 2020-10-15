<?php

declare(strict_types=1);

namespace Kan\Hive\Service;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions as GuzzleRequestOptions;
use Kan\Hive\Exception\IncorrectCredentials;
use Kan\Hive\Exception\UnableToLocateToken;
use Kan\Hive\Helper\Response;

class Access
{
    /**
     * @var Credentials
     */
    private $credentials;

    public function __construct(
        Credentials $credentials
    ) {
        $this->credentials = $credentials;
    }

    /**
     * Retrieve a token for all further device requests.
     */
    public function getToken(): string
    {
        try {
            $response = Client::instance()->post(
                Client::url('cognito/login'),
                [
                    GuzzleRequestOptions::JSON => $this->credentials->toArray(),
                ]
            );

            $data = Response::getData($response);

            if (false === property_exists($data, 'token')) {
                throw new UnableToLocateToken('
                    The request was successful, however, no token was returned.
                ');
            }

            return $data->token;
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $code = $response->getStatusCode();
            $data = Response::getData($response);

            switch ($code) {
                case 401: // Unauthorized
                    throw new IncorrectCredentials(sprintf('Unable to login using the credentials provided [%s]', $data->error ?? 'N/A'));
                default:
                    throw $e;
            }
        }
    }

    /**
     * The header key used for passing the token.
     */
    public function getTokenHeaderKey(): string
    {
        return 'Authorization';
    }

    /**
     * Helper to compile headers needed for auth.
     */
    public function getHeaders(): array
    {
        return [
            $this->getTokenHeaderKey() => $this->getToken(),
        ];
    }
}
