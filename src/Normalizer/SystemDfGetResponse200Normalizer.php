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
use Docker\API\Model\SystemDfGetResponse200;
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
    class SystemDfGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SystemDfGetResponse200';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SystemDfGetResponse200';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SystemDfGetResponse200();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('LayersSize', $data)) {
                $object->setLayersSize($data['LayersSize']);
            }
            if (array_key_exists('Images', $data)) {
                $values = [];
                foreach ($data['Images'] ?? [] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\ImageSummary', 'json', $context);
                }
                $object->setImages($values);
            }
            if (array_key_exists('Containers', $data)) {
                $values_1 = [];
                foreach ($data['Containers'] ?? [] as $value_1) {
                    $values_2 = [];
                    foreach ($value_1 ?? [] as $value_2) {
                        $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\API\Model\ContainerSummaryItem', 'json', $context);
                    }
                    $values_1[] = $values_2;
                }
                $object->setContainers($values_1);
            }
            if (array_key_exists('Volumes', $data)) {
                $values_3 = [];
                foreach ($data['Volumes'] ?? [] as $value_3) {
                    $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\API\Model\Volume', 'json', $context);
                }
                $object->setVolumes($values_3);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('layersSize') && $object->getLayersSize() !== null) {
                $data['LayersSize'] = $object->getLayersSize();
            }
            if ($object->isInitialized('images') && $object->getImages() !== null) {
                $values = [];
                foreach ($object->getImages() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Images'] = $values;
            }
            if ($object->isInitialized('containers') && $object->getContainers() !== null) {
                $values_1 = [];
                foreach ($object->getContainers() as $value_1) {
                    $values_2 = [];
                    foreach ($value_1 as $value_2) {
                        $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
                    }
                    $values_1[] = $values_2;
                }
                $data['Containers'] = $values_1;
            }
            if ($object->isInitialized('volumes') && $object->getVolumes() !== null) {
                $values_3 = [];
                foreach ($object->getVolumes() as $value_3) {
                    $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
                }
                $data['Volumes'] = $values_3;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SystemDfGetResponse200' => false];
        }
    }
} else {
    class SystemDfGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SystemDfGetResponse200';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SystemDfGetResponse200';
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
            $object = new SystemDfGetResponse200();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('LayersSize', $data)) {
                $object->setLayersSize($data['LayersSize']);
            }
            if (array_key_exists('Images', $data)) {
                $values = [];
                foreach ($data['Images'] ?? [] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\ImageSummary', 'json', $context);
                }
                $object->setImages($values);
            }
            if (array_key_exists('Containers', $data)) {
                $values_1 = [];
                foreach ($data['Containers'] ?? [] as $value_1) {
                    $values_2 = [];
                    foreach ($value_1 ?? [] as $value_2) {
                        $values_2[] = $this->denormalizer->denormalize($value_2, 'Docker\API\Model\ContainerSummaryItem', 'json', $context);
                    }
                    $values_1[] = $values_2;
                }
                $object->setContainers($values_1);
            }
            if (array_key_exists('Volumes', $data)) {
                $values_3 = [];
                foreach ($data['Volumes'] ?? [] as $value_3) {
                    $values_3[] = $this->denormalizer->denormalize($value_3, 'Docker\API\Model\Volume', 'json', $context);
                }
                $object->setVolumes($values_3);
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
            if ($object->isInitialized('layersSize') && $object->getLayersSize() !== null) {
                $data['LayersSize'] = $object->getLayersSize();
            }
            if ($object->isInitialized('images') && $object->getImages() !== null) {
                $values = [];
                foreach ($object->getImages() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Images'] = $values;
            }
            if ($object->isInitialized('containers') && $object->getContainers() !== null) {
                $values_1 = [];
                foreach ($object->getContainers() as $value_1) {
                    $values_2 = [];
                    foreach ($value_1 as $value_2) {
                        $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
                    }
                    $values_1[] = $values_2;
                }
                $data['Containers'] = $values_1;
            }
            if ($object->isInitialized('volumes') && $object->getVolumes() !== null) {
                $values_3 = [];
                foreach ($object->getVolumes() as $value_3) {
                    $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
                }
                $data['Volumes'] = $values_3;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SystemDfGetResponse200' => false];
        }
    }
}
