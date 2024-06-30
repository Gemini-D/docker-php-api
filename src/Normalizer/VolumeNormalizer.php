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
use Docker\API\Model\Volume;
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
    class VolumeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Volume';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Volume';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Volume();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Driver', $data)) {
                $object->setDriver($data['Driver']);
            }
            if (array_key_exists('Mountpoint', $data)) {
                $object->setMountpoint($data['Mountpoint']);
            }
            if (array_key_exists('CreatedAt', $data)) {
                $object->setCreatedAt($data['CreatedAt']);
            }
            if (array_key_exists('Status', $data)) {
                $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Status'] ?? [] as $key => $value) {
                    if ($value === null) {
                        $values[$key] = null;
                        continue;
                    }
                    $values[$key] = $value;
                }
                $object->setStatus($values);
            }
            if (array_key_exists('Labels', $data)) {
                $values_1 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] ?? [] as $key_1 => $value_1) {
                    if ($value_1 === null) {
                        $values_1[$key_1] = null;
                        continue;
                    }
                    $values_1[$key_1] = $value_1;
                }
                $object->setLabels($values_1);
            }
            if (array_key_exists('Scope', $data)) {
                $object->setScope($data['Scope']);
            }
            if (array_key_exists('Options', $data)) {
                $values_2 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Options'] ?? [] as $key_2 => $value_2) {
                    if ($value_2 === null) {
                        $values_2[$key_2] = null;
                        continue;
                    }
                    $values_2[$key_2] = $value_2;
                }
                $object->setOptions($values_2);
            }
            if (array_key_exists('UsageData', $data) && $data['UsageData'] !== null) {
                $object->setUsageData($this->denormalizer->denormalize($data['UsageData'], 'Docker\API\Model\VolumeUsageData', 'json', $context));
            } elseif (array_key_exists('UsageData', $data) && $data['UsageData'] === null) {
                $object->setUsageData(null);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            $data['Name'] = $object->getName();
            $data['Driver'] = $object->getDriver();
            $data['Mountpoint'] = $object->getMountpoint();
            if ($object->isInitialized('createdAt') && $object->getCreatedAt() !== null) {
                $data['CreatedAt'] = $object->getCreatedAt();
            }
            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $values = [];
                foreach ($object->getStatus() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Status'] = $values;
            }
            $values_1 = [];
            foreach ($object->getLabels() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $data['Labels'] = $values_1;
            $data['Scope'] = $object->getScope();
            $values_2 = [];
            foreach ($object->getOptions() as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $data['Options'] = $values_2;
            if ($object->isInitialized('usageData') && $object->getUsageData() !== null) {
                $data['UsageData'] = $this->normalizer->normalize($object->getUsageData(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Volume' => false];
        }
    }
} else {
    class VolumeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Volume';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Volume';
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
            $object = new Volume();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Driver', $data)) {
                $object->setDriver($data['Driver']);
            }
            if (array_key_exists('Mountpoint', $data)) {
                $object->setMountpoint($data['Mountpoint']);
            }
            if (array_key_exists('CreatedAt', $data)) {
                $object->setCreatedAt($data['CreatedAt']);
            }
            if (array_key_exists('Status', $data)) {
                $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Status'] ?? [] as $key => $value) {
                    if ($value === null) {
                        $values[$key] = null;
                        continue;
                    }
                    $values[$key] = $value;
                }
                $object->setStatus($values);
            }
            if (array_key_exists('Labels', $data)) {
                $values_1 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] ?? [] as $key_1 => $value_1) {
                    if ($value_1 === null) {
                        $values_1[$key_1] = null;
                        continue;
                    }
                    $values_1[$key_1] = $value_1;
                }
                $object->setLabels($values_1);
            }
            if (array_key_exists('Scope', $data)) {
                $object->setScope($data['Scope']);
            }
            if (array_key_exists('Options', $data)) {
                $values_2 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Options'] ?? [] as $key_2 => $value_2) {
                    if ($value_2 === null) {
                        $values_2[$key_2] = null;
                        continue;
                    }
                    $values_2[$key_2] = $value_2;
                }
                $object->setOptions($values_2);
            }
            if (array_key_exists('UsageData', $data) && $data['UsageData'] !== null) {
                $object->setUsageData($this->denormalizer->denormalize($data['UsageData'], 'Docker\API\Model\VolumeUsageData', 'json', $context));
            } elseif (array_key_exists('UsageData', $data) && $data['UsageData'] === null) {
                $object->setUsageData(null);
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
            $data['Name'] = $object->getName();
            $data['Driver'] = $object->getDriver();
            $data['Mountpoint'] = $object->getMountpoint();
            if ($object->isInitialized('createdAt') && $object->getCreatedAt() !== null) {
                $data['CreatedAt'] = $object->getCreatedAt();
            }
            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $values = [];
                foreach ($object->getStatus() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Status'] = $values;
            }
            $values_1 = [];
            foreach ($object->getLabels() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $data['Labels'] = $values_1;
            $data['Scope'] = $object->getScope();
            $values_2 = [];
            foreach ($object->getOptions() as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $data['Options'] = $values_2;
            if ($object->isInitialized('usageData') && $object->getUsageData() !== null) {
                $data['UsageData'] = $this->normalizer->normalize($object->getUsageData(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Volume' => false];
        }
    }
}
