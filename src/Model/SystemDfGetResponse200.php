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

class SystemDfGetResponse200
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var int
     */
    protected $layersSize;

    /**
     * @var list<ImageSummary>
     */
    protected $images;

    /**
     * @var list<list<ContainerSummaryItem>>
     */
    protected $containers;

    /**
     * @var list<Volume>
     */
    protected $volumes;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getLayersSize(): int
    {
        return $this->layersSize;
    }

    public function setLayersSize(int $layersSize): self
    {
        $this->initialized['layersSize'] = true;
        $this->layersSize = $layersSize;
        return $this;
    }

    /**
     * @return list<ImageSummary>
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param list<ImageSummary> $images
     */
    public function setImages(array $images): self
    {
        $this->initialized['images'] = true;
        $this->images = $images;
        return $this;
    }

    /**
     * @return list<list<ContainerSummaryItem>>
     */
    public function getContainers(): array
    {
        return $this->containers;
    }

    /**
     * @param list<list<ContainerSummaryItem>> $containers
     */
    public function setContainers(array $containers): self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;
        return $this;
    }

    /**
     * @return list<Volume>
     */
    public function getVolumes(): array
    {
        return $this->volumes;
    }

    /**
     * @param list<Volume> $volumes
     */
    public function setVolumes(array $volumes): self
    {
        $this->initialized['volumes'] = true;
        $this->volumes = $volumes;
        return $this;
    }
}
