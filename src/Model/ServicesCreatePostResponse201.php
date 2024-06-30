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

class ServicesCreatePostResponse201
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The ID of the created service.
     *
     * @var string
     */
    protected $iD;

    /**
     * Optional warning message.
     *
     * @var string
     */
    protected $warning;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the created service.
     */
    public function getID(): string
    {
        return $this->iD;
    }

    /**
     * The ID of the created service.
     */
    public function setID(string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;
        return $this;
    }

    /**
     * Optional warning message.
     */
    public function getWarning(): string
    {
        return $this->warning;
    }

    /**
     * Optional warning message.
     */
    public function setWarning(string $warning): self
    {
        $this->initialized['warning'] = true;
        $this->warning = $warning;
        return $this;
    }
}
