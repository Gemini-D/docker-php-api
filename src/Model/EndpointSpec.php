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

class EndpointSpec
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The mode of resolution to use for internal load balancing between tasks.
     *
     * @var string
     */
    protected $mode = 'vip';

    /**
     * List of exposed ports that this service is accessible on from the outside. Ports can only be provided if `vip` resolution mode is used.
     *
     * @var list<EndpointPortConfig>
     */
    protected $ports;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The mode of resolution to use for internal load balancing between tasks.
     */
    public function getMode(): string
    {
        return $this->mode;
    }

    /**
     * The mode of resolution to use for internal load balancing between tasks.
     */
    public function setMode(string $mode): self
    {
        $this->initialized['mode'] = true;
        $this->mode = $mode;
        return $this;
    }

    /**
     * List of exposed ports that this service is accessible on from the outside. Ports can only be provided if `vip` resolution mode is used.
     *
     * @return list<EndpointPortConfig>
     */
    public function getPorts(): array
    {
        return $this->ports;
    }

    /**
     * List of exposed ports that this service is accessible on from the outside. Ports can only be provided if `vip` resolution mode is used.
     *
     * @param list<EndpointPortConfig> $ports
     */
    public function setPorts(array $ports): self
    {
        $this->initialized['ports'] = true;
        $this->ports = $ports;
        return $this;
    }
}
