<?php

declare(strict_types=1);

namespace Kan\Hive\Contract;

use Kan\Hive\Service\Client;

interface Device
{
    /**
     * Return the device id.
     */
    public function getId(): string;

    /**
     * Return the endpoint that's needed for the device manipulation.
     */
    public function getEndpoint(): string;

    /**
     * Return the client instance for use within commands.
     */
    public function getClient(): Client;
}
