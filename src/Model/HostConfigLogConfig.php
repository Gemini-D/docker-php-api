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

class HostConfigLogConfig
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
     * @var array<string, string>
     */
    protected $config;

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
     * @return array<string, string>
     */
    public function getConfig(): iterable
    {
        return $this->config;
    }

    /**
     * @param array<string, string> $config
     */
    public function setConfig(iterable $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;
        return $this;
    }
}
