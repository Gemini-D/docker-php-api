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
use Docker\API\Model\TaskSpec;
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
    class TaskSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\TaskSpec';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\TaskSpec';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new TaskSpec();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('PluginSpec', $data)) {
                $object->setPluginSpec($this->denormalizer->denormalize($data['PluginSpec'], 'Docker\API\Model\TaskSpecPluginSpec', 'json', $context));
            }
            if (array_key_exists('ContainerSpec', $data)) {
                $object->setContainerSpec($this->denormalizer->denormalize($data['ContainerSpec'], 'Docker\API\Model\TaskSpecContainerSpec', 'json', $context));
            }
            if (array_key_exists('Resources', $data)) {
                $object->setResources($this->denormalizer->denormalize($data['Resources'], 'Docker\API\Model\TaskSpecResources', 'json', $context));
            }
            if (array_key_exists('RestartPolicy', $data)) {
                $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], 'Docker\API\Model\TaskSpecRestartPolicy', 'json', $context));
            }
            if (array_key_exists('Placement', $data)) {
                $object->setPlacement($this->denormalizer->denormalize($data['Placement'], 'Docker\API\Model\TaskSpecPlacement', 'json', $context));
            }
            if (array_key_exists('ForceUpdate', $data)) {
                $object->setForceUpdate($data['ForceUpdate']);
            }
            if (array_key_exists('Runtime', $data)) {
                $object->setRuntime($data['Runtime']);
            }
            if (array_key_exists('Networks', $data)) {
                $values = [];
                foreach ($data['Networks'] ?? [] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\TaskSpecNetworksItem', 'json', $context);
                }
                $object->setNetworks($values);
            }
            if (array_key_exists('LogDriver', $data)) {
                $object->setLogDriver($this->denormalizer->denormalize($data['LogDriver'], 'Docker\API\Model\TaskSpecLogDriver', 'json', $context));
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('pluginSpec') && $object->getPluginSpec() !== null) {
                $data['PluginSpec'] = $this->normalizer->normalize($object->getPluginSpec(), 'json', $context);
            }
            if ($object->isInitialized('containerSpec') && $object->getContainerSpec() !== null) {
                $data['ContainerSpec'] = $this->normalizer->normalize($object->getContainerSpec(), 'json', $context);
            }
            if ($object->isInitialized('resources') && $object->getResources() !== null) {
                $data['Resources'] = $this->normalizer->normalize($object->getResources(), 'json', $context);
            }
            if ($object->isInitialized('restartPolicy') && $object->getRestartPolicy() !== null) {
                $data['RestartPolicy'] = $this->normalizer->normalize($object->getRestartPolicy(), 'json', $context);
            }
            if ($object->isInitialized('placement') && $object->getPlacement() !== null) {
                $data['Placement'] = $this->normalizer->normalize($object->getPlacement(), 'json', $context);
            }
            if ($object->isInitialized('forceUpdate') && $object->getForceUpdate() !== null) {
                $data['ForceUpdate'] = $object->getForceUpdate();
            }
            if ($object->isInitialized('runtime') && $object->getRuntime() !== null) {
                $data['Runtime'] = $object->getRuntime();
            }
            if ($object->isInitialized('networks') && $object->getNetworks() !== null) {
                $values = [];
                foreach ($object->getNetworks() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Networks'] = $values;
            }
            if ($object->isInitialized('logDriver') && $object->getLogDriver() !== null) {
                $data['LogDriver'] = $this->normalizer->normalize($object->getLogDriver(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\TaskSpec' => false];
        }
    }
} else {
    class TaskSpecNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\TaskSpec';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\TaskSpec';
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
            $object = new TaskSpec();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('PluginSpec', $data)) {
                $object->setPluginSpec($this->denormalizer->denormalize($data['PluginSpec'], 'Docker\API\Model\TaskSpecPluginSpec', 'json', $context));
            }
            if (array_key_exists('ContainerSpec', $data)) {
                $object->setContainerSpec($this->denormalizer->denormalize($data['ContainerSpec'], 'Docker\API\Model\TaskSpecContainerSpec', 'json', $context));
            }
            if (array_key_exists('Resources', $data)) {
                $object->setResources($this->denormalizer->denormalize($data['Resources'], 'Docker\API\Model\TaskSpecResources', 'json', $context));
            }
            if (array_key_exists('RestartPolicy', $data)) {
                $object->setRestartPolicy($this->denormalizer->denormalize($data['RestartPolicy'], 'Docker\API\Model\TaskSpecRestartPolicy', 'json', $context));
            }
            if (array_key_exists('Placement', $data)) {
                $object->setPlacement($this->denormalizer->denormalize($data['Placement'], 'Docker\API\Model\TaskSpecPlacement', 'json', $context));
            }
            if (array_key_exists('ForceUpdate', $data)) {
                $object->setForceUpdate($data['ForceUpdate']);
            }
            if (array_key_exists('Runtime', $data)) {
                $object->setRuntime($data['Runtime']);
            }
            if (array_key_exists('Networks', $data)) {
                $values = [];
                foreach ($data['Networks'] ?? [] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\TaskSpecNetworksItem', 'json', $context);
                }
                $object->setNetworks($values);
            }
            if (array_key_exists('LogDriver', $data)) {
                $object->setLogDriver($this->denormalizer->denormalize($data['LogDriver'], 'Docker\API\Model\TaskSpecLogDriver', 'json', $context));
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
            if ($object->isInitialized('pluginSpec') && $object->getPluginSpec() !== null) {
                $data['PluginSpec'] = $this->normalizer->normalize($object->getPluginSpec(), 'json', $context);
            }
            if ($object->isInitialized('containerSpec') && $object->getContainerSpec() !== null) {
                $data['ContainerSpec'] = $this->normalizer->normalize($object->getContainerSpec(), 'json', $context);
            }
            if ($object->isInitialized('resources') && $object->getResources() !== null) {
                $data['Resources'] = $this->normalizer->normalize($object->getResources(), 'json', $context);
            }
            if ($object->isInitialized('restartPolicy') && $object->getRestartPolicy() !== null) {
                $data['RestartPolicy'] = $this->normalizer->normalize($object->getRestartPolicy(), 'json', $context);
            }
            if ($object->isInitialized('placement') && $object->getPlacement() !== null) {
                $data['Placement'] = $this->normalizer->normalize($object->getPlacement(), 'json', $context);
            }
            if ($object->isInitialized('forceUpdate') && $object->getForceUpdate() !== null) {
                $data['ForceUpdate'] = $object->getForceUpdate();
            }
            if ($object->isInitialized('runtime') && $object->getRuntime() !== null) {
                $data['Runtime'] = $object->getRuntime();
            }
            if ($object->isInitialized('networks') && $object->getNetworks() !== null) {
                $values = [];
                foreach ($object->getNetworks() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Networks'] = $values;
            }
            if ($object->isInitialized('logDriver') && $object->getLogDriver() !== null) {
                $data['LogDriver'] = $this->normalizer->normalize($object->getLogDriver(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\TaskSpec' => false];
        }
    }
}
