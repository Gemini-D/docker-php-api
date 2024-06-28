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

class IndexInfo
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Name of the registry, such as "docker.io".
     *
     * @var string
     */
    protected $name;

    /**
     * List of mirrors, expressed as URIs.
     *
     * @var list<string>
     */
    protected $mirrors;

    /**
     * Indicates if the the registry is part of the list of insecure
     * registries.
     *
     * If `false`, the registry is insecure. Insecure registries accept
     * un-encrypted (HTTP) and/or untrusted (HTTPS with certificates from
     * unknown CAs) communication.
     *
     * > **Warning**: Insecure registries can be useful when running a local
     * > registry. However, because its use creates security vulnerabilities
     * > it should ONLY be enabled for testing purposes. For increased
     * > security, users should add their CA to their system's list of
     * > trusted CAs instead of enabling this option.
     *
     * @var bool
     */
    protected $secure;

    /**
     * Indicates whether this is an official registry (i.e., Docker Hub / docker.io).
     *
     * @var bool
     */
    protected $official;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Name of the registry, such as "docker.io".
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the registry, such as "docker.io".
     */
    public function setName(string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }

    /**
     * List of mirrors, expressed as URIs.
     *
     * @return list<string>
     */
    public function getMirrors(): array
    {
        return $this->mirrors;
    }

    /**
     * List of mirrors, expressed as URIs.
     *
     * @param list<string> $mirrors
     */
    public function setMirrors(array $mirrors): self
    {
        $this->initialized['mirrors'] = true;
        $this->mirrors = $mirrors;
        return $this;
    }

    /**
     * Indicates if the the registry is part of the list of insecure
     * registries.
     *
     * If `false`, the registry is insecure. Insecure registries accept
     * un-encrypted (HTTP) and/or untrusted (HTTPS with certificates from
     * unknown CAs) communication.
     *
     * > **Warning**: Insecure registries can be useful when running a local
     * > registry. However, because its use creates security vulnerabilities
     * > it should ONLY be enabled for testing purposes. For increased
     * > security, users should add their CA to their system's list of
     * > trusted CAs instead of enabling this option.
     */
    public function getSecure(): bool
    {
        return $this->secure;
    }

    /**
     * Indicates if the the registry is part of the list of insecure
     * registries.
     *
     * If `false`, the registry is insecure. Insecure registries accept
     * un-encrypted (HTTP) and/or untrusted (HTTPS with certificates from
     * unknown CAs) communication.
     *
     * > **Warning**: Insecure registries can be useful when running a local
     * > registry. However, because its use creates security vulnerabilities
     * > it should ONLY be enabled for testing purposes. For increased
     * > security, users should add their CA to their system's list of
     * > trusted CAs instead of enabling this option.
     */
    public function setSecure(bool $secure): self
    {
        $this->initialized['secure'] = true;
        $this->secure = $secure;
        return $this;
    }

    /**
     * Indicates whether this is an official registry (i.e., Docker Hub / docker.io).
     */
    public function getOfficial(): bool
    {
        return $this->official;
    }

    /**
     * Indicates whether this is an official registry (i.e., Docker Hub / docker.io).
     */
    public function setOfficial(bool $official): self
    {
        $this->initialized['official'] = true;
        $this->official = $official;
        return $this;
    }
}
