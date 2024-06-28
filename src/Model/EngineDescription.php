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

class EngineDescription
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $engineVersion;

    /**
     * @var array<string, string>
     */
    protected $labels;

    /**
     * @var list<EngineDescriptionPluginsItem>
     */
    protected $plugins;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getEngineVersion(): string
    {
        return $this->engineVersion;
    }

    public function setEngineVersion(string $engineVersion): self
    {
        $this->initialized['engineVersion'] = true;
        $this->engineVersion = $engineVersion;
        return $this;
    }

    /**
     * @return array<string, string>
     */
    public function getLabels(): iterable
    {
        return $this->labels;
    }

    /**
     * @param array<string, string> $labels
     */
    public function setLabels(iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;
        return $this;
    }

    /**
     * @return list<EngineDescriptionPluginsItem>
     */
    public function getPlugins(): array
    {
        return $this->plugins;
    }

    /**
     * @param list<EngineDescriptionPluginsItem> $plugins
     */
    public function setPlugins(array $plugins): self
    {
        $this->initialized['plugins'] = true;
        $this->plugins = $plugins;
        return $this;
    }
}
