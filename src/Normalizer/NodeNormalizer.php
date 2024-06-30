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
use Docker\API\Model\Node;
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
    class NodeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Node';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Node';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Node();
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
            if (array_key_exists('Spec', $data)) {
                $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\API\Model\NodeSpec', 'json', $context));
            }
            if (array_key_exists('Description', $data)) {
                $object->setDescription($this->denormalizer->denormalize($data['Description'], 'Docker\API\Model\NodeDescription', 'json', $context));
            }
            if (array_key_exists('Status', $data)) {
                $object->setStatus($this->denormalizer->denormalize($data['Status'], 'Docker\API\Model\NodeStatus', 'json', $context));
            }
            if (array_key_exists('ManagerStatus', $data) && $data['ManagerStatus'] !== null) {
                $object->setManagerStatus($this->denormalizer->denormalize($data['ManagerStatus'], 'Docker\API\Model\ManagerStatus', 'json', $context));
            } elseif (array_key_exists('ManagerStatus', $data) && $data['ManagerStatus'] === null) {
                $object->setManagerStatus(null);
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
            if ($object->isInitialized('spec') && $object->getSpec() !== null) {
                $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
            }
            if ($object->isInitialized('description') && $object->getDescription() !== null) {
                $data['Description'] = $this->normalizer->normalize($object->getDescription(), 'json', $context);
            }
            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $data['Status'] = $this->normalizer->normalize($object->getStatus(), 'json', $context);
            }
            if ($object->isInitialized('managerStatus') && $object->getManagerStatus() !== null) {
                $data['ManagerStatus'] = $this->normalizer->normalize($object->getManagerStatus(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Node' => false];
        }
    }
} else {
    class NodeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Node';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Node';
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
            $object = new Node();
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
            if (array_key_exists('Spec', $data)) {
                $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\API\Model\NodeSpec', 'json', $context));
            }
            if (array_key_exists('Description', $data)) {
                $object->setDescription($this->denormalizer->denormalize($data['Description'], 'Docker\API\Model\NodeDescription', 'json', $context));
            }
            if (array_key_exists('Status', $data)) {
                $object->setStatus($this->denormalizer->denormalize($data['Status'], 'Docker\API\Model\NodeStatus', 'json', $context));
            }
            if (array_key_exists('ManagerStatus', $data) && $data['ManagerStatus'] !== null) {
                $object->setManagerStatus($this->denormalizer->denormalize($data['ManagerStatus'], 'Docker\API\Model\ManagerStatus', 'json', $context));
            } elseif (array_key_exists('ManagerStatus', $data) && $data['ManagerStatus'] === null) {
                $object->setManagerStatus(null);
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
            if ($object->isInitialized('spec') && $object->getSpec() !== null) {
                $data['Spec'] = $this->normalizer->normalize($object->getSpec(), 'json', $context);
            }
            if ($object->isInitialized('description') && $object->getDescription() !== null) {
                $data['Description'] = $this->normalizer->normalize($object->getDescription(), 'json', $context);
            }
            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $data['Status'] = $this->normalizer->normalize($object->getStatus(), 'json', $context);
            }
            if ($object->isInitialized('managerStatus') && $object->getManagerStatus() !== null) {
                $data['ManagerStatus'] = $this->normalizer->normalize($object->getManagerStatus(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Node' => false];
        }
    }
}
