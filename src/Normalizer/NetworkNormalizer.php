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
use Docker\API\Model\Network;
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
    class NetworkNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Network';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Network';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Network();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Id', $data)) {
                $object->setId($data['Id']);
            }
            if (array_key_exists('Created', $data)) {
                $object->setCreated($data['Created']);
            }
            if (array_key_exists('Scope', $data)) {
                $object->setScope($data['Scope']);
            }
            if (array_key_exists('Driver', $data)) {
                $object->setDriver($data['Driver']);
            }
            if (array_key_exists('EnableIPv6', $data)) {
                $object->setEnableIPv6($data['EnableIPv6']);
            }
            if (array_key_exists('IPAM', $data)) {
                $object->setIPAM($this->denormalizer->denormalize($data['IPAM'], 'Docker\API\Model\IPAM', 'json', $context));
            }
            if (array_key_exists('Internal', $data)) {
                $object->setInternal($data['Internal']);
            }
            if (array_key_exists('Attachable', $data)) {
                $object->setAttachable($data['Attachable']);
            }
            if (array_key_exists('Ingress', $data)) {
                $object->setIngress($data['Ingress']);
            }
            if (array_key_exists('Containers', $data)) {
                $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Containers'] as $key => $value) {
                    $values[$key] = $this->denormalizer->denormalize($value, 'Docker\API\Model\NetworkContainer', 'json', $context);
                }
                $object->setContainers($values);
            }
            if (array_key_exists('Options', $data)) {
                $values_1 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Options'] as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $object->setOptions($values_1);
            }
            if (array_key_exists('Labels', $data)) {
                $values_2 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key_2 => $value_2) {
                    $values_2[$key_2] = $value_2;
                }
                $object->setLabels($values_2);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('name') && $object->getName() !== null) {
                $data['Name'] = $object->getName();
            }
            if ($object->isInitialized('id') && $object->getId() !== null) {
                $data['Id'] = $object->getId();
            }
            if ($object->isInitialized('created') && $object->getCreated() !== null) {
                $data['Created'] = $object->getCreated();
            }
            if ($object->isInitialized('scope') && $object->getScope() !== null) {
                $data['Scope'] = $object->getScope();
            }
            if ($object->isInitialized('driver') && $object->getDriver() !== null) {
                $data['Driver'] = $object->getDriver();
            }
            if ($object->isInitialized('enableIPv6') && $object->getEnableIPv6() !== null) {
                $data['EnableIPv6'] = $object->getEnableIPv6();
            }
            if ($object->isInitialized('iPAM') && $object->getIPAM() !== null) {
                $data['IPAM'] = $this->normalizer->normalize($object->getIPAM(), 'json', $context);
            }
            if ($object->isInitialized('internal') && $object->getInternal() !== null) {
                $data['Internal'] = $object->getInternal();
            }
            if ($object->isInitialized('attachable') && $object->getAttachable() !== null) {
                $data['Attachable'] = $object->getAttachable();
            }
            if ($object->isInitialized('ingress') && $object->getIngress() !== null) {
                $data['Ingress'] = $object->getIngress();
            }
            if ($object->isInitialized('containers') && $object->getContainers() !== null) {
                $values = [];
                foreach ($object->getContainers() as $key => $value) {
                    $values[$key] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Containers'] = $values;
            }
            if ($object->isInitialized('options') && $object->getOptions() !== null) {
                $values_1 = [];
                foreach ($object->getOptions() as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $data['Options'] = $values_1;
            }
            if ($object->isInitialized('labels') && $object->getLabels() !== null) {
                $values_2 = [];
                foreach ($object->getLabels() as $key_2 => $value_2) {
                    $values_2[$key_2] = $value_2;
                }
                $data['Labels'] = $values_2;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Network' => false];
        }
    }
} else {
    class NetworkNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Network';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Network';
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
            $object = new Network();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Id', $data)) {
                $object->setId($data['Id']);
            }
            if (array_key_exists('Created', $data)) {
                $object->setCreated($data['Created']);
            }
            if (array_key_exists('Scope', $data)) {
                $object->setScope($data['Scope']);
            }
            if (array_key_exists('Driver', $data)) {
                $object->setDriver($data['Driver']);
            }
            if (array_key_exists('EnableIPv6', $data)) {
                $object->setEnableIPv6($data['EnableIPv6']);
            }
            if (array_key_exists('IPAM', $data)) {
                $object->setIPAM($this->denormalizer->denormalize($data['IPAM'], 'Docker\API\Model\IPAM', 'json', $context));
            }
            if (array_key_exists('Internal', $data)) {
                $object->setInternal($data['Internal']);
            }
            if (array_key_exists('Attachable', $data)) {
                $object->setAttachable($data['Attachable']);
            }
            if (array_key_exists('Ingress', $data)) {
                $object->setIngress($data['Ingress']);
            }
            if (array_key_exists('Containers', $data)) {
                $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Containers'] as $key => $value) {
                    $values[$key] = $this->denormalizer->denormalize($value, 'Docker\API\Model\NetworkContainer', 'json', $context);
                }
                $object->setContainers($values);
            }
            if (array_key_exists('Options', $data)) {
                $values_1 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Options'] as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $object->setOptions($values_1);
            }
            if (array_key_exists('Labels', $data)) {
                $values_2 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key_2 => $value_2) {
                    $values_2[$key_2] = $value_2;
                }
                $object->setLabels($values_2);
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
            if ($object->isInitialized('name') && $object->getName() !== null) {
                $data['Name'] = $object->getName();
            }
            if ($object->isInitialized('id') && $object->getId() !== null) {
                $data['Id'] = $object->getId();
            }
            if ($object->isInitialized('created') && $object->getCreated() !== null) {
                $data['Created'] = $object->getCreated();
            }
            if ($object->isInitialized('scope') && $object->getScope() !== null) {
                $data['Scope'] = $object->getScope();
            }
            if ($object->isInitialized('driver') && $object->getDriver() !== null) {
                $data['Driver'] = $object->getDriver();
            }
            if ($object->isInitialized('enableIPv6') && $object->getEnableIPv6() !== null) {
                $data['EnableIPv6'] = $object->getEnableIPv6();
            }
            if ($object->isInitialized('iPAM') && $object->getIPAM() !== null) {
                $data['IPAM'] = $this->normalizer->normalize($object->getIPAM(), 'json', $context);
            }
            if ($object->isInitialized('internal') && $object->getInternal() !== null) {
                $data['Internal'] = $object->getInternal();
            }
            if ($object->isInitialized('attachable') && $object->getAttachable() !== null) {
                $data['Attachable'] = $object->getAttachable();
            }
            if ($object->isInitialized('ingress') && $object->getIngress() !== null) {
                $data['Ingress'] = $object->getIngress();
            }
            if ($object->isInitialized('containers') && $object->getContainers() !== null) {
                $values = [];
                foreach ($object->getContainers() as $key => $value) {
                    $values[$key] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Containers'] = $values;
            }
            if ($object->isInitialized('options') && $object->getOptions() !== null) {
                $values_1 = [];
                foreach ($object->getOptions() as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $data['Options'] = $values_1;
            }
            if ($object->isInitialized('labels') && $object->getLabels() !== null) {
                $values_2 = [];
                foreach ($object->getLabels() as $key_2 => $value_2) {
                    $values_2[$key_2] = $value_2;
                }
                $data['Labels'] = $values_2;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Network' => false];
        }
    }
}
