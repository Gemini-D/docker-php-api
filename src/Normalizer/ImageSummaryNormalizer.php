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
use Docker\API\Model\ImageSummary;
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
    class ImageSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ImageSummary';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ImageSummary';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ImageSummary();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Id', $data)) {
                $object->setId($data['Id']);
            }
            if (array_key_exists('ParentId', $data)) {
                $object->setParentId($data['ParentId']);
            }
            if (array_key_exists('RepoTags', $data)) {
                $values = [];
                foreach ($data['RepoTags'] as $value) {
                    $values[] = $value;
                }
                $object->setRepoTags($values);
            }
            if (array_key_exists('RepoDigests', $data)) {
                $values_1 = [];
                foreach ($data['RepoDigests'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setRepoDigests($values_1);
            }
            if (array_key_exists('Created', $data)) {
                $object->setCreated($data['Created']);
            }
            if (array_key_exists('Size', $data)) {
                $object->setSize($data['Size']);
            }
            if (array_key_exists('SharedSize', $data)) {
                $object->setSharedSize($data['SharedSize']);
            }
            if (array_key_exists('VirtualSize', $data)) {
                $object->setVirtualSize($data['VirtualSize']);
            }
            if (array_key_exists('Labels', $data)) {
                $values_2 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key => $value_2) {
                    $values_2[$key] = $value_2;
                }
                $object->setLabels($values_2);
            }
            if (array_key_exists('Containers', $data)) {
                $object->setContainers($data['Containers']);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            $data['Id'] = $object->getId();
            $data['ParentId'] = $object->getParentId();
            $values = [];
            foreach ($object->getRepoTags() as $value) {
                $values[] = $value;
            }
            $data['RepoTags'] = $values;
            $values_1 = [];
            foreach ($object->getRepoDigests() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['RepoDigests'] = $values_1;
            $data['Created'] = $object->getCreated();
            $data['Size'] = $object->getSize();
            $data['SharedSize'] = $object->getSharedSize();
            $data['VirtualSize'] = $object->getVirtualSize();
            $values_2 = [];
            foreach ($object->getLabels() as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $data['Labels'] = $values_2;
            $data['Containers'] = $object->getContainers();
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ImageSummary' => false];
        }
    }
} else {
    class ImageSummaryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ImageSummary';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ImageSummary';
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
            $object = new ImageSummary();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Id', $data)) {
                $object->setId($data['Id']);
            }
            if (array_key_exists('ParentId', $data)) {
                $object->setParentId($data['ParentId']);
            }
            if (array_key_exists('RepoTags', $data)) {
                $values = [];
                foreach ($data['RepoTags'] as $value) {
                    $values[] = $value;
                }
                $object->setRepoTags($values);
            }
            if (array_key_exists('RepoDigests', $data)) {
                $values_1 = [];
                foreach ($data['RepoDigests'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setRepoDigests($values_1);
            }
            if (array_key_exists('Created', $data)) {
                $object->setCreated($data['Created']);
            }
            if (array_key_exists('Size', $data)) {
                $object->setSize($data['Size']);
            }
            if (array_key_exists('SharedSize', $data)) {
                $object->setSharedSize($data['SharedSize']);
            }
            if (array_key_exists('VirtualSize', $data)) {
                $object->setVirtualSize($data['VirtualSize']);
            }
            if (array_key_exists('Labels', $data)) {
                $values_2 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key => $value_2) {
                    $values_2[$key] = $value_2;
                }
                $object->setLabels($values_2);
            }
            if (array_key_exists('Containers', $data)) {
                $object->setContainers($data['Containers']);
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
            $data['Id'] = $object->getId();
            $data['ParentId'] = $object->getParentId();
            $values = [];
            foreach ($object->getRepoTags() as $value) {
                $values[] = $value;
            }
            $data['RepoTags'] = $values;
            $values_1 = [];
            foreach ($object->getRepoDigests() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['RepoDigests'] = $values_1;
            $data['Created'] = $object->getCreated();
            $data['Size'] = $object->getSize();
            $data['SharedSize'] = $object->getSharedSize();
            $data['VirtualSize'] = $object->getVirtualSize();
            $values_2 = [];
            foreach ($object->getLabels() as $key => $value_2) {
                $values_2[$key] = $value_2;
            }
            $data['Labels'] = $values_2;
            $data['Containers'] = $object->getContainers();
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ImageSummary' => false];
        }
    }
}
