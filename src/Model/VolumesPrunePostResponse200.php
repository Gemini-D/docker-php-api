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

class VolumesPrunePostResponse200
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Volumes that were deleted.
     *
     * @var list<string>
     */
    protected $volumesDeleted;

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
     * Volumes that were deleted.
     *
     * @return list<string>
     */
    public function getVolumesDeleted(): array
    {
        return $this->volumesDeleted;
    }

    /**
     * Volumes that were deleted.
     *
     * @param list<string> $volumesDeleted
     */
    public function setVolumesDeleted(array $volumesDeleted): self
    {
        $this->initialized['volumesDeleted'] = true;
        $this->volumesDeleted = $volumesDeleted;
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
