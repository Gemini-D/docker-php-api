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

class ImagesSearchGetResponse200Item
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $description;

    /**
     * @var bool
     */
    protected $isOfficial;

    /**
     * @var bool
     */
    protected $isAutomated;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $starCount;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;
        return $this;
    }

    public function getIsOfficial(): bool
    {
        return $this->isOfficial;
    }

    public function setIsOfficial(bool $isOfficial): self
    {
        $this->initialized['isOfficial'] = true;
        $this->isOfficial = $isOfficial;
        return $this;
    }

    public function getIsAutomated(): bool
    {
        return $this->isAutomated;
    }

    public function setIsAutomated(bool $isAutomated): self
    {
        $this->initialized['isAutomated'] = true;
        $this->isAutomated = $isAutomated;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }

    public function getStarCount(): int
    {
        return $this->starCount;
    }

    public function setStarCount(int $starCount): self
    {
        $this->initialized['starCount'] = true;
        $this->starCount = $starCount;
        return $this;
    }
}
