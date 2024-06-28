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
use Docker\API\Model\EndpointPortConfig;
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
    class EndpointPortConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\EndpointPortConfig';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\EndpointPortConfig';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new EndpointPortConfig();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Protocol', $data)) {
                $object->setProtocol($data['Protocol']);
            }
            if (array_key_exists('TargetPort', $data)) {
                $object->setTargetPort($data['TargetPort']);
            }
            if (array_key_exists('PublishedPort', $data)) {
                $object->setPublishedPort($data['PublishedPort']);
            }
            if (array_key_exists('PublishMode', $data)) {
                $object->setPublishMode($data['PublishMode']);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('name') && $object->getName() !== null) {
                $data['Name'] = $object->getName();
            }
            if ($object->isInitialized('protocol') && $object->getProtocol() !== null) {
                $data['Protocol'] = $object->getProtocol();
            }
            if ($object->isInitialized('targetPort') && $object->getTargetPort() !== null) {
                $data['TargetPort'] = $object->getTargetPort();
            }
            if ($object->isInitialized('publishedPort') && $object->getPublishedPort() !== null) {
                $data['PublishedPort'] = $object->getPublishedPort();
            }
            if ($object->isInitialized('publishMode') && $object->getPublishMode() !== null) {
                $data['PublishMode'] = $object->getPublishMode();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\EndpointPortConfig' => false];
        }
    }
} else {
    class EndpointPortConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\EndpointPortConfig';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\EndpointPortConfig';
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
            $object = new EndpointPortConfig();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Protocol', $data)) {
                $object->setProtocol($data['Protocol']);
            }
            if (array_key_exists('TargetPort', $data)) {
                $object->setTargetPort($data['TargetPort']);
            }
            if (array_key_exists('PublishedPort', $data)) {
                $object->setPublishedPort($data['PublishedPort']);
            }
            if (array_key_exists('PublishMode', $data)) {
                $object->setPublishMode($data['PublishMode']);
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
            if ($object->isInitialized('protocol') && $object->getProtocol() !== null) {
                $data['Protocol'] = $object->getProtocol();
            }
            if ($object->isInitialized('targetPort') && $object->getTargetPort() !== null) {
                $data['TargetPort'] = $object->getTargetPort();
            }
            if ($object->isInitialized('publishedPort') && $object->getPublishedPort() !== null) {
                $data['PublishedPort'] = $object->getPublishedPort();
            }
            if ($object->isInitialized('publishMode') && $object->getPublishMode() !== null) {
                $data['PublishMode'] = $object->getPublishMode();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\EndpointPortConfig' => false];
        }
    }
}
