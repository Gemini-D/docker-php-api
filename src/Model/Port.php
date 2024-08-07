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

class Port
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $iP;

    /**
     * Port on the container.
     *
     * @var int
     */
    protected $privatePort;

    /**
     * Port exposed on the host.
     *
     * @var int
     */
    protected $publicPort;

    /**
     * @var string
     */
    protected $type;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getIP(): string
    {
        return $this->iP;
    }

    public function setIP(string $iP): self
    {
        $this->initialized['iP'] = true;
        $this->iP = $iP;
        return $this;
    }

    /**
     * Port on the container.
     */
    public function getPrivatePort(): int
    {
        return $this->privatePort;
    }

    /**
     * Port on the container.
     */
    public function setPrivatePort(int $privatePort): self
    {
        $this->initialized['privatePort'] = true;
        $this->privatePort = $privatePort;
        return $this;
    }

    /**
     * Port exposed on the host.
     */
    public function getPublicPort(): int
    {
        return $this->publicPort;
    }

    /**
     * Port exposed on the host.
     */
    public function setPublicPort(int $publicPort): self
    {
        $this->initialized['publicPort'] = true;
        $this->publicPort = $publicPort;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }
}
