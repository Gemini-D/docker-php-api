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

class DistributionNameJsonGetResponse200Descriptor
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $mediaType;

    /**
     * @var int
     */
    protected $size;

    /**
     * @var string
     */
    protected $digest;

    /**
     * @var list<string>
     */
    protected $uRLs;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getMediaType(): string
    {
        return $this->mediaType;
    }

    public function setMediaType(string $mediaType): self
    {
        $this->initialized['mediaType'] = true;
        $this->mediaType = $mediaType;
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

    public function getDigest(): string
    {
        return $this->digest;
    }

    public function setDigest(string $digest): self
    {
        $this->initialized['digest'] = true;
        $this->digest = $digest;
        return $this;
    }

    /**
     * @return list<string>
     */
    public function getURLs(): array
    {
        return $this->uRLs;
    }

    /**
     * @param list<string> $uRLs
     */
    public function setURLs(array $uRLs): self
    {
        $this->initialized['uRLs'] = true;
        $this->uRLs = $uRLs;
        return $this;
    }
}
