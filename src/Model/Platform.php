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

class Platform
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Architecture represents the hardware architecture (for example,
     * `x86_64`).
     *
     * @var string
     */
    protected $architecture;

    /**
     * OS represents the Operating System (for example, `linux` or `windows`).
     *
     * @var string
     */
    protected $oS;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Architecture represents the hardware architecture (for example,
     * `x86_64`).
     */
    public function getArchitecture(): string
    {
        return $this->architecture;
    }

    /**
     * Architecture represents the hardware architecture (for example,
     * `x86_64`).
     */
    public function setArchitecture(string $architecture): self
    {
        $this->initialized['architecture'] = true;
        $this->architecture = $architecture;
        return $this;
    }

    /**
     * OS represents the Operating System (for example, `linux` or `windows`).
     */
    public function getOS(): string
    {
        return $this->oS;
    }

    /**
     * OS represents the Operating System (for example, `linux` or `windows`).
     */
    public function setOS(string $oS): self
    {
        $this->initialized['oS'] = true;
        $this->oS = $oS;
        return $this;
    }
}
