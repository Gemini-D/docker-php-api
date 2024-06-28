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

class PluginConfigRootfs
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $type;

    /**
     * @var list<string>
     */
    protected $diffIds;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
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

    /**
     * @return list<string>
     */
    public function getDiffIds(): array
    {
        return $this->diffIds;
    }

    /**
     * @param list<string> $diffIds
     */
    public function setDiffIds(array $diffIds): self
    {
        $this->initialized['diffIds'] = true;
        $this->diffIds = $diffIds;
        return $this;
    }
}
