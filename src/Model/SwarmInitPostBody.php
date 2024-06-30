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

class SwarmInitPostBody
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Listen address used for inter-manager communication, as well as determining the networking interface used for the VXLAN Tunnel Endpoint (VTEP). This can either be an address/port combination in the form `192.168.1.1:4567`, or an interface followed by a port number, like `eth0:4567`. If the port number is omitted, the default swarm listening port is used.
     *
     * @var string
     */
    protected $listenAddr;

    /**
     * Externally reachable address advertised to other nodes. This can either be an address/port combination in the form `192.168.1.1:4567`, or an interface followed by a port number, like `eth0:4567`. If the port number is omitted, the port number from the listen address is used. If `AdvertiseAddr` is not specified, it will be automatically detected when possible.
     *
     * @var string
     */
    protected $advertiseAddr;

    /**
     * Address or interface to use for data path traffic (format: `<ip|interface>`), for example,  `192.168.1.1`,
     * or an interface, like `eth0`. If `DataPathAddr` is unspecified, the same address as `AdvertiseAddr`
     * is used.
     *
     * The `DataPathAddr` specifies the address that global scope network drivers will publish towards other
     * nodes in order to reach the containers running on this node. Using this parameter it is possible to
     * separate the container data traffic from the management traffic of the cluster.
     *
     * @var string
     */
    protected $dataPathAddr;

    /**
     * Force creation of a new swarm.
     *
     * @var bool
     */
    protected $forceNewCluster;

    /**
     * User modifiable swarm configuration.
     *
     * @var SwarmSpec
     */
    protected $spec;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Listen address used for inter-manager communication, as well as determining the networking interface used for the VXLAN Tunnel Endpoint (VTEP). This can either be an address/port combination in the form `192.168.1.1:4567`, or an interface followed by a port number, like `eth0:4567`. If the port number is omitted, the default swarm listening port is used.
     */
    public function getListenAddr(): string
    {
        return $this->listenAddr;
    }

    /**
     * Listen address used for inter-manager communication, as well as determining the networking interface used for the VXLAN Tunnel Endpoint (VTEP). This can either be an address/port combination in the form `192.168.1.1:4567`, or an interface followed by a port number, like `eth0:4567`. If the port number is omitted, the default swarm listening port is used.
     */
    public function setListenAddr(string $listenAddr): self
    {
        $this->initialized['listenAddr'] = true;
        $this->listenAddr = $listenAddr;
        return $this;
    }

    /**
     * Externally reachable address advertised to other nodes. This can either be an address/port combination in the form `192.168.1.1:4567`, or an interface followed by a port number, like `eth0:4567`. If the port number is omitted, the port number from the listen address is used. If `AdvertiseAddr` is not specified, it will be automatically detected when possible.
     */
    public function getAdvertiseAddr(): string
    {
        return $this->advertiseAddr;
    }

    /**
     * Externally reachable address advertised to other nodes. This can either be an address/port combination in the form `192.168.1.1:4567`, or an interface followed by a port number, like `eth0:4567`. If the port number is omitted, the port number from the listen address is used. If `AdvertiseAddr` is not specified, it will be automatically detected when possible.
     */
    public function setAdvertiseAddr(string $advertiseAddr): self
    {
        $this->initialized['advertiseAddr'] = true;
        $this->advertiseAddr = $advertiseAddr;
        return $this;
    }

    /**
     * Address or interface to use for data path traffic (format: `<ip|interface>`), for example,  `192.168.1.1`,
     * or an interface, like `eth0`. If `DataPathAddr` is unspecified, the same address as `AdvertiseAddr`
     * is used.
     *
     * The `DataPathAddr` specifies the address that global scope network drivers will publish towards other
     * nodes in order to reach the containers running on this node. Using this parameter it is possible to
     * separate the container data traffic from the management traffic of the cluster.
     */
    public function getDataPathAddr(): string
    {
        return $this->dataPathAddr;
    }

    /**
     * Address or interface to use for data path traffic (format: `<ip|interface>`), for example,  `192.168.1.1`,
     * or an interface, like `eth0`. If `DataPathAddr` is unspecified, the same address as `AdvertiseAddr`
     * is used.
     *
     * The `DataPathAddr` specifies the address that global scope network drivers will publish towards other
     * nodes in order to reach the containers running on this node. Using this parameter it is possible to
     * separate the container data traffic from the management traffic of the cluster.
     */
    public function setDataPathAddr(string $dataPathAddr): self
    {
        $this->initialized['dataPathAddr'] = true;
        $this->dataPathAddr = $dataPathAddr;
        return $this;
    }

    /**
     * Force creation of a new swarm.
     */
    public function getForceNewCluster(): bool
    {
        return $this->forceNewCluster;
    }

    /**
     * Force creation of a new swarm.
     */
    public function setForceNewCluster(bool $forceNewCluster): self
    {
        $this->initialized['forceNewCluster'] = true;
        $this->forceNewCluster = $forceNewCluster;
        return $this;
    }

    /**
     * User modifiable swarm configuration.
     */
    public function getSpec(): SwarmSpec
    {
        return $this->spec;
    }

    /**
     * User modifiable swarm configuration.
     */
    public function setSpec(SwarmSpec $spec): self
    {
        $this->initialized['spec'] = true;
        $this->spec = $spec;
        return $this;
    }
}
