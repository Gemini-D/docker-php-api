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

class ServiceSpecMode
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var ServiceSpecModeReplicated
     */
    protected $replicated;

    /**
     * @var mixed
     */
    protected $global;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getReplicated(): ServiceSpecModeReplicated
    {
        return $this->replicated;
    }

    public function setReplicated(ServiceSpecModeReplicated $replicated): self
    {
        $this->initialized['replicated'] = true;
        $this->replicated = $replicated;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGlobal()
    {
        return $this->global;
    }

    /**
     * @param mixed $global
     */
    public function setGlobal($global): self
    {
        $this->initialized['global'] = true;
        $this->global = $global;
        return $this;
    }
}
