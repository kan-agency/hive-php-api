<?php

declare(strict_types=1);

namespace Kan\Hive;

use Kan\Hive\Device\Contract\DeviceInterface;
use Kan\Hive\Exception\RuntimeException;
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

    /**
     * Create an instance of the device provided,
     * passing and dependencies it needs.
     */
    public function device(
        string $class
    ): DeviceInterface {
        $instance = new $class(
            $this->client
        );

        if (false === ($instance instanceof DeviceInterface)) {
            throw new RuntimeException(sprintf('Class "%s" must implement "%s"', $class, DeviceInterface::class));
        }

        return $instance;
    }

    /**
     * Return the client.
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}
