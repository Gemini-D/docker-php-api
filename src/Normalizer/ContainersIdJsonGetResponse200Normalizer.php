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
use Docker\API\Model\ContainersIdJsonGetResponse200;
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
    class ContainersIdJsonGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ContainersIdJsonGetResponse200';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ContainersIdJsonGetResponse200';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ContainersIdJsonGetResponse200();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Id', $data)) {
                $object->setId($data['Id']);
            }
            if (array_key_exists('Created', $data)) {
                $object->setCreated($data['Created']);
            }
            if (array_key_exists('Path', $data)) {
                $object->setPath($data['Path']);
            }
            if (array_key_exists('Args', $data)) {
                $values = [];
                foreach ($data['Args'] as $value) {
                    $values[] = $value;
                }
                $object->setArgs($values);
            }
            if (array_key_exists('State', $data)) {
                $object->setState($this->denormalizer->denormalize($data['State'], 'Docker\API\Model\ContainersIdJsonGetResponse200State', 'json', $context));
            }
            if (array_key_exists('Image', $data)) {
                $object->setImage($data['Image']);
            }
            if (array_key_exists('ResolvConfPath', $data)) {
                $object->setResolvConfPath($data['ResolvConfPath']);
            }
            if (array_key_exists('HostnamePath', $data)) {
                $object->setHostnamePath($data['HostnamePath']);
            }
            if (array_key_exists('HostsPath', $data)) {
                $object->setHostsPath($data['HostsPath']);
            }
            if (array_key_exists('LogPath', $data)) {
                $object->setLogPath($data['LogPath']);
            }
            if (array_key_exists('Node', $data)) {
                $object->setNode($data['Node']);
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('RestartCount', $data)) {
                $object->setRestartCount($data['RestartCount']);
            }
            if (array_key_exists('Driver', $data)) {
                $object->setDriver($data['Driver']);
            }
            if (array_key_exists('MountLabel', $data)) {
                $object->setMountLabel($data['MountLabel']);
            }
            if (array_key_exists('ProcessLabel', $data)) {
                $object->setProcessLabel($data['ProcessLabel']);
            }
            if (array_key_exists('AppArmorProfile', $data)) {
                $object->setAppArmorProfile($data['AppArmorProfile']);
            }
            if (array_key_exists('ExecIDs', $data)) {
                $object->setExecIDs($data['ExecIDs']);
            }
            if (array_key_exists('HostConfig', $data)) {
                $object->setHostConfig($this->denormalizer->denormalize($data['HostConfig'], 'Docker\API\Model\HostConfig', 'json', $context));
            }
            if (array_key_exists('GraphDriver', $data)) {
                $object->setGraphDriver($this->denormalizer->denormalize($data['GraphDriver'], 'Docker\API\Model\GraphDriverData', 'json', $context));
            }
            if (array_key_exists('SizeRw', $data)) {
                $object->setSizeRw($data['SizeRw']);
            }
            if (array_key_exists('SizeRootFs', $data)) {
                $object->setSizeRootFs($data['SizeRootFs']);
            }
            if (array_key_exists('Mounts', $data)) {
                $values_1 = [];
                foreach ($data['Mounts'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\API\Model\MountPoint', 'json', $context);
                }
                $object->setMounts($values_1);
            }
            if (array_key_exists('Config', $data)) {
                $object->setConfig($this->denormalizer->denormalize($data['Config'], 'Docker\API\Model\ContainerConfig', 'json', $context));
            }
            if (array_key_exists('NetworkSettings', $data)) {
                $object->setNetworkSettings($this->denormalizer->denormalize($data['NetworkSettings'], 'Docker\API\Model\NetworkSettings', 'json', $context));
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('id') && $object->getId() !== null) {
                $data['Id'] = $object->getId();
            }
            if ($object->isInitialized('created') && $object->getCreated() !== null) {
                $data['Created'] = $object->getCreated();
            }
            if ($object->isInitialized('path') && $object->getPath() !== null) {
                $data['Path'] = $object->getPath();
            }
            if ($object->isInitialized('args') && $object->getArgs() !== null) {
                $values = [];
                foreach ($object->getArgs() as $value) {
                    $values[] = $value;
                }
                $data['Args'] = $values;
            }
            if ($object->isInitialized('state') && $object->getState() !== null) {
                $data['State'] = $this->normalizer->normalize($object->getState(), 'json', $context);
            }
            if ($object->isInitialized('image') && $object->getImage() !== null) {
                $data['Image'] = $object->getImage();
            }
            if ($object->isInitialized('resolvConfPath') && $object->getResolvConfPath() !== null) {
                $data['ResolvConfPath'] = $object->getResolvConfPath();
            }
            if ($object->isInitialized('hostnamePath') && $object->getHostnamePath() !== null) {
                $data['HostnamePath'] = $object->getHostnamePath();
            }
            if ($object->isInitialized('hostsPath') && $object->getHostsPath() !== null) {
                $data['HostsPath'] = $object->getHostsPath();
            }
            if ($object->isInitialized('logPath') && $object->getLogPath() !== null) {
                $data['LogPath'] = $object->getLogPath();
            }
            if ($object->isInitialized('node') && $object->getNode() !== null) {
                $data['Node'] = $object->getNode();
            }
            if ($object->isInitialized('name') && $object->getName() !== null) {
                $data['Name'] = $object->getName();
            }
            if ($object->isInitialized('restartCount') && $object->getRestartCount() !== null) {
                $data['RestartCount'] = $object->getRestartCount();
            }
            if ($object->isInitialized('driver') && $object->getDriver() !== null) {
                $data['Driver'] = $object->getDriver();
            }
            if ($object->isInitialized('mountLabel') && $object->getMountLabel() !== null) {
                $data['MountLabel'] = $object->getMountLabel();
            }
            if ($object->isInitialized('processLabel') && $object->getProcessLabel() !== null) {
                $data['ProcessLabel'] = $object->getProcessLabel();
            }
            if ($object->isInitialized('appArmorProfile') && $object->getAppArmorProfile() !== null) {
                $data['AppArmorProfile'] = $object->getAppArmorProfile();
            }
            if ($object->isInitialized('execIDs') && $object->getExecIDs() !== null) {
                $data['ExecIDs'] = $object->getExecIDs();
            }
            if ($object->isInitialized('hostConfig') && $object->getHostConfig() !== null) {
                $data['HostConfig'] = $this->normalizer->normalize($object->getHostConfig(), 'json', $context);
            }
            if ($object->isInitialized('graphDriver') && $object->getGraphDriver() !== null) {
                $data['GraphDriver'] = $this->normalizer->normalize($object->getGraphDriver(), 'json', $context);
            }
            if ($object->isInitialized('sizeRw') && $object->getSizeRw() !== null) {
                $data['SizeRw'] = $object->getSizeRw();
            }
            if ($object->isInitialized('sizeRootFs') && $object->getSizeRootFs() !== null) {
                $data['SizeRootFs'] = $object->getSizeRootFs();
            }
            if ($object->isInitialized('mounts') && $object->getMounts() !== null) {
                $values_1 = [];
                foreach ($object->getMounts() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['Mounts'] = $values_1;
            }
            if ($object->isInitialized('config') && $object->getConfig() !== null) {
                $data['Config'] = $this->normalizer->normalize($object->getConfig(), 'json', $context);
            }
            if ($object->isInitialized('networkSettings') && $object->getNetworkSettings() !== null) {
                $data['NetworkSettings'] = $this->normalizer->normalize($object->getNetworkSettings(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ContainersIdJsonGetResponse200' => false];
        }
    }
} else {
    class ContainersIdJsonGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ContainersIdJsonGetResponse200';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ContainersIdJsonGetResponse200';
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
            $object = new ContainersIdJsonGetResponse200();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Id', $data)) {
                $object->setId($data['Id']);
            }
            if (array_key_exists('Created', $data)) {
                $object->setCreated($data['Created']);
            }
            if (array_key_exists('Path', $data)) {
                $object->setPath($data['Path']);
            }
            if (array_key_exists('Args', $data)) {
                $values = [];
                foreach ($data['Args'] as $value) {
                    $values[] = $value;
                }
                $object->setArgs($values);
            }
            if (array_key_exists('State', $data)) {
                $object->setState($this->denormalizer->denormalize($data['State'], 'Docker\API\Model\ContainersIdJsonGetResponse200State', 'json', $context));
            }
            if (array_key_exists('Image', $data)) {
                $object->setImage($data['Image']);
            }
            if (array_key_exists('ResolvConfPath', $data)) {
                $object->setResolvConfPath($data['ResolvConfPath']);
            }
            if (array_key_exists('HostnamePath', $data)) {
                $object->setHostnamePath($data['HostnamePath']);
            }
            if (array_key_exists('HostsPath', $data)) {
                $object->setHostsPath($data['HostsPath']);
            }
            if (array_key_exists('LogPath', $data)) {
                $object->setLogPath($data['LogPath']);
            }
            if (array_key_exists('Node', $data)) {
                $object->setNode($data['Node']);
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('RestartCount', $data)) {
                $object->setRestartCount($data['RestartCount']);
            }
            if (array_key_exists('Driver', $data)) {
                $object->setDriver($data['Driver']);
            }
            if (array_key_exists('MountLabel', $data)) {
                $object->setMountLabel($data['MountLabel']);
            }
            if (array_key_exists('ProcessLabel', $data)) {
                $object->setProcessLabel($data['ProcessLabel']);
            }
            if (array_key_exists('AppArmorProfile', $data)) {
                $object->setAppArmorProfile($data['AppArmorProfile']);
            }
            if (array_key_exists('ExecIDs', $data)) {
                $object->setExecIDs($data['ExecIDs']);
            }
            if (array_key_exists('HostConfig', $data)) {
                $object->setHostConfig($this->denormalizer->denormalize($data['HostConfig'], 'Docker\API\Model\HostConfig', 'json', $context));
            }
            if (array_key_exists('GraphDriver', $data)) {
                $object->setGraphDriver($this->denormalizer->denormalize($data['GraphDriver'], 'Docker\API\Model\GraphDriverData', 'json', $context));
            }
            if (array_key_exists('SizeRw', $data)) {
                $object->setSizeRw($data['SizeRw']);
            }
            if (array_key_exists('SizeRootFs', $data)) {
                $object->setSizeRootFs($data['SizeRootFs']);
            }
            if (array_key_exists('Mounts', $data)) {
                $values_1 = [];
                foreach ($data['Mounts'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\API\Model\MountPoint', 'json', $context);
                }
                $object->setMounts($values_1);
            }
            if (array_key_exists('Config', $data)) {
                $object->setConfig($this->denormalizer->denormalize($data['Config'], 'Docker\API\Model\ContainerConfig', 'json', $context));
            }
            if (array_key_exists('NetworkSettings', $data)) {
                $object->setNetworkSettings($this->denormalizer->denormalize($data['NetworkSettings'], 'Docker\API\Model\NetworkSettings', 'json', $context));
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
            if ($object->isInitialized('id') && $object->getId() !== null) {
                $data['Id'] = $object->getId();
            }
            if ($object->isInitialized('created') && $object->getCreated() !== null) {
                $data['Created'] = $object->getCreated();
            }
            if ($object->isInitialized('path') && $object->getPath() !== null) {
                $data['Path'] = $object->getPath();
            }
            if ($object->isInitialized('args') && $object->getArgs() !== null) {
                $values = [];
                foreach ($object->getArgs() as $value) {
                    $values[] = $value;
                }
                $data['Args'] = $values;
            }
            if ($object->isInitialized('state') && $object->getState() !== null) {
                $data['State'] = $this->normalizer->normalize($object->getState(), 'json', $context);
            }
            if ($object->isInitialized('image') && $object->getImage() !== null) {
                $data['Image'] = $object->getImage();
            }
            if ($object->isInitialized('resolvConfPath') && $object->getResolvConfPath() !== null) {
                $data['ResolvConfPath'] = $object->getResolvConfPath();
            }
            if ($object->isInitialized('hostnamePath') && $object->getHostnamePath() !== null) {
                $data['HostnamePath'] = $object->getHostnamePath();
            }
            if ($object->isInitialized('hostsPath') && $object->getHostsPath() !== null) {
                $data['HostsPath'] = $object->getHostsPath();
            }
            if ($object->isInitialized('logPath') && $object->getLogPath() !== null) {
                $data['LogPath'] = $object->getLogPath();
            }
            if ($object->isInitialized('node') && $object->getNode() !== null) {
                $data['Node'] = $object->getNode();
            }
            if ($object->isInitialized('name') && $object->getName() !== null) {
                $data['Name'] = $object->getName();
            }
            if ($object->isInitialized('restartCount') && $object->getRestartCount() !== null) {
                $data['RestartCount'] = $object->getRestartCount();
            }
            if ($object->isInitialized('driver') && $object->getDriver() !== null) {
                $data['Driver'] = $object->getDriver();
            }
            if ($object->isInitialized('mountLabel') && $object->getMountLabel() !== null) {
                $data['MountLabel'] = $object->getMountLabel();
            }
            if ($object->isInitialized('processLabel') && $object->getProcessLabel() !== null) {
                $data['ProcessLabel'] = $object->getProcessLabel();
            }
            if ($object->isInitialized('appArmorProfile') && $object->getAppArmorProfile() !== null) {
                $data['AppArmorProfile'] = $object->getAppArmorProfile();
            }
            if ($object->isInitialized('execIDs') && $object->getExecIDs() !== null) {
                $data['ExecIDs'] = $object->getExecIDs();
            }
            if ($object->isInitialized('hostConfig') && $object->getHostConfig() !== null) {
                $data['HostConfig'] = $this->normalizer->normalize($object->getHostConfig(), 'json', $context);
            }
            if ($object->isInitialized('graphDriver') && $object->getGraphDriver() !== null) {
                $data['GraphDriver'] = $this->normalizer->normalize($object->getGraphDriver(), 'json', $context);
            }
            if ($object->isInitialized('sizeRw') && $object->getSizeRw() !== null) {
                $data['SizeRw'] = $object->getSizeRw();
            }
            if ($object->isInitialized('sizeRootFs') && $object->getSizeRootFs() !== null) {
                $data['SizeRootFs'] = $object->getSizeRootFs();
            }
            if ($object->isInitialized('mounts') && $object->getMounts() !== null) {
                $values_1 = [];
                foreach ($object->getMounts() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['Mounts'] = $values_1;
            }
            if ($object->isInitialized('config') && $object->getConfig() !== null) {
                $data['Config'] = $this->normalizer->normalize($object->getConfig(), 'json', $context);
            }
            if ($object->isInitialized('networkSettings') && $object->getNetworkSettings() !== null) {
                $data['NetworkSettings'] = $this->normalizer->normalize($object->getNetworkSettings(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ContainersIdJsonGetResponse200' => false];
        }
    }
}
