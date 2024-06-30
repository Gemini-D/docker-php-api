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

class PluginsInfo
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Names of available volume-drivers, and network-driver plugins.
     *
     * @var list<string>
     */
    protected $volume;

    /**
     * Names of available network-drivers, and network-driver plugins.
     *
     * @var list<string>
     */
    protected $network;

    /**
     * Names of available authorization plugins.
     *
     * @var list<string>
     */
    protected $authorization;

    /**
     * Names of available logging-drivers, and logging-driver plugins.
     *
     * @var list<string>
     */
    protected $log;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Names of available volume-drivers, and network-driver plugins.
     *
     * @return list<string>
     */
    public function getVolume(): array
    {
        return $this->volume;
    }

    /**
     * Names of available volume-drivers, and network-driver plugins.
     *
     * @param list<string> $volume
     */
    public function setVolume(array $volume): self
    {
        $this->initialized['volume'] = true;
        $this->volume = $volume;
        return $this;
    }

    /**
     * Names of available network-drivers, and network-driver plugins.
     *
     * @return list<string>
     */
    public function getNetwork(): array
    {
        return $this->network;
    }

    /**
     * Names of available network-drivers, and network-driver plugins.
     *
     * @param list<string> $network
     */
    public function setNetwork(array $network): self
    {
        $this->initialized['network'] = true;
        $this->network = $network;
        return $this;
    }

    /**
     * Names of available authorization plugins.
     *
     * @return list<string>
     */
    public function getAuthorization(): array
    {
        return $this->authorization;
    }

    /**
     * Names of available authorization plugins.
     *
     * @param list<string> $authorization
     */
    public function setAuthorization(array $authorization): self
    {
        $this->initialized['authorization'] = true;
        $this->authorization = $authorization;
        return $this;
    }

    /**
     * Names of available logging-drivers, and logging-driver plugins.
     *
     * @return list<string>
     */
    public function getLog(): array
    {
        return $this->log;
    }

    /**
     * Names of available logging-drivers, and logging-driver plugins.
     *
     * @param list<string> $log
     */
    public function setLog(array $log): self
    {
        $this->initialized['log'] = true;
        $this->log = $log;
        return $this;
    }
}
