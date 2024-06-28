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
use Docker\API\Model\ContainersIdExecPostBody;
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
    class ContainersIdExecPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ContainersIdExecPostBody';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ContainersIdExecPostBody';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ContainersIdExecPostBody();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('AttachStdin', $data)) {
                $object->setAttachStdin($data['AttachStdin']);
            }
            if (array_key_exists('AttachStdout', $data)) {
                $object->setAttachStdout($data['AttachStdout']);
            }
            if (array_key_exists('AttachStderr', $data)) {
                $object->setAttachStderr($data['AttachStderr']);
            }
            if (array_key_exists('DetachKeys', $data)) {
                $object->setDetachKeys($data['DetachKeys']);
            }
            if (array_key_exists('Tty', $data)) {
                $object->setTty($data['Tty']);
            }
            if (array_key_exists('Env', $data)) {
                $values = [];
                foreach ($data['Env'] as $value) {
                    $values[] = $value;
                }
                $object->setEnv($values);
            }
            if (array_key_exists('Cmd', $data)) {
                $values_1 = [];
                foreach ($data['Cmd'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setCmd($values_1);
            }
            if (array_key_exists('Privileged', $data)) {
                $object->setPrivileged($data['Privileged']);
            }
            if (array_key_exists('User', $data)) {
                $object->setUser($data['User']);
            }
            if (array_key_exists('WorkingDir', $data)) {
                $object->setWorkingDir($data['WorkingDir']);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('attachStdin') && $object->getAttachStdin() !== null) {
                $data['AttachStdin'] = $object->getAttachStdin();
            }
            if ($object->isInitialized('attachStdout') && $object->getAttachStdout() !== null) {
                $data['AttachStdout'] = $object->getAttachStdout();
            }
            if ($object->isInitialized('attachStderr') && $object->getAttachStderr() !== null) {
                $data['AttachStderr'] = $object->getAttachStderr();
            }
            if ($object->isInitialized('detachKeys') && $object->getDetachKeys() !== null) {
                $data['DetachKeys'] = $object->getDetachKeys();
            }
            if ($object->isInitialized('tty') && $object->getTty() !== null) {
                $data['Tty'] = $object->getTty();
            }
            if ($object->isInitialized('env') && $object->getEnv() !== null) {
                $values = [];
                foreach ($object->getEnv() as $value) {
                    $values[] = $value;
                }
                $data['Env'] = $values;
            }
            if ($object->isInitialized('cmd') && $object->getCmd() !== null) {
                $values_1 = [];
                foreach ($object->getCmd() as $value_1) {
                    $values_1[] = $value_1;
                }
                $data['Cmd'] = $values_1;
            }
            if ($object->isInitialized('privileged') && $object->getPrivileged() !== null) {
                $data['Privileged'] = $object->getPrivileged();
            }
            if ($object->isInitialized('user') && $object->getUser() !== null) {
                $data['User'] = $object->getUser();
            }
            if ($object->isInitialized('workingDir') && $object->getWorkingDir() !== null) {
                $data['WorkingDir'] = $object->getWorkingDir();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ContainersIdExecPostBody' => false];
        }
    }
} else {
    class ContainersIdExecPostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ContainersIdExecPostBody';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ContainersIdExecPostBody';
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
            $object = new ContainersIdExecPostBody();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('AttachStdin', $data)) {
                $object->setAttachStdin($data['AttachStdin']);
            }
            if (array_key_exists('AttachStdout', $data)) {
                $object->setAttachStdout($data['AttachStdout']);
            }
            if (array_key_exists('AttachStderr', $data)) {
                $object->setAttachStderr($data['AttachStderr']);
            }
            if (array_key_exists('DetachKeys', $data)) {
                $object->setDetachKeys($data['DetachKeys']);
            }
            if (array_key_exists('Tty', $data)) {
                $object->setTty($data['Tty']);
            }
            if (array_key_exists('Env', $data)) {
                $values = [];
                foreach ($data['Env'] as $value) {
                    $values[] = $value;
                }
                $object->setEnv($values);
            }
            if (array_key_exists('Cmd', $data)) {
                $values_1 = [];
                foreach ($data['Cmd'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setCmd($values_1);
            }
            if (array_key_exists('Privileged', $data)) {
                $object->setPrivileged($data['Privileged']);
            }
            if (array_key_exists('User', $data)) {
                $object->setUser($data['User']);
            }
            if (array_key_exists('WorkingDir', $data)) {
                $object->setWorkingDir($data['WorkingDir']);
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
            if ($object->isInitialized('attachStdin') && $object->getAttachStdin() !== null) {
                $data['AttachStdin'] = $object->getAttachStdin();
            }
            if ($object->isInitialized('attachStdout') && $object->getAttachStdout() !== null) {
                $data['AttachStdout'] = $object->getAttachStdout();
            }
            if ($object->isInitialized('attachStderr') && $object->getAttachStderr() !== null) {
                $data['AttachStderr'] = $object->getAttachStderr();
            }
            if ($object->isInitialized('detachKeys') && $object->getDetachKeys() !== null) {
                $data['DetachKeys'] = $object->getDetachKeys();
            }
            if ($object->isInitialized('tty') && $object->getTty() !== null) {
                $data['Tty'] = $object->getTty();
            }
            if ($object->isInitialized('env') && $object->getEnv() !== null) {
                $values = [];
                foreach ($object->getEnv() as $value) {
                    $values[] = $value;
                }
                $data['Env'] = $values;
            }
            if ($object->isInitialized('cmd') && $object->getCmd() !== null) {
                $values_1 = [];
                foreach ($object->getCmd() as $value_1) {
                    $values_1[] = $value_1;
                }
                $data['Cmd'] = $values_1;
            }
            if ($object->isInitialized('privileged') && $object->getPrivileged() !== null) {
                $data['Privileged'] = $object->getPrivileged();
            }
            if ($object->isInitialized('user') && $object->getUser() !== null) {
                $data['User'] = $object->getUser();
            }
            if ($object->isInitialized('workingDir') && $object->getWorkingDir() !== null) {
                $data['WorkingDir'] = $object->getWorkingDir();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ContainersIdExecPostBody' => false];
        }
    }
}
