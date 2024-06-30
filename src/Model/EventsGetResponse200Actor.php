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

class EventsGetResponse200Actor
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The ID of the object emitting the event.
     *
     * @var string
     */
    protected $iD;

    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @var array<string, string>
     */
    protected $attributes;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the object emitting the event.
     */
    public function getID(): string
    {
        return $this->iD;
    }

    /**
     * The ID of the object emitting the event.
     */
    public function setID(string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;
        return $this;
    }

    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @return array<string, string>
     */
    public function getAttributes(): iterable
    {
        return $this->attributes;
    }

    /**
     * Various key/value attributes of the object, depending on its type.
     *
     * @param array<string, string> $attributes
     */
    public function setAttributes(iterable $attributes): self
    {
        $this->initialized['attributes'] = true;
        $this->attributes = $attributes;
        return $this;
    }
}
