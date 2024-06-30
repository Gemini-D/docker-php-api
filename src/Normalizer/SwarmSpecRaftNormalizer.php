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
use Docker\API\Model\SwarmSpecRaft;
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
    class SwarmSpecRaftNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SwarmSpecRaft';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SwarmSpecRaft';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SwarmSpecRaft();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('SnapshotInterval', $data)) {
                $object->setSnapshotInterval($data['SnapshotInterval']);
            }
            if (array_key_exists('KeepOldSnapshots', $data)) {
                $object->setKeepOldSnapshots($data['KeepOldSnapshots']);
            }
            if (array_key_exists('LogEntriesForSlowFollowers', $data)) {
                $object->setLogEntriesForSlowFollowers($data['LogEntriesForSlowFollowers']);
            }
            if (array_key_exists('ElectionTick', $data)) {
                $object->setElectionTick($data['ElectionTick']);
            }
            if (array_key_exists('HeartbeatTick', $data)) {
                $object->setHeartbeatTick($data['HeartbeatTick']);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('snapshotInterval') && $object->getSnapshotInterval() !== null) {
                $data['SnapshotInterval'] = $object->getSnapshotInterval();
            }
            if ($object->isInitialized('keepOldSnapshots') && $object->getKeepOldSnapshots() !== null) {
                $data['KeepOldSnapshots'] = $object->getKeepOldSnapshots();
            }
            if ($object->isInitialized('logEntriesForSlowFollowers') && $object->getLogEntriesForSlowFollowers() !== null) {
                $data['LogEntriesForSlowFollowers'] = $object->getLogEntriesForSlowFollowers();
            }
            if ($object->isInitialized('electionTick') && $object->getElectionTick() !== null) {
                $data['ElectionTick'] = $object->getElectionTick();
            }
            if ($object->isInitialized('heartbeatTick') && $object->getHeartbeatTick() !== null) {
                $data['HeartbeatTick'] = $object->getHeartbeatTick();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SwarmSpecRaft' => false];
        }
    }
} else {
    class SwarmSpecRaftNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SwarmSpecRaft';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SwarmSpecRaft';
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
            $object = new SwarmSpecRaft();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('SnapshotInterval', $data)) {
                $object->setSnapshotInterval($data['SnapshotInterval']);
            }
            if (array_key_exists('KeepOldSnapshots', $data)) {
                $object->setKeepOldSnapshots($data['KeepOldSnapshots']);
            }
            if (array_key_exists('LogEntriesForSlowFollowers', $data)) {
                $object->setLogEntriesForSlowFollowers($data['LogEntriesForSlowFollowers']);
            }
            if (array_key_exists('ElectionTick', $data)) {
                $object->setElectionTick($data['ElectionTick']);
            }
            if (array_key_exists('HeartbeatTick', $data)) {
                $object->setHeartbeatTick($data['HeartbeatTick']);
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
            if ($object->isInitialized('snapshotInterval') && $object->getSnapshotInterval() !== null) {
                $data['SnapshotInterval'] = $object->getSnapshotInterval();
            }
            if ($object->isInitialized('keepOldSnapshots') && $object->getKeepOldSnapshots() !== null) {
                $data['KeepOldSnapshots'] = $object->getKeepOldSnapshots();
            }
            if ($object->isInitialized('logEntriesForSlowFollowers') && $object->getLogEntriesForSlowFollowers() !== null) {
                $data['LogEntriesForSlowFollowers'] = $object->getLogEntriesForSlowFollowers();
            }
            if ($object->isInitialized('electionTick') && $object->getElectionTick() !== null) {
                $data['ElectionTick'] = $object->getElectionTick();
            }
            if ($object->isInitialized('heartbeatTick') && $object->getHeartbeatTick() !== null) {
                $data['HeartbeatTick'] = $object->getHeartbeatTick();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SwarmSpecRaft' => false];
        }
    }
}
