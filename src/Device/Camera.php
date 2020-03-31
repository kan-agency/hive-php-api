<?php

declare(strict_types=1);

namespace Kan\Hive\Device;

use Kan\Hive\Device\Concern\Power;

class Camera extends AbstractDevice implements Power
{
    /**
     * {@inheritdoc}
     */
    public function getEndpoint(): string
    {
        return sprintf(
            'nodes/hivecamera/%s',
            $this->getDevice()->getId()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function on(): bool
    {
        return $this->getClient()->post(
            $this->getEndpoint(),
            [
                'mode' => 'ARMED',
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function off(): bool
    {
        return $this->getClient()->post(
            $this->getEndpoint(),
            [
                'mode' => 'PRIVACY',
            ]
        );
    }
}
