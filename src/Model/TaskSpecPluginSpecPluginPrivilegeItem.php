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

class TaskSpecPluginSpecPluginPrivilegeItem
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var list<string>
     */
    protected $value;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }

    /**
     * @return list<string>
     */
    public function getValue(): array
    {
        return $this->value;
    }

    /**
     * @param list<string> $value
     */
    public function setValue(array $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
}
