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
use Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem;
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
    class DistributionNameJsonGetResponse200PlatformsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new DistributionNameJsonGetResponse200PlatformsItem();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Architecture', $data)) {
                $object->setArchitecture($data['Architecture']);
            }
            if (array_key_exists('OS', $data)) {
                $object->setOS($data['OS']);
            }
            if (array_key_exists('OSVersion', $data)) {
                $object->setOSVersion($data['OSVersion']);
            }
            if (array_key_exists('OSFeatures', $data)) {
                $values = [];
                foreach ($data['OSFeatures'] as $value) {
                    $values[] = $value;
                }
                $object->setOSFeatures($values);
            }
            if (array_key_exists('Variant', $data)) {
                $object->setVariant($data['Variant']);
            }
            if (array_key_exists('Features', $data)) {
                $values_1 = [];
                foreach ($data['Features'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setFeatures($values_1);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('architecture') && $object->getArchitecture() !== null) {
                $data['Architecture'] = $object->getArchitecture();
            }
            if ($object->isInitialized('oS') && $object->getOS() !== null) {
                $data['OS'] = $object->getOS();
            }
            if ($object->isInitialized('oSVersion') && $object->getOSVersion() !== null) {
                $data['OSVersion'] = $object->getOSVersion();
            }
            if ($object->isInitialized('oSFeatures') && $object->getOSFeatures() !== null) {
                $values = [];
                foreach ($object->getOSFeatures() as $value) {
                    $values[] = $value;
                }
                $data['OSFeatures'] = $values;
            }
            if ($object->isInitialized('variant') && $object->getVariant() !== null) {
                $data['Variant'] = $object->getVariant();
            }
            if ($object->isInitialized('features') && $object->getFeatures() !== null) {
                $values_1 = [];
                foreach ($object->getFeatures() as $value_1) {
                    $values_1[] = $value_1;
                }
                $data['Features'] = $values_1;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem' => false];
        }
    }
} else {
    class DistributionNameJsonGetResponse200PlatformsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem';
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
            $object = new DistributionNameJsonGetResponse200PlatformsItem();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Architecture', $data)) {
                $object->setArchitecture($data['Architecture']);
            }
            if (array_key_exists('OS', $data)) {
                $object->setOS($data['OS']);
            }
            if (array_key_exists('OSVersion', $data)) {
                $object->setOSVersion($data['OSVersion']);
            }
            if (array_key_exists('OSFeatures', $data)) {
                $values = [];
                foreach ($data['OSFeatures'] as $value) {
                    $values[] = $value;
                }
                $object->setOSFeatures($values);
            }
            if (array_key_exists('Variant', $data)) {
                $object->setVariant($data['Variant']);
            }
            if (array_key_exists('Features', $data)) {
                $values_1 = [];
                foreach ($data['Features'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setFeatures($values_1);
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
            if ($object->isInitialized('architecture') && $object->getArchitecture() !== null) {
                $data['Architecture'] = $object->getArchitecture();
            }
            if ($object->isInitialized('oS') && $object->getOS() !== null) {
                $data['OS'] = $object->getOS();
            }
            if ($object->isInitialized('oSVersion') && $object->getOSVersion() !== null) {
                $data['OSVersion'] = $object->getOSVersion();
            }
            if ($object->isInitialized('oSFeatures') && $object->getOSFeatures() !== null) {
                $values = [];
                foreach ($object->getOSFeatures() as $value) {
                    $values[] = $value;
                }
                $data['OSFeatures'] = $values;
            }
            if ($object->isInitialized('variant') && $object->getVariant() !== null) {
                $data['Variant'] = $object->getVariant();
            }
            if ($object->isInitialized('features') && $object->getFeatures() !== null) {
                $values_1 = [];
                foreach ($object->getFeatures() as $value_1) {
                    $values_1[] = $value_1;
                }
                $data['Features'] = $values_1;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem' => false];
        }
    }
}
