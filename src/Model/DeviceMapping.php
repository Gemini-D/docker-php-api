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

class DeviceMapping
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $pathOnHost;

    /**
     * @var string
     */
    protected $pathInContainer;

    /**
     * @var string
     */
    protected $cgroupPermissions;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getPathOnHost(): string
    {
        return $this->pathOnHost;
    }

    public function setPathOnHost(string $pathOnHost): self
    {
        $this->initialized['pathOnHost'] = true;
        $this->pathOnHost = $pathOnHost;
        return $this;
    }

    public function getPathInContainer(): string
    {
        return $this->pathInContainer;
    }

    public function setPathInContainer(string $pathInContainer): self
    {
        $this->initialized['pathInContainer'] = true;
        $this->pathInContainer = $pathInContainer;
        return $this;
    }

    public function getCgroupPermissions(): string
    {
        return $this->cgroupPermissions;
    }

    public function setCgroupPermissions(string $cgroupPermissions): self
    {
        $this->initialized['cgroupPermissions'] = true;
        $this->cgroupPermissions = $cgroupPermissions;
        return $this;
    }
}
