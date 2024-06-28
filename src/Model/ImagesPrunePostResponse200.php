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

class ImagesPrunePostResponse200
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Images that were deleted.
     *
     * @var list<ImageDeleteResponseItem>
     */
    protected $imagesDeleted;

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
     * Images that were deleted.
     *
     * @return list<ImageDeleteResponseItem>
     */
    public function getImagesDeleted(): array
    {
        return $this->imagesDeleted;
    }

    /**
     * Images that were deleted.
     *
     * @param list<ImageDeleteResponseItem> $imagesDeleted
     */
    public function setImagesDeleted(array $imagesDeleted): self
    {
        $this->initialized['imagesDeleted'] = true;
        $this->imagesDeleted = $imagesDeleted;
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
