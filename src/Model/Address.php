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

class Address
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * IP address.
     *
     * @var string
     */
    protected $addr;

    /**
     * Mask length of the IP address.
     *
     * @var int
     */
    protected $prefixLen;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * IP address.
     */
    public function getAddr(): string
    {
        return $this->addr;
    }

    /**
     * IP address.
     */
    public function setAddr(string $addr): self
    {
        $this->initialized['addr'] = true;
        $this->addr = $addr;
        return $this;
    }

    /**
     * Mask length of the IP address.
     */
    public function getPrefixLen(): int
    {
        return $this->prefixLen;
    }

    /**
     * Mask length of the IP address.
     */
    public function setPrefixLen(int $prefixLen): self
    {
        $this->initialized['prefixLen'] = true;
        $this->prefixLen = $prefixLen;
        return $this;
    }
}
