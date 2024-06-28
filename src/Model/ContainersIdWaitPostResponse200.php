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

class ContainersIdWaitPostResponse200
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Exit code of the container.
     *
     * @var int
     */
    protected $statusCode;

    /**
     * container waiting error, if any.
     *
     * @var ContainersIdWaitPostResponse200Error
     */
    protected $error;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Exit code of the container.
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Exit code of the container.
     */
    public function setStatusCode(int $statusCode): self
    {
        $this->initialized['statusCode'] = true;
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * container waiting error, if any.
     */
    public function getError(): ContainersIdWaitPostResponse200Error
    {
        return $this->error;
    }

    /**
     * container waiting error, if any.
     */
    public function setError(ContainersIdWaitPostResponse200Error $error): self
    {
        $this->initialized['error'] = true;
        $this->error = $error;
        return $this;
    }
}
