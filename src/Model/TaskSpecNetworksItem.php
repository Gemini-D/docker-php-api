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

class TaskSpecNetworksItem
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $target;

    /**
     * @var list<string>
     */
    protected $aliases;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getTarget(): string
    {
        return $this->target;
    }

    public function setTarget(string $target): self
    {
        $this->initialized['target'] = true;
        $this->target = $target;
        return $this;
    }

    /**
     * @return list<string>
     */
    public function getAliases(): array
    {
        return $this->aliases;
    }

    /**
     * @param list<string> $aliases
     */
    public function setAliases(array $aliases): self
    {
        $this->initialized['aliases'] = true;
        $this->aliases = $aliases;
        return $this;
    }
}
