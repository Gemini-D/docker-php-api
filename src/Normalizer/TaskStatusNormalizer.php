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
use Docker\API\Model\TaskStatus;
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
    class TaskStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\TaskStatus';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\TaskStatus';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new TaskStatus();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Timestamp', $data)) {
                $object->setTimestamp($data['Timestamp']);
            }
            if (array_key_exists('State', $data)) {
                $object->setState($data['State']);
            }
            if (array_key_exists('Message', $data)) {
                $object->setMessage($data['Message']);
            }
            if (array_key_exists('Err', $data)) {
                $object->setErr($data['Err']);
            }
            if (array_key_exists('ContainerStatus', $data)) {
                $object->setContainerStatus($this->denormalizer->denormalize($data['ContainerStatus'], 'Docker\API\Model\TaskStatusContainerStatus', 'json', $context));
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('timestamp') && $object->getTimestamp() !== null) {
                $data['Timestamp'] = $object->getTimestamp();
            }
            if ($object->isInitialized('state') && $object->getState() !== null) {
                $data['State'] = $object->getState();
            }
            if ($object->isInitialized('message') && $object->getMessage() !== null) {
                $data['Message'] = $object->getMessage();
            }
            if ($object->isInitialized('err') && $object->getErr() !== null) {
                $data['Err'] = $object->getErr();
            }
            if ($object->isInitialized('containerStatus') && $object->getContainerStatus() !== null) {
                $data['ContainerStatus'] = $this->normalizer->normalize($object->getContainerStatus(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\TaskStatus' => false];
        }
    }
} else {
    class TaskStatusNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\TaskStatus';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\TaskStatus';
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
            $object = new TaskStatus();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Timestamp', $data)) {
                $object->setTimestamp($data['Timestamp']);
            }
            if (array_key_exists('State', $data)) {
                $object->setState($data['State']);
            }
            if (array_key_exists('Message', $data)) {
                $object->setMessage($data['Message']);
            }
            if (array_key_exists('Err', $data)) {
                $object->setErr($data['Err']);
            }
            if (array_key_exists('ContainerStatus', $data)) {
                $object->setContainerStatus($this->denormalizer->denormalize($data['ContainerStatus'], 'Docker\API\Model\TaskStatusContainerStatus', 'json', $context));
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
            if ($object->isInitialized('timestamp') && $object->getTimestamp() !== null) {
                $data['Timestamp'] = $object->getTimestamp();
            }
            if ($object->isInitialized('state') && $object->getState() !== null) {
                $data['State'] = $object->getState();
            }
            if ($object->isInitialized('message') && $object->getMessage() !== null) {
                $data['Message'] = $object->getMessage();
            }
            if ($object->isInitialized('err') && $object->getErr() !== null) {
                $data['Err'] = $object->getErr();
            }
            if ($object->isInitialized('containerStatus') && $object->getContainerStatus() !== null) {
                $data['ContainerStatus'] = $this->normalizer->normalize($object->getContainerStatus(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\TaskStatus' => false];
        }
    }
}
