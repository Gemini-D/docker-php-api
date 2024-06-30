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

class PluginConfigLinux
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var list<string>
     */
    protected $capabilities;

    /**
     * @var bool
     */
    protected $allowAllDevices;

    /**
     * @var list<PluginDevice>
     */
    protected $devices;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * @return list<string>
     */
    public function getCapabilities(): array
    {
        return $this->capabilities;
    }

    /**
     * @param list<string> $capabilities
     */
    public function setCapabilities(array $capabilities): self
    {
        $this->initialized['capabilities'] = true;
        $this->capabilities = $capabilities;
        return $this;
    }

    public function getAllowAllDevices(): bool
    {
        return $this->allowAllDevices;
    }

    public function setAllowAllDevices(bool $allowAllDevices): self
    {
        $this->initialized['allowAllDevices'] = true;
        $this->allowAllDevices = $allowAllDevices;
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
