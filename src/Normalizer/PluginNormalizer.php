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
use Docker\API\Model\Plugin;
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
    class PluginNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Plugin';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Plugin';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Plugin();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Id', $data)) {
                $object->setId($data['Id']);
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Enabled', $data)) {
                $object->setEnabled($data['Enabled']);
            }
            if (array_key_exists('Settings', $data)) {
                $object->setSettings($this->denormalizer->denormalize($data['Settings'], 'Docker\API\Model\PluginSettings', 'json', $context));
            }
            if (array_key_exists('PluginReference', $data)) {
                $object->setPluginReference($data['PluginReference']);
            }
            if (array_key_exists('Config', $data)) {
                $object->setConfig($this->denormalizer->denormalize($data['Config'], 'Docker\API\Model\PluginConfig', 'json', $context));
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('id') && $object->getId() !== null) {
                $data['Id'] = $object->getId();
            }
            $data['Name'] = $object->getName();
            $data['Enabled'] = $object->getEnabled();
            $data['Settings'] = $this->normalizer->normalize($object->getSettings(), 'json', $context);
            if ($object->isInitialized('pluginReference') && $object->getPluginReference() !== null) {
                $data['PluginReference'] = $object->getPluginReference();
            }
            $data['Config'] = $this->normalizer->normalize($object->getConfig(), 'json', $context);
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Plugin' => false];
        }
    }
} else {
    class PluginNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Plugin';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Plugin';
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
            $object = new Plugin();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Id', $data)) {
                $object->setId($data['Id']);
            }
            if (array_key_exists('Name', $data)) {
                $object->setName($data['Name']);
            }
            if (array_key_exists('Enabled', $data)) {
                $object->setEnabled($data['Enabled']);
            }
            if (array_key_exists('Settings', $data)) {
                $object->setSettings($this->denormalizer->denormalize($data['Settings'], 'Docker\API\Model\PluginSettings', 'json', $context));
            }
            if (array_key_exists('PluginReference', $data)) {
                $object->setPluginReference($data['PluginReference']);
            }
            if (array_key_exists('Config', $data)) {
                $object->setConfig($this->denormalizer->denormalize($data['Config'], 'Docker\API\Model\PluginConfig', 'json', $context));
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
            if ($object->isInitialized('id') && $object->getId() !== null) {
                $data['Id'] = $object->getId();
            }
            $data['Name'] = $object->getName();
            $data['Enabled'] = $object->getEnabled();
            $data['Settings'] = $this->normalizer->normalize($object->getSettings(), 'json', $context);
            if ($object->isInitialized('pluginReference') && $object->getPluginReference() !== null) {
                $data['PluginReference'] = $object->getPluginReference();
            }
            $data['Config'] = $this->normalizer->normalize($object->getConfig(), 'json', $context);
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Plugin' => false];
        }
    }
}
