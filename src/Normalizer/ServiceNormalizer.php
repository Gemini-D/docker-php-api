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
use Docker\API\Model\Service;
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
    class ServiceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Service';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Service';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Service();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('ID', $data)) {
                $object->setID($data['ID']);
            }
            if (array_key_exists('Version', $data)) {
                $object->setVersion($this->denormalizer->denormalize($data['Version'], 'Docker\API\Model\ObjectVersion', 'json', $context));
            }
            if (array_key_exists('CreatedAt', $data)) {
                $object->setCreatedAt($data['CreatedAt']);
            }
            if (array_key_exists('UpdatedAt', $data)) {
                $object->setUpdatedAt($data['UpdatedAt']);
            }
            if (array_key_exists('Spec', $data)) {
                $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\API\Model\ServiceSpec', 'json', $context));
            }
            if (array_key_exists('Endpoint', $data)) {
                $object->setEndpoint($this->denormalizer->denormalize($data['Endpoint'], 'Docker\API\Model\ServiceEndpoint', 'json', $context));
            }
            if (array_key_exists('UpdateStatus', $data)) {
                $object->setUpdateStatus($this->denormalizer->denormalize($data['UpdateStatus'], 'Docker\API\Model\ServiceUpdateStatus', 'json', $context));
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('iD') && $object->getID() !== null) {
                $data['ID'] = $object->getID();
            }
            if ($object->isInitialized('version') && $object->getVersion() !== null) {
                $data['Version'] = $this->normalizer->normalize($object->getVersion(), 'json', $context);
            }
            if ($object->isInitialized('createdAt') && $object->getCreatedAt() !== null) {
                $data['CreatedAt'] = $object->getCreatedAt();
            }
            if ($object->isInitialized('updatedAt') && $object->getUpdatedAt() !== null) {
                $data['UpdatedAt'] = $object->getUpdatedAt();
            }
            if ($object->isInitialized('spec') && $object->getSpec() !== null) {
                $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
            }
            if ($object->isInitialized('endpoint') && $object->getEndpoint() !== null) {
                $data['Endpoint'] = $this->normalizer->normalize($object->getEndpoint(), 'json', $context);
            }
            if ($object->isInitialized('updateStatus') && $object->getUpdateStatus() !== null) {
                $data['UpdateStatus'] = $this->normalizer->normalize($object->getUpdateStatus(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Service' => false];
        }
    }
} else {
    class ServiceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Service';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Service';
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
            $object = new Service();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('ID', $data)) {
                $object->setID($data['ID']);
            }
            if (array_key_exists('Version', $data)) {
                $object->setVersion($this->denormalizer->denormalize($data['Version'], 'Docker\API\Model\ObjectVersion', 'json', $context));
            }
            if (array_key_exists('CreatedAt', $data)) {
                $object->setCreatedAt($data['CreatedAt']);
            }
            if (array_key_exists('UpdatedAt', $data)) {
                $object->setUpdatedAt($data['UpdatedAt']);
            }
            if (array_key_exists('Spec', $data)) {
                $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\API\Model\ServiceSpec', 'json', $context));
            }
            if (array_key_exists('Endpoint', $data)) {
                $object->setEndpoint($this->denormalizer->denormalize($data['Endpoint'], 'Docker\API\Model\ServiceEndpoint', 'json', $context));
            }
            if (array_key_exists('UpdateStatus', $data)) {
                $object->setUpdateStatus($this->denormalizer->denormalize($data['UpdateStatus'], 'Docker\API\Model\ServiceUpdateStatus', 'json', $context));
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
            if ($object->isInitialized('version') && $object->getVersion() !== null) {
                $data['Version'] = $this->normalizer->normalize($object->getVersion(), 'json', $context);
            }
            if ($object->isInitialized('createdAt') && $object->getCreatedAt() !== null) {
                $data['CreatedAt'] = $object->getCreatedAt();
            }
            if ($object->isInitialized('updatedAt') && $object->getUpdatedAt() !== null) {
                $data['UpdatedAt'] = $object->getUpdatedAt();
            }
            if ($object->isInitialized('spec') && $object->getSpec() !== null) {
                $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
            }
            if ($object->isInitialized('endpoint') && $object->getEndpoint() !== null) {
                $data['Endpoint'] = $this->normalizer->normalize($object->getEndpoint(), 'json', $context);
            }
            if ($object->isInitialized('updateStatus') && $object->getUpdateStatus() !== null) {
                $data['UpdateStatus'] = $this->normalizer->normalize($object->getUpdateStatus(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Service' => false];
        }
    }
}
