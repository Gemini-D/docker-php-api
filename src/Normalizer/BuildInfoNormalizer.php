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
use Docker\API\Model\BuildInfo;
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
    class BuildInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\BuildInfo';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\BuildInfo';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new BuildInfo();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('id', $data)) {
                $object->setId($data['id']);
            }
            if (array_key_exists('stream', $data)) {
                $object->setStream($data['stream']);
            }
            if (array_key_exists('error', $data)) {
                $object->setError($data['error']);
            }
            if (array_key_exists('errorDetail', $data)) {
                $object->setErrorDetail($this->denormalizer->denormalize($data['errorDetail'], 'Docker\API\Model\ErrorDetail', 'json', $context));
            }
            if (array_key_exists('status', $data)) {
                $object->setStatus($data['status']);
            }
            if (array_key_exists('progress', $data)) {
                $object->setProgress($data['progress']);
            }
            if (array_key_exists('progressDetail', $data)) {
                $object->setProgressDetail($this->denormalizer->denormalize($data['progressDetail'], 'Docker\API\Model\ProgressDetail', 'json', $context));
            }
            if (array_key_exists('aux', $data)) {
                $object->setAux($this->denormalizer->denormalize($data['aux'], 'Docker\API\Model\ImageID', 'json', $context));
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('id') && $object->getId() !== null) {
                $data['id'] = $object->getId();
            }
            if ($object->isInitialized('stream') && $object->getStream() !== null) {
                $data['stream'] = $object->getStream();
            }
            if ($object->isInitialized('error') && $object->getError() !== null) {
                $data['error'] = $object->getError();
            }
            if ($object->isInitialized('errorDetail') && $object->getErrorDetail() !== null) {
                $data['errorDetail'] = $this->normalizer->normalize($object->getErrorDetail(), 'json', $context);
            }
            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $data['status'] = $object->getStatus();
            }
            if ($object->isInitialized('progress') && $object->getProgress() !== null) {
                $data['progress'] = $object->getProgress();
            }
            if ($object->isInitialized('progressDetail') && $object->getProgressDetail() !== null) {
                $data['progressDetail'] = $this->normalizer->normalize($object->getProgressDetail(), 'json', $context);
            }
            if ($object->isInitialized('aux') && $object->getAux() !== null) {
                $data['aux'] = $this->normalizer->normalize($object->getAux(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\BuildInfo' => false];
        }
    }
} else {
    class BuildInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\BuildInfo';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\BuildInfo';
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
            $object = new BuildInfo();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('id', $data)) {
                $object->setId($data['id']);
            }
            if (array_key_exists('stream', $data)) {
                $object->setStream($data['stream']);
            }
            if (array_key_exists('error', $data)) {
                $object->setError($data['error']);
            }
            if (array_key_exists('errorDetail', $data)) {
                $object->setErrorDetail($this->denormalizer->denormalize($data['errorDetail'], 'Docker\API\Model\ErrorDetail', 'json', $context));
            }
            if (array_key_exists('status', $data)) {
                $object->setStatus($data['status']);
            }
            if (array_key_exists('progress', $data)) {
                $object->setProgress($data['progress']);
            }
            if (array_key_exists('progressDetail', $data)) {
                $object->setProgressDetail($this->denormalizer->denormalize($data['progressDetail'], 'Docker\API\Model\ProgressDetail', 'json', $context));
            }
            if (array_key_exists('aux', $data)) {
                $object->setAux($this->denormalizer->denormalize($data['aux'], 'Docker\API\Model\ImageID', 'json', $context));
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
                $data['id'] = $object->getId();
            }
            if ($object->isInitialized('stream') && $object->getStream() !== null) {
                $data['stream'] = $object->getStream();
            }
            if ($object->isInitialized('error') && $object->getError() !== null) {
                $data['error'] = $object->getError();
            }
            if ($object->isInitialized('errorDetail') && $object->getErrorDetail() !== null) {
                $data['errorDetail'] = $this->normalizer->normalize($object->getErrorDetail(), 'json', $context);
            }
            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $data['status'] = $object->getStatus();
            }
            if ($object->isInitialized('progress') && $object->getProgress() !== null) {
                $data['progress'] = $object->getProgress();
            }
            if ($object->isInitialized('progressDetail') && $object->getProgressDetail() !== null) {
                $data['progressDetail'] = $this->normalizer->normalize($object->getProgressDetail(), 'json', $context);
            }
            if ($object->isInitialized('aux') && $object->getAux() !== null) {
                $data['aux'] = $this->normalizer->normalize($object->getAux(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\BuildInfo' => false];
        }
    }
}
