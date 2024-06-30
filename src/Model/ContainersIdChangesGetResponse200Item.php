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

class ContainersIdChangesGetResponse200Item
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Path to file that has changed.
     *
     * @var string
     */
    protected $path;

    /**
     * Kind of change.
     *
     * @var int
     */
    protected $kind;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Path to file that has changed.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Path to file that has changed.
     */
    public function setPath(string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;
        return $this;
    }

    /**
     * Kind of change.
     */
    public function getKind(): int
    {
        return $this->kind;
    }

    /**
     * Kind of change.
     */
    public function setKind(int $kind): self
    {
        $this->initialized['kind'] = true;
        $this->kind = $kind;
        return $this;
    }
}
