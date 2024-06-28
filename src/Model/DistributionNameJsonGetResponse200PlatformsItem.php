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

class DistributionNameJsonGetResponse200PlatformsItem
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $architecture;

    /**
     * @var string
     */
    protected $oS;

    /**
     * @var string
     */
    protected $oSVersion;

    /**
     * @var list<string>
     */
    protected $oSFeatures;

    /**
     * @var string
     */
    protected $variant;

    /**
     * @var list<string>
     */
    protected $features;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getArchitecture(): string
    {
        return $this->architecture;
    }

    public function setArchitecture(string $architecture): self
    {
        $this->initialized['architecture'] = true;
        $this->architecture = $architecture;
        return $this;
    }

    public function getOS(): string
    {
        return $this->oS;
    }

    public function setOS(string $oS): self
    {
        $this->initialized['oS'] = true;
        $this->oS = $oS;
        return $this;
    }

    public function getOSVersion(): string
    {
        return $this->oSVersion;
    }

    public function setOSVersion(string $oSVersion): self
    {
        $this->initialized['oSVersion'] = true;
        $this->oSVersion = $oSVersion;
        return $this;
    }

    /**
     * @return list<string>
     */
    public function getOSFeatures(): array
    {
        return $this->oSFeatures;
    }

    /**
     * @param list<string> $oSFeatures
     */
    public function setOSFeatures(array $oSFeatures): self
    {
        $this->initialized['oSFeatures'] = true;
        $this->oSFeatures = $oSFeatures;
        return $this;
    }

    public function getVariant(): string
    {
        return $this->variant;
    }

    public function setVariant(string $variant): self
    {
        $this->initialized['variant'] = true;
        $this->variant = $variant;
        return $this;
    }

    /**
     * @return list<string>
     */
    public function getFeatures(): array
    {
        return $this->features;
    }

    /**
     * @param list<string> $features
     */
    public function setFeatures(array $features): self
    {
        $this->initialized['features'] = true;
        $this->features = $features;
        return $this;
    }
}
