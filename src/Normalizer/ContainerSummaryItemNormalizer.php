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
use Docker\API\Model\ContainerSummaryItem;
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
    class ContainerSummaryItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ContainerSummaryItem';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ContainerSummaryItem';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ContainerSummaryItem();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Id', $data)) {
                $object->setId($data['Id']);
            }
            if (array_key_exists('Names', $data)) {
                $values = [];
                foreach ($data['Names'] as $value) {
                    $values[] = $value;
                }
                $object->setNames($values);
            }
            if (array_key_exists('Image', $data)) {
                $object->setImage($data['Image']);
            }
            if (array_key_exists('ImageID', $data)) {
                $object->setImageID($data['ImageID']);
            }
            if (array_key_exists('Command', $data)) {
                $object->setCommand($data['Command']);
            }
            if (array_key_exists('Created', $data)) {
                $object->setCreated($data['Created']);
            }
            if (array_key_exists('Ports', $data)) {
                $values_1 = [];
                foreach ($data['Ports'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\API\Model\Port', 'json', $context);
                }
                $object->setPorts($values_1);
            }
            if (array_key_exists('SizeRw', $data)) {
                $object->setSizeRw($data['SizeRw']);
            }
            if (array_key_exists('SizeRootFs', $data)) {
                $object->setSizeRootFs($data['SizeRootFs']);
            }
            if (array_key_exists('Labels', $data)) {
                $values_2 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key => $value_2) {
                    $values_2[$key] = $value_2;
                }
                $object->setLabels($values_2);
            }
            if (array_key_exists('State', $data)) {
                $object->setState($data['State']);
            }
            if (array_key_exists('Status', $data)) {
                $object->setStatus($data['Status']);
            }
            if (array_key_exists('HostConfig', $data)) {
                $object->setHostConfig($this->denormalizer->denormalize($data['HostConfig'], 'Docker\API\Model\ContainerSummaryItemHostConfig', 'json', $context));
            }
            if (array_key_exists('NetworkSettings', $data)) {
                $object->setNetworkSettings($this->denormalizer->denormalize($data['NetworkSettings'], 'Docker\API\Model\ContainerSummaryItemNetworkSettings', 'json', $context));
            }
            if (array_key_exists('Mounts', $data)) {
                $values_3 = [];
                foreach ($data['Mounts'] as $value_3) {
                    $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\API\Model\Mount', 'json', $context);
                }
                $object->setMounts($values_3);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('id') && $object->getId() !== null) {
                $data['Id'] = $object->getId();
            }
            if ($object->isInitialized('names') && $object->getNames() !== null) {
                $values = [];
                foreach ($object->getNames() as $value) {
                    $values[] = $value;
                }
                $data['Names'] = $values;
            }
            if ($object->isInitialized('image') && $object->getImage() !== null) {
                $data['Image'] = $object->getImage();
            }
            if ($object->isInitialized('imageID') && $object->getImageID() !== null) {
                $data['ImageID'] = $object->getImageID();
            }
            if ($object->isInitialized('command') && $object->getCommand() !== null) {
                $data['Command'] = $object->getCommand();
            }
            if ($object->isInitialized('created') && $object->getCreated() !== null) {
                $data['Created'] = $object->getCreated();
            }
            if ($object->isInitialized('ports') && $object->getPorts() !== null) {
                $values_1 = [];
                foreach ($object->getPorts() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['Ports'] = $values_1;
            }
            if ($object->isInitialized('sizeRw') && $object->getSizeRw() !== null) {
                $data['SizeRw'] = $object->getSizeRw();
            }
            if ($object->isInitialized('sizeRootFs') && $object->getSizeRootFs() !== null) {
                $data['SizeRootFs'] = $object->getSizeRootFs();
            }
            if ($object->isInitialized('labels') && $object->getLabels() !== null) {
                $values_2 = [];
                foreach ($object->getLabels() as $key => $value_2) {
                    $values_2[$key] = $value_2;
                }
                $data['Labels'] = $values_2;
            }
            if ($object->isInitialized('state') && $object->getState() !== null) {
                $data['State'] = $object->getState();
            }
            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $data['Status'] = $object->getStatus();
            }
            if ($object->isInitialized('hostConfig') && $object->getHostConfig() !== null) {
                $data['HostConfig'] = $this->normalizer->normalize($object->getHostConfig(), 'json', $context);
            }
            if ($object->isInitialized('networkSettings') && $object->getNetworkSettings() !== null) {
                $data['NetworkSettings'] = $this->normalizer->normalize($object->getNetworkSettings(), 'json', $context);
            }
            if ($object->isInitialized('mounts') && $object->getMounts() !== null) {
                $values_3 = [];
                foreach ($object->getMounts() as $value_3) {
                    $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
                }
                $data['Mounts'] = $values_3;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ContainerSummaryItem' => false];
        }
    }
} else {
    class ContainerSummaryItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ContainerSummaryItem';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ContainerSummaryItem';
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
            $object = new ContainerSummaryItem();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Id', $data)) {
                $object->setId($data['Id']);
            }
            if (array_key_exists('Names', $data)) {
                $values = [];
                foreach ($data['Names'] as $value) {
                    $values[] = $value;
                }
                $object->setNames($values);
            }
            if (array_key_exists('Image', $data)) {
                $object->setImage($data['Image']);
            }
            if (array_key_exists('ImageID', $data)) {
                $object->setImageID($data['ImageID']);
            }
            if (array_key_exists('Command', $data)) {
                $object->setCommand($data['Command']);
            }
            if (array_key_exists('Created', $data)) {
                $object->setCreated($data['Created']);
            }
            if (array_key_exists('Ports', $data)) {
                $values_1 = [];
                foreach ($data['Ports'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\API\Model\Port', 'json', $context);
                }
                $object->setPorts($values_1);
            }
            if (array_key_exists('SizeRw', $data)) {
                $object->setSizeRw($data['SizeRw']);
            }
            if (array_key_exists('SizeRootFs', $data)) {
                $object->setSizeRootFs($data['SizeRootFs']);
            }
            if (array_key_exists('Labels', $data)) {
                $values_2 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key => $value_2) {
                    $values_2[$key] = $value_2;
                }
                $object->setLabels($values_2);
            }
            if (array_key_exists('State', $data)) {
                $object->setState($data['State']);
            }
            if (array_key_exists('Status', $data)) {
                $object->setStatus($data['Status']);
            }
            if (array_key_exists('HostConfig', $data)) {
                $object->setHostConfig($this->denormalizer->denormalize($data['HostConfig'], 'Docker\API\Model\ContainerSummaryItemHostConfig', 'json', $context));
            }
            if (array_key_exists('NetworkSettings', $data)) {
                $object->setNetworkSettings($this->denormalizer->denormalize($data['NetworkSettings'], 'Docker\API\Model\ContainerSummaryItemNetworkSettings', 'json', $context));
            }
            if (array_key_exists('Mounts', $data)) {
                $values_3 = [];
                foreach ($data['Mounts'] as $value_3) {
                    $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\API\Model\Mount', 'json', $context);
                }
                $object->setMounts($values_3);
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
            if ($object->isInitialized('names') && $object->getNames() !== null) {
                $values = [];
                foreach ($object->getNames() as $value) {
                    $values[] = $value;
                }
                $data['Names'] = $values;
            }
            if ($object->isInitialized('image') && $object->getImage() !== null) {
                $data['Image'] = $object->getImage();
            }
            if ($object->isInitialized('imageID') && $object->getImageID() !== null) {
                $data['ImageID'] = $object->getImageID();
            }
            if ($object->isInitialized('command') && $object->getCommand() !== null) {
                $data['Command'] = $object->getCommand();
            }
            if ($object->isInitialized('created') && $object->getCreated() !== null) {
                $data['Created'] = $object->getCreated();
            }
            if ($object->isInitialized('ports') && $object->getPorts() !== null) {
                $values_1 = [];
                foreach ($object->getPorts() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['Ports'] = $values_1;
            }
            if ($object->isInitialized('sizeRw') && $object->getSizeRw() !== null) {
                $data['SizeRw'] = $object->getSizeRw();
            }
            if ($object->isInitialized('sizeRootFs') && $object->getSizeRootFs() !== null) {
                $data['SizeRootFs'] = $object->getSizeRootFs();
            }
            if ($object->isInitialized('labels') && $object->getLabels() !== null) {
                $values_2 = [];
                foreach ($object->getLabels() as $key => $value_2) {
                    $values_2[$key] = $value_2;
                }
                $data['Labels'] = $values_2;
            }
            if ($object->isInitialized('state') && $object->getState() !== null) {
                $data['State'] = $object->getState();
            }
            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $data['Status'] = $object->getStatus();
            }
            if ($object->isInitialized('hostConfig') && $object->getHostConfig() !== null) {
                $data['HostConfig'] = $this->normalizer->normalize($object->getHostConfig(), 'json', $context);
            }
            if ($object->isInitialized('networkSettings') && $object->getNetworkSettings() !== null) {
                $data['NetworkSettings'] = $this->normalizer->normalize($object->getNetworkSettings(), 'json', $context);
            }
            if ($object->isInitialized('mounts') && $object->getMounts() !== null) {
                $values_3 = [];
                foreach ($object->getMounts() as $value_3) {
                    $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
                }
                $data['Mounts'] = $values_3;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ContainerSummaryItem' => false];
        }
    }
}
