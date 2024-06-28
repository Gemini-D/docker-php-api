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
use Docker\API\Model\EngineDescription;
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
    class EngineDescriptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\EngineDescription';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\EngineDescription';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new EngineDescription();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('EngineVersion', $data)) {
                $object->setEngineVersion($data['EngineVersion']);
            }
            if (array_key_exists('Labels', $data)) {
                $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setLabels($values);
            }
            if (array_key_exists('Plugins', $data)) {
                $values_1 = [];
                foreach ($data['Plugins'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\API\Model\EngineDescriptionPluginsItem', 'json', $context);
                }
                $object->setPlugins($values_1);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('engineVersion') && $object->getEngineVersion() !== null) {
                $data['EngineVersion'] = $object->getEngineVersion();
            }
            if ($object->isInitialized('labels') && $object->getLabels() !== null) {
                $values = [];
                foreach ($object->getLabels() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Labels'] = $values;
            }
            if ($object->isInitialized('plugins') && $object->getPlugins() !== null) {
                $values_1 = [];
                foreach ($object->getPlugins() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['Plugins'] = $values_1;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\EngineDescription' => false];
        }
    }
} else {
    class EngineDescriptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\EngineDescription';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\EngineDescription';
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
            $object = new EngineDescription();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('EngineVersion', $data)) {
                $object->setEngineVersion($data['EngineVersion']);
            }
            if (array_key_exists('Labels', $data)) {
                $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setLabels($values);
            }
            if (array_key_exists('Plugins', $data)) {
                $values_1 = [];
                foreach ($data['Plugins'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\API\Model\EngineDescriptionPluginsItem', 'json', $context);
                }
                $object->setPlugins($values_1);
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
            if ($object->isInitialized('engineVersion') && $object->getEngineVersion() !== null) {
                $data['EngineVersion'] = $object->getEngineVersion();
            }
            if ($object->isInitialized('labels') && $object->getLabels() !== null) {
                $values = [];
                foreach ($object->getLabels() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Labels'] = $values;
            }
            if ($object->isInitialized('plugins') && $object->getPlugins() !== null) {
                $values_1 = [];
                foreach ($object->getPlugins() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['Plugins'] = $values_1;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\EngineDescription' => false];
        }
    }
}
