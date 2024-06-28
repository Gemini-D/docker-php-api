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

class ImageMetadata
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $lastTagTime;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getLastTagTime(): string
    {
        return $this->lastTagTime;
    }

    public function setLastTagTime(string $lastTagTime): self
    {
        $this->initialized['lastTagTime'] = true;
        $this->lastTagTime = $lastTagTime;
        return $this;
    }
}
