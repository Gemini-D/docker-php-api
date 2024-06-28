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

class ErrorResponse
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The error message.
     *
     * @var string
     */
    protected $message;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The error message.
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * The error message.
     */
    public function setMessage(string $message): self
    {
        $this->initialized['message'] = true;
        $this->message = $message;
        return $this;
    }
}
