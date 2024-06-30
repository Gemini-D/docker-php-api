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

class SwarmSpecTaskDefaultsLogDriver
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The log driver to use as a default for new tasks.
     *
     * @var string
     */
    protected $name;

    /**
     * Driver-specific options for the selectd log driver, specified
     * as key/value pairs.
     *
     * @var array<string, string>
     */
    protected $options;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The log driver to use as a default for new tasks.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The log driver to use as a default for new tasks.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }

    /**
     * Driver-specific options for the selectd log driver, specified
     * as key/value pairs.
     *
     * @return array<string, string>
     */
    public function getOptions(): iterable
    {
        return $this->options;
    }

    /**
     * Driver-specific options for the selectd log driver, specified
     * as key/value pairs.
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
