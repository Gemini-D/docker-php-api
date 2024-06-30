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

class NetworksPrunePostResponse200
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Networks that were deleted.
     *
     * @var list<string>
     */
    protected $networksDeleted;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Networks that were deleted.
     *
     * @return list<string>
     */
    public function getNetworksDeleted(): array
    {
        return $this->networksDeleted;
    }

    /**
     * Networks that were deleted.
     *
     * @param list<string> $networksDeleted
     */
    public function setNetworksDeleted(array $networksDeleted): self
    {
        $this->initialized['networksDeleted'] = true;
        $this->networksDeleted = $networksDeleted;
        return $this;
    }
}
