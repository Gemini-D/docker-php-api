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

class TaskSpecResources
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * An object describing the resources which can be advertised by a node and requested by a task.
     *
     * @var ResourceObject
     */
    protected $limits;

    /**
     * An object describing the resources which can be advertised by a node and requested by a task.
     *
     * @var ResourceObject
     */
    protected $reservation;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * An object describing the resources which can be advertised by a node and requested by a task.
     */
    public function getLimits(): ResourceObject
    {
        return $this->limits;
    }

    /**
     * An object describing the resources which can be advertised by a node and requested by a task.
     */
    public function setLimits(ResourceObject $limits): self
    {
        $this->initialized['limits'] = true;
        $this->limits = $limits;
        return $this;
    }

    /**
     * An object describing the resources which can be advertised by a node and requested by a task.
     */
    public function getReservation(): ResourceObject
    {
        return $this->reservation;
    }

    /**
     * An object describing the resources which can be advertised by a node and requested by a task.
     */
    public function setReservation(ResourceObject $reservation): self
    {
        $this->initialized['reservation'] = true;
        $this->reservation = $reservation;
        return $this;
    }
}
