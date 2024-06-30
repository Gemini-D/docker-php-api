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
use Docker\API\Model\ContainersIdUpdatePostBody;
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
    class ContainersIdUpdatePostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ContainersIdUpdatePostBody';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ContainersIdUpdatePostBody';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ContainersIdUpdatePostBody();
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
            if (array_key_exists('RestartPolicy', $data)) {
                $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], 'Docker\API\Model\RestartPolicy', 'json', $context));
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
            if ($object->isInitialized('restartPolicy') && $object->getRestartPolicy() !== null) {
                $data['RestartPolicy'] = $this->normalizer->normalize($object->getRestartPolicy(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ContainersIdUpdatePostBody' => false];
        }
    }
} else {
    class ContainersIdUpdatePostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ContainersIdUpdatePostBody';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ContainersIdUpdatePostBody';
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
            $object = new ContainersIdUpdatePostBody();
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
            if (array_key_exists('RestartPolicy', $data)) {
                $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], 'Docker\API\Model\RestartPolicy', 'json', $context));
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
            if ($object->isInitialized('restartPolicy') && $object->getRestartPolicy() !== null) {
                $data['RestartPolicy'] = $this->normalizer->normalize($object->getRestartPolicy(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ContainersIdUpdatePostBody' => false];
        }
    }
}
