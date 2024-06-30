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

class PluginConfigUser
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var int
     */
    protected $uID;

    /**
     * @var int
     */
    protected $gID;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getUID(): int
    {
        return $this->uID;
    }

    public function setUID(int $uID): self
    {
        $this->initialized['uID'] = true;
        $this->uID = $uID;
        return $this;
    }

    public function getGID(): int
    {
        return $this->gID;
    }

    public function setGID(int $gID): self
    {
        $this->initialized['gID'] = true;
        $this->gID = $gID;
        return $this;
    }
}
