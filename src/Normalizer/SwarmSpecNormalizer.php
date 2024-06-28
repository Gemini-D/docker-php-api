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
use Docker\API\Model\SwarmSpec;
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
    class SwarmSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SwarmSpec';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SwarmSpec';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SwarmSpec();
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
            if (array_key_exists('Orchestration', $data) && $data['Orchestration'] !== null) {
                $object->setOrchestration($this->denormalizer->denormalize($data['Orchestration'], 'Docker\API\Model\SwarmSpecOrchestration', 'json', $context));
            } elseif (array_key_exists('Orchestration', $data) && $data['Orchestration'] === null) {
                $object->setOrchestration(null);
            }
            if (array_key_exists('Raft', $data)) {
                $object->setRaft($this->denormalizer->denormalize($data['Raft'], 'Docker\API\Model\SwarmSpecRaft', 'json', $context));
            }
            if (array_key_exists('Dispatcher', $data) && $data['Dispatcher'] !== null) {
                $object->setDispatcher($this->denormalizer->denormalize($data['Dispatcher'], 'Docker\API\Model\SwarmSpecDispatcher', 'json', $context));
            } elseif (array_key_exists('Dispatcher', $data) && $data['Dispatcher'] === null) {
                $object->setDispatcher(null);
            }
            if (array_key_exists('CAConfig', $data) && $data['CAConfig'] !== null) {
                $object->setCAConfig($this->denormalizer->denormalize($data['CAConfig'], 'Docker\API\Model\SwarmSpecCAConfig', 'json', $context));
            } elseif (array_key_exists('CAConfig', $data) && $data['CAConfig'] === null) {
                $object->setCAConfig(null);
            }
            if (array_key_exists('EncryptionConfig', $data)) {
                $object->setEncryptionConfig($this->denormalizer->denormalize($data['EncryptionConfig'], 'Docker\API\Model\SwarmSpecEncryptionConfig', 'json', $context));
            }
            if (array_key_exists('TaskDefaults', $data)) {
                $object->setTaskDefaults($this->denormalizer->denormalize($data['TaskDefaults'], 'Docker\API\Model\SwarmSpecTaskDefaults', 'json', $context));
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
            if ($object->isInitialized('orchestration') && $object->getOrchestration() !== null) {
                $data['Orchestration'] = $this->normalizer->normalize($object->getOrchestration(), 'json', $context);
            }
            if ($object->isInitialized('raft') && $object->getRaft() !== null) {
                $data['Raft'] = $this->normalizer->normalize($object->getRaft(), 'json', $context);
            }
            if ($object->isInitialized('dispatcher') && $object->getDispatcher() !== null) {
                $data['Dispatcher'] = $this->normalizer->normalize($object->getDispatcher(), 'json', $context);
            }
            if ($object->isInitialized('cAConfig') && $object->getCAConfig() !== null) {
                $data['CAConfig'] = $this->normalizer->normalize($object->getCAConfig(), 'json', $context);
            }
            if ($object->isInitialized('encryptionConfig') && $object->getEncryptionConfig() !== null) {
                $data['EncryptionConfig'] = $this->normalizer->normalize($object->getEncryptionConfig(), 'json', $context);
            }
            if ($object->isInitialized('taskDefaults') && $object->getTaskDefaults() !== null) {
                $data['TaskDefaults'] = $this->normalizer->normalize($object->getTaskDefaults(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SwarmSpec' => false];
        }
    }
} else {
    class SwarmSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SwarmSpec';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SwarmSpec';
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
            $object = new SwarmSpec();
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
            if (array_key_exists('Orchestration', $data) && $data['Orchestration'] !== null) {
                $object->setOrchestration($this->denormalizer->denormalize($data['Orchestration'], 'Docker\API\Model\SwarmSpecOrchestration', 'json', $context));
            } elseif (array_key_exists('Orchestration', $data) && $data['Orchestration'] === null) {
                $object->setOrchestration(null);
            }
            if (array_key_exists('Raft', $data)) {
                $object->setRaft($this->denormalizer->denormalize($data['Raft'], 'Docker\API\Model\SwarmSpecRaft', 'json', $context));
            }
            if (array_key_exists('Dispatcher', $data) && $data['Dispatcher'] !== null) {
                $object->setDispatcher($this->denormalizer->denormalize($data['Dispatcher'], 'Docker\API\Model\SwarmSpecDispatcher', 'json', $context));
            } elseif (array_key_exists('Dispatcher', $data) && $data['Dispatcher'] === null) {
                $object->setDispatcher(null);
            }
            if (array_key_exists('CAConfig', $data) && $data['CAConfig'] !== null) {
                $object->setCAConfig($this->denormalizer->denormalize($data['CAConfig'], 'Docker\API\Model\SwarmSpecCAConfig', 'json', $context));
            } elseif (array_key_exists('CAConfig', $data) && $data['CAConfig'] === null) {
                $object->setCAConfig(null);
            }
            if (array_key_exists('EncryptionConfig', $data)) {
                $object->setEncryptionConfig($this->denormalizer->denormalize($data['EncryptionConfig'], 'Docker\API\Model\SwarmSpecEncryptionConfig', 'json', $context));
            }
            if (array_key_exists('TaskDefaults', $data)) {
                $object->setTaskDefaults($this->denormalizer->denormalize($data['TaskDefaults'], 'Docker\API\Model\SwarmSpecTaskDefaults', 'json', $context));
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
            if ($object->isInitialized('orchestration') && $object->getOrchestration() !== null) {
                $data['Orchestration'] = $this->normalizer->normalize($object->getOrchestration(), 'json', $context);
            }
            if ($object->isInitialized('raft') && $object->getRaft() !== null) {
                $data['Raft'] = $this->normalizer->normalize($object->getRaft(), 'json', $context);
            }
            if ($object->isInitialized('dispatcher') && $object->getDispatcher() !== null) {
                $data['Dispatcher'] = $this->normalizer->normalize($object->getDispatcher(), 'json', $context);
            }
            if ($object->isInitialized('cAConfig') && $object->getCAConfig() !== null) {
                $data['CAConfig'] = $this->normalizer->normalize($object->getCAConfig(), 'json', $context);
            }
            if ($object->isInitialized('encryptionConfig') && $object->getEncryptionConfig() !== null) {
                $data['EncryptionConfig'] = $this->normalizer->normalize($object->getEncryptionConfig(), 'json', $context);
            }
            if ($object->isInitialized('taskDefaults') && $object->getTaskDefaults() !== null) {
                $data['TaskDefaults'] = $this->normalizer->normalize($object->getTaskDefaults(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SwarmSpec' => false];
        }
    }
}
