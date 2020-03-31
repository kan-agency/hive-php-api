<?php

declare(strict_types=1);

namespace Kan\Hive;

use Kan\Hive\Service\Access;
use Kan\Hive\Service\Client;
use Kan\Hive\Service\Credentials;

class Hive
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(
        string $username,
        string $password,
        bool $devices = true,
        bool $products = true,
        bool $actions = true,
        bool $homes = true
    ) {
        $this->client = new Client(
            new Access(
                new Credentials(
                    $username,
                    $password,
                    $devices,
                    $products,
                    $actions,
                    $homes
                )
            )
        );
    }

    public function getClient(): Client
    {
        return $this->client;
    }
}
