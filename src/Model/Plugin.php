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

class Plugin
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * True if the plugin is running. False if the plugin is not running, only installed.
     *
     * @var bool
     */
    protected $enabled;

    /**
     * Settings that can be modified by users.
     *
     * @var PluginSettings
     */
    protected $settings;

    /**
     * plugin remote reference used to push/pull the plugin.
     *
     * @var string
     */
    protected $pluginReference;

    /**
     * The config of a plugin.
     *
     * @var PluginConfig
     */
    protected $config;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
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

    /**
     * True if the plugin is running. False if the plugin is not running, only installed.
     */
    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * True if the plugin is running. False if the plugin is not running, only installed.
     */
    public function setEnabled(bool $enabled): self
    {
        $this->initialized['enabled'] = true;
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * Settings that can be modified by users.
     */
    public function getSettings(): PluginSettings
    {
        return $this->settings;
    }

    /**
     * Settings that can be modified by users.
     */
    public function setSettings(PluginSettings $settings): self
    {
        $this->initialized['settings'] = true;
        $this->settings = $settings;
        return $this;
    }

    /**
     * plugin remote reference used to push/pull the plugin.
     */
    public function getPluginReference(): string
    {
        return $this->pluginReference;
    }

    /**
     * plugin remote reference used to push/pull the plugin.
     */
    public function setPluginReference(string $pluginReference): self
    {
        $this->initialized['pluginReference'] = true;
        $this->pluginReference = $pluginReference;
        return $this;
    }

    /**
     * The config of a plugin.
     */
    public function getConfig(): PluginConfig
    {
        return $this->config;
    }

    /**
     * The config of a plugin.
     */
    public function setConfig(PluginConfig $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;
        return $this;
    }
}
