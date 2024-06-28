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
use Docker\API\Model\PluginSettings;
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
    class PluginSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\PluginSettings';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\PluginSettings';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new PluginSettings();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Mounts', $data)) {
                $values = [];
                foreach ($data['Mounts'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\PluginMount', 'json', $context);
                }
                $object->setMounts($values);
            }
            if (array_key_exists('Env', $data)) {
                $values_1 = [];
                foreach ($data['Env'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setEnv($values_1);
            }
            if (array_key_exists('Args', $data)) {
                $values_2 = [];
                foreach ($data['Args'] as $value_2) {
                    $values_2[] = $value_2;
                }
                $object->setArgs($values_2);
            }
            if (array_key_exists('Devices', $data)) {
                $values_3 = [];
                foreach ($data['Devices'] as $value_3) {
                    $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\API\Model\PluginDevice', 'json', $context);
                }
                $object->setDevices($values_3);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            $values = [];
            foreach ($object->getMounts() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Mounts'] = $values;
            $values_1 = [];
            foreach ($object->getEnv() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Env'] = $values_1;
            $values_2 = [];
            foreach ($object->getArgs() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['Args'] = $values_2;
            $values_3 = [];
            foreach ($object->getDevices() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['Devices'] = $values_3;
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\PluginSettings' => false];
        }
    }
} else {
    class PluginSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\PluginSettings';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\PluginSettings';
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
            $object = new PluginSettings();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Mounts', $data)) {
                $values = [];
                foreach ($data['Mounts'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\PluginMount', 'json', $context);
                }
                $object->setMounts($values);
            }
            if (array_key_exists('Env', $data)) {
                $values_1 = [];
                foreach ($data['Env'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setEnv($values_1);
            }
            if (array_key_exists('Args', $data)) {
                $values_2 = [];
                foreach ($data['Args'] as $value_2) {
                    $values_2[] = $value_2;
                }
                $object->setArgs($values_2);
            }
            if (array_key_exists('Devices', $data)) {
                $values_3 = [];
                foreach ($data['Devices'] as $value_3) {
                    $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\API\Model\PluginDevice', 'json', $context);
                }
                $object->setDevices($values_3);
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
            $values = [];
            foreach ($object->getMounts() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Mounts'] = $values;
            $values_1 = [];
            foreach ($object->getEnv() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Env'] = $values_1;
            $values_2 = [];
            foreach ($object->getArgs() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['Args'] = $values_2;
            $values_3 = [];
            foreach ($object->getDevices() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['Devices'] = $values_3;
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\PluginSettings' => false];
        }
    }
}
