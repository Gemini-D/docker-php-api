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
use Docker\API\Model\TaskSpecContainerSpecDNSConfig;
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
    class TaskSpecContainerSpecDNSConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\TaskSpecContainerSpecDNSConfig';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\TaskSpecContainerSpecDNSConfig';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new TaskSpecContainerSpecDNSConfig();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Nameservers', $data)) {
                $values = [];
                foreach ($data['Nameservers'] as $value) {
                    $values[] = $value;
                }
                $object->setNameservers($values);
            }
            if (array_key_exists('Search', $data)) {
                $values_1 = [];
                foreach ($data['Search'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setSearch($values_1);
            }
            if (array_key_exists('Options', $data)) {
                $values_2 = [];
                foreach ($data['Options'] as $value_2) {
                    $values_2[] = $value_2;
                }
                $object->setOptions($values_2);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('nameservers') && $object->getNameservers() !== null) {
                $values = [];
                foreach ($object->getNameservers() as $value) {
                    $values[] = $value;
                }
                $data['Nameservers'] = $values;
            }
            if ($object->isInitialized('search') && $object->getSearch() !== null) {
                $values_1 = [];
                foreach ($object->getSearch() as $value_1) {
                    $values_1[] = $value_1;
                }
                $data['Search'] = $values_1;
            }
            if ($object->isInitialized('options') && $object->getOptions() !== null) {
                $values_2 = [];
                foreach ($object->getOptions() as $value_2) {
                    $values_2[] = $value_2;
                }
                $data['Options'] = $values_2;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\TaskSpecContainerSpecDNSConfig' => false];
        }
    }
} else {
    class TaskSpecContainerSpecDNSConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\TaskSpecContainerSpecDNSConfig';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\TaskSpecContainerSpecDNSConfig';
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
            $object = new TaskSpecContainerSpecDNSConfig();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Nameservers', $data)) {
                $values = [];
                foreach ($data['Nameservers'] as $value) {
                    $values[] = $value;
                }
                $object->setNameservers($values);
            }
            if (array_key_exists('Search', $data)) {
                $values_1 = [];
                foreach ($data['Search'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setSearch($values_1);
            }
            if (array_key_exists('Options', $data)) {
                $values_2 = [];
                foreach ($data['Options'] as $value_2) {
                    $values_2[] = $value_2;
                }
                $object->setOptions($values_2);
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
            if ($object->isInitialized('nameservers') && $object->getNameservers() !== null) {
                $values = [];
                foreach ($object->getNameservers() as $value) {
                    $values[] = $value;
                }
                $data['Nameservers'] = $values;
            }
            if ($object->isInitialized('search') && $object->getSearch() !== null) {
                $values_1 = [];
                foreach ($object->getSearch() as $value_1) {
                    $values_1[] = $value_1;
                }
                $data['Search'] = $values_1;
            }
            if ($object->isInitialized('options') && $object->getOptions() !== null) {
                $values_2 = [];
                foreach ($object->getOptions() as $value_2) {
                    $values_2[] = $value_2;
                }
                $data['Options'] = $values_2;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\TaskSpecContainerSpecDNSConfig' => false];
        }
    }
}
