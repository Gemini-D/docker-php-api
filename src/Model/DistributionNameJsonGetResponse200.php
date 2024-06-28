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

class DistributionNameJsonGetResponse200
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * A descriptor struct containing digest, media type, and size.
     *
     * @var DistributionNameJsonGetResponse200Descriptor
     */
    protected $descriptor;

    /**
     * An array containing all platforms supported by the image.
     *
     * @var list<DistributionNameJsonGetResponse200PlatformsItem>
     */
    protected $platforms;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * A descriptor struct containing digest, media type, and size.
     */
    public function getDescriptor(): DistributionNameJsonGetResponse200Descriptor
    {
        return $this->descriptor;
    }

    /**
     * A descriptor struct containing digest, media type, and size.
     */
    public function setDescriptor(DistributionNameJsonGetResponse200Descriptor $descriptor): self
    {
        $this->initialized['descriptor'] = true;
        $this->descriptor = $descriptor;
        return $this;
    }

    /**
     * An array containing all platforms supported by the image.
     *
     * @return list<DistributionNameJsonGetResponse200PlatformsItem>
     */
    public function getPlatforms(): array
    {
        return $this->platforms;
    }

    /**
     * An array containing all platforms supported by the image.
     *
     * @param list<DistributionNameJsonGetResponse200PlatformsItem> $platforms
     */
    public function setPlatforms(array $platforms): self
    {
        $this->initialized['platforms'] = true;
        $this->platforms = $platforms;
        return $this;
    }
}
