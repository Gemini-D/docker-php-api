<?php
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Docker\API\Model;

class ServiceEndpointVirtualIPsItem
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $networkID;

    /**
     * @var string
     */
    protected $addr;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getNetworkID(): string
    {
        return $this->networkID;
    }

    public function setNetworkID(string $networkID): self
    {
        $this->initialized['networkID'] = true;
        $this->networkID = $networkID;
        return $this;
    }

    public function getAddr(): string
    {
        return $this->addr;
    }

    public function setAddr(string $addr): self
    {
        $this->initialized['addr'] = true;
        $this->addr = $addr;
        return $this;
    }
}
