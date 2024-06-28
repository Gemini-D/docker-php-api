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

class ThrottleDevice
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Device path.
     *
     * @var string
     */
    protected $path;

    /**
     * Rate.
     *
     * @var int
     */
    protected $rate;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Device path.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Device path.
     */
    public function setPath(string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;
        return $this;
    }

    /**
     * Rate.
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * Rate.
     */
    public function setRate(int $rate): self
    {
        $this->initialized['rate'] = true;
        $this->rate = $rate;
        return $this;
    }
}
