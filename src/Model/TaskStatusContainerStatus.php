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

class TaskStatusContainerStatus
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $containerID;

    /**
     * @var int
     */
    protected $pID;

    /**
     * @var int
     */
    protected $exitCode;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getContainerID(): string
    {
        return $this->containerID;
    }

    public function setContainerID(string $containerID): self
    {
        $this->initialized['containerID'] = true;
        $this->containerID = $containerID;
        return $this;
    }

    public function getPID(): int
    {
        return $this->pID;
    }

    public function setPID(int $pID): self
    {
        $this->initialized['pID'] = true;
        $this->pID = $pID;
        return $this;
    }

    public function getExitCode(): int
    {
        return $this->exitCode;
    }

    public function setExitCode(int $exitCode): self
    {
        $this->initialized['exitCode'] = true;
        $this->exitCode = $exitCode;
        return $this;
    }
}
