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

class ServiceEndpoint
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Properties that can be configured to access and load balance a service.
     *
     * @var EndpointSpec
     */
    protected $spec;

    /**
     * @var list<EndpointPortConfig>
     */
    protected $ports;

    /**
     * @var list<ServiceEndpointVirtualIPsItem>
     */
    protected $virtualIPs;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Properties that can be configured to access and load balance a service.
     */
    public function getSpec(): EndpointSpec
    {
        return $this->spec;
    }

    /**
     * Properties that can be configured to access and load balance a service.
     */
    public function setSpec(EndpointSpec $spec): self
    {
        $this->initialized['spec'] = true;
        $this->spec = $spec;
        return $this;
    }

    /**
     * @return list<EndpointPortConfig>
     */
    public function getPorts(): array
    {
        return $this->ports;
    }

    /**
     * @param list<EndpointPortConfig> $ports
     */
    public function setPorts(array $ports): self
    {
        $this->initialized['ports'] = true;
        $this->ports = $ports;
        return $this;
    }

    /**
     * @return list<ServiceEndpointVirtualIPsItem>
     */
    public function getVirtualIPs(): array
    {
        return $this->virtualIPs;
    }

    /**
     * @param list<ServiceEndpointVirtualIPsItem> $virtualIPs
     */
    public function setVirtualIPs(array $virtualIPs): self
    {
        $this->initialized['virtualIPs'] = true;
        $this->virtualIPs = $virtualIPs;
        return $this;
    }
}
