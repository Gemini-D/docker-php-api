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
use Docker\API\Model\NodeDescription;
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
    class NodeDescriptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\NodeDescription';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\NodeDescription';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new NodeDescription();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Hostname', $data)) {
                $object->setHostname($data['Hostname']);
            }
            if (array_key_exists('Platform', $data)) {
                $object->setPlatform($this->denormalizer->denormalize($data['Platform'], 'Docker\API\Model\Platform', 'json', $context));
            }
            if (array_key_exists('Resources', $data)) {
                $object->setResources($this->denormalizer->denormalize($data['Resources'], 'Docker\API\Model\ResourceObject', 'json', $context));
            }
            if (array_key_exists('Engine', $data)) {
                $object->setEngine($this->denormalizer->denormalize($data['Engine'], 'Docker\API\Model\EngineDescription', 'json', $context));
            }
            if (array_key_exists('TLSInfo', $data)) {
                $object->setTLSInfo($this->denormalizer->denormalize($data['TLSInfo'], 'Docker\API\Model\TLSInfo', 'json', $context));
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('hostname') && $object->getHostname() !== null) {
                $data['Hostname'] = $object->getHostname();
            }
            if ($object->isInitialized('platform') && $object->getPlatform() !== null) {
                $data['Platform'] = $this->normalizer->normalize($object->getPlatform(), 'json', $context);
            }
            if ($object->isInitialized('resources') && $object->getResources() !== null) {
                $data['Resources'] = $this->normalizer->normalize($object->getResources(), 'json', $context);
            }
            if ($object->isInitialized('engine') && $object->getEngine() !== null) {
                $data['Engine'] = $this->normalizer->normalize($object->getEngine(), 'json', $context);
            }
            if ($object->isInitialized('tLSInfo') && $object->getTLSInfo() !== null) {
                $data['TLSInfo'] = $this->normalizer->normalize($object->getTLSInfo(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\NodeDescription' => false];
        }
    }
} else {
    class NodeDescriptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\NodeDescription';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\NodeDescription';
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
            $object = new NodeDescription();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Hostname', $data)) {
                $object->setHostname($data['Hostname']);
            }
            if (array_key_exists('Platform', $data)) {
                $object->setPlatform($this->denormalizer->denormalize($data['Platform'], 'Docker\API\Model\Platform', 'json', $context));
            }
            if (array_key_exists('Resources', $data)) {
                $object->setResources($this->denormalizer->denormalize($data['Resources'], 'Docker\API\Model\ResourceObject', 'json', $context));
            }
            if (array_key_exists('Engine', $data)) {
                $object->setEngine($this->denormalizer->denormalize($data['Engine'], 'Docker\API\Model\EngineDescription', 'json', $context));
            }
            if (array_key_exists('TLSInfo', $data)) {
                $object->setTLSInfo($this->denormalizer->denormalize($data['TLSInfo'], 'Docker\API\Model\TLSInfo', 'json', $context));
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
            if ($object->isInitialized('hostname') && $object->getHostname() !== null) {
                $data['Hostname'] = $object->getHostname();
            }
            if ($object->isInitialized('platform') && $object->getPlatform() !== null) {
                $data['Platform'] = $this->normalizer->normalize($object->getPlatform(), 'json', $context);
            }
            if ($object->isInitialized('resources') && $object->getResources() !== null) {
                $data['Resources'] = $this->normalizer->normalize($object->getResources(), 'json', $context);
            }
            if ($object->isInitialized('engine') && $object->getEngine() !== null) {
                $data['Engine'] = $this->normalizer->normalize($object->getEngine(), 'json', $context);
            }
            if ($object->isInitialized('tLSInfo') && $object->getTLSInfo() !== null) {
                $data['TLSInfo'] = $this->normalizer->normalize($object->getTLSInfo(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\NodeDescription' => false];
        }
    }
}
