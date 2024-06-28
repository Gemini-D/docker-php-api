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

class ContainersPrunePostResponse200
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Container IDs that were deleted.
     *
     * @var list<string>
     */
    protected $containersDeleted;

    /**
     * Disk space reclaimed in bytes.
     *
     * @var int
     */
    protected $spaceReclaimed;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Container IDs that were deleted.
     *
     * @return list<string>
     */
    public function getContainersDeleted(): array
    {
        return $this->containersDeleted;
    }

    /**
     * Container IDs that were deleted.
     *
     * @param list<string> $containersDeleted
     */
    public function setContainersDeleted(array $containersDeleted): self
    {
        $this->initialized['containersDeleted'] = true;
        $this->containersDeleted = $containersDeleted;
        return $this;
    }

    /**
     * Disk space reclaimed in bytes.
     */
    public function getSpaceReclaimed(): int
    {
        return $this->spaceReclaimed;
    }

    /**
     * Disk space reclaimed in bytes.
     */
    public function setSpaceReclaimed(int $spaceReclaimed): self
    {
        $this->initialized['spaceReclaimed'] = true;
        $this->spaceReclaimed = $spaceReclaimed;
        return $this;
    }
}
