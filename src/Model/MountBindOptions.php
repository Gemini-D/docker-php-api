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

class MountBindOptions
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * A propagation mode with the value `[r]private`, `[r]shared`, or `[r]slave`.
     *
     * @var string
     */
    protected $propagation;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * A propagation mode with the value `[r]private`, `[r]shared`, or `[r]slave`.
     */
    public function getPropagation(): string
    {
        return $this->propagation;
    }

    /**
     * A propagation mode with the value `[r]private`, `[r]shared`, or `[r]slave`.
     */
    public function setPropagation(string $propagation): self
    {
        $this->initialized['propagation'] = true;
        $this->propagation = $propagation;
        return $this;
    }
}
