<?php

declare(strict_types=1);

namespace Kan\Hive\Service;

class Credentials
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var bool
     */
    private $devices;

    /**
     * @var bool
     */
    private $products;

    /**
     * @var bool
     */
    private $actions;

    /**
     * @var bool
     */
    private $homes;

    public function __construct(
        string $username,
        string $password,
        bool $devices = true,
        bool $products = true,
        bool $actions = true,
        bool $homes = true
    ) {
        $this->username = $username;
        $this->password = $password;
        $this->devices = $devices;
        $this->products = $products;
        $this->actions = $actions;
        $this->homes = $homes;
    }

    /**
     * Simple casting to an array for use within token fetching body.
     */
    public function toArray(): array
    {
        return [
            'username' => $this->username,
            'password' => $this->password,
            'devices' => $this->devices,
            'products' => $this->products,
            'actions' => $this->actions,
            'homes' => $this->homes,
        ];
    }
}
