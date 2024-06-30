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

class AuthPostResponse200
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The status of the authentication.
     *
     * @var string
     */
    protected $status;

    /**
     * An opaque token used to authenticate a user after a successful login.
     *
     * @var string
     */
    protected $identityToken;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The status of the authentication.
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * The status of the authentication.
     */
    public function setStatus(string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;
        return $this;
    }

    /**
     * An opaque token used to authenticate a user after a successful login.
     */
    public function getIdentityToken(): string
    {
        return $this->identityToken;
    }

    /**
     * An opaque token used to authenticate a user after a successful login.
     */
    public function setIdentityToken(string $identityToken): self
    {
        $this->initialized['identityToken'] = true;
        $this->identityToken = $identityToken;
        return $this;
    }
}
