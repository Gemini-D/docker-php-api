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
use Docker\API\Model\Task;
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
    class TaskNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Task';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Task';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Task();
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
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Labels', $data)) {
                $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] ?? [] as $key => $value) {
                    if ($value === null) {
                        $values[$key] = null;
                        continue;
                    }
                    $values[$key] = $value;
                }
                $object->setLabels($values);
            }
            if (array_key_exists('Spec', $data)) {
                $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\API\Model\TaskSpec', 'json', $context));
            }
            if (array_key_exists('ServiceID', $data)) {
                $object->setServiceID($data['ServiceID']);
            }
            if (array_key_exists('Slot', $data)) {
                $object->setSlot($data['Slot']);
            }
            if (array_key_exists('NodeID', $data)) {
                $object->setNodeID($data['NodeID']);
            }
            if (array_key_exists('AssignedGenericResources', $data)) {
                $values_1 = [];
                foreach ($data['AssignedGenericResources'] ?? [] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\API\Model\GenericResourcesItem', 'json', $context);
                }
                $object->setAssignedGenericResources($values_1);
            }
            if (array_key_exists('Status', $data)) {
                $object->setStatus($this->denormalizer->denormalize($data['Status'], 'Docker\API\Model\TaskStatus', 'json', $context));
            }
            if (array_key_exists('DesiredState', $data)) {
                $object->setDesiredState($data['DesiredState']);
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
            if ($object->isInitialized('spec') && $object->getSpec() !== null) {
                $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
            }
            if ($object->isInitialized('serviceID') && $object->getServiceID() !== null) {
                $data['ServiceID'] = $object->getServiceID();
            }
            if ($object->isInitialized('slot') && $object->getSlot() !== null) {
                $data['Slot'] = $object->getSlot();
            }
            if ($object->isInitialized('nodeID') && $object->getNodeID() !== null) {
                $data['NodeID'] = $object->getNodeID();
            }
            if ($object->isInitialized('assignedGenericResources') && $object->getAssignedGenericResources() !== null) {
                $values_1 = [];
                foreach ($object->getAssignedGenericResources() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['AssignedGenericResources'] = $values_1;
            }
            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $data['Status'] = $this->normalizer->normalize($object->getStatus(), 'json', $context);
            }
            if ($object->isInitialized('desiredState') && $object->getDesiredState() !== null) {
                $data['DesiredState'] = $object->getDesiredState();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Task' => false];
        }
    }
} else {
    class TaskNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Task';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Task';
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
            $object = new Task();
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
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Labels', $data)) {
                $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] ?? [] as $key => $value) {
                    if ($value === null) {
                        $values[$key] = null;
                        continue;
                    }
                    $values[$key] = $value;
                }
                $object->setLabels($values);
            }
            if (array_key_exists('Spec', $data)) {
                $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\API\Model\TaskSpec', 'json', $context));
            }
            if (array_key_exists('ServiceID', $data)) {
                $object->setServiceID($data['ServiceID']);
            }
            if (array_key_exists('Slot', $data)) {
                $object->setSlot($data['Slot']);
            }
            if (array_key_exists('NodeID', $data)) {
                $object->setNodeID($data['NodeID']);
            }
            if (array_key_exists('AssignedGenericResources', $data)) {
                $values_1 = [];
                foreach ($data['AssignedGenericResources'] ?? [] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, 'Docker\API\Model\GenericResourcesItem', 'json', $context);
                }
                $object->setAssignedGenericResources($values_1);
            }
            if (array_key_exists('Status', $data)) {
                $object->setStatus($this->denormalizer->denormalize($data['Status'], 'Docker\API\Model\TaskStatus', 'json', $context));
            }
            if (array_key_exists('DesiredState', $data)) {
                $object->setDesiredState($data['DesiredState']);
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
            if ($object->isInitialized('spec') && $object->getSpec() !== null) {
                $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
            }
            if ($object->isInitialized('serviceID') && $object->getServiceID() !== null) {
                $data['ServiceID'] = $object->getServiceID();
            }
            if ($object->isInitialized('slot') && $object->getSlot() !== null) {
                $data['Slot'] = $object->getSlot();
            }
            if ($object->isInitialized('nodeID') && $object->getNodeID() !== null) {
                $data['NodeID'] = $object->getNodeID();
            }
            if ($object->isInitialized('assignedGenericResources') && $object->getAssignedGenericResources() !== null) {
                $values_1 = [];
                foreach ($object->getAssignedGenericResources() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['AssignedGenericResources'] = $values_1;
            }
            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $data['Status'] = $this->normalizer->normalize($object->getStatus(), 'json', $context);
            }
            if ($object->isInitialized('desiredState') && $object->getDesiredState() !== null) {
                $data['DesiredState'] = $object->getDesiredState();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Task' => false];
        }
    }
}
