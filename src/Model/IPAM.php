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

class IPAM
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Name of the IPAM driver to use.
     *
     * @var string
     */
    protected $driver = 'default';

    /**
     * List of IPAM configuration options, specified as a map: `{"Subnet": <CIDR>, "IPRange": <CIDR>, "Gateway": <IP address>, "AuxAddress": <device_name:IP address>}`.
     *
     * @var list<array<string, string>>
     */
    protected $config;

    /**
     * Driver-specific options, specified as a map.
     *
     * @var list<array<string, string>>
     */
    protected $options;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Name of the IPAM driver to use.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * Name of the IPAM driver to use.
     */
    public function setDriver(string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;
        return $this;
    }

    /**
     * List of IPAM configuration options, specified as a map: `{"Subnet": <CIDR>, "IPRange": <CIDR>, "Gateway": <IP address>, "AuxAddress": <device_name:IP address>}`.
     *
     * @return list<array<string, string>>
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * List of IPAM configuration options, specified as a map: `{"Subnet": <CIDR>, "IPRange": <CIDR>, "Gateway": <IP address>, "AuxAddress": <device_name:IP address>}`.
     *
     * @param list<array<string, string>> $config
     */
    public function setConfig(array $config): self
    {
        $this->initialized['config'] = true;
        $this->config = $config;
        return $this;
    }

    /**
     * Driver-specific options, specified as a map.
     *
     * @return list<array<string, string>>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Driver-specific options, specified as a map.
     *
     * @param list<array<string, string>> $options
     */
    public function setOptions(array $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;
        return $this;
    }
}
