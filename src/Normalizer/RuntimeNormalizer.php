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
use Docker\API\Model\Runtime;
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
    class RuntimeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Runtime';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Runtime';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Runtime();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('path', $data)) {
                $object->setPath($data['path']);
            }
            if (array_key_exists('runtimeArgs', $data) && $data['runtimeArgs'] !== null) {
                $values = [];
                foreach ($data['runtimeArgs'] as $value) {
                    $values[] = $value;
                }
                $object->setRuntimeArgs($values);
            } elseif (array_key_exists('runtimeArgs', $data) && $data['runtimeArgs'] === null) {
                $object->setRuntimeArgs(null);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('path') && $object->getPath() !== null) {
                $data['path'] = $object->getPath();
            }
            if ($object->isInitialized('runtimeArgs') && $object->getRuntimeArgs() !== null) {
                $values = [];
                foreach ($object->getRuntimeArgs() as $value) {
                    $values[] = $value;
                }
                $data['runtimeArgs'] = $values;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Runtime' => false];
        }
    }
} else {
    class RuntimeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Runtime';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Runtime';
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
            $object = new Runtime();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('path', $data)) {
                $object->setPath($data['path']);
            }
            if (array_key_exists('runtimeArgs', $data) && $data['runtimeArgs'] !== null) {
                $values = [];
                foreach ($data['runtimeArgs'] as $value) {
                    $values[] = $value;
                }
                $object->setRuntimeArgs($values);
            } elseif (array_key_exists('runtimeArgs', $data) && $data['runtimeArgs'] === null) {
                $object->setRuntimeArgs(null);
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
            if ($object->isInitialized('path') && $object->getPath() !== null) {
                $data['path'] = $object->getPath();
            }
            if ($object->isInitialized('runtimeArgs') && $object->getRuntimeArgs() !== null) {
                $values = [];
                foreach ($object->getRuntimeArgs() as $value) {
                    $values[] = $value;
                }
                $data['runtimeArgs'] = $values;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Runtime' => false];
        }
    }
}
