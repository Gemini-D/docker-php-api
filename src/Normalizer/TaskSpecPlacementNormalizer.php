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
use Docker\API\Model\TaskSpecPlacement;
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
    class TaskSpecPlacementNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\TaskSpecPlacement';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\TaskSpecPlacement';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new TaskSpecPlacement();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Constraints', $data)) {
                $values = [];
                foreach ($data['Constraints'] ?? [] as $value) {
                    $values[] = $value;
                }
                $object->setConstraints($values);
            }
            if (array_key_exists('Preferences', $data)) {
                $values_1 = [];
                foreach ($data['Preferences'] ?? [] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\API\Model\TaskSpecPlacementPreferencesItem', 'json', $context);
                }
                $object->setPreferences($values_1);
            }
            if (array_key_exists('Platforms', $data)) {
                $values_2 = [];
                foreach ($data['Platforms'] ?? [] as $value_2) {
                    $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\API\Model\Platform', 'json', $context);
                }
                $object->setPlatforms($values_2);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('constraints') && $object->getConstraints() !== null) {
                $values = [];
                foreach ($object->getConstraints() as $value) {
                    $values[] = $value;
                }
                $data['Constraints'] = $values;
            }
            if ($object->isInitialized('preferences') && $object->getPreferences() !== null) {
                $values_1 = [];
                foreach ($object->getPreferences() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['Preferences'] = $values_1;
            }
            if ($object->isInitialized('platforms') && $object->getPlatforms() !== null) {
                $values_2 = [];
                foreach ($object->getPlatforms() as $value_2) {
                    $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
                }
                $data['Platforms'] = $values_2;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\TaskSpecPlacement' => false];
        }
    }
} else {
    class TaskSpecPlacementNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\TaskSpecPlacement';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\TaskSpecPlacement';
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
            $object = new TaskSpecPlacement();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Constraints', $data)) {
                $values = [];
                foreach ($data['Constraints'] ?? [] as $value) {
                    $values[] = $value;
                }
                $object->setConstraints($values);
            }
            if (array_key_exists('Preferences', $data)) {
                $values_1 = [];
                foreach ($data['Preferences'] ?? [] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\API\Model\TaskSpecPlacementPreferencesItem', 'json', $context);
                }
                $object->setPreferences($values_1);
            }
            if (array_key_exists('Platforms', $data)) {
                $values_2 = [];
                foreach ($data['Platforms'] ?? [] as $value_2) {
                    $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\API\Model\Platform', 'json', $context);
                }
                $object->setPlatforms($values_2);
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
            if ($object->isInitialized('constraints') && $object->getConstraints() !== null) {
                $values = [];
                foreach ($object->getConstraints() as $value) {
                    $values[] = $value;
                }
                $data['Constraints'] = $values;
            }
            if ($object->isInitialized('preferences') && $object->getPreferences() !== null) {
                $values_1 = [];
                foreach ($object->getPreferences() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['Preferences'] = $values_1;
            }
            if ($object->isInitialized('platforms') && $object->getPlatforms() !== null) {
                $values_2 = [];
                foreach ($object->getPlatforms() as $value_2) {
                    $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
                }
                $data['Platforms'] = $values_2;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\TaskSpecPlacement' => false];
        }
    }
}
