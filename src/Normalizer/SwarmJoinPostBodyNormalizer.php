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
use Docker\API\Model\SwarmJoinPostBody;
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
    class SwarmJoinPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SwarmJoinPostBody';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SwarmJoinPostBody';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SwarmJoinPostBody();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('ListenAddr', $data)) {
                $object->setListenAddr($data['ListenAddr']);
            }
            if (array_key_exists('AdvertiseAddr', $data)) {
                $object->setAdvertiseAddr($data['AdvertiseAddr']);
            }
            if (array_key_exists('DataPathAddr', $data)) {
                $object->setDataPathAddr($data['DataPathAddr']);
            }
            if (array_key_exists('RemoteAddrs', $data)) {
                $object->setRemoteAddrs($data['RemoteAddrs']);
            }
            if (array_key_exists('JoinToken', $data)) {
                $object->setJoinToken($data['JoinToken']);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('listenAddr') && $object->getListenAddr() !== null) {
                $data['ListenAddr'] = $object->getListenAddr();
            }
            if ($object->isInitialized('advertiseAddr') && $object->getAdvertiseAddr() !== null) {
                $data['AdvertiseAddr'] = $object->getAdvertiseAddr();
            }
            if ($object->isInitialized('dataPathAddr') && $object->getDataPathAddr() !== null) {
                $data['DataPathAddr'] = $object->getDataPathAddr();
            }
            if ($object->isInitialized('remoteAddrs') && $object->getRemoteAddrs() !== null) {
                $data['RemoteAddrs'] = $object->getRemoteAddrs();
            }
            if ($object->isInitialized('joinToken') && $object->getJoinToken() !== null) {
                $data['JoinToken'] = $object->getJoinToken();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SwarmJoinPostBody' => false];
        }
    }
} else {
    class SwarmJoinPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SwarmJoinPostBody';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SwarmJoinPostBody';
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
            $object = new SwarmJoinPostBody();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('ListenAddr', $data)) {
                $object->setListenAddr($data['ListenAddr']);
            }
            if (array_key_exists('AdvertiseAddr', $data)) {
                $object->setAdvertiseAddr($data['AdvertiseAddr']);
            }
            if (array_key_exists('DataPathAddr', $data)) {
                $object->setDataPathAddr($data['DataPathAddr']);
            }
            if (array_key_exists('RemoteAddrs', $data)) {
                $object->setRemoteAddrs($data['RemoteAddrs']);
            }
            if (array_key_exists('JoinToken', $data)) {
                $object->setJoinToken($data['JoinToken']);
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
            if ($object->isInitialized('listenAddr') && $object->getListenAddr() !== null) {
                $data['ListenAddr'] = $object->getListenAddr();
            }
            if ($object->isInitialized('advertiseAddr') && $object->getAdvertiseAddr() !== null) {
                $data['AdvertiseAddr'] = $object->getAdvertiseAddr();
            }
            if ($object->isInitialized('dataPathAddr') && $object->getDataPathAddr() !== null) {
                $data['DataPathAddr'] = $object->getDataPathAddr();
            }
            if ($object->isInitialized('remoteAddrs') && $object->getRemoteAddrs() !== null) {
                $data['RemoteAddrs'] = $object->getRemoteAddrs();
            }
            if ($object->isInitialized('joinToken') && $object->getJoinToken() !== null) {
                $data['JoinToken'] = $object->getJoinToken();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SwarmJoinPostBody' => false];
        }
    }
}
