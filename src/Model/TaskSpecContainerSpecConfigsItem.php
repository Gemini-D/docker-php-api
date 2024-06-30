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

class TaskSpecContainerSpecConfigsItem
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * File represents a specific target that is backed by a file.
     *
     * @var TaskSpecContainerSpecConfigsItemFile
     */
    protected $file;

    /**
     * ConfigID represents the ID of the specific config that we're referencing.
     *
     * @var string
     */
    protected $configID;

    /**
     * ConfigName is the name of the config that this references, but this is just provided for
     * lookup/display purposes. The config in the reference will be identified by its ID.
     *
     * @var string
     */
    protected $configName;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * File represents a specific target that is backed by a file.
     */
    public function getFile(): TaskSpecContainerSpecConfigsItemFile
    {
        return $this->file;
    }

    /**
     * File represents a specific target that is backed by a file.
     */
    public function setFile(TaskSpecContainerSpecConfigsItemFile $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;
        return $this;
    }

    /**
     * ConfigID represents the ID of the specific config that we're referencing.
     */
    public function getConfigID(): string
    {
        return $this->configID;
    }

    /**
     * ConfigID represents the ID of the specific config that we're referencing.
     */
    public function setConfigID(string $configID): self
    {
        $this->initialized['configID'] = true;
        $this->configID = $configID;
        return $this;
    }

    /**
     * ConfigName is the name of the config that this references, but this is just provided for
     * lookup/display purposes. The config in the reference will be identified by its ID.
     */
    public function getConfigName(): string
    {
        return $this->configName;
    }

    /**
     * ConfigName is the name of the config that this references, but this is just provided for
     * lookup/display purposes. The config in the reference will be identified by its ID.
     */
    public function setConfigName(string $configName): self
    {
        $this->initialized['configName'] = true;
        $this->configName = $configName;
        return $this;
    }
}
