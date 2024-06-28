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

class ServiceUpdateStatus
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $startedAt;

    /**
     * @var string
     */
    protected $completedAt;

    /**
     * @var string
     */
    protected $message;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->initialized['state'] = true;
        $this->state = $state;
        return $this;
    }

    public function getStartedAt(): string
    {
        return $this->startedAt;
    }

    public function setStartedAt(string $startedAt): self
    {
        $this->initialized['startedAt'] = true;
        $this->startedAt = $startedAt;
        return $this;
    }

    public function getCompletedAt(): string
    {
        return $this->completedAt;
    }

    public function setCompletedAt(string $completedAt): self
    {
        $this->initialized['completedAt'] = true;
        $this->completedAt = $completedAt;
        return $this;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
}
