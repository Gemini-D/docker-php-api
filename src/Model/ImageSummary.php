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

class ImageSummary
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $parentId;

    /**
     * @var list<string>
     */
    protected $repoTags;

    /**
     * @var list<string>
     */
    protected $repoDigests;

    /**
     * @var int
     */
    protected $created;

    /**
     * @var int
     */
    protected $size;

    /**
     * @var int
     */
    protected $sharedSize;

    /**
     * @var int
     */
    protected $virtualSize;

    /**
     * @var array<string, string>
     */
    protected $labels;

    /**
     * @var int
     */
    protected $containers;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }

    public function getParentId(): string
    {
        return $this->parentId;
    }

    public function setParentId(string $parentId): self
    {
        $this->initialized['parentId'] = true;
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @return list<string>
     */
    public function getRepoTags(): array
    {
        return $this->repoTags;
    }

    /**
     * @param list<string> $repoTags
     */
    public function setRepoTags(array $repoTags): self
    {
        $this->initialized['repoTags'] = true;
        $this->repoTags = $repoTags;
        return $this;
    }

    /**
     * @return list<string>
     */
    public function getRepoDigests(): array
    {
        return $this->repoDigests;
    }

    /**
     * @param list<string> $repoDigests
     */
    public function setRepoDigests(array $repoDigests): self
    {
        $this->initialized['repoDigests'] = true;
        $this->repoDigests = $repoDigests;
        return $this;
    }

    public function getCreated(): int
    {
        return $this->created;
    }

    public function setCreated(int $created): self
    {
        $this->initialized['created'] = true;
        $this->created = $created;
        return $this;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;
        return $this;
    }

    public function getSharedSize(): int
    {
        return $this->sharedSize;
    }

    public function setSharedSize(int $sharedSize): self
    {
        $this->initialized['sharedSize'] = true;
        $this->sharedSize = $sharedSize;
        return $this;
    }

    public function getVirtualSize(): int
    {
        return $this->virtualSize;
    }

    public function setVirtualSize(int $virtualSize): self
    {
        $this->initialized['virtualSize'] = true;
        $this->virtualSize = $virtualSize;
        return $this;
    }

    /**
     * @return array<string, string>
     */
    public function getLabels(): iterable
    {
        return $this->labels;
    }

    /**
     * @param array<string, string> $labels
     */
    public function setLabels(iterable $labels): self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;
        return $this;
    }

    public function getContainers(): int
    {
        return $this->containers;
    }

    public function setContainers(int $containers): self
    {
        $this->initialized['containers'] = true;
        $this->containers = $containers;
        return $this;
    }
}
