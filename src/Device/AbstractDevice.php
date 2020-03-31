<?php

declare(strict_types=1);

namespace Kan\Hive\Device;

use Kan\Hive\Contract\Device;
use Kan\Hive\Service\Client;

abstract class AbstractDevice implements Device
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var string
     */
    protected $id;

    public function __construct(
        Client $client,
        string $id
    ) {
        $this->client = $client;
        $this->id = $id;
    }

    /**
     * {@inheritdoc}
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): string
    {
        return $this->id;
    }
}
