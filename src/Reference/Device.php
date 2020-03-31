<?php

declare(strict_types=1);

namespace Kan\Hive\Reference;

class Device
{
    /**
     * @var string
     */
    private $id;

    public function __construct(
        string $id
    ) {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return Device
     */
    public function make(
        string $id
    ) {
        return new static(
            $id
        );
    }
}
