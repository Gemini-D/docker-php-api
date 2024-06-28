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

class ImageRootFS
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $type;

    /**
     * @var list<string>
     */
    protected $layers;

    /**
     * @var string
     */
    protected $baseLayer;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;
        return $this;
    }

    /**
     * @return list<string>
     */
    public function getLayers(): array
    {
        return $this->layers;
    }

    /**
     * @param list<string> $layers
     */
    public function setLayers(array $layers): self
    {
        $this->initialized['layers'] = true;
        $this->layers = $layers;
        return $this;
    }

    public function getBaseLayer(): string
    {
        return $this->baseLayer;
    }

    public function setBaseLayer(string $baseLayer): self
    {
        $this->initialized['baseLayer'] = true;
        $this->baseLayer = $baseLayer;
        return $this;
    }
}
