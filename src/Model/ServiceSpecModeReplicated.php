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

class ServiceSpecModeReplicated
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var int
     */
    protected $replicas;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getReplicas(): int
    {
        return $this->replicas;
    }

    public function setReplicas(int $replicas): self
    {
        $this->initialized['replicas'] = true;
        $this->replicas = $replicas;
        return $this;
    }
}
