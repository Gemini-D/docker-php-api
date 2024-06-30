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
use Docker\API\Model\PluginMount;
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
    class PluginMountNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\PluginMount';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\PluginMount';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new PluginMount();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Description', $data)) {
                $object->setDescription($data['Description']);
            }
            if (array_key_exists('Settable', $data)) {
                $values = [];
                foreach ($data['Settable'] ?? [] as $value) {
                    $values[] = $value;
                }
                $object->setSettable($values);
            }
            if (array_key_exists('Source', $data)) {
                $object->setSource($data['Source']);
            }
            if (array_key_exists('Destination', $data)) {
                $object->setDestination($data['Destination']);
            }
            if (array_key_exists('Type', $data)) {
                $object->setType($data['Type']);
            }
            if (array_key_exists('Options', $data)) {
                $values_1 = [];
                foreach ($data['Options'] ?? [] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setOptions($values_1);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            $data['Name'] = $object->getName();
            $data['Description'] = $object->getDescription();
            $values = [];
            foreach ($object->getSettable() as $value) {
                $values[] = $value;
            }
            $data['Settable'] = $values;
            $data['Source'] = $object->getSource();
            $data['Destination'] = $object->getDestination();
            $data['Type'] = $object->getType();
            $values_1 = [];
            foreach ($object->getOptions() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Options'] = $values_1;
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\PluginMount' => false];
        }
    }
} else {
    class PluginMountNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\PluginMount';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\PluginMount';
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
            $object = new PluginMount();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Description', $data)) {
                $object->setDescription($data['Description']);
            }
            if (array_key_exists('Settable', $data)) {
                $values = [];
                foreach ($data['Settable'] ?? [] as $value) {
                    $values[] = $value;
                }
                $object->setSettable($values);
            }
            if (array_key_exists('Source', $data)) {
                $object->setSource($data['Source']);
            }
            if (array_key_exists('Destination', $data)) {
                $object->setDestination($data['Destination']);
            }
            if (array_key_exists('Type', $data)) {
                $object->setType($data['Type']);
            }
            if (array_key_exists('Options', $data)) {
                $values_1 = [];
                foreach ($data['Options'] ?? [] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setOptions($values_1);
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
            $data['Name'] = $object->getName();
            $data['Description'] = $object->getDescription();
            $values = [];
            foreach ($object->getSettable() as $value) {
                $values[] = $value;
            }
            $data['Settable'] = $values;
            $data['Source'] = $object->getSource();
            $data['Destination'] = $object->getDestination();
            $data['Type'] = $object->getType();
            $values_1 = [];
            foreach ($object->getOptions() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['Options'] = $values_1;
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\PluginMount' => false];
        }
    }
}
