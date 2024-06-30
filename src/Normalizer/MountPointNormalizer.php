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
use Docker\API\Model\MountPoint;
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
    class MountPointNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\MountPoint';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\MountPoint';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new MountPoint();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Type', $data)) {
                $object->setType($data['Type']);
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Source', $data)) {
                $object->setSource($data['Source']);
            }
            if (array_key_exists('Destination', $data)) {
                $object->setDestination($data['Destination']);
            }
            if (array_key_exists('Driver', $data)) {
                $object->setDriver($data['Driver']);
            }
            if (array_key_exists('Mode', $data)) {
                $object->setMode($data['Mode']);
            }
            if (array_key_exists('RW', $data)) {
                $object->setRW($data['RW']);
            }
            if (array_key_exists('Propagation', $data)) {
                $object->setPropagation($data['Propagation']);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('type') && $object->getType() !== null) {
                $data['Type'] = $object->getType();
            }
            if ($object->isInitialized('name') && $object->getName() !== null) {
                $data['Name'] = $object->getName();
            }
            if ($object->isInitialized('source') && $object->getSource() !== null) {
                $data['Source'] = $object->getSource();
            }
            if ($object->isInitialized('destination') && $object->getDestination() !== null) {
                $data['Destination'] = $object->getDestination();
            }
            if ($object->isInitialized('driver') && $object->getDriver() !== null) {
                $data['Driver'] = $object->getDriver();
            }
            if ($object->isInitialized('mode') && $object->getMode() !== null) {
                $data['Mode'] = $object->getMode();
            }
            if ($object->isInitialized('rW') && $object->getRW() !== null) {
                $data['RW'] = $object->getRW();
            }
            if ($object->isInitialized('propagation') && $object->getPropagation() !== null) {
                $data['Propagation'] = $object->getPropagation();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\MountPoint' => false];
        }
    }
} else {
    class MountPointNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\MountPoint';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\MountPoint';
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
            $object = new MountPoint();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Type', $data)) {
                $object->setType($data['Type']);
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Source', $data)) {
                $object->setSource($data['Source']);
            }
            if (array_key_exists('Destination', $data)) {
                $object->setDestination($data['Destination']);
            }
            if (array_key_exists('Driver', $data)) {
                $object->setDriver($data['Driver']);
            }
            if (array_key_exists('Mode', $data)) {
                $object->setMode($data['Mode']);
            }
            if (array_key_exists('RW', $data)) {
                $object->setRW($data['RW']);
            }
            if (array_key_exists('Propagation', $data)) {
                $object->setPropagation($data['Propagation']);
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
            if ($object->isInitialized('type') && $object->getType() !== null) {
                $data['Type'] = $object->getType();
            }
            if ($object->isInitialized('name') && $object->getName() !== null) {
                $data['Name'] = $object->getName();
            }
            if ($object->isInitialized('source') && $object->getSource() !== null) {
                $data['Source'] = $object->getSource();
            }
            if ($object->isInitialized('destination') && $object->getDestination() !== null) {
                $data['Destination'] = $object->getDestination();
            }
            if ($object->isInitialized('driver') && $object->getDriver() !== null) {
                $data['Driver'] = $object->getDriver();
            }
            if ($object->isInitialized('mode') && $object->getMode() !== null) {
                $data['Mode'] = $object->getMode();
            }
            if ($object->isInitialized('rW') && $object->getRW() !== null) {
                $data['RW'] = $object->getRW();
            }
            if ($object->isInitialized('propagation') && $object->getPropagation() !== null) {
                $data['Propagation'] = $object->getPropagation();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\MountPoint' => false];
        }
    }
}
