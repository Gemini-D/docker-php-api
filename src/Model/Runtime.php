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

class Runtime
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Name and, optional, path, of the OCI executable binary.
     *
     * If the path is omitted, the daemon searches the host's `$PATH` for the
     * binary and uses the first result.
     *
     * @var string
     */
    protected $path;

    /**
     * List of command-line arguments to pass to the runtime when invoked.
     *
     * @var null|list<string>
     */
    protected $runtimeArgs;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Name and, optional, path, of the OCI executable binary.
     *
     * If the path is omitted, the daemon searches the host's `$PATH` for the
     * binary and uses the first result.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Name and, optional, path, of the OCI executable binary.
     *
     * If the path is omitted, the daemon searches the host's `$PATH` for the
     * binary and uses the first result.
     */
    public function setPath(string $path): self
    {
        $this->initialized['path'] = true;
        $this->path = $path;
        return $this;
    }

    /**
     * List of command-line arguments to pass to the runtime when invoked.
     *
     * @return null|list<string>
     */
    public function getRuntimeArgs(): ?array
    {
        return $this->runtimeArgs;
    }

    /**
     * List of command-line arguments to pass to the runtime when invoked.
     *
     * @param null|list<string> $runtimeArgs
     */
    public function setRuntimeArgs(?array $runtimeArgs): self
    {
        $this->initialized['runtimeArgs'] = true;
        $this->runtimeArgs = $runtimeArgs;
        return $this;
    }
}
