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

class SwarmSpecOrchestration
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The number of historic tasks to keep per instance or node. If negative, never remove completed or failed tasks.
     *
     * @var int
     */
    protected $taskHistoryRetentionLimit;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The number of historic tasks to keep per instance or node. If negative, never remove completed or failed tasks.
     */
    public function getTaskHistoryRetentionLimit(): int
    {
        return $this->taskHistoryRetentionLimit;
    }

    /**
     * The number of historic tasks to keep per instance or node. If negative, never remove completed or failed tasks.
     */
    public function setTaskHistoryRetentionLimit(int $taskHistoryRetentionLimit): self
    {
        $this->initialized['taskHistoryRetentionLimit'] = true;
        $this->taskHistoryRetentionLimit = $taskHistoryRetentionLimit;
        return $this;
    }
}
