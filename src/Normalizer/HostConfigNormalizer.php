<?php
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Docker\API\Normalizer;

use ArrayObject;
use Docker\API\Model\HostConfig;
use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

use function array_key_exists;
use function is_array;

if (! class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class HostConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\HostConfig';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\HostConfig';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new HostConfig();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('CpuShares', $data)) {
                $object->setCpuShares($data['CpuShares']);
            }
            if (array_key_exists('Memory', $data)) {
                $object->setMemory($data['Memory']);
            }
            if (array_key_exists('CgroupParent', $data)) {
                $object->setCgroupParent($data['CgroupParent']);
            }
            if (array_key_exists('BlkioWeight', $data)) {
                $object->setBlkioWeight($data['BlkioWeight']);
            }
            if (array_key_exists('BlkioWeightDevice', $data)) {
                $values = [];
                foreach ($data['BlkioWeightDevice'] ?? [] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\ResourcesBlkioWeightDeviceItem', 'json', $context);
                }
                $object->setBlkioWeightDevice($values);
            }
            if (array_key_exists('BlkioDeviceReadBps', $data)) {
                $values_1 = [];
                foreach ($data['BlkioDeviceReadBps'] ?? [] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\API\Model\ThrottleDevice', 'json', $context);
                }
                $object->setBlkioDeviceReadBps($values_1);
            }
            if (array_key_exists('BlkioDeviceWriteBps', $data)) {
                $values_2 = [];
                foreach ($data['BlkioDeviceWriteBps'] ?? [] as $value_2) {
                    $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\API\Model\ThrottleDevice', 'json', $context);
                }
                $object->setBlkioDeviceWriteBps($values_2);
            }
            if (array_key_exists('BlkioDeviceReadIOps', $data)) {
                $values_3 = [];
                foreach ($data['BlkioDeviceReadIOps'] ?? [] as $value_3) {
                    $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\API\Model\ThrottleDevice', 'json', $context);
                }
                $object->setBlkioDeviceReadIOps($values_3);
            }
            if (array_key_exists('BlkioDeviceWriteIOps', $data)) {
                $values_4 = [];
                foreach ($data['BlkioDeviceWriteIOps'] ?? [] as $value_4) {
                    $values_4[] = $this->denormalizer->denormalize($value_4, 'Docker\API\Model\ThrottleDevice', 'json', $context);
                }
                $object->setBlkioDeviceWriteIOps($values_4);
            }
            if (array_key_exists('CpuPeriod', $data)) {
                $object->setCpuPeriod($data['CpuPeriod']);
            }
            if (array_key_exists('CpuQuota', $data)) {
                $object->setCpuQuota($data['CpuQuota']);
            }
            if (array_key_exists('CpuRealtimePeriod', $data)) {
                $object->setCpuRealtimePeriod($data['CpuRealtimePeriod']);
            }
            if (array_key_exists('CpuRealtimeRuntime', $data)) {
                $object->setCpuRealtimeRuntime($data['CpuRealtimeRuntime']);
            }
            if (array_key_exists('CpusetCpus', $data)) {
                $object->setCpusetCpus($data['CpusetCpus']);
            }
            if (array_key_exists('CpusetMems', $data)) {
                $object->setCpusetMems($data['CpusetMems']);
            }
            if (array_key_exists('Devices', $data)) {
                $values_5 = [];
                foreach ($data['Devices'] ?? [] as $value_5) {
                    $values_5[] = $this->denormalizer->denormalize($value_5, 'Docker\API\Model\DeviceMapping', 'json', $context);
                }
                $object->setDevices($values_5);
            }
            if (array_key_exists('DeviceCgroupRules', $data)) {
                $values_6 = [];
                foreach ($data['DeviceCgroupRules'] ?? [] as $value_6) {
                    $values_6[] = $value_6;
                }
                $object->setDeviceCgroupRules($values_6);
            }
            if (array_key_exists('DiskQuota', $data)) {
                $object->setDiskQuota($data['DiskQuota']);
            }
            if (array_key_exists('KernelMemory', $data)) {
                $object->setKernelMemory($data['KernelMemory']);
            }
            if (array_key_exists('MemoryReservation', $data)) {
                $object->setMemoryReservation($data['MemoryReservation']);
            }
            if (array_key_exists('MemorySwap', $data)) {
                $object->setMemorySwap($data['MemorySwap']);
            }
            if (array_key_exists('MemorySwappiness', $data)) {
                $object->setMemorySwappiness($data['MemorySwappiness']);
            }
            if (array_key_exists('NanoCPUs', $data)) {
                $object->setNanoCPUs($data['NanoCPUs']);
            }
            if (array_key_exists('OomKillDisable', $data)) {
                $object->setOomKillDisable($data['OomKillDisable']);
            }
            if (array_key_exists('PidsLimit', $data)) {
                $object->setPidsLimit($data['PidsLimit']);
            }
            if (array_key_exists('Ulimits', $data)) {
                $values_7 = [];
                foreach ($data['Ulimits'] ?? [] as $value_7) {
                    $values_7[] = $this->denormalizer->denormalize($value_7, 'Docker\API\Model\ResourcesUlimitsItem', 'json', $context);
                }
                $object->setUlimits($values_7);
            }
            if (array_key_exists('CpuCount', $data)) {
                $object->setCpuCount($data['CpuCount']);
            }
            if (array_key_exists('CpuPercent', $data)) {
                $object->setCpuPercent($data['CpuPercent']);
            }
            if (array_key_exists('IOMaximumIOps', $data)) {
                $object->setIOMaximumIOps($data['IOMaximumIOps']);
            }
            if (array_key_exists('IOMaximumBandwidth', $data)) {
                $object->setIOMaximumBandwidth($data['IOMaximumBandwidth']);
            }
            if (array_key_exists('Binds', $data)) {
                $values_8 = [];
                foreach ($data['Binds'] ?? [] as $value_8) {
                    $values_8[] = $value_8;
                }
                $object->setBinds($values_8);
            }
            if (array_key_exists('ContainerIDFile', $data)) {
                $object->setContainerIDFile($data['ContainerIDFile']);
            }
            if (array_key_exists('LogConfig', $data)) {
                $object->setLogConfig($this->denormalizer->denormalize($data['LogConfig'], 'Docker\API\Model\HostConfigLogConfig', 'json', $context));
            }
            if (array_key_exists('NetworkMode', $data)) {
                $object->setNetworkMode($data['NetworkMode']);
            }
            if (array_key_exists('PortBindings', $data)) {
                $values_9 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['PortBindings'] ?? [] as $key => $value_9) {
                    if ($value_9 === null) {
                        $values_9[$key] = null;
                        continue;
                    }
                    $values_10 = [];
                    foreach ($value_9 ?? [] as $value_10) {
                        $values_10[] = $this->denormalizer->denormalize($value_10, 'Docker\API\Model\PortBinding', 'json', $context);
                    }
                    $values_9[$key] = $values_10;
                }
                $object->setPortBindings($values_9);
            }
            if (array_key_exists('RestartPolicy', $data)) {
                $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], 'Docker\API\Model\RestartPolicy', 'json', $context));
            }
            if (array_key_exists('AutoRemove', $data)) {
                $object->setAutoRemove($data['AutoRemove']);
            }
            if (array_key_exists('VolumeDriver', $data)) {
                $object->setVolumeDriver($data['VolumeDriver']);
            }
            if (array_key_exists('VolumesFrom', $data)) {
                $values_11 = [];
                foreach ($data['VolumesFrom'] ?? [] as $value_11) {
                    $values_11[] = $value_11;
                }
                $object->setVolumesFrom($values_11);
            }
            if (array_key_exists('Mounts', $data)) {
                $values_12 = [];
                foreach ($data['Mounts'] ?? [] as $value_12) {
                    $values_12[] = $this->denormalizer->denormalize($value_12, 'Docker\API\Model\Mount', 'json', $context);
                }
                $object->setMounts($values_12);
            }
            if (array_key_exists('CapAdd', $data)) {
                $values_13 = [];
                foreach ($data['CapAdd'] ?? [] as $value_13) {
                    $values_13[] = $value_13;
                }
                $object->setCapAdd($values_13);
            }
            if (array_key_exists('CapDrop', $data)) {
                $values_14 = [];
                foreach ($data['CapDrop'] ?? [] as $value_14) {
                    $values_14[] = $value_14;
                }
                $object->setCapDrop($values_14);
            }
            if (array_key_exists('Dns', $data)) {
                $values_15 = [];
                foreach ($data['Dns'] ?? [] as $value_15) {
                    $values_15[] = $value_15;
                }
                $object->setDns($values_15);
            }
            if (array_key_exists('DnsOptions', $data)) {
                $values_16 = [];
                foreach ($data['DnsOptions'] ?? [] as $value_16) {
                    $values_16[] = $value_16;
                }
                $object->setDnsOptions($values_16);
            }
            if (array_key_exists('DnsSearch', $data)) {
                $values_17 = [];
                foreach ($data['DnsSearch'] ?? [] as $value_17) {
                    $values_17[] = $value_17;
                }
                $object->setDnsSearch($values_17);
            }
            if (array_key_exists('ExtraHosts', $data)) {
                $values_18 = [];
                foreach ($data['ExtraHosts'] ?? [] as $value_18) {
                    $values_18[] = $value_18;
                }
                $object->setExtraHosts($values_18);
            }
            if (array_key_exists('GroupAdd', $data)) {
                $values_19 = [];
                foreach ($data['GroupAdd'] ?? [] as $value_19) {
                    $values_19[] = $value_19;
                }
                $object->setGroupAdd($values_19);
            }
            if (array_key_exists('IpcMode', $data)) {
                $object->setIpcMode($data['IpcMode']);
            }
            if (array_key_exists('Cgroup', $data)) {
                $object->setCgroup($data['Cgroup']);
            }
            if (array_key_exists('Links', $data)) {
                $values_20 = [];
                foreach ($data['Links'] ?? [] as $value_20) {
                    $values_20[] = $value_20;
                }
                $object->setLinks($values_20);
            }
            if (array_key_exists('OomScoreAdj', $data)) {
                $object->setOomScoreAdj($data['OomScoreAdj']);
            }
            if (array_key_exists('PidMode', $data)) {
                $object->setPidMode($data['PidMode']);
            }
            if (array_key_exists('Privileged', $data)) {
                $object->setPrivileged($data['Privileged']);
            }
            if (array_key_exists('PublishAllPorts', $data)) {
                $object->setPublishAllPorts($data['PublishAllPorts']);
            }
            if (array_key_exists('ReadonlyRootfs', $data)) {
                $object->setReadonlyRootfs($data['ReadonlyRootfs']);
            }
            if (array_key_exists('SecurityOpt', $data)) {
                $values_21 = [];
                foreach ($data['SecurityOpt'] ?? [] as $value_21) {
                    $values_21[] = $value_21;
                }
                $object->setSecurityOpt($values_21);
            }
            if (array_key_exists('StorageOpt', $data)) {
                $values_22 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['StorageOpt'] ?? [] as $key_1 => $value_22) {
                    if ($value_22 === null) {
                        $values_22[$key_1] = null;
                        continue;
                    }
                    $values_22[$key_1] = $value_22;
                }
                $object->setStorageOpt($values_22);
            }
            if (array_key_exists('Tmpfs', $data)) {
                $values_23 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Tmpfs'] ?? [] as $key_2 => $value_23) {
                    if ($value_23 === null) {
                        $values_23[$key_2] = null;
                        continue;
                    }
                    $values_23[$key_2] = $value_23;
                }
                $object->setTmpfs($values_23);
            }
            if (array_key_exists('UTSMode', $data)) {
                $object->setUTSMode($data['UTSMode']);
            }
            if (array_key_exists('UsernsMode', $data)) {
                $object->setUsernsMode($data['UsernsMode']);
            }
            if (array_key_exists('ShmSize', $data)) {
                $object->setShmSize($data['ShmSize']);
            }
            if (array_key_exists('Sysctls', $data)) {
                $values_24 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Sysctls'] ?? [] as $key_3 => $value_24) {
                    if ($value_24 === null) {
                        $values_24[$key_3] = null;
                        continue;
                    }
                    $values_24[$key_3] = $value_24;
                }
                $object->setSysctls($values_24);
            }
            if (array_key_exists('Runtime', $data)) {
                $object->setRuntime($data['Runtime']);
            }
            if (array_key_exists('ConsoleSize', $data)) {
                $values_25 = [];
                foreach ($data['ConsoleSize'] ?? [] as $value_25) {
                    $values_25[] = $value_25;
                }
                $object->setConsoleSize($values_25);
            }
            if (array_key_exists('Isolation', $data)) {
                $object->setIsolation($data['Isolation']);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('cpuShares') && $object->getCpuShares() !== null) {
                $data['CpuShares'] = $object->getCpuShares();
            }
            if ($object->isInitialized('memory') && $object->getMemory() !== null) {
                $data['Memory'] = $object->getMemory();
            }
            if ($object->isInitialized('cgroupParent') && $object->getCgroupParent() !== null) {
                $data['CgroupParent'] = $object->getCgroupParent();
            }
            if ($object->isInitialized('blkioWeight') && $object->getBlkioWeight() !== null) {
                $data['BlkioWeight'] = $object->getBlkioWeight();
            }
            if ($object->isInitialized('blkioWeightDevice') && $object->getBlkioWeightDevice() !== null) {
                $values = [];
                foreach ($object->getBlkioWeightDevice() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['BlkioWeightDevice'] = $values;
            }
            if ($object->isInitialized('blkioDeviceReadBps') && $object->getBlkioDeviceReadBps() !== null) {
                $values_1 = [];
                foreach ($object->getBlkioDeviceReadBps() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['BlkioDeviceReadBps'] = $values_1;
            }
            if ($object->isInitialized('blkioDeviceWriteBps') && $object->getBlkioDeviceWriteBps() !== null) {
                $values_2 = [];
                foreach ($object->getBlkioDeviceWriteBps() as $value_2) {
                    $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
                }
                $data['BlkioDeviceWriteBps'] = $values_2;
            }
            if ($object->isInitialized('blkioDeviceReadIOps') && $object->getBlkioDeviceReadIOps() !== null) {
                $values_3 = [];
                foreach ($object->getBlkioDeviceReadIOps() as $value_3) {
                    $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
                }
                $data['BlkioDeviceReadIOps'] = $values_3;
            }
            if ($object->isInitialized('blkioDeviceWriteIOps') && $object->getBlkioDeviceWriteIOps() !== null) {
                $values_4 = [];
                foreach ($object->getBlkioDeviceWriteIOps() as $value_4) {
                    $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
                }
                $data['BlkioDeviceWriteIOps'] = $values_4;
            }
            if ($object->isInitialized('cpuPeriod') && $object->getCpuPeriod() !== null) {
                $data['CpuPeriod'] = $object->getCpuPeriod();
            }
            if ($object->isInitialized('cpuQuota') && $object->getCpuQuota() !== null) {
                $data['CpuQuota'] = $object->getCpuQuota();
            }
            if ($object->isInitialized('cpuRealtimePeriod') && $object->getCpuRealtimePeriod() !== null) {
                $data['CpuRealtimePeriod'] = $object->getCpuRealtimePeriod();
            }
            if ($object->isInitialized('cpuRealtimeRuntime') && $object->getCpuRealtimeRuntime() !== null) {
                $data['CpuRealtimeRuntime'] = $object->getCpuRealtimeRuntime();
            }
            if ($object->isInitialized('cpusetCpus') && $object->getCpusetCpus() !== null) {
                $data['CpusetCpus'] = $object->getCpusetCpus();
            }
            if ($object->isInitialized('cpusetMems') && $object->getCpusetMems() !== null) {
                $data['CpusetMems'] = $object->getCpusetMems();
            }
            if ($object->isInitialized('devices') && $object->getDevices() !== null) {
                $values_5 = [];
                foreach ($object->getDevices() as $value_5) {
                    $values_5[] = $this->normalizer->normalize($value_5, 'json', $context);
                }
                $data['Devices'] = $values_5;
            }
            if ($object->isInitialized('deviceCgroupRules') && $object->getDeviceCgroupRules() !== null) {
                $values_6 = [];
                foreach ($object->getDeviceCgroupRules() as $value_6) {
                    $values_6[] = $value_6;
                }
                $data['DeviceCgroupRules'] = $values_6;
            }
            if ($object->isInitialized('diskQuota') && $object->getDiskQuota() !== null) {
                $data['DiskQuota'] = $object->getDiskQuota();
            }
            if ($object->isInitialized('kernelMemory') && $object->getKernelMemory() !== null) {
                $data['KernelMemory'] = $object->getKernelMemory();
            }
            if ($object->isInitialized('memoryReservation') && $object->getMemoryReservation() !== null) {
                $data['MemoryReservation'] = $object->getMemoryReservation();
            }
            if ($object->isInitialized('memorySwap') && $object->getMemorySwap() !== null) {
                $data['MemorySwap'] = $object->getMemorySwap();
            }
            if ($object->isInitialized('memorySwappiness') && $object->getMemorySwappiness() !== null) {
                $data['MemorySwappiness'] = $object->getMemorySwappiness();
            }
            if ($object->isInitialized('nanoCPUs') && $object->getNanoCPUs() !== null) {
                $data['NanoCPUs'] = $object->getNanoCPUs();
            }
            if ($object->isInitialized('oomKillDisable') && $object->getOomKillDisable() !== null) {
                $data['OomKillDisable'] = $object->getOomKillDisable();
            }
            if ($object->isInitialized('pidsLimit') && $object->getPidsLimit() !== null) {
                $data['PidsLimit'] = $object->getPidsLimit();
            }
            if ($object->isInitialized('ulimits') && $object->getUlimits() !== null) {
                $values_7 = [];
                foreach ($object->getUlimits() as $value_7) {
                    $values_7[] = $this->normalizer->normalize($value_7, 'json', $context);
                }
                $data['Ulimits'] = $values_7;
            }
            if ($object->isInitialized('cpuCount') && $object->getCpuCount() !== null) {
                $data['CpuCount'] = $object->getCpuCount();
            }
            if ($object->isInitialized('cpuPercent') && $object->getCpuPercent() !== null) {
                $data['CpuPercent'] = $object->getCpuPercent();
            }
            if ($object->isInitialized('iOMaximumIOps') && $object->getIOMaximumIOps() !== null) {
                $data['IOMaximumIOps'] = $object->getIOMaximumIOps();
            }
            if ($object->isInitialized('iOMaximumBandwidth') && $object->getIOMaximumBandwidth() !== null) {
                $data['IOMaximumBandwidth'] = $object->getIOMaximumBandwidth();
            }
            if ($object->isInitialized('binds') && $object->getBinds() !== null) {
                $values_8 = [];
                foreach ($object->getBinds() as $value_8) {
                    $values_8[] = $value_8;
                }
                $data['Binds'] = $values_8;
            }
            if ($object->isInitialized('containerIDFile') && $object->getContainerIDFile() !== null) {
                $data['ContainerIDFile'] = $object->getContainerIDFile();
            }
            if ($object->isInitialized('logConfig') && $object->getLogConfig() !== null) {
                $data['LogConfig'] = $this->normalizer->normalize($object->getLogConfig(), 'json', $context);
            }
            if ($object->isInitialized('networkMode') && $object->getNetworkMode() !== null) {
                $data['NetworkMode'] = $object->getNetworkMode();
            }
            if ($object->isInitialized('portBindings') && $object->getPortBindings() !== null) {
                $values_9 = [];
                foreach ($object->getPortBindings() as $key => $value_9) {
                    $values_10 = [];
                    foreach ($value_9 as $value_10) {
                        $values_10[] = $this->normalizer->normalize($value_10, 'json', $context);
                    }
                    $values_9[$key] = $values_10;
                }
                $data['PortBindings'] = $values_9;
            }
            if ($object->isInitialized('restartPolicy') && $object->getRestartPolicy() !== null) {
                $data['RestartPolicy'] = $this->normalizer->normalize($object->getRestartPolicy(), 'json', $context);
            }
            if ($object->isInitialized('autoRemove') && $object->getAutoRemove() !== null) {
                $data['AutoRemove'] = $object->getAutoRemove();
            }
            if ($object->isInitialized('volumeDriver') && $object->getVolumeDriver() !== null) {
                $data['VolumeDriver'] = $object->getVolumeDriver();
            }
            if ($object->isInitialized('volumesFrom') && $object->getVolumesFrom() !== null) {
                $values_11 = [];
                foreach ($object->getVolumesFrom() as $value_11) {
                    $values_11[] = $value_11;
                }
                $data['VolumesFrom'] = $values_11;
            }
            if ($object->isInitialized('mounts') && $object->getMounts() !== null) {
                $values_12 = [];
                foreach ($object->getMounts() as $value_12) {
                    $values_12[] = $this->normalizer->normalize($value_12, 'json', $context);
                }
                $data['Mounts'] = $values_12;
            }
            if ($object->isInitialized('capAdd') && $object->getCapAdd() !== null) {
                $values_13 = [];
                foreach ($object->getCapAdd() as $value_13) {
                    $values_13[] = $value_13;
                }
                $data['CapAdd'] = $values_13;
            }
            if ($object->isInitialized('capDrop') && $object->getCapDrop() !== null) {
                $values_14 = [];
                foreach ($object->getCapDrop() as $value_14) {
                    $values_14[] = $value_14;
                }
                $data['CapDrop'] = $values_14;
            }
            if ($object->isInitialized('dns') && $object->getDns() !== null) {
                $values_15 = [];
                foreach ($object->getDns() as $value_15) {
                    $values_15[] = $value_15;
                }
                $data['Dns'] = $values_15;
            }
            if ($object->isInitialized('dnsOptions') && $object->getDnsOptions() !== null) {
                $values_16 = [];
                foreach ($object->getDnsOptions() as $value_16) {
                    $values_16[] = $value_16;
                }
                $data['DnsOptions'] = $values_16;
            }
            if ($object->isInitialized('dnsSearch') && $object->getDnsSearch() !== null) {
                $values_17 = [];
                foreach ($object->getDnsSearch() as $value_17) {
                    $values_17[] = $value_17;
                }
                $data['DnsSearch'] = $values_17;
            }
            if ($object->isInitialized('extraHosts') && $object->getExtraHosts() !== null) {
                $values_18 = [];
                foreach ($object->getExtraHosts() as $value_18) {
                    $values_18[] = $value_18;
                }
                $data['ExtraHosts'] = $values_18;
            }
            if ($object->isInitialized('groupAdd') && $object->getGroupAdd() !== null) {
                $values_19 = [];
                foreach ($object->getGroupAdd() as $value_19) {
                    $values_19[] = $value_19;
                }
                $data['GroupAdd'] = $values_19;
            }
            if ($object->isInitialized('ipcMode') && $object->getIpcMode() !== null) {
                $data['IpcMode'] = $object->getIpcMode();
            }
            if ($object->isInitialized('cgroup') && $object->getCgroup() !== null) {
                $data['Cgroup'] = $object->getCgroup();
            }
            if ($object->isInitialized('links') && $object->getLinks() !== null) {
                $values_20 = [];
                foreach ($object->getLinks() as $value_20) {
                    $values_20[] = $value_20;
                }
                $data['Links'] = $values_20;
            }
            if ($object->isInitialized('oomScoreAdj') && $object->getOomScoreAdj() !== null) {
                $data['OomScoreAdj'] = $object->getOomScoreAdj();
            }
            if ($object->isInitialized('pidMode') && $object->getPidMode() !== null) {
                $data['PidMode'] = $object->getPidMode();
            }
            if ($object->isInitialized('privileged') && $object->getPrivileged() !== null) {
                $data['Privileged'] = $object->getPrivileged();
            }
            if ($object->isInitialized('publishAllPorts') && $object->getPublishAllPorts() !== null) {
                $data['PublishAllPorts'] = $object->getPublishAllPorts();
            }
            if ($object->isInitialized('readonlyRootfs') && $object->getReadonlyRootfs() !== null) {
                $data['ReadonlyRootfs'] = $object->getReadonlyRootfs();
            }
            if ($object->isInitialized('securityOpt') && $object->getSecurityOpt() !== null) {
                $values_21 = [];
                foreach ($object->getSecurityOpt() as $value_21) {
                    $values_21[] = $value_21;
                }
                $data['SecurityOpt'] = $values_21;
            }
            if ($object->isInitialized('storageOpt') && $object->getStorageOpt() !== null) {
                $values_22 = [];
                foreach ($object->getStorageOpt() as $key_1 => $value_22) {
                    $values_22[$key_1] = $value_22;
                }
                $data['StorageOpt'] = $values_22;
            }
            if ($object->isInitialized('tmpfs') && $object->getTmpfs() !== null) {
                $values_23 = [];
                foreach ($object->getTmpfs() as $key_2 => $value_23) {
                    $values_23[$key_2] = $value_23;
                }
                $data['Tmpfs'] = $values_23;
            }
            if ($object->isInitialized('uTSMode') && $object->getUTSMode() !== null) {
                $data['UTSMode'] = $object->getUTSMode();
            }
            if ($object->isInitialized('usernsMode') && $object->getUsernsMode() !== null) {
                $data['UsernsMode'] = $object->getUsernsMode();
            }
            if ($object->isInitialized('shmSize') && $object->getShmSize() !== null) {
                $data['ShmSize'] = $object->getShmSize();
            }
            if ($object->isInitialized('sysctls') && $object->getSysctls() !== null) {
                $values_24 = [];
                foreach ($object->getSysctls() as $key_3 => $value_24) {
                    $values_24[$key_3] = $value_24;
                }
                $data['Sysctls'] = $values_24;
            }
            if ($object->isInitialized('runtime') && $object->getRuntime() !== null) {
                $data['Runtime'] = $object->getRuntime();
            }
            if ($object->isInitialized('consoleSize') && $object->getConsoleSize() !== null) {
                $values_25 = [];
                foreach ($object->getConsoleSize() as $value_25) {
                    $values_25[] = $value_25;
                }
                $data['ConsoleSize'] = $values_25;
            }
            if ($object->isInitialized('isolation') && $object->getIsolation() !== null) {
                $data['Isolation'] = $object->getIsolation();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\HostConfig' => false];
        }
    }
} else {
    class HostConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\HostConfig';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\HostConfig';
        }

        /**
         * @param mixed $data
         * @param mixed $type
         * @param null|mixed $format
         * @return mixed
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new HostConfig();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('CpuShares', $data)) {
                $object->setCpuShares($data['CpuShares']);
            }
            if (array_key_exists('Memory', $data)) {
                $object->setMemory($data['Memory']);
            }
            if (array_key_exists('CgroupParent', $data)) {
                $object->setCgroupParent($data['CgroupParent']);
            }
            if (array_key_exists('BlkioWeight', $data)) {
                $object->setBlkioWeight($data['BlkioWeight']);
            }
            if (array_key_exists('BlkioWeightDevice', $data)) {
                $values = [];
                foreach ($data['BlkioWeightDevice'] ?? [] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\ResourcesBlkioWeightDeviceItem', 'json', $context);
                }
                $object->setBlkioWeightDevice($values);
            }
            if (array_key_exists('BlkioDeviceReadBps', $data)) {
                $values_1 = [];
                foreach ($data['BlkioDeviceReadBps'] ?? [] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\API\Model\ThrottleDevice', 'json', $context);
                }
                $object->setBlkioDeviceReadBps($values_1);
            }
            if (array_key_exists('BlkioDeviceWriteBps', $data)) {
                $values_2 = [];
                foreach ($data['BlkioDeviceWriteBps'] ?? [] as $value_2) {
                    $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\API\Model\ThrottleDevice', 'json', $context);
                }
                $object->setBlkioDeviceWriteBps($values_2);
            }
            if (array_key_exists('BlkioDeviceReadIOps', $data)) {
                $values_3 = [];
                foreach ($data['BlkioDeviceReadIOps'] ?? [] as $value_3) {
                    $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\API\Model\ThrottleDevice', 'json', $context);
                }
                $object->setBlkioDeviceReadIOps($values_3);
            }
            if (array_key_exists('BlkioDeviceWriteIOps', $data)) {
                $values_4 = [];
                foreach ($data['BlkioDeviceWriteIOps'] ?? [] as $value_4) {
                    $values_4[] = $this->denormalizer->denormalize($value_4, 'Docker\API\Model\ThrottleDevice', 'json', $context);
                }
                $object->setBlkioDeviceWriteIOps($values_4);
            }
            if (array_key_exists('CpuPeriod', $data)) {
                $object->setCpuPeriod($data['CpuPeriod']);
            }
            if (array_key_exists('CpuQuota', $data)) {
                $object->setCpuQuota($data['CpuQuota']);
            }
            if (array_key_exists('CpuRealtimePeriod', $data)) {
                $object->setCpuRealtimePeriod($data['CpuRealtimePeriod']);
            }
            if (array_key_exists('CpuRealtimeRuntime', $data)) {
                $object->setCpuRealtimeRuntime($data['CpuRealtimeRuntime']);
            }
            if (array_key_exists('CpusetCpus', $data)) {
                $object->setCpusetCpus($data['CpusetCpus']);
            }
            if (array_key_exists('CpusetMems', $data)) {
                $object->setCpusetMems($data['CpusetMems']);
            }
            if (array_key_exists('Devices', $data)) {
                $values_5 = [];
                foreach ($data['Devices'] ?? [] as $value_5) {
                    $values_5[] = $this->denormalizer->denormalize($value_5, 'Docker\API\Model\DeviceMapping', 'json', $context);
                }
                $object->setDevices($values_5);
            }
            if (array_key_exists('DeviceCgroupRules', $data)) {
                $values_6 = [];
                foreach ($data['DeviceCgroupRules'] ?? [] as $value_6) {
                    $values_6[] = $value_6;
                }
                $object->setDeviceCgroupRules($values_6);
            }
            if (array_key_exists('DiskQuota', $data)) {
                $object->setDiskQuota($data['DiskQuota']);
            }
            if (array_key_exists('KernelMemory', $data)) {
                $object->setKernelMemory($data['KernelMemory']);
            }
            if (array_key_exists('MemoryReservation', $data)) {
                $object->setMemoryReservation($data['MemoryReservation']);
            }
            if (array_key_exists('MemorySwap', $data)) {
                $object->setMemorySwap($data['MemorySwap']);
            }
            if (array_key_exists('MemorySwappiness', $data)) {
                $object->setMemorySwappiness($data['MemorySwappiness']);
            }
            if (array_key_exists('NanoCPUs', $data)) {
                $object->setNanoCPUs($data['NanoCPUs']);
            }
            if (array_key_exists('OomKillDisable', $data)) {
                $object->setOomKillDisable($data['OomKillDisable']);
            }
            if (array_key_exists('PidsLimit', $data)) {
                $object->setPidsLimit($data['PidsLimit']);
            }
            if (array_key_exists('Ulimits', $data)) {
                $values_7 = [];
                foreach ($data['Ulimits'] ?? [] as $value_7) {
                    $values_7[] = $this->denormalizer->denormalize($value_7, 'Docker\API\Model\ResourcesUlimitsItem', 'json', $context);
                }
                $object->setUlimits($values_7);
            }
            if (array_key_exists('CpuCount', $data)) {
                $object->setCpuCount($data['CpuCount']);
            }
            if (array_key_exists('CpuPercent', $data)) {
                $object->setCpuPercent($data['CpuPercent']);
            }
            if (array_key_exists('IOMaximumIOps', $data)) {
                $object->setIOMaximumIOps($data['IOMaximumIOps']);
            }
            if (array_key_exists('IOMaximumBandwidth', $data)) {
                $object->setIOMaximumBandwidth($data['IOMaximumBandwidth']);
            }
            if (array_key_exists('Binds', $data)) {
                $values_8 = [];
                foreach ($data['Binds'] ?? [] as $value_8) {
                    $values_8[] = $value_8;
                }
                $object->setBinds($values_8);
            }
            if (array_key_exists('ContainerIDFile', $data)) {
                $object->setContainerIDFile($data['ContainerIDFile']);
            }
            if (array_key_exists('LogConfig', $data)) {
                $object->setLogConfig($this->denormalizer->denormalize($data['LogConfig'], 'Docker\API\Model\HostConfigLogConfig', 'json', $context));
            }
            if (array_key_exists('NetworkMode', $data)) {
                $object->setNetworkMode($data['NetworkMode']);
            }
            if (array_key_exists('PortBindings', $data)) {
                $values_9 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['PortBindings'] ?? [] as $key => $value_9) {
                    if ($value_9 === null) {
                        $values_9[$key] = null;
                        continue;
                    }
                    $values_10 = [];
                    foreach ($value_9 ?? [] as $value_10) {
                        $values_10[] = $this->denormalizer->denormalize($value_10, 'Docker\API\Model\PortBinding', 'json', $context);
                    }
                    $values_9[$key] = $values_10;
                }
                $object->setPortBindings($values_9);
            }
            if (array_key_exists('RestartPolicy', $data)) {
                $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], 'Docker\API\Model\RestartPolicy', 'json', $context));
            }
            if (array_key_exists('AutoRemove', $data)) {
                $object->setAutoRemove($data['AutoRemove']);
            }
            if (array_key_exists('VolumeDriver', $data)) {
                $object->setVolumeDriver($data['VolumeDriver']);
            }
            if (array_key_exists('VolumesFrom', $data)) {
                $values_11 = [];
                foreach ($data['VolumesFrom'] ?? [] as $value_11) {
                    $values_11[] = $value_11;
                }
                $object->setVolumesFrom($values_11);
            }
            if (array_key_exists('Mounts', $data)) {
                $values_12 = [];
                foreach ($data['Mounts'] ?? [] as $value_12) {
                    $values_12[] = $this->denormalizer->denormalize($value_12, 'Docker\API\Model\Mount', 'json', $context);
                }
                $object->setMounts($values_12);
            }
            if (array_key_exists('CapAdd', $data)) {
                $values_13 = [];
                foreach ($data['CapAdd'] ?? [] as $value_13) {
                    $values_13[] = $value_13;
                }
                $object->setCapAdd($values_13);
            }
            if (array_key_exists('CapDrop', $data)) {
                $values_14 = [];
                foreach ($data['CapDrop'] ?? [] as $value_14) {
                    $values_14[] = $value_14;
                }
                $object->setCapDrop($values_14);
            }
            if (array_key_exists('Dns', $data)) {
                $values_15 = [];
                foreach ($data['Dns'] ?? [] as $value_15) {
                    $values_15[] = $value_15;
                }
                $object->setDns($values_15);
            }
            if (array_key_exists('DnsOptions', $data)) {
                $values_16 = [];
                foreach ($data['DnsOptions'] ?? [] as $value_16) {
                    $values_16[] = $value_16;
                }
                $object->setDnsOptions($values_16);
            }
            if (array_key_exists('DnsSearch', $data)) {
                $values_17 = [];
                foreach ($data['DnsSearch'] ?? [] as $value_17) {
                    $values_17[] = $value_17;
                }
                $object->setDnsSearch($values_17);
            }
            if (array_key_exists('ExtraHosts', $data)) {
                $values_18 = [];
                foreach ($data['ExtraHosts'] ?? [] as $value_18) {
                    $values_18[] = $value_18;
                }
                $object->setExtraHosts($values_18);
            }
            if (array_key_exists('GroupAdd', $data)) {
                $values_19 = [];
                foreach ($data['GroupAdd'] ?? [] as $value_19) {
                    $values_19[] = $value_19;
                }
                $object->setGroupAdd($values_19);
            }
            if (array_key_exists('IpcMode', $data)) {
                $object->setIpcMode($data['IpcMode']);
            }
            if (array_key_exists('Cgroup', $data)) {
                $object->setCgroup($data['Cgroup']);
            }
            if (array_key_exists('Links', $data)) {
                $values_20 = [];
                foreach ($data['Links'] ?? [] as $value_20) {
                    $values_20[] = $value_20;
                }
                $object->setLinks($values_20);
            }
            if (array_key_exists('OomScoreAdj', $data)) {
                $object->setOomScoreAdj($data['OomScoreAdj']);
            }
            if (array_key_exists('PidMode', $data)) {
                $object->setPidMode($data['PidMode']);
            }
            if (array_key_exists('Privileged', $data)) {
                $object->setPrivileged($data['Privileged']);
            }
            if (array_key_exists('PublishAllPorts', $data)) {
                $object->setPublishAllPorts($data['PublishAllPorts']);
            }
            if (array_key_exists('ReadonlyRootfs', $data)) {
                $object->setReadonlyRootfs($data['ReadonlyRootfs']);
            }
            if (array_key_exists('SecurityOpt', $data)) {
                $values_21 = [];
                foreach ($data['SecurityOpt'] ?? [] as $value_21) {
                    $values_21[] = $value_21;
                }
                $object->setSecurityOpt($values_21);
            }
            if (array_key_exists('StorageOpt', $data)) {
                $values_22 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['StorageOpt'] ?? [] as $key_1 => $value_22) {
                    if ($value_22 === null) {
                        $values_22[$key_1] = null;
                        continue;
                    }
                    $values_22[$key_1] = $value_22;
                }
                $object->setStorageOpt($values_22);
            }
            if (array_key_exists('Tmpfs', $data)) {
                $values_23 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Tmpfs'] ?? [] as $key_2 => $value_23) {
                    if ($value_23 === null) {
                        $values_23[$key_2] = null;
                        continue;
                    }
                    $values_23[$key_2] = $value_23;
                }
                $object->setTmpfs($values_23);
            }
            if (array_key_exists('UTSMode', $data)) {
                $object->setUTSMode($data['UTSMode']);
            }
            if (array_key_exists('UsernsMode', $data)) {
                $object->setUsernsMode($data['UsernsMode']);
            }
            if (array_key_exists('ShmSize', $data)) {
                $object->setShmSize($data['ShmSize']);
            }
            if (array_key_exists('Sysctls', $data)) {
                $values_24 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Sysctls'] ?? [] as $key_3 => $value_24) {
                    if ($value_24 === null) {
                        $values_24[$key_3] = null;
                        continue;
                    }
                    $values_24[$key_3] = $value_24;
                }
                $object->setSysctls($values_24);
            }
            if (array_key_exists('Runtime', $data)) {
                $object->setRuntime($data['Runtime']);
            }
            if (array_key_exists('ConsoleSize', $data)) {
                $values_25 = [];
                foreach ($data['ConsoleSize'] ?? [] as $value_25) {
                    $values_25[] = $value_25;
                }
                $object->setConsoleSize($values_25);
            }
            if (array_key_exists('Isolation', $data)) {
                $object->setIsolation($data['Isolation']);
            }
            return $object;
        }

        /**
         * @param mixed $object
         * @param null|mixed $format
         * @return null|array|ArrayObject|bool|float|int|string
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('cpuShares') && $object->getCpuShares() !== null) {
                $data['CpuShares'] = $object->getCpuShares();
            }
            if ($object->isInitialized('memory') && $object->getMemory() !== null) {
                $data['Memory'] = $object->getMemory();
            }
            if ($object->isInitialized('cgroupParent') && $object->getCgroupParent() !== null) {
                $data['CgroupParent'] = $object->getCgroupParent();
            }
            if ($object->isInitialized('blkioWeight') && $object->getBlkioWeight() !== null) {
                $data['BlkioWeight'] = $object->getBlkioWeight();
            }
            if ($object->isInitialized('blkioWeightDevice') && $object->getBlkioWeightDevice() !== null) {
                $values = [];
                foreach ($object->getBlkioWeightDevice() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['BlkioWeightDevice'] = $values;
            }
            if ($object->isInitialized('blkioDeviceReadBps') && $object->getBlkioDeviceReadBps() !== null) {
                $values_1 = [];
                foreach ($object->getBlkioDeviceReadBps() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['BlkioDeviceReadBps'] = $values_1;
            }
            if ($object->isInitialized('blkioDeviceWriteBps') && $object->getBlkioDeviceWriteBps() !== null) {
                $values_2 = [];
                foreach ($object->getBlkioDeviceWriteBps() as $value_2) {
                    $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
                }
                $data['BlkioDeviceWriteBps'] = $values_2;
            }
            if ($object->isInitialized('blkioDeviceReadIOps') && $object->getBlkioDeviceReadIOps() !== null) {
                $values_3 = [];
                foreach ($object->getBlkioDeviceReadIOps() as $value_3) {
                    $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
                }
                $data['BlkioDeviceReadIOps'] = $values_3;
            }
            if ($object->isInitialized('blkioDeviceWriteIOps') && $object->getBlkioDeviceWriteIOps() !== null) {
                $values_4 = [];
                foreach ($object->getBlkioDeviceWriteIOps() as $value_4) {
                    $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
                }
                $data['BlkioDeviceWriteIOps'] = $values_4;
            }
            if ($object->isInitialized('cpuPeriod') && $object->getCpuPeriod() !== null) {
                $data['CpuPeriod'] = $object->getCpuPeriod();
            }
            if ($object->isInitialized('cpuQuota') && $object->getCpuQuota() !== null) {
                $data['CpuQuota'] = $object->getCpuQuota();
            }
            if ($object->isInitialized('cpuRealtimePeriod') && $object->getCpuRealtimePeriod() !== null) {
                $data['CpuRealtimePeriod'] = $object->getCpuRealtimePeriod();
            }
            if ($object->isInitialized('cpuRealtimeRuntime') && $object->getCpuRealtimeRuntime() !== null) {
                $data['CpuRealtimeRuntime'] = $object->getCpuRealtimeRuntime();
            }
            if ($object->isInitialized('cpusetCpus') && $object->getCpusetCpus() !== null) {
                $data['CpusetCpus'] = $object->getCpusetCpus();
            }
            if ($object->isInitialized('cpusetMems') && $object->getCpusetMems() !== null) {
                $data['CpusetMems'] = $object->getCpusetMems();
            }
            if ($object->isInitialized('devices') && $object->getDevices() !== null) {
                $values_5 = [];
                foreach ($object->getDevices() as $value_5) {
                    $values_5[] = $this->normalizer->normalize($value_5, 'json', $context);
                }
                $data['Devices'] = $values_5;
            }
            if ($object->isInitialized('deviceCgroupRules') && $object->getDeviceCgroupRules() !== null) {
                $values_6 = [];
                foreach ($object->getDeviceCgroupRules() as $value_6) {
                    $values_6[] = $value_6;
                }
                $data['DeviceCgroupRules'] = $values_6;
            }
            if ($object->isInitialized('diskQuota') && $object->getDiskQuota() !== null) {
                $data['DiskQuota'] = $object->getDiskQuota();
            }
            if ($object->isInitialized('kernelMemory') && $object->getKernelMemory() !== null) {
                $data['KernelMemory'] = $object->getKernelMemory();
            }
            if ($object->isInitialized('memoryReservation') && $object->getMemoryReservation() !== null) {
                $data['MemoryReservation'] = $object->getMemoryReservation();
            }
            if ($object->isInitialized('memorySwap') && $object->getMemorySwap() !== null) {
                $data['MemorySwap'] = $object->getMemorySwap();
            }
            if ($object->isInitialized('memorySwappiness') && $object->getMemorySwappiness() !== null) {
                $data['MemorySwappiness'] = $object->getMemorySwappiness();
            }
            if ($object->isInitialized('nanoCPUs') && $object->getNanoCPUs() !== null) {
                $data['NanoCPUs'] = $object->getNanoCPUs();
            }
            if ($object->isInitialized('oomKillDisable') && $object->getOomKillDisable() !== null) {
                $data['OomKillDisable'] = $object->getOomKillDisable();
            }
            if ($object->isInitialized('pidsLimit') && $object->getPidsLimit() !== null) {
                $data['PidsLimit'] = $object->getPidsLimit();
            }
            if ($object->isInitialized('ulimits') && $object->getUlimits() !== null) {
                $values_7 = [];
                foreach ($object->getUlimits() as $value_7) {
                    $values_7[] = $this->normalizer->normalize($value_7, 'json', $context);
                }
                $data['Ulimits'] = $values_7;
            }
            if ($object->isInitialized('cpuCount') && $object->getCpuCount() !== null) {
                $data['CpuCount'] = $object->getCpuCount();
            }
            if ($object->isInitialized('cpuPercent') && $object->getCpuPercent() !== null) {
                $data['CpuPercent'] = $object->getCpuPercent();
            }
            if ($object->isInitialized('iOMaximumIOps') && $object->getIOMaximumIOps() !== null) {
                $data['IOMaximumIOps'] = $object->getIOMaximumIOps();
            }
            if ($object->isInitialized('iOMaximumBandwidth') && $object->getIOMaximumBandwidth() !== null) {
                $data['IOMaximumBandwidth'] = $object->getIOMaximumBandwidth();
            }
            if ($object->isInitialized('binds') && $object->getBinds() !== null) {
                $values_8 = [];
                foreach ($object->getBinds() as $value_8) {
                    $values_8[] = $value_8;
                }
                $data['Binds'] = $values_8;
            }
            if ($object->isInitialized('containerIDFile') && $object->getContainerIDFile() !== null) {
                $data['ContainerIDFile'] = $object->getContainerIDFile();
            }
            if ($object->isInitialized('logConfig') && $object->getLogConfig() !== null) {
                $data['LogConfig'] = $this->normalizer->normalize($object->getLogConfig(), 'json', $context);
            }
            if ($object->isInitialized('networkMode') && $object->getNetworkMode() !== null) {
                $data['NetworkMode'] = $object->getNetworkMode();
            }
            if ($object->isInitialized('portBindings') && $object->getPortBindings() !== null) {
                $values_9 = [];
                foreach ($object->getPortBindings() as $key => $value_9) {
                    $values_10 = [];
                    foreach ($value_9 as $value_10) {
                        $values_10[] = $this->normalizer->normalize($value_10, 'json', $context);
                    }
                    $values_9[$key] = $values_10;
                }
                $data['PortBindings'] = $values_9;
            }
            if ($object->isInitialized('restartPolicy') && $object->getRestartPolicy() !== null) {
                $data['RestartPolicy'] = $this->normalizer->normalize($object->getRestartPolicy(), 'json', $context);
            }
            if ($object->isInitialized('autoRemove') && $object->getAutoRemove() !== null) {
                $data['AutoRemove'] = $object->getAutoRemove();
            }
            if ($object->isInitialized('volumeDriver') && $object->getVolumeDriver() !== null) {
                $data['VolumeDriver'] = $object->getVolumeDriver();
            }
            if ($object->isInitialized('volumesFrom') && $object->getVolumesFrom() !== null) {
                $values_11 = [];
                foreach ($object->getVolumesFrom() as $value_11) {
                    $values_11[] = $value_11;
                }
                $data['VolumesFrom'] = $values_11;
            }
            if ($object->isInitialized('mounts') && $object->getMounts() !== null) {
                $values_12 = [];
                foreach ($object->getMounts() as $value_12) {
                    $values_12[] = $this->normalizer->normalize($value_12, 'json', $context);
                }
                $data['Mounts'] = $values_12;
            }
            if ($object->isInitialized('capAdd') && $object->getCapAdd() !== null) {
                $values_13 = [];
                foreach ($object->getCapAdd() as $value_13) {
                    $values_13[] = $value_13;
                }
                $data['CapAdd'] = $values_13;
            }
            if ($object->isInitialized('capDrop') && $object->getCapDrop() !== null) {
                $values_14 = [];
                foreach ($object->getCapDrop() as $value_14) {
                    $values_14[] = $value_14;
                }
                $data['CapDrop'] = $values_14;
            }
            if ($object->isInitialized('dns') && $object->getDns() !== null) {
                $values_15 = [];
                foreach ($object->getDns() as $value_15) {
                    $values_15[] = $value_15;
                }
                $data['Dns'] = $values_15;
            }
            if ($object->isInitialized('dnsOptions') && $object->getDnsOptions() !== null) {
                $values_16 = [];
                foreach ($object->getDnsOptions() as $value_16) {
                    $values_16[] = $value_16;
                }
                $data['DnsOptions'] = $values_16;
            }
            if ($object->isInitialized('dnsSearch') && $object->getDnsSearch() !== null) {
                $values_17 = [];
                foreach ($object->getDnsSearch() as $value_17) {
                    $values_17[] = $value_17;
                }
                $data['DnsSearch'] = $values_17;
            }
            if ($object->isInitialized('extraHosts') && $object->getExtraHosts() !== null) {
                $values_18 = [];
                foreach ($object->getExtraHosts() as $value_18) {
                    $values_18[] = $value_18;
                }
                $data['ExtraHosts'] = $values_18;
            }
            if ($object->isInitialized('groupAdd') && $object->getGroupAdd() !== null) {
                $values_19 = [];
                foreach ($object->getGroupAdd() as $value_19) {
                    $values_19[] = $value_19;
                }
                $data['GroupAdd'] = $values_19;
            }
            if ($object->isInitialized('ipcMode') && $object->getIpcMode() !== null) {
                $data['IpcMode'] = $object->getIpcMode();
            }
            if ($object->isInitialized('cgroup') && $object->getCgroup() !== null) {
                $data['Cgroup'] = $object->getCgroup();
            }
            if ($object->isInitialized('links') && $object->getLinks() !== null) {
                $values_20 = [];
                foreach ($object->getLinks() as $value_20) {
                    $values_20[] = $value_20;
                }
                $data['Links'] = $values_20;
            }
            if ($object->isInitialized('oomScoreAdj') && $object->getOomScoreAdj() !== null) {
                $data['OomScoreAdj'] = $object->getOomScoreAdj();
            }
            if ($object->isInitialized('pidMode') && $object->getPidMode() !== null) {
                $data['PidMode'] = $object->getPidMode();
            }
            if ($object->isInitialized('privileged') && $object->getPrivileged() !== null) {
                $data['Privileged'] = $object->getPrivileged();
            }
            if ($object->isInitialized('publishAllPorts') && $object->getPublishAllPorts() !== null) {
                $data['PublishAllPorts'] = $object->getPublishAllPorts();
            }
            if ($object->isInitialized('readonlyRootfs') && $object->getReadonlyRootfs() !== null) {
                $data['ReadonlyRootfs'] = $object->getReadonlyRootfs();
            }
            if ($object->isInitialized('securityOpt') && $object->getSecurityOpt() !== null) {
                $values_21 = [];
                foreach ($object->getSecurityOpt() as $value_21) {
                    $values_21[] = $value_21;
                }
                $data['SecurityOpt'] = $values_21;
            }
            if ($object->isInitialized('storageOpt') && $object->getStorageOpt() !== null) {
                $values_22 = [];
                foreach ($object->getStorageOpt() as $key_1 => $value_22) {
                    $values_22[$key_1] = $value_22;
                }
                $data['StorageOpt'] = $values_22;
            }
            if ($object->isInitialized('tmpfs') && $object->getTmpfs() !== null) {
                $values_23 = [];
                foreach ($object->getTmpfs() as $key_2 => $value_23) {
                    $values_23[$key_2] = $value_23;
                }
                $data['Tmpfs'] = $values_23;
            }
            if ($object->isInitialized('uTSMode') && $object->getUTSMode() !== null) {
                $data['UTSMode'] = $object->getUTSMode();
            }
            if ($object->isInitialized('usernsMode') && $object->getUsernsMode() !== null) {
                $data['UsernsMode'] = $object->getUsernsMode();
            }
            if ($object->isInitialized('shmSize') && $object->getShmSize() !== null) {
                $data['ShmSize'] = $object->getShmSize();
            }
            if ($object->isInitialized('sysctls') && $object->getSysctls() !== null) {
                $values_24 = [];
                foreach ($object->getSysctls() as $key_3 => $value_24) {
                    $values_24[$key_3] = $value_24;
                }
                $data['Sysctls'] = $values_24;
            }
            if ($object->isInitialized('runtime') && $object->getRuntime() !== null) {
                $data['Runtime'] = $object->getRuntime();
            }
            if ($object->isInitialized('consoleSize') && $object->getConsoleSize() !== null) {
                $values_25 = [];
                foreach ($object->getConsoleSize() as $value_25) {
                    $values_25[] = $value_25;
                }
                $data['ConsoleSize'] = $values_25;
            }
            if ($object->isInitialized('isolation') && $object->getIsolation() !== null) {
                $data['Isolation'] = $object->getIsolation();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\HostConfig' => false];
        }
    }
}
