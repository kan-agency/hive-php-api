<?php

declare(strict_types=1);

namespace Kan\Hive\Contract\Device;

interface Trigger
{
    /**
     * Trigger an action.
     */
    public function trigger(): bool;
}
