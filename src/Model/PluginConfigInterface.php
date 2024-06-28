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

class PluginConfigInterface
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var list<PluginInterfaceType>
     */
    protected $types;

    /**
     * @var string
     */
    protected $socket;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * @return list<PluginInterfaceType>
     */
    public function getTypes(): array
    {
        return $this->types;
    }

    /**
     * @param list<PluginInterfaceType> $types
     */
    public function setTypes(array $types): self
    {
        $this->initialized['types'] = true;
        $this->types = $types;
        return $this;
    }

    public function getSocket(): string
    {
        return $this->socket;
    }

    public function setSocket(string $socket): self
    {
        $this->initialized['socket'] = true;
        $this->socket = $socket;
        return $this;
    }
}
