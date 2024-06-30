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

class PluginSettings
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var list<PluginMount>
     */
    protected $mounts;

    /**
     * @var list<string>
     */
    protected $env;

    /**
     * @var list<string>
     */
    protected $args;

    /**
     * @var list<PluginDevice>
     */
    protected $devices;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * @return list<PluginMount>
     */
    public function getMounts(): array
    {
        return $this->mounts;
    }

    /**
     * @param list<PluginMount> $mounts
     */
    public function setMounts(array $mounts): self
    {
        $this->initialized['mounts'] = true;
        $this->mounts = $mounts;
        return $this;
    }

    /**
     * @return list<string>
     */
    public function getEnv(): array
    {
        return $this->env;
    }

    /**
     * @param list<string> $env
     */
    public function setEnv(array $env): self
    {
        $this->initialized['env'] = true;
        $this->env = $env;
        return $this;
    }

    /**
     * @return list<string>
     */
    public function getArgs(): array
    {
        return $this->args;
    }

    /**
     * @param list<string> $args
     */
    public function setArgs(array $args): self
    {
        $this->initialized['args'] = true;
        $this->args = $args;
        return $this;
    }

    /**
     * @return list<PluginDevice>
     */
    public function getDevices(): array
    {
        return $this->devices;
    }

    /**
     * @param list<PluginDevice> $devices
     */
    public function setDevices(array $devices): self
    {
        $this->initialized['devices'] = true;
        $this->devices = $devices;
        return $this;
    }
}
