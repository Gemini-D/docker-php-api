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

class TaskSpec
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Invalid when specified with `ContainerSpec`. *(Experimental release only.)*.
     *
     * @var TaskSpecPluginSpec
     */
    protected $pluginSpec;

    /**
     * Invalid when specified with `PluginSpec`.
     *
     * @var TaskSpecContainerSpec
     */
    protected $containerSpec;

    /**
     * Resource requirements which apply to each individual container created as part of the service.
     *
     * @var TaskSpecResources
     */
    protected $resources;

    /**
     * Specification for the restart policy which applies to containers created as part of this service.
     *
     * @var TaskSpecRestartPolicy
     */
    protected $restartPolicy;

    /**
     * @var TaskSpecPlacement
     */
    protected $placement;

    /**
     * A counter that triggers an update even if no relevant parameters have been changed.
     *
     * @var int
     */
    protected $forceUpdate;

    /**
     * Runtime is the type of runtime specified for the task executor.
     *
     * @var string
     */
    protected $runtime;

    /**
     * @var list<TaskSpecNetworksItem>
     */
    protected $networks;

    /**
     * Specifies the log driver to use for tasks created from this spec. If not present, the default one for the swarm will be used, finally falling back to the engine default if not specified.
     *
     * @var TaskSpecLogDriver
     */
    protected $logDriver;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Invalid when specified with `ContainerSpec`. *(Experimental release only.)*.
     */
    public function getPluginSpec(): TaskSpecPluginSpec
    {
        return $this->pluginSpec;
    }

    /**
     * Invalid when specified with `ContainerSpec`. *(Experimental release only.)*.
     */
    public function setPluginSpec(TaskSpecPluginSpec $pluginSpec): self
    {
        $this->initialized['pluginSpec'] = true;
        $this->pluginSpec = $pluginSpec;
        return $this;
    }

    /**
     * Invalid when specified with `PluginSpec`.
     */
    public function getContainerSpec(): TaskSpecContainerSpec
    {
        return $this->containerSpec;
    }

    /**
     * Invalid when specified with `PluginSpec`.
     */
    public function setContainerSpec(TaskSpecContainerSpec $containerSpec): self
    {
        $this->initialized['containerSpec'] = true;
        $this->containerSpec = $containerSpec;
        return $this;
    }

    /**
     * Resource requirements which apply to each individual container created as part of the service.
     */
    public function getResources(): TaskSpecResources
    {
        return $this->resources;
    }

    /**
     * Resource requirements which apply to each individual container created as part of the service.
     */
    public function setResources(TaskSpecResources $resources): self
    {
        $this->initialized['resources'] = true;
        $this->resources = $resources;
        return $this;
    }

    /**
     * Specification for the restart policy which applies to containers created as part of this service.
     */
    public function getRestartPolicy(): TaskSpecRestartPolicy
    {
        return $this->restartPolicy;
    }

    /**
     * Specification for the restart policy which applies to containers created as part of this service.
     */
    public function setRestartPolicy(TaskSpecRestartPolicy $restartPolicy): self
    {
        $this->initialized['restartPolicy'] = true;
        $this->restartPolicy = $restartPolicy;
        return $this;
    }

    public function getPlacement(): TaskSpecPlacement
    {
        return $this->placement;
    }

    public function setPlacement(TaskSpecPlacement $placement): self
    {
        $this->initialized['placement'] = true;
        $this->placement = $placement;
        return $this;
    }

    /**
     * A counter that triggers an update even if no relevant parameters have been changed.
     */
    public function getForceUpdate(): int
    {
        return $this->forceUpdate;
    }

    /**
     * A counter that triggers an update even if no relevant parameters have been changed.
     */
    public function setForceUpdate(int $forceUpdate): self
    {
        $this->initialized['forceUpdate'] = true;
        $this->forceUpdate = $forceUpdate;
        return $this;
    }

    /**
     * Runtime is the type of runtime specified for the task executor.
     */
    public function getRuntime(): string
    {
        return $this->runtime;
    }

    /**
     * Runtime is the type of runtime specified for the task executor.
     */
    public function setRuntime(string $runtime): self
    {
        $this->initialized['runtime'] = true;
        $this->runtime = $runtime;
        return $this;
    }

    /**
     * @return list<TaskSpecNetworksItem>
     */
    public function getNetworks(): array
    {
        return $this->networks;
    }

    /**
     * @param list<TaskSpecNetworksItem> $networks
     */
    public function setNetworks(array $networks): self
    {
        $this->initialized['networks'] = true;
        $this->networks = $networks;
        return $this;
    }

    /**
     * Specifies the log driver to use for tasks created from this spec. If not present, the default one for the swarm will be used, finally falling back to the engine default if not specified.
     */
    public function getLogDriver(): TaskSpecLogDriver
    {
        return $this->logDriver;
    }

    /**
     * Specifies the log driver to use for tasks created from this spec. If not present, the default one for the swarm will be used, finally falling back to the engine default if not specified.
     */
    public function setLogDriver(TaskSpecLogDriver $logDriver): self
    {
        $this->initialized['logDriver'] = true;
        $this->logDriver = $logDriver;
        return $this;
    }
}
