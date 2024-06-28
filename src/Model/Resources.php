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

class Resources
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * An integer value representing this container's relative CPU weight versus other containers.
     *
     * @var int
     */
    protected $cpuShares;

    /**
     * Memory limit in bytes.
     *
     * @var int
     */
    protected $memory = 0;

    /**
     * Path to `cgroups` under which the container's `cgroup` is created. If the path is not absolute, the path is considered to be relative to the `cgroups` path of the init process. Cgroups are created if they do not already exist.
     *
     * @var string
     */
    protected $cgroupParent;

    /**
     * Block IO weight (relative weight).
     *
     * @var int
     */
    protected $blkioWeight;

    /**
     * Block IO weight (relative device weight) in the form `[{"Path": "device_path", "Weight": weight}]`.
     *
     * @var list<ResourcesBlkioWeightDeviceItem>
     */
    protected $blkioWeightDevice;

    /**
     * Limit read rate (bytes per second) from a device, in the form `[{"Path": "device_path", "Rate": rate}]`.
     *
     * @var list<ThrottleDevice>
     */
    protected $blkioDeviceReadBps;

    /**
     * Limit write rate (bytes per second) to a device, in the form `[{"Path": "device_path", "Rate": rate}]`.
     *
     * @var list<ThrottleDevice>
     */
    protected $blkioDeviceWriteBps;

    /**
     * Limit read rate (IO per second) from a device, in the form `[{"Path": "device_path", "Rate": rate}]`.
     *
     * @var list<ThrottleDevice>
     */
    protected $blkioDeviceReadIOps;

    /**
     * Limit write rate (IO per second) to a device, in the form `[{"Path": "device_path", "Rate": rate}]`.
     *
     * @var list<ThrottleDevice>
     */
    protected $blkioDeviceWriteIOps;

    /**
     * The length of a CPU period in microseconds.
     *
     * @var int
     */
    protected $cpuPeriod;

    /**
     * Microseconds of CPU time that the container can get in a CPU period.
     *
     * @var int
     */
    protected $cpuQuota;

    /**
     * The length of a CPU real-time period in microseconds. Set to 0 to allocate no time allocated to real-time tasks.
     *
     * @var int
     */
    protected $cpuRealtimePeriod;

    /**
     * The length of a CPU real-time runtime in microseconds. Set to 0 to allocate no time allocated to real-time tasks.
     *
     * @var int
     */
    protected $cpuRealtimeRuntime;

    /**
     * CPUs in which to allow execution (e.g., `0-3`, `0,1`).
     *
     * @var string
     */
    protected $cpusetCpus;

    /**
     * Memory nodes (MEMs) in which to allow execution (0-3, 0,1). Only effective on NUMA systems.
     *
     * @var string
     */
    protected $cpusetMems;

    /**
     * A list of devices to add to the container.
     *
     * @var list<DeviceMapping>
     */
    protected $devices;

    /**
     * a list of cgroup rules to apply to the container.
     *
     * @var list<string>
     */
    protected $deviceCgroupRules;

    /**
     * Disk limit (in bytes).
     *
     * @var int
     */
    protected $diskQuota;

    /**
     * Kernel memory limit in bytes.
     *
     * @var int
     */
    protected $kernelMemory;

    /**
     * Memory soft limit in bytes.
     *
     * @var int
     */
    protected $memoryReservation;

    /**
     * Total memory limit (memory + swap). Set as `-1` to enable unlimited swap.
     *
     * @var int
     */
    protected $memorySwap;

    /**
     * Tune a container's memory swappiness behavior. Accepts an integer between 0 and 100.
     *
     * @var int
     */
    protected $memorySwappiness;

    /**
     * CPU quota in units of 10<sup>-9</sup> CPUs.
     *
     * @var int
     */
    protected $nanoCPUs;

    /**
     * Disable OOM Killer for the container.
     *
     * @var bool
     */
    protected $oomKillDisable;

    /**
     * Tune a container's pids limit. Set -1 for unlimited.
     *
     * @var int
     */
    protected $pidsLimit;

    /**
     * A list of resource limits to set in the container. For example: `{"Name": "nofile", "Soft": 1024, "Hard": 2048}`".
     *
     * @var list<ResourcesUlimitsItem>
     */
    protected $ulimits;

    /**
     * The number of usable CPUs (Windows only).
     *
     * On Windows Server containers, the processor resource controls are mutually exclusive. The order of precedence is `CPUCount` first, then `CPUShares`, and `CPUPercent` last.
     *
     * @var int
     */
    protected $cpuCount;

    /**
     * The usable percentage of the available CPUs (Windows only).
     *
     * On Windows Server containers, the processor resource controls are mutually exclusive. The order of precedence is `CPUCount` first, then `CPUShares`, and `CPUPercent` last.
     *
     * @var int
     */
    protected $cpuPercent;

    /**
     * Maximum IOps for the container system drive (Windows only).
     *
     * @var int
     */
    protected $iOMaximumIOps;

    /**
     * Maximum IO in bytes per second for the container system drive (Windows only).
     *
     * @var int
     */
    protected $iOMaximumBandwidth;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * An integer value representing this container's relative CPU weight versus other containers.
     */
    public function getCpuShares(): int
    {
        return $this->cpuShares;
    }

    /**
     * An integer value representing this container's relative CPU weight versus other containers.
     */
    public function setCpuShares(int $cpuShares): self
    {
        $this->initialized['cpuShares'] = true;
        $this->cpuShares = $cpuShares;
        return $this;
    }

    /**
     * Memory limit in bytes.
     */
    public function getMemory(): int
    {
        return $this->memory;
    }

    /**
     * Memory limit in bytes.
     */
    public function setMemory(int $memory): self
    {
        $this->initialized['memory'] = true;
        $this->memory = $memory;
        return $this;
    }

    /**
     * Path to `cgroups` under which the container's `cgroup` is created. If the path is not absolute, the path is considered to be relative to the `cgroups` path of the init process. Cgroups are created if they do not already exist.
     */
    public function getCgroupParent(): string
    {
        return $this->cgroupParent;
    }

    /**
     * Path to `cgroups` under which the container's `cgroup` is created. If the path is not absolute, the path is considered to be relative to the `cgroups` path of the init process. Cgroups are created if they do not already exist.
     */
    public function setCgroupParent(string $cgroupParent): self
    {
        $this->initialized['cgroupParent'] = true;
        $this->cgroupParent = $cgroupParent;
        return $this;
    }

    /**
     * Block IO weight (relative weight).
     */
    public function getBlkioWeight(): int
    {
        return $this->blkioWeight;
    }

    /**
     * Block IO weight (relative weight).
     */
    public function setBlkioWeight(int $blkioWeight): self
    {
        $this->initialized['blkioWeight'] = true;
        $this->blkioWeight = $blkioWeight;
        return $this;
    }

    /**
     * Block IO weight (relative device weight) in the form `[{"Path": "device_path", "Weight": weight}]`.
     *
     * @return list<ResourcesBlkioWeightDeviceItem>
     */
    public function getBlkioWeightDevice(): array
    {
        return $this->blkioWeightDevice;
    }

    /**
     * Block IO weight (relative device weight) in the form `[{"Path": "device_path", "Weight": weight}]`.
     *
     * @param list<ResourcesBlkioWeightDeviceItem> $blkioWeightDevice
     */
    public function setBlkioWeightDevice(array $blkioWeightDevice): self
    {
        $this->initialized['blkioWeightDevice'] = true;
        $this->blkioWeightDevice = $blkioWeightDevice;
        return $this;
    }

    /**
     * Limit read rate (bytes per second) from a device, in the form `[{"Path": "device_path", "Rate": rate}]`.
     *
     * @return list<ThrottleDevice>
     */
    public function getBlkioDeviceReadBps(): array
    {
        return $this->blkioDeviceReadBps;
    }

    /**
     * Limit read rate (bytes per second) from a device, in the form `[{"Path": "device_path", "Rate": rate}]`.
     *
     * @param list<ThrottleDevice> $blkioDeviceReadBps
     */
    public function setBlkioDeviceReadBps(array $blkioDeviceReadBps): self
    {
        $this->initialized['blkioDeviceReadBps'] = true;
        $this->blkioDeviceReadBps = $blkioDeviceReadBps;
        return $this;
    }

    /**
     * Limit write rate (bytes per second) to a device, in the form `[{"Path": "device_path", "Rate": rate}]`.
     *
     * @return list<ThrottleDevice>
     */
    public function getBlkioDeviceWriteBps(): array
    {
        return $this->blkioDeviceWriteBps;
    }

    /**
     * Limit write rate (bytes per second) to a device, in the form `[{"Path": "device_path", "Rate": rate}]`.
     *
     * @param list<ThrottleDevice> $blkioDeviceWriteBps
     */
    public function setBlkioDeviceWriteBps(array $blkioDeviceWriteBps): self
    {
        $this->initialized['blkioDeviceWriteBps'] = true;
        $this->blkioDeviceWriteBps = $blkioDeviceWriteBps;
        return $this;
    }

    /**
     * Limit read rate (IO per second) from a device, in the form `[{"Path": "device_path", "Rate": rate}]`.
     *
     * @return list<ThrottleDevice>
     */
    public function getBlkioDeviceReadIOps(): array
    {
        return $this->blkioDeviceReadIOps;
    }

    /**
     * Limit read rate (IO per second) from a device, in the form `[{"Path": "device_path", "Rate": rate}]`.
     *
     * @param list<ThrottleDevice> $blkioDeviceReadIOps
     */
    public function setBlkioDeviceReadIOps(array $blkioDeviceReadIOps): self
    {
        $this->initialized['blkioDeviceReadIOps'] = true;
        $this->blkioDeviceReadIOps = $blkioDeviceReadIOps;
        return $this;
    }

    /**
     * Limit write rate (IO per second) to a device, in the form `[{"Path": "device_path", "Rate": rate}]`.
     *
     * @return list<ThrottleDevice>
     */
    public function getBlkioDeviceWriteIOps(): array
    {
        return $this->blkioDeviceWriteIOps;
    }

    /**
     * Limit write rate (IO per second) to a device, in the form `[{"Path": "device_path", "Rate": rate}]`.
     *
     * @param list<ThrottleDevice> $blkioDeviceWriteIOps
     */
    public function setBlkioDeviceWriteIOps(array $blkioDeviceWriteIOps): self
    {
        $this->initialized['blkioDeviceWriteIOps'] = true;
        $this->blkioDeviceWriteIOps = $blkioDeviceWriteIOps;
        return $this;
    }

    /**
     * The length of a CPU period in microseconds.
     */
    public function getCpuPeriod(): int
    {
        return $this->cpuPeriod;
    }

    /**
     * The length of a CPU period in microseconds.
     */
    public function setCpuPeriod(int $cpuPeriod): self
    {
        $this->initialized['cpuPeriod'] = true;
        $this->cpuPeriod = $cpuPeriod;
        return $this;
    }

    /**
     * Microseconds of CPU time that the container can get in a CPU period.
     */
    public function getCpuQuota(): int
    {
        return $this->cpuQuota;
    }

    /**
     * Microseconds of CPU time that the container can get in a CPU period.
     */
    public function setCpuQuota(int $cpuQuota): self
    {
        $this->initialized['cpuQuota'] = true;
        $this->cpuQuota = $cpuQuota;
        return $this;
    }

    /**
     * The length of a CPU real-time period in microseconds. Set to 0 to allocate no time allocated to real-time tasks.
     */
    public function getCpuRealtimePeriod(): int
    {
        return $this->cpuRealtimePeriod;
    }

    /**
     * The length of a CPU real-time period in microseconds. Set to 0 to allocate no time allocated to real-time tasks.
     */
    public function setCpuRealtimePeriod(int $cpuRealtimePeriod): self
    {
        $this->initialized['cpuRealtimePeriod'] = true;
        $this->cpuRealtimePeriod = $cpuRealtimePeriod;
        return $this;
    }

    /**
     * The length of a CPU real-time runtime in microseconds. Set to 0 to allocate no time allocated to real-time tasks.
     */
    public function getCpuRealtimeRuntime(): int
    {
        return $this->cpuRealtimeRuntime;
    }

    /**
     * The length of a CPU real-time runtime in microseconds. Set to 0 to allocate no time allocated to real-time tasks.
     */
    public function setCpuRealtimeRuntime(int $cpuRealtimeRuntime): self
    {
        $this->initialized['cpuRealtimeRuntime'] = true;
        $this->cpuRealtimeRuntime = $cpuRealtimeRuntime;
        return $this;
    }

    /**
     * CPUs in which to allow execution (e.g., `0-3`, `0,1`).
     */
    public function getCpusetCpus(): string
    {
        return $this->cpusetCpus;
    }

    /**
     * CPUs in which to allow execution (e.g., `0-3`, `0,1`).
     */
    public function setCpusetCpus(string $cpusetCpus): self
    {
        $this->initialized['cpusetCpus'] = true;
        $this->cpusetCpus = $cpusetCpus;
        return $this;
    }

    /**
     * Memory nodes (MEMs) in which to allow execution (0-3, 0,1). Only effective on NUMA systems.
     */
    public function getCpusetMems(): string
    {
        return $this->cpusetMems;
    }

    /**
     * Memory nodes (MEMs) in which to allow execution (0-3, 0,1). Only effective on NUMA systems.
     */
    public function setCpusetMems(string $cpusetMems): self
    {
        $this->initialized['cpusetMems'] = true;
        $this->cpusetMems = $cpusetMems;
        return $this;
    }

    /**
     * A list of devices to add to the container.
     *
     * @return list<DeviceMapping>
     */
    public function getDevices(): array
    {
        return $this->devices;
    }

    /**
     * A list of devices to add to the container.
     *
     * @param list<DeviceMapping> $devices
     */
    public function setDevices(array $devices): self
    {
        $this->initialized['devices'] = true;
        $this->devices = $devices;
        return $this;
    }

    /**
     * a list of cgroup rules to apply to the container.
     *
     * @return list<string>
     */
    public function getDeviceCgroupRules(): array
    {
        return $this->deviceCgroupRules;
    }

    /**
     * a list of cgroup rules to apply to the container.
     *
     * @param list<string> $deviceCgroupRules
     */
    public function setDeviceCgroupRules(array $deviceCgroupRules): self
    {
        $this->initialized['deviceCgroupRules'] = true;
        $this->deviceCgroupRules = $deviceCgroupRules;
        return $this;
    }

    /**
     * Disk limit (in bytes).
     */
    public function getDiskQuota(): int
    {
        return $this->diskQuota;
    }

    /**
     * Disk limit (in bytes).
     */
    public function setDiskQuota(int $diskQuota): self
    {
        $this->initialized['diskQuota'] = true;
        $this->diskQuota = $diskQuota;
        return $this;
    }

    /**
     * Kernel memory limit in bytes.
     */
    public function getKernelMemory(): int
    {
        return $this->kernelMemory;
    }

    /**
     * Kernel memory limit in bytes.
     */
    public function setKernelMemory(int $kernelMemory): self
    {
        $this->initialized['kernelMemory'] = true;
        $this->kernelMemory = $kernelMemory;
        return $this;
    }

    /**
     * Memory soft limit in bytes.
     */
    public function getMemoryReservation(): int
    {
        return $this->memoryReservation;
    }

    /**
     * Memory soft limit in bytes.
     */
    public function setMemoryReservation(int $memoryReservation): self
    {
        $this->initialized['memoryReservation'] = true;
        $this->memoryReservation = $memoryReservation;
        return $this;
    }

    /**
     * Total memory limit (memory + swap). Set as `-1` to enable unlimited swap.
     */
    public function getMemorySwap(): int
    {
        return $this->memorySwap;
    }

    /**
     * Total memory limit (memory + swap). Set as `-1` to enable unlimited swap.
     */
    public function setMemorySwap(int $memorySwap): self
    {
        $this->initialized['memorySwap'] = true;
        $this->memorySwap = $memorySwap;
        return $this;
    }

    /**
     * Tune a container's memory swappiness behavior. Accepts an integer between 0 and 100.
     */
    public function getMemorySwappiness(): int
    {
        return $this->memorySwappiness;
    }

    /**
     * Tune a container's memory swappiness behavior. Accepts an integer between 0 and 100.
     */
    public function setMemorySwappiness(int $memorySwappiness): self
    {
        $this->initialized['memorySwappiness'] = true;
        $this->memorySwappiness = $memorySwappiness;
        return $this;
    }

    /**
     * CPU quota in units of 10<sup>-9</sup> CPUs.
     */
    public function getNanoCPUs(): int
    {
        return $this->nanoCPUs;
    }

    /**
     * CPU quota in units of 10<sup>-9</sup> CPUs.
     */
    public function setNanoCPUs(int $nanoCPUs): self
    {
        $this->initialized['nanoCPUs'] = true;
        $this->nanoCPUs = $nanoCPUs;
        return $this;
    }

    /**
     * Disable OOM Killer for the container.
     */
    public function getOomKillDisable(): bool
    {
        return $this->oomKillDisable;
    }

    /**
     * Disable OOM Killer for the container.
     */
    public function setOomKillDisable(bool $oomKillDisable): self
    {
        $this->initialized['oomKillDisable'] = true;
        $this->oomKillDisable = $oomKillDisable;
        return $this;
    }

    /**
     * Tune a container's pids limit. Set -1 for unlimited.
     */
    public function getPidsLimit(): int
    {
        return $this->pidsLimit;
    }

    /**
     * Tune a container's pids limit. Set -1 for unlimited.
     */
    public function setPidsLimit(int $pidsLimit): self
    {
        $this->initialized['pidsLimit'] = true;
        $this->pidsLimit = $pidsLimit;
        return $this;
    }

    /**
     * A list of resource limits to set in the container. For example: `{"Name": "nofile", "Soft": 1024, "Hard": 2048}`".
     *
     * @return list<ResourcesUlimitsItem>
     */
    public function getUlimits(): array
    {
        return $this->ulimits;
    }

    /**
     * A list of resource limits to set in the container. For example: `{"Name": "nofile", "Soft": 1024, "Hard": 2048}`".
     *
     * @param list<ResourcesUlimitsItem> $ulimits
     */
    public function setUlimits(array $ulimits): self
    {
        $this->initialized['ulimits'] = true;
        $this->ulimits = $ulimits;
        return $this;
    }

    /**
     * The number of usable CPUs (Windows only).
     *
     * On Windows Server containers, the processor resource controls are mutually exclusive. The order of precedence is `CPUCount` first, then `CPUShares`, and `CPUPercent` last.
     */
    public function getCpuCount(): int
    {
        return $this->cpuCount;
    }

    /**
     * The number of usable CPUs (Windows only).
     *
     * On Windows Server containers, the processor resource controls are mutually exclusive. The order of precedence is `CPUCount` first, then `CPUShares`, and `CPUPercent` last.
     */
    public function setCpuCount(int $cpuCount): self
    {
        $this->initialized['cpuCount'] = true;
        $this->cpuCount = $cpuCount;
        return $this;
    }

    /**
     * The usable percentage of the available CPUs (Windows only).
     *
     * On Windows Server containers, the processor resource controls are mutually exclusive. The order of precedence is `CPUCount` first, then `CPUShares`, and `CPUPercent` last.
     */
    public function getCpuPercent(): int
    {
        return $this->cpuPercent;
    }

    /**
     * The usable percentage of the available CPUs (Windows only).
     *
     * On Windows Server containers, the processor resource controls are mutually exclusive. The order of precedence is `CPUCount` first, then `CPUShares`, and `CPUPercent` last.
     */
    public function setCpuPercent(int $cpuPercent): self
    {
        $this->initialized['cpuPercent'] = true;
        $this->cpuPercent = $cpuPercent;
        return $this;
    }

    /**
     * Maximum IOps for the container system drive (Windows only).
     */
    public function getIOMaximumIOps(): int
    {
        return $this->iOMaximumIOps;
    }

    /**
     * Maximum IOps for the container system drive (Windows only).
     */
    public function setIOMaximumIOps(int $iOMaximumIOps): self
    {
        $this->initialized['iOMaximumIOps'] = true;
        $this->iOMaximumIOps = $iOMaximumIOps;
        return $this;
    }

    /**
     * Maximum IO in bytes per second for the container system drive (Windows only).
     */
    public function getIOMaximumBandwidth(): int
    {
        return $this->iOMaximumBandwidth;
    }

    /**
     * Maximum IO in bytes per second for the container system drive (Windows only).
     */
    public function setIOMaximumBandwidth(int $iOMaximumBandwidth): self
    {
        $this->initialized['iOMaximumBandwidth'] = true;
        $this->iOMaximumBandwidth = $iOMaximumBandwidth;
        return $this;
    }
}
