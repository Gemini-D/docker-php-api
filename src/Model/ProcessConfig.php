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

class ProcessConfig
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var bool
     */
    protected $privileged;

    /**
     * @var string
     */
    protected $user;

    /**
     * @var bool
     */
    protected $tty;

    /**
     * @var string
     */
    protected $entrypoint;

    /**
     * @var list<string>
     */
    protected $arguments;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getPrivileged(): bool
    {
        return $this->privileged;
    }

    public function setPrivileged(bool $privileged): self
    {
        $this->initialized['privileged'] = true;
        $this->privileged = $privileged;
        return $this;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->initialized['user'] = true;
        $this->user = $user;
        return $this;
    }

    public function getTty(): bool
    {
        return $this->tty;
    }

    public function setTty(bool $tty): self
    {
        $this->initialized['tty'] = true;
        $this->tty = $tty;
        return $this;
    }

    public function getEntrypoint(): string
    {
        return $this->entrypoint;
    }

    public function setEntrypoint(string $entrypoint): self
    {
        $this->initialized['entrypoint'] = true;
        $this->entrypoint = $entrypoint;
        return $this;
    }

    /**
     * @return list<string>
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * @param list<string> $arguments
     */
    public function setArguments(array $arguments): self
    {
        $this->initialized['arguments'] = true;
        $this->arguments = $arguments;
        return $this;
    }
}
