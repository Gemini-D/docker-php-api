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
use Docker\API\Model\SwarmSpecCAConfig;
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
    class SwarmSpecCAConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SwarmSpecCAConfig';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SwarmSpecCAConfig';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SwarmSpecCAConfig();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('NodeCertExpiry', $data)) {
                $object->setNodeCertExpiry($data['NodeCertExpiry']);
            }
            if (array_key_exists('ExternalCAs', $data)) {
                $values = [];
                foreach ($data['ExternalCAs'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\SwarmSpecCAConfigExternalCAsItem', 'json', $context);
                }
                $object->setExternalCAs($values);
            }
            if (array_key_exists('SigningCACert', $data)) {
                $object->setSigningCACert($data['SigningCACert']);
            }
            if (array_key_exists('SigningCAKey', $data)) {
                $object->setSigningCAKey($data['SigningCAKey']);
            }
            if (array_key_exists('ForceRotate', $data)) {
                $object->setForceRotate($data['ForceRotate']);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('nodeCertExpiry') && $object->getNodeCertExpiry() !== null) {
                $data['NodeCertExpiry'] = $object->getNodeCertExpiry();
            }
            if ($object->isInitialized('externalCAs') && $object->getExternalCAs() !== null) {
                $values = [];
                foreach ($object->getExternalCAs() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['ExternalCAs'] = $values;
            }
            if ($object->isInitialized('signingCACert') && $object->getSigningCACert() !== null) {
                $data['SigningCACert'] = $object->getSigningCACert();
            }
            if ($object->isInitialized('signingCAKey') && $object->getSigningCAKey() !== null) {
                $data['SigningCAKey'] = $object->getSigningCAKey();
            }
            if ($object->isInitialized('forceRotate') && $object->getForceRotate() !== null) {
                $data['ForceRotate'] = $object->getForceRotate();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SwarmSpecCAConfig' => false];
        }
    }
} else {
    class SwarmSpecCAConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SwarmSpecCAConfig';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SwarmSpecCAConfig';
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
            $object = new SwarmSpecCAConfig();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('NodeCertExpiry', $data)) {
                $object->setNodeCertExpiry($data['NodeCertExpiry']);
            }
            if (array_key_exists('ExternalCAs', $data)) {
                $values = [];
                foreach ($data['ExternalCAs'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\SwarmSpecCAConfigExternalCAsItem', 'json', $context);
                }
                $object->setExternalCAs($values);
            }
            if (array_key_exists('SigningCACert', $data)) {
                $object->setSigningCACert($data['SigningCACert']);
            }
            if (array_key_exists('SigningCAKey', $data)) {
                $object->setSigningCAKey($data['SigningCAKey']);
            }
            if (array_key_exists('ForceRotate', $data)) {
                $object->setForceRotate($data['ForceRotate']);
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
            if ($object->isInitialized('nodeCertExpiry') && $object->getNodeCertExpiry() !== null) {
                $data['NodeCertExpiry'] = $object->getNodeCertExpiry();
            }
            if ($object->isInitialized('externalCAs') && $object->getExternalCAs() !== null) {
                $values = [];
                foreach ($object->getExternalCAs() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['ExternalCAs'] = $values;
            }
            if ($object->isInitialized('signingCACert') && $object->getSigningCACert() !== null) {
                $data['SigningCACert'] = $object->getSigningCACert();
            }
            if ($object->isInitialized('signingCAKey') && $object->getSigningCAKey() !== null) {
                $data['SigningCAKey'] = $object->getSigningCAKey();
            }
            if ($object->isInitialized('forceRotate') && $object->getForceRotate() !== null) {
                $data['ForceRotate'] = $object->getForceRotate();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SwarmSpecCAConfig' => false];
        }
    }
}
