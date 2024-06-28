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

class ContainersCreatePostBodyNetworkingConfig
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * A mapping of network name to endpoint configuration for that network.
     *
     * @var array<string, EndpointSettings>
     */
    protected $endpointsConfig;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * A mapping of network name to endpoint configuration for that network.
     *
     * @return array<string, EndpointSettings>
     */
    public function getEndpointsConfig(): iterable
    {
        return $this->endpointsConfig;
    }

    /**
     * A mapping of network name to endpoint configuration for that network.
     *
     * @param array<string, EndpointSettings> $endpointsConfig
     */
    public function setEndpointsConfig(iterable $endpointsConfig): self
    {
        $this->initialized['endpointsConfig'] = true;
        $this->endpointsConfig = $endpointsConfig;
        return $this;
    }
}
