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
use Docker\API\Model\GenericResourcesItem;
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
    class GenericResourcesItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\GenericResourcesItem';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\GenericResourcesItem';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new GenericResourcesItem();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('NamedResourceSpec', $data)) {
                $object->setNamedResourceSpec($this->denormalizer->denormalize($data['NamedResourceSpec'], 'Docker\API\Model\GenericResourcesItemNamedResourceSpec', 'json', $context));
            }
            if (array_key_exists('DiscreteResourceSpec', $data)) {
                $object->setDiscreteResourceSpec($this->denormalizer->denormalize($data['DiscreteResourceSpec'], 'Docker\API\Model\GenericResourcesItemDiscreteResourceSpec', 'json', $context));
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('namedResourceSpec') && $object->getNamedResourceSpec() !== null) {
                $data['NamedResourceSpec'] = $this->normalizer->normalize($object->getNamedResourceSpec(), 'json', $context);
            }
            if ($object->isInitialized('discreteResourceSpec') && $object->getDiscreteResourceSpec() !== null) {
                $data['DiscreteResourceSpec'] = $this->normalizer->normalize($object->getDiscreteResourceSpec(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\GenericResourcesItem' => false];
        }
    }
} else {
    class GenericResourcesItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\GenericResourcesItem';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\GenericResourcesItem';
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
            $object = new GenericResourcesItem();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('NamedResourceSpec', $data)) {
                $object->setNamedResourceSpec($this->denormalizer->denormalize($data['NamedResourceSpec'], 'Docker\API\Model\GenericResourcesItemNamedResourceSpec', 'json', $context));
            }
            if (array_key_exists('DiscreteResourceSpec', $data)) {
                $object->setDiscreteResourceSpec($this->denormalizer->denormalize($data['DiscreteResourceSpec'], 'Docker\API\Model\GenericResourcesItemDiscreteResourceSpec', 'json', $context));
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
            if ($object->isInitialized('namedResourceSpec') && $object->getNamedResourceSpec() !== null) {
                $data['NamedResourceSpec'] = $this->normalizer->normalize($object->getNamedResourceSpec(), 'json', $context);
            }
            if ($object->isInitialized('discreteResourceSpec') && $object->getDiscreteResourceSpec() !== null) {
                $data['DiscreteResourceSpec'] = $this->normalizer->normalize($object->getDiscreteResourceSpec(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\GenericResourcesItem' => false];
        }
    }
}
