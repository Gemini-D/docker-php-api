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

class ExecIdStartPostBody
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Detach from the command.
     *
     * @var bool
     */
    protected $detach;

    /**
     * Allocate a pseudo-TTY.
     *
     * @var bool
     */
    protected $tty;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Detach from the command.
     */
    public function getDetach(): bool
    {
        return $this->detach;
    }

    /**
     * Detach from the command.
     */
    public function setDetach(bool $detach): self
    {
        $this->initialized['detach'] = true;
        $this->detach = $detach;
        return $this;
    }

    /**
     * Allocate a pseudo-TTY.
     */
    public function getTty(): bool
    {
        return $this->tty;
    }

    /**
     * Allocate a pseudo-TTY.
     */
    public function setTty(bool $tty): self
    {
        $this->initialized['tty'] = true;
        $this->tty = $tty;
        return $this;
    }
}
