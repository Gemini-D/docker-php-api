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

class SwarmSpecDispatcher
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The delay for an agent to send a heartbeat to the dispatcher.
     *
     * @var int
     */
    protected $heartbeatPeriod;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The delay for an agent to send a heartbeat to the dispatcher.
     */
    public function getHeartbeatPeriod(): int
    {
        return $this->heartbeatPeriod;
    }

    /**
     * The delay for an agent to send a heartbeat to the dispatcher.
     */
    public function setHeartbeatPeriod(int $heartbeatPeriod): self
    {
        $this->initialized['heartbeatPeriod'] = true;
        $this->heartbeatPeriod = $heartbeatPeriod;
        return $this;
    }
}
