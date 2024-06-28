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

class MountVolumeOptionsDriverConfig
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Name of the driver to use to create the volume.
     *
     * @var string
     */
    protected $name;

    /**
     * key/value map of driver specific options.
     *
     * @var array<string, string>
     */
    protected $options;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Name of the driver to use to create the volume.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the driver to use to create the volume.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }

    /**
     * key/value map of driver specific options.
     *
     * @return array<string, string>
     */
    public function getOptions(): iterable
    {
        return $this->options;
    }

    /**
     * key/value map of driver specific options.
     *
     * @param array<string, string> $options
     */
    public function setOptions(iterable $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;
        return $this;
    }
}
