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

class SwarmSpecEncryptionConfig
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * If set, generate a key and use it to lock data stored on the managers.
     *
     * @var bool
     */
    protected $autoLockManagers;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * If set, generate a key and use it to lock data stored on the managers.
     */
    public function getAutoLockManagers(): bool
    {
        return $this->autoLockManagers;
    }

    /**
     * If set, generate a key and use it to lock data stored on the managers.
     */
    public function setAutoLockManagers(bool $autoLockManagers): self
    {
        $this->initialized['autoLockManagers'] = true;
        $this->autoLockManagers = $autoLockManagers;
        return $this;
    }
}
