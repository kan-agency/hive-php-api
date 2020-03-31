<?php

declare(strict_types=1);

namespace Kan\Hive\Device\Concern;

interface Trigger
{
    /**
     * Trigger an action.
     */
    public function trigger(): bool;
}
