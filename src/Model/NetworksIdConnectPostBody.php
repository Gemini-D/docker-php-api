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

class NetworksIdConnectPostBody
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The ID or name of the container to connect to the network.
     *
     * @var string
     */
    protected $container;

    /**
     * Configuration for a network endpoint.
     *
     * @var EndpointSettings
     */
    protected $endpointConfig;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The ID or name of the container to connect to the network.
     */
    public function getContainer(): string
    {
        return $this->container;
    }

    /**
     * The ID or name of the container to connect to the network.
     */
    public function setContainer(string $container): self
    {
        $this->initialized['container'] = true;
        $this->container = $container;
        return $this;
    }

    /**
     * Configuration for a network endpoint.
     */
    public function getEndpointConfig(): EndpointSettings
    {
        return $this->endpointConfig;
    }

    /**
     * Configuration for a network endpoint.
     */
    public function setEndpointConfig(EndpointSettings $endpointConfig): self
    {
        $this->initialized['endpointConfig'] = true;
        $this->endpointConfig = $endpointConfig;
        return $this;
    }
}
