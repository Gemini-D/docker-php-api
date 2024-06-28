<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Docker\API\Model;

class SwarmUnlockkeyGetResponse200
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The swarm's unlock key.
     *
     * @var string
     */
    protected $unlockKey;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The swarm's unlock key.
     */
    public function getUnlockKey(): string
    {
        return $this->unlockKey;
    }

    /**
     * The swarm's unlock key.
     */
    public function setUnlockKey(string $unlockKey): self
    {
        $this->initialized['unlockKey'] = true;
        $this->unlockKey = $unlockKey;
        return $this;
    }
}
