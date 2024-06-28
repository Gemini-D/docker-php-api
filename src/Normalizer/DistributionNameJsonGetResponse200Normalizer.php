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
use Docker\API\Model\DistributionNameJsonGetResponse200;
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
    class DistributionNameJsonGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\DistributionNameJsonGetResponse200';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\DistributionNameJsonGetResponse200';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new DistributionNameJsonGetResponse200();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Descriptor', $data)) {
                $object->setDescriptor($this->denormalizer->denormalize($data['Descriptor'], 'Docker\API\Model\DistributionNameJsonGetResponse200Descriptor', 'json', $context));
            }
            if (array_key_exists('Platforms', $data)) {
                $values = [];
                foreach ($data['Platforms'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem', 'json', $context);
                }
                $object->setPlatforms($values);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            $data['Descriptor'] = $this->normalizer->normalize($object->getDescriptor(), 'json', $context);
            $values = [];
            foreach ($object->getPlatforms() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Platforms'] = $values;
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\DistributionNameJsonGetResponse200' => false];
        }
    }
} else {
    class DistributionNameJsonGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\DistributionNameJsonGetResponse200';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\DistributionNameJsonGetResponse200';
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
            $object = new DistributionNameJsonGetResponse200();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Descriptor', $data)) {
                $object->setDescriptor($this->denormalizer->denormalize($data['Descriptor'], 'Docker\API\Model\DistributionNameJsonGetResponse200Descriptor', 'json', $context));
            }
            if (array_key_exists('Platforms', $data)) {
                $values = [];
                foreach ($data['Platforms'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem', 'json', $context);
                }
                $object->setPlatforms($values);
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
            $data['Descriptor'] = $this->normalizer->normalize($object->getDescriptor(), 'json', $context);
            $values = [];
            foreach ($object->getPlatforms() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['Platforms'] = $values;
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\DistributionNameJsonGetResponse200' => false];
        }
    }
}
