<?php

declare(strict_types=1);

namespace Kan\Hive\Device;

use Kan\Hive\Device\Concern\Trigger;

class Action extends AbstractDevice implements Trigger
{
    /**
     * {@inheritdoc}
     */
    public function getEndpoint(): string
    {
        return sprintf(
            'actions/%s/quick-action',
            $this->getDevice()->getId()
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
