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

class VolumesGetResponse200
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * List of volumes.
     *
     * @var list<Volume>
     */
    protected $volumes;

    /**
     * Warnings that occurred when fetching the list of volumes.
     *
     * @var list<string>
     */
    protected $warnings;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * List of volumes.
     *
     * @return list<Volume>
     */
    public function getVolumes(): array
    {
        return $this->volumes;
    }

    /**
     * List of volumes.
     *
     * @param list<Volume> $volumes
     */
    public function setVolumes(array $volumes): self
    {
        $this->initialized['volumes'] = true;
        $this->volumes = $volumes;
        return $this;
    }

    /**
     * Warnings that occurred when fetching the list of volumes.
     *
     * @return list<string>
     */
    public function getWarnings(): array
    {
        return $this->warnings;
    }

    /**
     * Warnings that occurred when fetching the list of volumes.
     *
     * @param list<string> $warnings
     */
    public function setWarnings(array $warnings): self
    {
        $this->initialized['warnings'] = true;
        $this->warnings = $warnings;
        return $this;
    }
}
