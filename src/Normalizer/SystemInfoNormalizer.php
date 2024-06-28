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

namespace Docker\API\Normalizer;

use ArrayObject;
use Docker\API\Model\SystemInfo;
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
    class SystemInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SystemInfo';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SystemInfo';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SystemInfo();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('ID', $data)) {
                $object->setID($data['ID']);
            }
            if (array_key_exists('Containers', $data)) {
                $object->setContainers($data['Containers']);
            }
            if (array_key_exists('ContainersRunning', $data)) {
                $object->setContainersRunning($data['ContainersRunning']);
            }
            if (array_key_exists('ContainersPaused', $data)) {
                $object->setContainersPaused($data['ContainersPaused']);
            }
            if (array_key_exists('ContainersStopped', $data)) {
                $object->setContainersStopped($data['ContainersStopped']);
            }
            if (array_key_exists('Images', $data)) {
                $object->setImages($data['Images']);
            }
            if (array_key_exists('Driver', $data)) {
                $object->setDriver($data['Driver']);
            }
            if (array_key_exists('DriverStatus', $data)) {
                $values = [];
                foreach ($data['DriverStatus'] as $value) {
                    $values_1 = [];
                    foreach ($value as $value_1) {
                        $values_1[] = $value_1;
                    }
                    $values[] = $values_1;
                }
                $object->setDriverStatus($values);
            }
            if (array_key_exists('DockerRootDir', $data)) {
                $object->setDockerRootDir($data['DockerRootDir']);
            }
            if (array_key_exists('SystemStatus', $data)) {
                $values_2 = [];
                foreach ($data['SystemStatus'] as $value_2) {
                    $values_3 = [];
                    foreach ($value_2 as $value_3) {
                        $values_3[] = $value_3;
                    }
                    $values_2[] = $values_3;
                }
                $object->setSystemStatus($values_2);
            }
            if (array_key_exists('Plugins', $data)) {
                $object->setPlugins($this->denormalizer->denormalize($data['Plugins'], 'Docker\API\Model\PluginsInfo', 'json', $context));
            }
            if (array_key_exists('MemoryLimit', $data)) {
                $object->setMemoryLimit($data['MemoryLimit']);
            }
            if (array_key_exists('SwapLimit', $data)) {
                $object->setSwapLimit($data['SwapLimit']);
            }
            if (array_key_exists('KernelMemory', $data)) {
                $object->setKernelMemory($data['KernelMemory']);
            }
            if (array_key_exists('CpuCfsPeriod', $data)) {
                $object->setCpuCfsPeriod($data['CpuCfsPeriod']);
            }
            if (array_key_exists('CpuCfsQuota', $data)) {
                $object->setCpuCfsQuota($data['CpuCfsQuota']);
            }
            if (array_key_exists('CPUShares', $data)) {
                $object->setCPUShares($data['CPUShares']);
            }
            if (array_key_exists('CPUSet', $data)) {
                $object->setCPUSet($data['CPUSet']);
            }
            if (array_key_exists('OomKillDisable', $data)) {
                $object->setOomKillDisable($data['OomKillDisable']);
            }
            if (array_key_exists('IPv4Forwarding', $data)) {
                $object->setIPv4Forwarding($data['IPv4Forwarding']);
            }
            if (array_key_exists('BridgeNfIptables', $data)) {
                $object->setBridgeNfIptables($data['BridgeNfIptables']);
            }
            if (array_key_exists('BridgeNfIp6tables', $data)) {
                $object->setBridgeNfIp6tables($data['BridgeNfIp6tables']);
            }
            if (array_key_exists('Debug', $data)) {
                $object->setDebug($data['Debug']);
            }
            if (array_key_exists('NFd', $data)) {
                $object->setNFd($data['NFd']);
            }
            if (array_key_exists('NGoroutines', $data)) {
                $object->setNGoroutines($data['NGoroutines']);
            }
            if (array_key_exists('SystemTime', $data)) {
                $object->setSystemTime($data['SystemTime']);
            }
            if (array_key_exists('LoggingDriver', $data)) {
                $object->setLoggingDriver($data['LoggingDriver']);
            }
            if (array_key_exists('CgroupDriver', $data)) {
                $object->setCgroupDriver($data['CgroupDriver']);
            }
            if (array_key_exists('NEventsListener', $data)) {
                $object->setNEventsListener($data['NEventsListener']);
            }
            if (array_key_exists('KernelVersion', $data)) {
                $object->setKernelVersion($data['KernelVersion']);
            }
            if (array_key_exists('OperatingSystem', $data)) {
                $object->setOperatingSystem($data['OperatingSystem']);
            }
            if (array_key_exists('OSType', $data)) {
                $object->setOSType($data['OSType']);
            }
            if (array_key_exists('Architecture', $data)) {
                $object->setArchitecture($data['Architecture']);
            }
            if (array_key_exists('NCPU', $data)) {
                $object->setNCPU($data['NCPU']);
            }
            if (array_key_exists('MemTotal', $data)) {
                $object->setMemTotal($data['MemTotal']);
            }
            if (array_key_exists('IndexServerAddress', $data)) {
                $object->setIndexServerAddress($data['IndexServerAddress']);
            }
            if (array_key_exists('RegistryConfig', $data) && $data['RegistryConfig'] !== null) {
                $object->setRegistryConfig($this->denormalizer->denormalize($data['RegistryConfig'], 'Docker\API\Model\RegistryServiceConfig', 'json', $context));
            } elseif (array_key_exists('RegistryConfig', $data) && $data['RegistryConfig'] === null) {
                $object->setRegistryConfig(null);
            }
            if (array_key_exists('GenericResources', $data)) {
                $values_4 = [];
                foreach ($data['GenericResources'] as $value_4) {
                    $values_4[] = $this->denormalizer->denormalize($value_4, 'Docker\API\Model\GenericResourcesItem', 'json', $context);
                }
                $object->setGenericResources($values_4);
            }
            if (array_key_exists('HttpProxy', $data)) {
                $object->setHttpProxy($data['HttpProxy']);
            }
            if (array_key_exists('HttpsProxy', $data)) {
                $object->setHttpsProxy($data['HttpsProxy']);
            }
            if (array_key_exists('NoProxy', $data)) {
                $object->setNoProxy($data['NoProxy']);
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Labels', $data)) {
                $values_5 = [];
                foreach ($data['Labels'] as $value_5) {
                    $values_5[] = $value_5;
                }
                $object->setLabels($values_5);
            }
            if (array_key_exists('ExperimentalBuild', $data)) {
                $object->setExperimentalBuild($data['ExperimentalBuild']);
            }
            if (array_key_exists('ServerVersion', $data)) {
                $object->setServerVersion($data['ServerVersion']);
            }
            if (array_key_exists('ClusterStore', $data)) {
                $object->setClusterStore($data['ClusterStore']);
            }
            if (array_key_exists('ClusterAdvertise', $data)) {
                $object->setClusterAdvertise($data['ClusterAdvertise']);
            }
            if (array_key_exists('Runtimes', $data)) {
                $values_6 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Runtimes'] as $key => $value_6) {
                    $values_6[$key] = $this->denormalizer->denormalize($value_6, 'Docker\API\Model\Runtime', 'json', $context);
                }
                $object->setRuntimes($values_6);
            }
            if (array_key_exists('DefaultRuntime', $data)) {
                $object->setDefaultRuntime($data['DefaultRuntime']);
            }
            if (array_key_exists('Swarm', $data)) {
                $object->setSwarm($this->denormalizer->denormalize($data['Swarm'], 'Docker\API\Model\SwarmInfo', 'json', $context));
            }
            if (array_key_exists('LiveRestoreEnabled', $data)) {
                $object->setLiveRestoreEnabled($data['LiveRestoreEnabled']);
            }
            if (array_key_exists('Isolation', $data)) {
                $object->setIsolation($data['Isolation']);
            }
            if (array_key_exists('InitBinary', $data)) {
                $object->setInitBinary($data['InitBinary']);
            }
            if (array_key_exists('ContainerdCommit', $data)) {
                $object->setContainerdCommit($this->denormalizer->denormalize($data['ContainerdCommit'], 'Docker\API\Model\Commit', 'json', $context));
            }
            if (array_key_exists('RuncCommit', $data)) {
                $object->setRuncCommit($this->denormalizer->denormalize($data['RuncCommit'], 'Docker\API\Model\Commit', 'json', $context));
            }
            if (array_key_exists('InitCommit', $data)) {
                $object->setInitCommit($this->denormalizer->denormalize($data['InitCommit'], 'Docker\API\Model\Commit', 'json', $context));
            }
            if (array_key_exists('SecurityOptions', $data)) {
                $values_7 = [];
                foreach ($data['SecurityOptions'] as $value_7) {
                    $values_7[] = $value_7;
                }
                $object->setSecurityOptions($values_7);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('iD') && $object->getID() !== null) {
                $data['ID'] = $object->getID();
            }
            if ($object->isInitialized('containers') && $object->getContainers() !== null) {
                $data['Containers'] = $object->getContainers();
            }
            if ($object->isInitialized('containersRunning') && $object->getContainersRunning() !== null) {
                $data['ContainersRunning'] = $object->getContainersRunning();
            }
            if ($object->isInitialized('containersPaused') && $object->getContainersPaused() !== null) {
                $data['ContainersPaused'] = $object->getContainersPaused();
            }
            if ($object->isInitialized('containersStopped') && $object->getContainersStopped() !== null) {
                $data['ContainersStopped'] = $object->getContainersStopped();
            }
            if ($object->isInitialized('images') && $object->getImages() !== null) {
                $data['Images'] = $object->getImages();
            }
            if ($object->isInitialized('driver') && $object->getDriver() !== null) {
                $data['Driver'] = $object->getDriver();
            }
            if ($object->isInitialized('driverStatus') && $object->getDriverStatus() !== null) {
                $values = [];
                foreach ($object->getDriverStatus() as $value) {
                    $values_1 = [];
                    foreach ($value as $value_1) {
                        $values_1[] = $value_1;
                    }
                    $values[] = $values_1;
                }
                $data['DriverStatus'] = $values;
            }
            if ($object->isInitialized('dockerRootDir') && $object->getDockerRootDir() !== null) {
                $data['DockerRootDir'] = $object->getDockerRootDir();
            }
            if ($object->isInitialized('systemStatus') && $object->getSystemStatus() !== null) {
                $values_2 = [];
                foreach ($object->getSystemStatus() as $value_2) {
                    $values_3 = [];
                    foreach ($value_2 as $value_3) {
                        $values_3[] = $value_3;
                    }
                    $values_2[] = $values_3;
                }
                $data['SystemStatus'] = $values_2;
            }
            if ($object->isInitialized('plugins') && $object->getPlugins() !== null) {
                $data['Plugins'] = $this->normalizer->normalize($object->getPlugins(), 'json', $context);
            }
            if ($object->isInitialized('memoryLimit') && $object->getMemoryLimit() !== null) {
                $data['MemoryLimit'] = $object->getMemoryLimit();
            }
            if ($object->isInitialized('swapLimit') && $object->getSwapLimit() !== null) {
                $data['SwapLimit'] = $object->getSwapLimit();
            }
            if ($object->isInitialized('kernelMemory') && $object->getKernelMemory() !== null) {
                $data['KernelMemory'] = $object->getKernelMemory();
            }
            if ($object->isInitialized('cpuCfsPeriod') && $object->getCpuCfsPeriod() !== null) {
                $data['CpuCfsPeriod'] = $object->getCpuCfsPeriod();
            }
            if ($object->isInitialized('cpuCfsQuota') && $object->getCpuCfsQuota() !== null) {
                $data['CpuCfsQuota'] = $object->getCpuCfsQuota();
            }
            if ($object->isInitialized('cPUShares') && $object->getCPUShares() !== null) {
                $data['CPUShares'] = $object->getCPUShares();
            }
            if ($object->isInitialized('cPUSet') && $object->getCPUSet() !== null) {
                $data['CPUSet'] = $object->getCPUSet();
            }
            if ($object->isInitialized('oomKillDisable') && $object->getOomKillDisable() !== null) {
                $data['OomKillDisable'] = $object->getOomKillDisable();
            }
            if ($object->isInitialized('iPv4Forwarding') && $object->getIPv4Forwarding() !== null) {
                $data['IPv4Forwarding'] = $object->getIPv4Forwarding();
            }
            if ($object->isInitialized('bridgeNfIptables') && $object->getBridgeNfIptables() !== null) {
                $data['BridgeNfIptables'] = $object->getBridgeNfIptables();
            }
            if ($object->isInitialized('bridgeNfIp6tables') && $object->getBridgeNfIp6tables() !== null) {
                $data['BridgeNfIp6tables'] = $object->getBridgeNfIp6tables();
            }
            if ($object->isInitialized('debug') && $object->getDebug() !== null) {
                $data['Debug'] = $object->getDebug();
            }
            if ($object->isInitialized('nFd') && $object->getNFd() !== null) {
                $data['NFd'] = $object->getNFd();
            }
            if ($object->isInitialized('nGoroutines') && $object->getNGoroutines() !== null) {
                $data['NGoroutines'] = $object->getNGoroutines();
            }
            if ($object->isInitialized('systemTime') && $object->getSystemTime() !== null) {
                $data['SystemTime'] = $object->getSystemTime();
            }
            if ($object->isInitialized('loggingDriver') && $object->getLoggingDriver() !== null) {
                $data['LoggingDriver'] = $object->getLoggingDriver();
            }
            if ($object->isInitialized('cgroupDriver') && $object->getCgroupDriver() !== null) {
                $data['CgroupDriver'] = $object->getCgroupDriver();
            }
            if ($object->isInitialized('nEventsListener') && $object->getNEventsListener() !== null) {
                $data['NEventsListener'] = $object->getNEventsListener();
            }
            if ($object->isInitialized('kernelVersion') && $object->getKernelVersion() !== null) {
                $data['KernelVersion'] = $object->getKernelVersion();
            }
            if ($object->isInitialized('operatingSystem') && $object->getOperatingSystem() !== null) {
                $data['OperatingSystem'] = $object->getOperatingSystem();
            }
            if ($object->isInitialized('oSType') && $object->getOSType() !== null) {
                $data['OSType'] = $object->getOSType();
            }
            if ($object->isInitialized('architecture') && $object->getArchitecture() !== null) {
                $data['Architecture'] = $object->getArchitecture();
            }
            if ($object->isInitialized('nCPU') && $object->getNCPU() !== null) {
                $data['NCPU'] = $object->getNCPU();
            }
            if ($object->isInitialized('memTotal') && $object->getMemTotal() !== null) {
                $data['MemTotal'] = $object->getMemTotal();
            }
            if ($object->isInitialized('indexServerAddress') && $object->getIndexServerAddress() !== null) {
                $data['IndexServerAddress'] = $object->getIndexServerAddress();
            }
            if ($object->isInitialized('registryConfig') && $object->getRegistryConfig() !== null) {
                $data['RegistryConfig'] = $this->normalizer->normalize($object->getRegistryConfig(), 'json', $context);
            }
            if ($object->isInitialized('genericResources') && $object->getGenericResources() !== null) {
                $values_4 = [];
                foreach ($object->getGenericResources() as $value_4) {
                    $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
                }
                $data['GenericResources'] = $values_4;
            }
            if ($object->isInitialized('httpProxy') && $object->getHttpProxy() !== null) {
                $data['HttpProxy'] = $object->getHttpProxy();
            }
            if ($object->isInitialized('httpsProxy') && $object->getHttpsProxy() !== null) {
                $data['HttpsProxy'] = $object->getHttpsProxy();
            }
            if ($object->isInitialized('noProxy') && $object->getNoProxy() !== null) {
                $data['NoProxy'] = $object->getNoProxy();
            }
            if ($object->isInitialized('name') && $object->getName() !== null) {
                $data['Name'] = $object->getName();
            }
            if ($object->isInitialized('labels') && $object->getLabels() !== null) {
                $values_5 = [];
                foreach ($object->getLabels() as $value_5) {
                    $values_5[] = $value_5;
                }
                $data['Labels'] = $values_5;
            }
            if ($object->isInitialized('experimentalBuild') && $object->getExperimentalBuild() !== null) {
                $data['ExperimentalBuild'] = $object->getExperimentalBuild();
            }
            if ($object->isInitialized('serverVersion') && $object->getServerVersion() !== null) {
                $data['ServerVersion'] = $object->getServerVersion();
            }
            if ($object->isInitialized('clusterStore') && $object->getClusterStore() !== null) {
                $data['ClusterStore'] = $object->getClusterStore();
            }
            if ($object->isInitialized('clusterAdvertise') && $object->getClusterAdvertise() !== null) {
                $data['ClusterAdvertise'] = $object->getClusterAdvertise();
            }
            if ($object->isInitialized('runtimes') && $object->getRuntimes() !== null) {
                $values_6 = [];
                foreach ($object->getRuntimes() as $key => $value_6) {
                    $values_6[$key] = $this->normalizer->normalize($value_6, 'json', $context);
                }
                $data['Runtimes'] = $values_6;
            }
            if ($object->isInitialized('defaultRuntime') && $object->getDefaultRuntime() !== null) {
                $data['DefaultRuntime'] = $object->getDefaultRuntime();
            }
            if ($object->isInitialized('swarm') && $object->getSwarm() !== null) {
                $data['Swarm'] = $this->normalizer->normalize($object->getSwarm(), 'json', $context);
            }
            if ($object->isInitialized('liveRestoreEnabled') && $object->getLiveRestoreEnabled() !== null) {
                $data['LiveRestoreEnabled'] = $object->getLiveRestoreEnabled();
            }
            if ($object->isInitialized('isolation') && $object->getIsolation() !== null) {
                $data['Isolation'] = $object->getIsolation();
            }
            if ($object->isInitialized('initBinary') && $object->getInitBinary() !== null) {
                $data['InitBinary'] = $object->getInitBinary();
            }
            if ($object->isInitialized('containerdCommit') && $object->getContainerdCommit() !== null) {
                $data['ContainerdCommit'] = $this->normalizer->normalize($object->getContainerdCommit(), 'json', $context);
            }
            if ($object->isInitialized('runcCommit') && $object->getRuncCommit() !== null) {
                $data['RuncCommit'] = $this->normalizer->normalize($object->getRuncCommit(), 'json', $context);
            }
            if ($object->isInitialized('initCommit') && $object->getInitCommit() !== null) {
                $data['InitCommit'] = $this->normalizer->normalize($object->getInitCommit(), 'json', $context);
            }
            if ($object->isInitialized('securityOptions') && $object->getSecurityOptions() !== null) {
                $values_7 = [];
                foreach ($object->getSecurityOptions() as $value_7) {
                    $values_7[] = $value_7;
                }
                $data['SecurityOptions'] = $values_7;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SystemInfo' => false];
        }
    }
} else {
    class SystemInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SystemInfo';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SystemInfo';
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
            $object = new SystemInfo();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('ID', $data)) {
                $object->setID($data['ID']);
            }
            if (array_key_exists('Containers', $data)) {
                $object->setContainers($data['Containers']);
            }
            if (array_key_exists('ContainersRunning', $data)) {
                $object->setContainersRunning($data['ContainersRunning']);
            }
            if (array_key_exists('ContainersPaused', $data)) {
                $object->setContainersPaused($data['ContainersPaused']);
            }
            if (array_key_exists('ContainersStopped', $data)) {
                $object->setContainersStopped($data['ContainersStopped']);
            }
            if (array_key_exists('Images', $data)) {
                $object->setImages($data['Images']);
            }
            if (array_key_exists('Driver', $data)) {
                $object->setDriver($data['Driver']);
            }
            if (array_key_exists('DriverStatus', $data)) {
                $values = [];
                foreach ($data['DriverStatus'] as $value) {
                    $values_1 = [];
                    foreach ($value as $value_1) {
                        $values_1[] = $value_1;
                    }
                    $values[] = $values_1;
                }
                $object->setDriverStatus($values);
            }
            if (array_key_exists('DockerRootDir', $data)) {
                $object->setDockerRootDir($data['DockerRootDir']);
            }
            if (array_key_exists('SystemStatus', $data)) {
                $values_2 = [];
                foreach ($data['SystemStatus'] as $value_2) {
                    $values_3 = [];
                    foreach ($value_2 as $value_3) {
                        $values_3[] = $value_3;
                    }
                    $values_2[] = $values_3;
                }
                $object->setSystemStatus($values_2);
            }
            if (array_key_exists('Plugins', $data)) {
                $object->setPlugins($this->denormalizer->denormalize($data['Plugins'], 'Docker\API\Model\PluginsInfo', 'json', $context));
            }
            if (array_key_exists('MemoryLimit', $data)) {
                $object->setMemoryLimit($data['MemoryLimit']);
            }
            if (array_key_exists('SwapLimit', $data)) {
                $object->setSwapLimit($data['SwapLimit']);
            }
            if (array_key_exists('KernelMemory', $data)) {
                $object->setKernelMemory($data['KernelMemory']);
            }
            if (array_key_exists('CpuCfsPeriod', $data)) {
                $object->setCpuCfsPeriod($data['CpuCfsPeriod']);
            }
            if (array_key_exists('CpuCfsQuota', $data)) {
                $object->setCpuCfsQuota($data['CpuCfsQuota']);
            }
            if (array_key_exists('CPUShares', $data)) {
                $object->setCPUShares($data['CPUShares']);
            }
            if (array_key_exists('CPUSet', $data)) {
                $object->setCPUSet($data['CPUSet']);
            }
            if (array_key_exists('OomKillDisable', $data)) {
                $object->setOomKillDisable($data['OomKillDisable']);
            }
            if (array_key_exists('IPv4Forwarding', $data)) {
                $object->setIPv4Forwarding($data['IPv4Forwarding']);
            }
            if (array_key_exists('BridgeNfIptables', $data)) {
                $object->setBridgeNfIptables($data['BridgeNfIptables']);
            }
            if (array_key_exists('BridgeNfIp6tables', $data)) {
                $object->setBridgeNfIp6tables($data['BridgeNfIp6tables']);
            }
            if (array_key_exists('Debug', $data)) {
                $object->setDebug($data['Debug']);
            }
            if (array_key_exists('NFd', $data)) {
                $object->setNFd($data['NFd']);
            }
            if (array_key_exists('NGoroutines', $data)) {
                $object->setNGoroutines($data['NGoroutines']);
            }
            if (array_key_exists('SystemTime', $data)) {
                $object->setSystemTime($data['SystemTime']);
            }
            if (array_key_exists('LoggingDriver', $data)) {
                $object->setLoggingDriver($data['LoggingDriver']);
            }
            if (array_key_exists('CgroupDriver', $data)) {
                $object->setCgroupDriver($data['CgroupDriver']);
            }
            if (array_key_exists('NEventsListener', $data)) {
                $object->setNEventsListener($data['NEventsListener']);
            }
            if (array_key_exists('KernelVersion', $data)) {
                $object->setKernelVersion($data['KernelVersion']);
            }
            if (array_key_exists('OperatingSystem', $data)) {
                $object->setOperatingSystem($data['OperatingSystem']);
            }
            if (array_key_exists('OSType', $data)) {
                $object->setOSType($data['OSType']);
            }
            if (array_key_exists('Architecture', $data)) {
                $object->setArchitecture($data['Architecture']);
            }
            if (array_key_exists('NCPU', $data)) {
                $object->setNCPU($data['NCPU']);
            }
            if (array_key_exists('MemTotal', $data)) {
                $object->setMemTotal($data['MemTotal']);
            }
            if (array_key_exists('IndexServerAddress', $data)) {
                $object->setIndexServerAddress($data['IndexServerAddress']);
            }
            if (array_key_exists('RegistryConfig', $data) && $data['RegistryConfig'] !== null) {
                $object->setRegistryConfig($this->denormalizer->denormalize($data['RegistryConfig'], 'Docker\API\Model\RegistryServiceConfig', 'json', $context));
            } elseif (array_key_exists('RegistryConfig', $data) && $data['RegistryConfig'] === null) {
                $object->setRegistryConfig(null);
            }
            if (array_key_exists('GenericResources', $data)) {
                $values_4 = [];
                foreach ($data['GenericResources'] as $value_4) {
                    $values_4[] = $this->denormalizer->denormalize($value_4, 'Docker\API\Model\GenericResourcesItem', 'json', $context);
                }
                $object->setGenericResources($values_4);
            }
            if (array_key_exists('HttpProxy', $data)) {
                $object->setHttpProxy($data['HttpProxy']);
            }
            if (array_key_exists('HttpsProxy', $data)) {
                $object->setHttpsProxy($data['HttpsProxy']);
            }
            if (array_key_exists('NoProxy', $data)) {
                $object->setNoProxy($data['NoProxy']);
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Labels', $data)) {
                $values_5 = [];
                foreach ($data['Labels'] as $value_5) {
                    $values_5[] = $value_5;
                }
                $object->setLabels($values_5);
            }
            if (array_key_exists('ExperimentalBuild', $data)) {
                $object->setExperimentalBuild($data['ExperimentalBuild']);
            }
            if (array_key_exists('ServerVersion', $data)) {
                $object->setServerVersion($data['ServerVersion']);
            }
            if (array_key_exists('ClusterStore', $data)) {
                $object->setClusterStore($data['ClusterStore']);
            }
            if (array_key_exists('ClusterAdvertise', $data)) {
                $object->setClusterAdvertise($data['ClusterAdvertise']);
            }
            if (array_key_exists('Runtimes', $data)) {
                $values_6 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Runtimes'] as $key => $value_6) {
                    $values_6[$key] = $this->denormalizer->denormalize($value_6, 'Docker\API\Model\Runtime', 'json', $context);
                }
                $object->setRuntimes($values_6);
            }
            if (array_key_exists('DefaultRuntime', $data)) {
                $object->setDefaultRuntime($data['DefaultRuntime']);
            }
            if (array_key_exists('Swarm', $data)) {
                $object->setSwarm($this->denormalizer->denormalize($data['Swarm'], 'Docker\API\Model\SwarmInfo', 'json', $context));
            }
            if (array_key_exists('LiveRestoreEnabled', $data)) {
                $object->setLiveRestoreEnabled($data['LiveRestoreEnabled']);
            }
            if (array_key_exists('Isolation', $data)) {
                $object->setIsolation($data['Isolation']);
            }
            if (array_key_exists('InitBinary', $data)) {
                $object->setInitBinary($data['InitBinary']);
            }
            if (array_key_exists('ContainerdCommit', $data)) {
                $object->setContainerdCommit($this->denormalizer->denormalize($data['ContainerdCommit'], 'Docker\API\Model\Commit', 'json', $context));
            }
            if (array_key_exists('RuncCommit', $data)) {
                $object->setRuncCommit($this->denormalizer->denormalize($data['RuncCommit'], 'Docker\API\Model\Commit', 'json', $context));
            }
            if (array_key_exists('InitCommit', $data)) {
                $object->setInitCommit($this->denormalizer->denormalize($data['InitCommit'], 'Docker\API\Model\Commit', 'json', $context));
            }
            if (array_key_exists('SecurityOptions', $data)) {
                $values_7 = [];
                foreach ($data['SecurityOptions'] as $value_7) {
                    $values_7[] = $value_7;
                }
                $object->setSecurityOptions($values_7);
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
            if ($object->isInitialized('iD') && $object->getID() !== null) {
                $data['ID'] = $object->getID();
            }
            if ($object->isInitialized('containers') && $object->getContainers() !== null) {
                $data['Containers'] = $object->getContainers();
            }
            if ($object->isInitialized('containersRunning') && $object->getContainersRunning() !== null) {
                $data['ContainersRunning'] = $object->getContainersRunning();
            }
            if ($object->isInitialized('containersPaused') && $object->getContainersPaused() !== null) {
                $data['ContainersPaused'] = $object->getContainersPaused();
            }
            if ($object->isInitialized('containersStopped') && $object->getContainersStopped() !== null) {
                $data['ContainersStopped'] = $object->getContainersStopped();
            }
            if ($object->isInitialized('images') && $object->getImages() !== null) {
                $data['Images'] = $object->getImages();
            }
            if ($object->isInitialized('driver') && $object->getDriver() !== null) {
                $data['Driver'] = $object->getDriver();
            }
            if ($object->isInitialized('driverStatus') && $object->getDriverStatus() !== null) {
                $values = [];
                foreach ($object->getDriverStatus() as $value) {
                    $values_1 = [];
                    foreach ($value as $value_1) {
                        $values_1[] = $value_1;
                    }
                    $values[] = $values_1;
                }
                $data['DriverStatus'] = $values;
            }
            if ($object->isInitialized('dockerRootDir') && $object->getDockerRootDir() !== null) {
                $data['DockerRootDir'] = $object->getDockerRootDir();
            }
            if ($object->isInitialized('systemStatus') && $object->getSystemStatus() !== null) {
                $values_2 = [];
                foreach ($object->getSystemStatus() as $value_2) {
                    $values_3 = [];
                    foreach ($value_2 as $value_3) {
                        $values_3[] = $value_3;
                    }
                    $values_2[] = $values_3;
                }
                $data['SystemStatus'] = $values_2;
            }
            if ($object->isInitialized('plugins') && $object->getPlugins() !== null) {
                $data['Plugins'] = $this->normalizer->normalize($object->getPlugins(), 'json', $context);
            }
            if ($object->isInitialized('memoryLimit') && $object->getMemoryLimit() !== null) {
                $data['MemoryLimit'] = $object->getMemoryLimit();
            }
            if ($object->isInitialized('swapLimit') && $object->getSwapLimit() !== null) {
                $data['SwapLimit'] = $object->getSwapLimit();
            }
            if ($object->isInitialized('kernelMemory') && $object->getKernelMemory() !== null) {
                $data['KernelMemory'] = $object->getKernelMemory();
            }
            if ($object->isInitialized('cpuCfsPeriod') && $object->getCpuCfsPeriod() !== null) {
                $data['CpuCfsPeriod'] = $object->getCpuCfsPeriod();
            }
            if ($object->isInitialized('cpuCfsQuota') && $object->getCpuCfsQuota() !== null) {
                $data['CpuCfsQuota'] = $object->getCpuCfsQuota();
            }
            if ($object->isInitialized('cPUShares') && $object->getCPUShares() !== null) {
                $data['CPUShares'] = $object->getCPUShares();
            }
            if ($object->isInitialized('cPUSet') && $object->getCPUSet() !== null) {
                $data['CPUSet'] = $object->getCPUSet();
            }
            if ($object->isInitialized('oomKillDisable') && $object->getOomKillDisable() !== null) {
                $data['OomKillDisable'] = $object->getOomKillDisable();
            }
            if ($object->isInitialized('iPv4Forwarding') && $object->getIPv4Forwarding() !== null) {
                $data['IPv4Forwarding'] = $object->getIPv4Forwarding();
            }
            if ($object->isInitialized('bridgeNfIptables') && $object->getBridgeNfIptables() !== null) {
                $data['BridgeNfIptables'] = $object->getBridgeNfIptables();
            }
            if ($object->isInitialized('bridgeNfIp6tables') && $object->getBridgeNfIp6tables() !== null) {
                $data['BridgeNfIp6tables'] = $object->getBridgeNfIp6tables();
            }
            if ($object->isInitialized('debug') && $object->getDebug() !== null) {
                $data['Debug'] = $object->getDebug();
            }
            if ($object->isInitialized('nFd') && $object->getNFd() !== null) {
                $data['NFd'] = $object->getNFd();
            }
            if ($object->isInitialized('nGoroutines') && $object->getNGoroutines() !== null) {
                $data['NGoroutines'] = $object->getNGoroutines();
            }
            if ($object->isInitialized('systemTime') && $object->getSystemTime() !== null) {
                $data['SystemTime'] = $object->getSystemTime();
            }
            if ($object->isInitialized('loggingDriver') && $object->getLoggingDriver() !== null) {
                $data['LoggingDriver'] = $object->getLoggingDriver();
            }
            if ($object->isInitialized('cgroupDriver') && $object->getCgroupDriver() !== null) {
                $data['CgroupDriver'] = $object->getCgroupDriver();
            }
            if ($object->isInitialized('nEventsListener') && $object->getNEventsListener() !== null) {
                $data['NEventsListener'] = $object->getNEventsListener();
            }
            if ($object->isInitialized('kernelVersion') && $object->getKernelVersion() !== null) {
                $data['KernelVersion'] = $object->getKernelVersion();
            }
            if ($object->isInitialized('operatingSystem') && $object->getOperatingSystem() !== null) {
                $data['OperatingSystem'] = $object->getOperatingSystem();
            }
            if ($object->isInitialized('oSType') && $object->getOSType() !== null) {
                $data['OSType'] = $object->getOSType();
            }
            if ($object->isInitialized('architecture') && $object->getArchitecture() !== null) {
                $data['Architecture'] = $object->getArchitecture();
            }
            if ($object->isInitialized('nCPU') && $object->getNCPU() !== null) {
                $data['NCPU'] = $object->getNCPU();
            }
            if ($object->isInitialized('memTotal') && $object->getMemTotal() !== null) {
                $data['MemTotal'] = $object->getMemTotal();
            }
            if ($object->isInitialized('indexServerAddress') && $object->getIndexServerAddress() !== null) {
                $data['IndexServerAddress'] = $object->getIndexServerAddress();
            }
            if ($object->isInitialized('registryConfig') && $object->getRegistryConfig() !== null) {
                $data['RegistryConfig'] = $this->normalizer->normalize($object->getRegistryConfig(), 'json', $context);
            }
            if ($object->isInitialized('genericResources') && $object->getGenericResources() !== null) {
                $values_4 = [];
                foreach ($object->getGenericResources() as $value_4) {
                    $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
                }
                $data['GenericResources'] = $values_4;
            }
            if ($object->isInitialized('httpProxy') && $object->getHttpProxy() !== null) {
                $data['HttpProxy'] = $object->getHttpProxy();
            }
            if ($object->isInitialized('httpsProxy') && $object->getHttpsProxy() !== null) {
                $data['HttpsProxy'] = $object->getHttpsProxy();
            }
            if ($object->isInitialized('noProxy') && $object->getNoProxy() !== null) {
                $data['NoProxy'] = $object->getNoProxy();
            }
            if ($object->isInitialized('name') && $object->getName() !== null) {
                $data['Name'] = $object->getName();
            }
            if ($object->isInitialized('labels') && $object->getLabels() !== null) {
                $values_5 = [];
                foreach ($object->getLabels() as $value_5) {
                    $values_5[] = $value_5;
                }
                $data['Labels'] = $values_5;
            }
            if ($object->isInitialized('experimentalBuild') && $object->getExperimentalBuild() !== null) {
                $data['ExperimentalBuild'] = $object->getExperimentalBuild();
            }
            if ($object->isInitialized('serverVersion') && $object->getServerVersion() !== null) {
                $data['ServerVersion'] = $object->getServerVersion();
            }
            if ($object->isInitialized('clusterStore') && $object->getClusterStore() !== null) {
                $data['ClusterStore'] = $object->getClusterStore();
            }
            if ($object->isInitialized('clusterAdvertise') && $object->getClusterAdvertise() !== null) {
                $data['ClusterAdvertise'] = $object->getClusterAdvertise();
            }
            if ($object->isInitialized('runtimes') && $object->getRuntimes() !== null) {
                $values_6 = [];
                foreach ($object->getRuntimes() as $key => $value_6) {
                    $values_6[$key] = $this->normalizer->normalize($value_6, 'json', $context);
                }
                $data['Runtimes'] = $values_6;
            }
            if ($object->isInitialized('defaultRuntime') && $object->getDefaultRuntime() !== null) {
                $data['DefaultRuntime'] = $object->getDefaultRuntime();
            }
            if ($object->isInitialized('swarm') && $object->getSwarm() !== null) {
                $data['Swarm'] = $this->normalizer->normalize($object->getSwarm(), 'json', $context);
            }
            if ($object->isInitialized('liveRestoreEnabled') && $object->getLiveRestoreEnabled() !== null) {
                $data['LiveRestoreEnabled'] = $object->getLiveRestoreEnabled();
            }
            if ($object->isInitialized('isolation') && $object->getIsolation() !== null) {
                $data['Isolation'] = $object->getIsolation();
            }
            if ($object->isInitialized('initBinary') && $object->getInitBinary() !== null) {
                $data['InitBinary'] = $object->getInitBinary();
            }
            if ($object->isInitialized('containerdCommit') && $object->getContainerdCommit() !== null) {
                $data['ContainerdCommit'] = $this->normalizer->normalize($object->getContainerdCommit(), 'json', $context);
            }
            if ($object->isInitialized('runcCommit') && $object->getRuncCommit() !== null) {
                $data['RuncCommit'] = $this->normalizer->normalize($object->getRuncCommit(), 'json', $context);
            }
            if ($object->isInitialized('initCommit') && $object->getInitCommit() !== null) {
                $data['InitCommit'] = $this->normalizer->normalize($object->getInitCommit(), 'json', $context);
            }
            if ($object->isInitialized('securityOptions') && $object->getSecurityOptions() !== null) {
                $values_7 = [];
                foreach ($object->getSecurityOptions() as $value_7) {
                    $values_7[] = $value_7;
                }
                $data['SecurityOptions'] = $values_7;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SystemInfo' => false];
        }
    }
}
