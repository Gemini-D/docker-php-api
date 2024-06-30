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
use Docker\API\Model\ServiceSpec;
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
    class ServiceSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ServiceSpec';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ServiceSpec';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ServiceSpec();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Labels', $data)) {
                $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setLabels($values);
            }
            if (array_key_exists('TaskTemplate', $data)) {
                $object->setTaskTemplate($this->denormalizer->denormalize($data['TaskTemplate'], 'Docker\API\Model\TaskSpec', 'json', $context));
            }
            if (array_key_exists('Mode', $data)) {
                $object->setMode($this->denormalizer->denormalize($data['Mode'], 'Docker\API\Model\ServiceSpecMode', 'json', $context));
            }
            if (array_key_exists('UpdateConfig', $data)) {
                $object->setUpdateConfig($this->denormalizer->denormalize($data['UpdateConfig'], 'Docker\API\Model\ServiceSpecUpdateConfig', 'json', $context));
            }
            if (array_key_exists('RollbackConfig', $data)) {
                $object->setRollbackConfig($this->denormalizer->denormalize($data['RollbackConfig'], 'Docker\API\Model\ServiceSpecRollbackConfig', 'json', $context));
            }
            if (array_key_exists('Networks', $data)) {
                $values_1 = [];
                foreach ($data['Networks'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\API\Model\ServiceSpecNetworksItem', 'json', $context);
                }
                $object->setNetworks($values_1);
            }
            if (array_key_exists('EndpointSpec', $data)) {
                $object->setEndpointSpec($this->denormalizer->denormalize($data['EndpointSpec'], 'Docker\API\Model\EndpointSpec', 'json', $context));
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('name') && $object->getName() !== null) {
                $data['Name'] = $object->getName();
            }
            if ($object->isInitialized('labels') && $object->getLabels() !== null) {
                $values = [];
                foreach ($object->getLabels() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Labels'] = $values;
            }
            if ($object->isInitialized('taskTemplate') && $object->getTaskTemplate() !== null) {
                $data['TaskTemplate'] = $this->normalizer->normalize($object->getTaskTemplate(), 'json', $context);
            }
            if ($object->isInitialized('mode') && $object->getMode() !== null) {
                $data['Mode'] = $this->normalizer->normalize($object->getMode(), 'json', $context);
            }
            if ($object->isInitialized('updateConfig') && $object->getUpdateConfig() !== null) {
                $data['UpdateConfig'] = $this->normalizer->normalize($object->getUpdateConfig(), 'json', $context);
            }
            if ($object->isInitialized('rollbackConfig') && $object->getRollbackConfig() !== null) {
                $data['RollbackConfig'] = $this->normalizer->normalize($object->getRollbackConfig(), 'json', $context);
            }
            if ($object->isInitialized('networks') && $object->getNetworks() !== null) {
                $values_1 = [];
                foreach ($object->getNetworks() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['Networks'] = $values_1;
            }
            if ($object->isInitialized('endpointSpec') && $object->getEndpointSpec() !== null) {
                $data['EndpointSpec'] = $this->normalizer->normalize($object->getEndpointSpec(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ServiceSpec' => false];
        }
    }
} else {
    class ServiceSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ServiceSpec';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ServiceSpec';
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
            $object = new ServiceSpec();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Labels', $data)) {
                $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setLabels($values);
            }
            if (array_key_exists('TaskTemplate', $data)) {
                $object->setTaskTemplate($this->denormalizer->denormalize($data['TaskTemplate'], 'Docker\API\Model\TaskSpec', 'json', $context));
            }
            if (array_key_exists('Mode', $data)) {
                $object->setMode($this->denormalizer->denormalize($data['Mode'], 'Docker\API\Model\ServiceSpecMode', 'json', $context));
            }
            if (array_key_exists('UpdateConfig', $data)) {
                $object->setUpdateConfig($this->denormalizer->denormalize($data['UpdateConfig'], 'Docker\API\Model\ServiceSpecUpdateConfig', 'json', $context));
            }
            if (array_key_exists('RollbackConfig', $data)) {
                $object->setRollbackConfig($this->denormalizer->denormalize($data['RollbackConfig'], 'Docker\API\Model\ServiceSpecRollbackConfig', 'json', $context));
            }
            if (array_key_exists('Networks', $data)) {
                $values_1 = [];
                foreach ($data['Networks'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\API\Model\ServiceSpecNetworksItem', 'json', $context);
                }
                $object->setNetworks($values_1);
            }
            if (array_key_exists('EndpointSpec', $data)) {
                $object->setEndpointSpec($this->denormalizer->denormalize($data['EndpointSpec'], 'Docker\API\Model\EndpointSpec', 'json', $context));
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
            if ($object->isInitialized('labels') && $object->getLabels() !== null) {
                $values = [];
                foreach ($object->getLabels() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Labels'] = $values;
            }
            if ($object->isInitialized('taskTemplate') && $object->getTaskTemplate() !== null) {
                $data['TaskTemplate'] = $this->normalizer->normalize($object->getTaskTemplate(), 'json', $context);
            }
            if ($object->isInitialized('mode') && $object->getMode() !== null) {
                $data['Mode'] = $this->normalizer->normalize($object->getMode(), 'json', $context);
            }
            if ($object->isInitialized('updateConfig') && $object->getUpdateConfig() !== null) {
                $data['UpdateConfig'] = $this->normalizer->normalize($object->getUpdateConfig(), 'json', $context);
            }
            if ($object->isInitialized('rollbackConfig') && $object->getRollbackConfig() !== null) {
                $data['RollbackConfig'] = $this->normalizer->normalize($object->getRollbackConfig(), 'json', $context);
            }
            if ($object->isInitialized('networks') && $object->getNetworks() !== null) {
                $values_1 = [];
                foreach ($object->getNetworks() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['Networks'] = $values_1;
            }
            if ($object->isInitialized('endpointSpec') && $object->getEndpointSpec() !== null) {
                $data['EndpointSpec'] = $this->normalizer->normalize($object->getEndpointSpec(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ServiceSpec' => false];
        }
    }
}
