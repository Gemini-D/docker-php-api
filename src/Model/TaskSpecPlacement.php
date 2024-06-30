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

class TaskSpecPlacement
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * An array of constraints.
     *
     * @var list<string>
     */
    protected $constraints;

    /**
     * Preferences provide a way to make the scheduler aware of factors such as topology. They are provided in order from highest to lowest precedence.
     *
     * @var list<TaskSpecPlacementPreferencesItem>
     */
    protected $preferences;

    /**
     * Platforms stores all the platforms that the service's image can
     * run on. This field is used in the platform filter for scheduling.
     * If empty, then the platform filter is off, meaning there are no
     * scheduling restrictions.
     *
     * @var list<Platform>
     */
    protected $platforms;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * An array of constraints.
     *
     * @return list<string>
     */
    public function getConstraints(): array
    {
        return $this->constraints;
    }

    /**
     * An array of constraints.
     *
     * @param list<string> $constraints
     */
    public function setConstraints(array $constraints): self
    {
        $this->initialized['constraints'] = true;
        $this->constraints = $constraints;
        return $this;
    }

    /**
     * Preferences provide a way to make the scheduler aware of factors such as topology. They are provided in order from highest to lowest precedence.
     *
     * @return list<TaskSpecPlacementPreferencesItem>
     */
    public function getPreferences(): array
    {
        return $this->preferences;
    }

    /**
     * Preferences provide a way to make the scheduler aware of factors such as topology. They are provided in order from highest to lowest precedence.
     *
     * @param list<TaskSpecPlacementPreferencesItem> $preferences
     */
    public function setPreferences(array $preferences): self
    {
        $this->initialized['preferences'] = true;
        $this->preferences = $preferences;
        return $this;
    }

    /**
     * Platforms stores all the platforms that the service's image can
     * run on. This field is used in the platform filter for scheduling.
     * If empty, then the platform filter is off, meaning there are no
     * scheduling restrictions.
     *
     * @return list<Platform>
     */
    public function getPlatforms(): array
    {
        return $this->platforms;
    }

    /**
     * Platforms stores all the platforms that the service's image can
     * run on. This field is used in the platform filter for scheduling.
     * If empty, then the platform filter is off, meaning there are no
     * scheduling restrictions.
     *
     * @param list<Platform> $platforms
     */
    public function setPlatforms(array $platforms): self
    {
        $this->initialized['platforms'] = true;
        $this->platforms = $platforms;
        return $this;
    }
}
