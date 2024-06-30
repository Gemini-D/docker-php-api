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

class IdResponse
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The id of the newly created object.
     *
     * @var string
     */
    protected $id;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The id of the newly created object.
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * The id of the newly created object.
     */
    public function setId(string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;
        return $this;
    }
}
