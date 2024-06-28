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

class VersionGetResponse200
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var VersionGetResponse200Platform
     */
    protected $platform;

    /**
     * @var list<VersionGetResponse200ComponentsItem>
     */
    protected $components;

    /**
     * @var string
     */
    protected $version;

    /**
     * @var string
     */
    protected $apiVersion;

    /**
     * @var string
     */
    protected $minAPIVersion;

    /**
     * @var string
     */
    protected $gitCommit;

    /**
     * @var string
     */
    protected $goVersion;

    /**
     * @var string
     */
    protected $os;

    /**
     * @var string
     */
    protected $arch;

    /**
     * @var string
     */
    protected $kernelVersion;

    /**
     * @var bool
     */
    protected $experimental;

    /**
     * @var string
     */
    protected $buildTime;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getPlatform(): VersionGetResponse200Platform
    {
        return $this->platform;
    }

    public function setPlatform(VersionGetResponse200Platform $platform): self
    {
        $this->initialized['platform'] = true;
        $this->platform = $platform;
        return $this;
    }

    /**
     * @return list<VersionGetResponse200ComponentsItem>
     */
    public function getComponents(): array
    {
        return $this->components;
    }

    /**
     * @param list<VersionGetResponse200ComponentsItem> $components
     */
    public function setComponents(array $components): self
    {
        $this->initialized['components'] = true;
        $this->components = $components;
        return $this;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;
        return $this;
    }

    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    public function setApiVersion(string $apiVersion): self
    {
        $this->initialized['apiVersion'] = true;
        $this->apiVersion = $apiVersion;
        return $this;
    }

    public function getMinAPIVersion(): string
    {
        return $this->minAPIVersion;
    }

    public function setMinAPIVersion(string $minAPIVersion): self
    {
        $this->initialized['minAPIVersion'] = true;
        $this->minAPIVersion = $minAPIVersion;
        return $this;
    }

    public function getGitCommit(): string
    {
        return $this->gitCommit;
    }

    public function setGitCommit(string $gitCommit): self
    {
        $this->initialized['gitCommit'] = true;
        $this->gitCommit = $gitCommit;
        return $this;
    }

    public function getGoVersion(): string
    {
        return $this->goVersion;
    }

    public function setGoVersion(string $goVersion): self
    {
        $this->initialized['goVersion'] = true;
        $this->goVersion = $goVersion;
        return $this;
    }

    public function getOs(): string
    {
        return $this->os;
    }

    public function setOs(string $os): self
    {
        $this->initialized['os'] = true;
        $this->os = $os;
        return $this;
    }

    public function getArch(): string
    {
        return $this->arch;
    }

    public function setArch(string $arch): self
    {
        $this->initialized['arch'] = true;
        $this->arch = $arch;
        return $this;
    }

    public function getKernelVersion(): string
    {
        return $this->kernelVersion;
    }

    public function setKernelVersion(string $kernelVersion): self
    {
        $this->initialized['kernelVersion'] = true;
        $this->kernelVersion = $kernelVersion;
        return $this;
    }

    public function getExperimental(): bool
    {
        return $this->experimental;
    }

    public function setExperimental(bool $experimental): self
    {
        $this->initialized['experimental'] = true;
        $this->experimental = $experimental;
        return $this;
    }

    public function getBuildTime(): string
    {
        return $this->buildTime;
    }

    public function setBuildTime(string $buildTime): self
    {
        $this->initialized['buildTime'] = true;
        $this->buildTime = $buildTime;
        return $this;
    }
}
