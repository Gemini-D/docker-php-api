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

class NetworksCreatePostResponse201
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The ID of the created network.
     *
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $warning;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the created network.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The ID of the created network.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }

    public function getWarning(): string
    {
        return $this->warning;
    }

    public function setWarning(string $warning): self
    {
        $this->initialized['warning'] = true;
        $this->warning = $warning;
        return $this;
    }
}
