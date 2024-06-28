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

class ResourcesUlimitsItem
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Name of ulimit.
     *
     * @var string
     */
    protected $name;

    /**
     * Soft limit.
     *
     * @var int
     */
    protected $soft;

    /**
     * Hard limit.
     *
     * @var int
     */
    protected $hard;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Name of ulimit.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of ulimit.
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }

    /**
     * Soft limit.
     */
    public function getSoft(): int
    {
        return $this->soft;
    }

    /**
     * Soft limit.
     */
    public function setSoft(int $soft): self
    {
        $this->initialized['soft'] = true;
        $this->soft = $soft;
        return $this;
    }

    /**
     * Hard limit.
     */
    public function getHard(): int
    {
        return $this->hard;
    }

    /**
     * Hard limit.
     */
    public function setHard(int $hard): self
    {
        $this->initialized['hard'] = true;
        $this->hard = $hard;
        return $this;
    }
}
