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

class TaskSpecPlacementPreferencesItemSpread
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * label descriptor, such as engine.labels.az.
     *
     * @var string
     */
    protected $spreadDescriptor;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * label descriptor, such as engine.labels.az.
     */
    public function getSpreadDescriptor(): string
    {
        return $this->spreadDescriptor;
    }

    /**
     * label descriptor, such as engine.labels.az.
     */
    public function setSpreadDescriptor(string $spreadDescriptor): self
    {
        $this->initialized['spreadDescriptor'] = true;
        $this->spreadDescriptor = $spreadDescriptor;
        return $this;
    }
}
