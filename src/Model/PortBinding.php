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

class PortBinding
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Host IP address that the container's port is mapped to.
     *
     * @var string
     */
    protected $hostIp;

    /**
     * Host port number that the container's port is mapped to.
     *
     * @var string
     */
    protected $hostPort;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Host IP address that the container's port is mapped to.
     */
    public function getHostIp(): string
    {
        return $this->hostIp;
    }

    /**
     * Host IP address that the container's port is mapped to.
     */
    public function setHostIp(string $hostIp): self
    {
        $this->initialized['hostIp'] = true;
        $this->hostIp = $hostIp;
        return $this;
    }

    /**
     * Host port number that the container's port is mapped to.
     */
    public function getHostPort(): string
    {
        return $this->hostPort;
    }

    /**
     * Host port number that the container's port is mapped to.
     */
    public function setHostPort(string $hostPort): self
    {
        $this->initialized['hostPort'] = true;
        $this->hostPort = $hostPort;
        return $this;
    }
}
