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

class ContainerSummaryItemNetworkSettings
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var array<string, EndpointSettings>
     */
    protected $networks;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * @return array<string, EndpointSettings>
     */
    public function getNetworks(): iterable
    {
        return $this->networks;
    }

    /**
     * @param array<string, EndpointSettings> $networks
     */
    public function setNetworks(iterable $networks): self
    {
        $this->initialized['networks'] = true;
        $this->networks = $networks;
        return $this;
    }
}
