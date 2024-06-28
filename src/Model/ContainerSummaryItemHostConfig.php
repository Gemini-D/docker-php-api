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

class ContainerSummaryItemHostConfig
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * @var string
     */
    protected $networkMode;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    public function getNetworkMode(): string
    {
        return $this->networkMode;
    }

    public function setNetworkMode(string $networkMode): self
    {
        $this->initialized['networkMode'] = true;
        $this->networkMode = $networkMode;
        return $this;
    }
}
