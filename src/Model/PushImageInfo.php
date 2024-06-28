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

class PushImageInfo
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $error;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $progress;

    /**
     * @var ProgressDetail
     */
    protected $progressDetail;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getError(): string
    {
        return $this->error;
    }

    public function setError(string $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }

    public function getProgress(): string
    {
        return $this->progress;
    }

    public function setProgress(string $progress): self
    {
        $this->initialized['progress'] = true;
        $this->progress = $progress;
        return $this;
    }

    public function getProgressDetail(): ProgressDetail
    {
        return $this->progressDetail;
    }

    public function setProgressDetail(ProgressDetail $progressDetail): self
    {
        $this->initialized['progressDetail'] = true;
        $this->progressDetail = $progressDetail;
        return $this;
    }
}
