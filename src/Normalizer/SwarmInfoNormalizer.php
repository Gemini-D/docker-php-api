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
use Docker\API\Model\SwarmInfo;
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
    class SwarmInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SwarmInfo';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SwarmInfo';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SwarmInfo();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('NodeID', $data)) {
                $object->setNodeID($data['NodeID']);
            }
            if (array_key_exists('NodeAddr', $data)) {
                $object->setNodeAddr($data['NodeAddr']);
            }
            if (array_key_exists('LocalNodeState', $data)) {
                $object->setLocalNodeState($data['LocalNodeState']);
            }
            if (array_key_exists('ControlAvailable', $data)) {
                $object->setControlAvailable($data['ControlAvailable']);
            }
            if (array_key_exists('Error', $data)) {
                $object->setError($data['Error']);
            }
            if (array_key_exists('RemoteManagers', $data) && $data['RemoteManagers'] !== null) {
                $values = [];
                foreach ($data['RemoteManagers'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\PeerNode', 'json', $context);
                }
                $object->setRemoteManagers($values);
            } elseif (array_key_exists('RemoteManagers', $data) && $data['RemoteManagers'] === null) {
                $object->setRemoteManagers(null);
            }
            if (array_key_exists('Nodes', $data) && $data['Nodes'] !== null) {
                $object->setNodes($data['Nodes']);
            } elseif (array_key_exists('Nodes', $data) && $data['Nodes'] === null) {
                $object->setNodes(null);
            }
            if (array_key_exists('Managers', $data) && $data['Managers'] !== null) {
                $object->setManagers($data['Managers']);
            } elseif (array_key_exists('Managers', $data) && $data['Managers'] === null) {
                $object->setManagers(null);
            }
            if (array_key_exists('Cluster', $data) && $data['Cluster'] !== null) {
                $object->setCluster($this->denormalizer->denormalize($data['Cluster'], 'Docker\API\Model\ClusterInfo', 'json', $context));
            } elseif (array_key_exists('Cluster', $data) && $data['Cluster'] === null) {
                $object->setCluster(null);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('nodeID') && $object->getNodeID() !== null) {
                $data['NodeID'] = $object->getNodeID();
            }
            if ($object->isInitialized('nodeAddr') && $object->getNodeAddr() !== null) {
                $data['NodeAddr'] = $object->getNodeAddr();
            }
            if ($object->isInitialized('localNodeState') && $object->getLocalNodeState() !== null) {
                $data['LocalNodeState'] = $object->getLocalNodeState();
            }
            if ($object->isInitialized('controlAvailable') && $object->getControlAvailable() !== null) {
                $data['ControlAvailable'] = $object->getControlAvailable();
            }
            if ($object->isInitialized('error') && $object->getError() !== null) {
                $data['Error'] = $object->getError();
            }
            if ($object->isInitialized('remoteManagers') && $object->getRemoteManagers() !== null) {
                $values = [];
                foreach ($object->getRemoteManagers() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['RemoteManagers'] = $values;
            }
            if ($object->isInitialized('nodes') && $object->getNodes() !== null) {
                $data['Nodes'] = $object->getNodes();
            }
            if ($object->isInitialized('managers') && $object->getManagers() !== null) {
                $data['Managers'] = $object->getManagers();
            }
            if ($object->isInitialized('cluster') && $object->getCluster() !== null) {
                $data['Cluster'] = $this->normalizer->normalize($object->getCluster(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SwarmInfo' => false];
        }
    }
} else {
    class SwarmInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SwarmInfo';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SwarmInfo';
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
            $object = new SwarmInfo();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('NodeID', $data)) {
                $object->setNodeID($data['NodeID']);
            }
            if (array_key_exists('NodeAddr', $data)) {
                $object->setNodeAddr($data['NodeAddr']);
            }
            if (array_key_exists('LocalNodeState', $data)) {
                $object->setLocalNodeState($data['LocalNodeState']);
            }
            if (array_key_exists('ControlAvailable', $data)) {
                $object->setControlAvailable($data['ControlAvailable']);
            }
            if (array_key_exists('Error', $data)) {
                $object->setError($data['Error']);
            }
            if (array_key_exists('RemoteManagers', $data) && $data['RemoteManagers'] !== null) {
                $values = [];
                foreach ($data['RemoteManagers'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\PeerNode', 'json', $context);
                }
                $object->setRemoteManagers($values);
            } elseif (array_key_exists('RemoteManagers', $data) && $data['RemoteManagers'] === null) {
                $object->setRemoteManagers(null);
            }
            if (array_key_exists('Nodes', $data) && $data['Nodes'] !== null) {
                $object->setNodes($data['Nodes']);
            } elseif (array_key_exists('Nodes', $data) && $data['Nodes'] === null) {
                $object->setNodes(null);
            }
            if (array_key_exists('Managers', $data) && $data['Managers'] !== null) {
                $object->setManagers($data['Managers']);
            } elseif (array_key_exists('Managers', $data) && $data['Managers'] === null) {
                $object->setManagers(null);
            }
            if (array_key_exists('Cluster', $data) && $data['Cluster'] !== null) {
                $object->setCluster($this->denormalizer->denormalize($data['Cluster'], 'Docker\API\Model\ClusterInfo', 'json', $context));
            } elseif (array_key_exists('Cluster', $data) && $data['Cluster'] === null) {
                $object->setCluster(null);
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
            if ($object->isInitialized('nodeID') && $object->getNodeID() !== null) {
                $data['NodeID'] = $object->getNodeID();
            }
            if ($object->isInitialized('nodeAddr') && $object->getNodeAddr() !== null) {
                $data['NodeAddr'] = $object->getNodeAddr();
            }
            if ($object->isInitialized('localNodeState') && $object->getLocalNodeState() !== null) {
                $data['LocalNodeState'] = $object->getLocalNodeState();
            }
            if ($object->isInitialized('controlAvailable') && $object->getControlAvailable() !== null) {
                $data['ControlAvailable'] = $object->getControlAvailable();
            }
            if ($object->isInitialized('error') && $object->getError() !== null) {
                $data['Error'] = $object->getError();
            }
            if ($object->isInitialized('remoteManagers') && $object->getRemoteManagers() !== null) {
                $values = [];
                foreach ($object->getRemoteManagers() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['RemoteManagers'] = $values;
            }
            if ($object->isInitialized('nodes') && $object->getNodes() !== null) {
                $data['Nodes'] = $object->getNodes();
            }
            if ($object->isInitialized('managers') && $object->getManagers() !== null) {
                $data['Managers'] = $object->getManagers();
            }
            if ($object->isInitialized('cluster') && $object->getCluster() !== null) {
                $data['Cluster'] = $this->normalizer->normalize($object->getCluster(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SwarmInfo' => false];
        }
    }
}
