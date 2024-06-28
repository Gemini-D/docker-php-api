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

class JoinTokens
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The token workers can use to join the swarm.
     *
     * @var string
     */
    protected $worker;

    /**
     * The token managers can use to join the swarm.
     *
     * @var string
     */
    protected $manager;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The token workers can use to join the swarm.
     */
    public function getWorker(): string
    {
        return $this->worker;
    }

    /**
     * The token workers can use to join the swarm.
     */
    public function setWorker(string $worker): self
    {
        $this->initialized['worker'] = true;
        $this->worker = $worker;
        return $this;
    }

    /**
     * The token managers can use to join the swarm.
     */
    public function getManager(): string
    {
        return $this->manager;
    }

    /**
     * The token managers can use to join the swarm.
     */
    public function setManager(string $manager): self
    {
        $this->initialized['manager'] = true;
        $this->manager = $manager;
        return $this;
    }
}
