<?php

declare(strict_types=1);

namespace Kan\Hive\Device;

use Kan\Hive\Device\Contract\DeviceInterface;
use Kan\Hive\Hive;
use Kan\Hive\Reference\Device;
use Kan\Hive\Service\Client;

abstract class AbstractDevice implements DeviceInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var Device
     */
    private $device;

    public function __construct(
        Client $client,
        Device $device = null
    ) {
        $this->client = $client;

        if (false === is_null($device)) {
            $this->device = $device;
        }
    }

    /**
     * Return the client instance.
     */
    protected function getClient(): Client
    {
        return $this->client;
    }

    /**
     * Return the device instance. This is overwriteable in
     * extended classes.
     */
    protected function getDevice(): Device
    {
        return $this->device;
    }

    /**
     * Return the endpoint needed for the device to be controlled.
     */
    abstract protected function getEndpoint(): string;

    /**
     * Helper to create an instance from a Hive instance.
     */
    public static function fromHive(
        Hive $hive,
        Device $device = null
    ) {
        return new static(
            $hive->getClient(),
            $device
        );
    }
}
