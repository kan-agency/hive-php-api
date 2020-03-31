<?php

declare(strict_types=1);

namespace Kan\Hive\Device\Concern;

interface Power
{
    /**
     * Switch the device "on".
     */
    public function on(): bool;

    /**
     * Switch the device "off".
     */
    public function off(): bool;
}
