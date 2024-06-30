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

class EndpointIPAMConfig
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $iPv4Address;

    /**
     * @var string
     */
    protected $iPv6Address;

    /**
     * @var list<string>
     */
    protected $linkLocalIPs;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getIPv4Address(): string
    {
        return $this->iPv4Address;
    }

    public function setIPv4Address(string $iPv4Address): self
    {
        $this->initialized['iPv4Address'] = true;
        $this->iPv4Address = $iPv4Address;
        return $this;
    }

    public function getIPv6Address(): string
    {
        return $this->iPv6Address;
    }

    public function setIPv6Address(string $iPv6Address): self
    {
        $this->initialized['iPv6Address'] = true;
        $this->iPv6Address = $iPv6Address;
        return $this;
    }

    /**
     * @return list<string>
     */
    public function getLinkLocalIPs(): array
    {
        return $this->linkLocalIPs;
    }

    /**
     * @param list<string> $linkLocalIPs
     */
    public function setLinkLocalIPs(array $linkLocalIPs): self
    {
        $this->initialized['linkLocalIPs'] = true;
        $this->linkLocalIPs = $linkLocalIPs;
        return $this;
    }
}
