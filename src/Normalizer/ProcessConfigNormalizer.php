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
use Docker\API\Model\ProcessConfig;
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
    class ProcessConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ProcessConfig';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ProcessConfig';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ProcessConfig();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('privileged', $data)) {
                $object->setPrivileged($data['privileged']);
            }
            if (array_key_exists('user', $data)) {
                $object->setUser($data['user']);
            }
            if (array_key_exists('tty', $data)) {
                $object->setTty($data['tty']);
            }
            if (array_key_exists('entrypoint', $data)) {
                $object->setEntrypoint($data['entrypoint']);
            }
            if (array_key_exists('arguments', $data)) {
                $values = [];
                foreach ($data['arguments'] ?? [] as $value) {
                    $values[] = $value;
                }
                $object->setArguments($values);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('privileged') && $object->getPrivileged() !== null) {
                $data['privileged'] = $object->getPrivileged();
            }
            if ($object->isInitialized('user') && $object->getUser() !== null) {
                $data['user'] = $object->getUser();
            }
            if ($object->isInitialized('tty') && $object->getTty() !== null) {
                $data['tty'] = $object->getTty();
            }
            if ($object->isInitialized('entrypoint') && $object->getEntrypoint() !== null) {
                $data['entrypoint'] = $object->getEntrypoint();
            }
            if ($object->isInitialized('arguments') && $object->getArguments() !== null) {
                $values = [];
                foreach ($object->getArguments() as $value) {
                    $values[] = $value;
                }
                $data['arguments'] = $values;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ProcessConfig' => false];
        }
    }
} else {
    class ProcessConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ProcessConfig';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ProcessConfig';
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
            $object = new ProcessConfig();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('privileged', $data)) {
                $object->setPrivileged($data['privileged']);
            }
            if (array_key_exists('user', $data)) {
                $object->setUser($data['user']);
            }
            if (array_key_exists('tty', $data)) {
                $object->setTty($data['tty']);
            }
            if (array_key_exists('entrypoint', $data)) {
                $object->setEntrypoint($data['entrypoint']);
            }
            if (array_key_exists('arguments', $data)) {
                $values = [];
                foreach ($data['arguments'] ?? [] as $value) {
                    $values[] = $value;
                }
                $object->setArguments($values);
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
            if ($object->isInitialized('privileged') && $object->getPrivileged() !== null) {
                $data['privileged'] = $object->getPrivileged();
            }
            if ($object->isInitialized('user') && $object->getUser() !== null) {
                $data['user'] = $object->getUser();
            }
            if ($object->isInitialized('tty') && $object->getTty() !== null) {
                $data['tty'] = $object->getTty();
            }
            if ($object->isInitialized('entrypoint') && $object->getEntrypoint() !== null) {
                $data['entrypoint'] = $object->getEntrypoint();
            }
            if ($object->isInitialized('arguments') && $object->getArguments() !== null) {
                $values = [];
                foreach ($object->getArguments() as $value) {
                    $values[] = $value;
                }
                $data['arguments'] = $values;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ProcessConfig' => false];
        }
    }
}
