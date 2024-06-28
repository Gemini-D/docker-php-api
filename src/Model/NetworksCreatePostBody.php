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

class NetworksCreatePostBody
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The network's name.
     *
     * @var string
     */
    protected $name;

    /**
     * Check for networks with duplicate names. Since Network is primarily keyed based on a random ID and not on the name, and network name is strictly a user-friendly alias to the network which is uniquely identified using ID, there is no guaranteed way to check for duplicates. CheckDuplicate is there to provide a best effort checking of any networks which has the same name but it is not guaranteed to catch all name collisions.
     *
     * @var bool
     */
    protected $checkDuplicate;

    /**
     * Name of the network driver plugin to use.
     *
     * @var string
     */
    protected $driver = 'bridge';

    /**
     * Restrict external access to the network.
     *
     * @var bool
     */
    protected $internal;

    /**
     * Globally scoped network is manually attachable by regular containers from workers in swarm mode.
     *
     * @var bool
     */
    protected $attachable;

    /**
     * Ingress network is the network which provides the routing-mesh in swarm mode.
     *
     * @var bool
     */
    protected $ingress;

    /**
     * @var IPAM
     */
    protected $iPAM;

    /**
     * Enable IPv6 on the network.
     *
     * @var bool
     */
    protected $enableIPv6;

    /**
     * Network specific options to be used by the drivers.
     *
     * @var array<string, string>
     */
    protected $options;

    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>
     */
    protected $labels;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The network's name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The network's name.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }

    /**
     * Check for networks with duplicate names. Since Network is primarily keyed based on a random ID and not on the name, and network name is strictly a user-friendly alias to the network which is uniquely identified using ID, there is no guaranteed way to check for duplicates. CheckDuplicate is there to provide a best effort checking of any networks which has the same name but it is not guaranteed to catch all name collisions.
     */
    public function getCheckDuplicate(): bool
    {
        return $this->checkDuplicate;
    }

    /**
     * Check for networks with duplicate names. Since Network is primarily keyed based on a random ID and not on the name, and network name is strictly a user-friendly alias to the network which is uniquely identified using ID, there is no guaranteed way to check for duplicates. CheckDuplicate is there to provide a best effort checking of any networks which has the same name but it is not guaranteed to catch all name collisions.
     */
    public function setCheckDuplicate(bool $checkDuplicate): self
    {
        $this->initialized['checkDuplicate'] = true;
        $this->checkDuplicate = $checkDuplicate;
        return $this;
    }

    /**
     * Name of the network driver plugin to use.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * Name of the network driver plugin to use.
     */
    public function setDriver(string $driver): self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;
        return $this;
    }

    /**
     * Restrict external access to the network.
     */
    public function getInternal(): bool
    {
        return $this->internal;
    }

    /**
     * Restrict external access to the network.
     */
    public function setInternal(bool $internal): self
    {
        $this->initialized['internal'] = true;
        $this->internal = $internal;
        return $this;
    }

    /**
     * Globally scoped network is manually attachable by regular containers from workers in swarm mode.
     */
    public function getAttachable(): bool
    {
        return $this->attachable;
    }

    /**
     * Globally scoped network is manually attachable by regular containers from workers in swarm mode.
     */
    public function setAttachable(bool $attachable): self
    {
        $this->initialized['attachable'] = true;
        $this->attachable = $attachable;
        return $this;
    }

    /**
     * Ingress network is the network which provides the routing-mesh in swarm mode.
     */
    public function getIngress(): bool
    {
        return $this->ingress;
    }

    /**
     * Ingress network is the network which provides the routing-mesh in swarm mode.
     */
    public function setIngress(bool $ingress): self
    {
        $this->initialized['ingress'] = true;
        $this->ingress = $ingress;
        return $this;
    }

    public function getIPAM(): IPAM
    {
        return $this->iPAM;
    }

    public function setIPAM(IPAM $iPAM): self
    {
        $this->initialized['iPAM'] = true;
        $this->iPAM = $iPAM;
        return $this;
    }

    /**
     * Enable IPv6 on the network.
     */
    public function getEnableIPv6(): bool
    {
        return $this->enableIPv6;
    }

    /**
     * Enable IPv6 on the network.
     */
    public function setEnableIPv6(bool $enableIPv6): self
    {
        $this->initialized['enableIPv6'] = true;
        $this->enableIPv6 = $enableIPv6;
        return $this;
    }

    /**
     * Network specific options to be used by the drivers.
     *
     * @return array<string, string>
     */
    public function getOptions(): iterable
    {
        return $this->options;
    }

    /**
     * Network specific options to be used by the drivers.
     *
     * @param array<string, string> $options
     */
    public function setOptions(iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;
        return $this;
    }

    /**
     * User-defined key/value metadata.
     *
     * @return array<string, string>
     */
    public function getLabels(): iterable
    {
        return $this->labels;
    }

    /**
     * User-defined key/value metadata.
     *
     * @param array<string, string> $labels
     */
    public function setLabels(iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;
        return $this;
    }
}
