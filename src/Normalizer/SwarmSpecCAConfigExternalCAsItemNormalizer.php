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
use Docker\API\Model\SwarmSpecCAConfigExternalCAsItem;
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
    class SwarmSpecCAConfigExternalCAsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SwarmSpecCAConfigExternalCAsItem';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SwarmSpecCAConfigExternalCAsItem';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SwarmSpecCAConfigExternalCAsItem();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Protocol', $data)) {
                $object->setProtocol($data['Protocol']);
            }
            if (array_key_exists('URL', $data)) {
                $object->setURL($data['URL']);
            }
            if (array_key_exists('Options', $data)) {
                $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Options'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setOptions($values);
            }
            if (array_key_exists('CACert', $data)) {
                $object->setCACert($data['CACert']);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('protocol') && $object->getProtocol() !== null) {
                $data['Protocol'] = $object->getProtocol();
            }
            if ($object->isInitialized('uRL') && $object->getURL() !== null) {
                $data['URL'] = $object->getURL();
            }
            if ($object->isInitialized('options') && $object->getOptions() !== null) {
                $values = [];
                foreach ($object->getOptions() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Options'] = $values;
            }
            if ($object->isInitialized('cACert') && $object->getCACert() !== null) {
                $data['CACert'] = $object->getCACert();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SwarmSpecCAConfigExternalCAsItem' => false];
        }
    }
} else {
    class SwarmSpecCAConfigExternalCAsItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\SwarmSpecCAConfigExternalCAsItem';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\SwarmSpecCAConfigExternalCAsItem';
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
            $object = new SwarmSpecCAConfigExternalCAsItem();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Protocol', $data)) {
                $object->setProtocol($data['Protocol']);
            }
            if (array_key_exists('URL', $data)) {
                $object->setURL($data['URL']);
            }
            if (array_key_exists('Options', $data)) {
                $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Options'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setOptions($values);
            }
            if (array_key_exists('CACert', $data)) {
                $object->setCACert($data['CACert']);
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
            if ($object->isInitialized('protocol') && $object->getProtocol() !== null) {
                $data['Protocol'] = $object->getProtocol();
            }
            if ($object->isInitialized('uRL') && $object->getURL() !== null) {
                $data['URL'] = $object->getURL();
            }
            if ($object->isInitialized('options') && $object->getOptions() !== null) {
                $values = [];
                foreach ($object->getOptions() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['Options'] = $values;
            }
            if ($object->isInitialized('cACert') && $object->getCACert() !== null) {
                $data['CACert'] = $object->getCACert();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\SwarmSpecCAConfigExternalCAsItem' => false];
        }
    }
}
