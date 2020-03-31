<?php

declare(strict_types=1);

namespace Kan\Hive\Device;

use Kan\Hive\Contract\Device\Trigger;

class Action extends AbstractDevice implements Trigger
{
    /**
     * {@inheritdoc}
     */
    public function getEndpoint(): string
    {
        return sprintf(
            'actions/%s/quick-action',
            $this->getId()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function trigger(): bool
    {
        return $this->getClient()->post(
            $this->getEndpoint()
        );
    }
}
