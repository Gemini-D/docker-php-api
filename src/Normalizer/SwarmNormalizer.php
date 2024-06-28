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
use Docker\API\Model\Swarm;
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
    class SwarmNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Swarm';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Swarm';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Swarm();
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
                $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\API\Model\SwarmSpec', 'json', $context));
            }
            if (array_key_exists('TLSInfo', $data)) {
                $object->setTLSInfo($this->denormalizer->denormalize($data['TLSInfo'], 'Docker\API\Model\TLSInfo', 'json', $context));
            }
            if (array_key_exists('RootRotationInProgress', $data)) {
                $object->setRootRotationInProgress($data['RootRotationInProgress']);
            }
            if (array_key_exists('JoinTokens', $data)) {
                $object->setJoinTokens($this->denormalizer->denormalize($data['JoinTokens'], 'Docker\API\Model\JoinTokens', 'json', $context));
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
            if ($object->isInitialized('tLSInfo') && $object->getTLSInfo() !== null) {
                $data['TLSInfo'] = $this->normalizer->normalize($object->getTLSInfo(), 'json', $context);
            }
            if ($object->isInitialized('rootRotationInProgress') && $object->getRootRotationInProgress() !== null) {
                $data['RootRotationInProgress'] = $object->getRootRotationInProgress();
            }
            if ($object->isInitialized('joinTokens') && $object->getJoinTokens() !== null) {
                $data['JoinTokens'] = $this->normalizer->normalize($object->getJoinTokens(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Swarm' => false];
        }
    }
} else {
    class SwarmNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Swarm';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Swarm';
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
            $object = new Swarm();
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
                $object->setSpec($this->denormalizer->denormalize($data['Spec'], 'Docker\API\Model\SwarmSpec', 'json', $context));
            }
            if (array_key_exists('TLSInfo', $data)) {
                $object->setTLSInfo($this->denormalizer->denormalize($data['TLSInfo'], 'Docker\API\Model\TLSInfo', 'json', $context));
            }
            if (array_key_exists('RootRotationInProgress', $data)) {
                $object->setRootRotationInProgress($data['RootRotationInProgress']);
            }
            if (array_key_exists('JoinTokens', $data)) {
                $object->setJoinTokens($this->denormalizer->denormalize($data['JoinTokens'], 'Docker\API\Model\JoinTokens', 'json', $context));
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
            if ($object->isInitialized('tLSInfo') && $object->getTLSInfo() !== null) {
                $data['TLSInfo'] = $this->normalizer->normalize($object->getTLSInfo(), 'json', $context);
            }
            if ($object->isInitialized('rootRotationInProgress') && $object->getRootRotationInProgress() !== null) {
                $data['RootRotationInProgress'] = $object->getRootRotationInProgress();
            }
            if ($object->isInitialized('joinTokens') && $object->getJoinTokens() !== null) {
                $data['JoinTokens'] = $this->normalizer->normalize($object->getJoinTokens(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Swarm' => false];
        }
    }
}
