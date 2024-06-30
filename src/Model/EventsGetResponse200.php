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

class EventsGetResponse200
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The type of object emitting the event.
     *
     * @var string
     */
    protected $type;

    /**
     * The type of event.
     *
     * @var string
     */
    protected $action;

    /**
     * @var EventsGetResponse200Actor
     */
    protected $actor;

    /**
     * Timestamp of event.
     *
     * @var int
     */
    protected $time;

    /**
     * Timestamp of event, with nanosecond accuracy.
     *
     * @var int
     */
    protected $timeNano;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The type of object emitting the event.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * The type of object emitting the event.
     */
    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }

    /**
     * The type of event.
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * The type of event.
     */
    public function setAction(string $action): self
    {
        $this->initialized['action'] = true;
        $this->action = $action;
        return $this;
    }

    public function getActor(): EventsGetResponse200Actor
    {
        return $this->actor;
    }

    public function setActor(EventsGetResponse200Actor $actor): self
    {
        $this->initialized['actor'] = true;
        $this->actor = $actor;
        return $this;
    }

    /**
     * Timestamp of event.
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * Timestamp of event.
     */
    public function setTime(int $time): self
    {
        $this->initialized['time'] = true;
        $this->time = $time;
        return $this;
    }

    /**
     * Timestamp of event, with nanosecond accuracy.
     */
    public function getTimeNano(): int
    {
        return $this->timeNano;
    }

    /**
     * Timestamp of event, with nanosecond accuracy.
     */
    public function setTimeNano(int $timeNano): self
    {
        $this->initialized['timeNano'] = true;
        $this->timeNano = $timeNano;
        return $this;
    }
}
