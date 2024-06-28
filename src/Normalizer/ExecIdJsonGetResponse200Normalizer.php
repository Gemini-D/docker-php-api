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
use Docker\API\Model\ExecIdJsonGetResponse200;
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
    class ExecIdJsonGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ExecIdJsonGetResponse200';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ExecIdJsonGetResponse200';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ExecIdJsonGetResponse200();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('CanRemove', $data)) {
                $object->setCanRemove($data['CanRemove']);
            }
            if (array_key_exists('DetachKeys', $data)) {
                $object->setDetachKeys($data['DetachKeys']);
            }
            if (array_key_exists('ID', $data)) {
                $object->setID($data['ID']);
            }
            if (array_key_exists('Running', $data)) {
                $object->setRunning($data['Running']);
            }
            if (array_key_exists('ExitCode', $data)) {
                $object->setExitCode($data['ExitCode']);
            }
            if (array_key_exists('ProcessConfig', $data)) {
                $object->setProcessConfig($this->denormalizer->denormalize($data['ProcessConfig'], 'Docker\API\Model\ProcessConfig', 'json', $context));
            }
            if (array_key_exists('OpenStdin', $data)) {
                $object->setOpenStdin($data['OpenStdin']);
            }
            if (array_key_exists('OpenStderr', $data)) {
                $object->setOpenStderr($data['OpenStderr']);
            }
            if (array_key_exists('OpenStdout', $data)) {
                $object->setOpenStdout($data['OpenStdout']);
            }
            if (array_key_exists('ContainerID', $data)) {
                $object->setContainerID($data['ContainerID']);
            }
            if (array_key_exists('Pid', $data)) {
                $object->setPid($data['Pid']);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('canRemove') && $object->getCanRemove() !== null) {
                $data['CanRemove'] = $object->getCanRemove();
            }
            if ($object->isInitialized('detachKeys') && $object->getDetachKeys() !== null) {
                $data['DetachKeys'] = $object->getDetachKeys();
            }
            if ($object->isInitialized('iD') && $object->getID() !== null) {
                $data['ID'] = $object->getID();
            }
            if ($object->isInitialized('running') && $object->getRunning() !== null) {
                $data['Running'] = $object->getRunning();
            }
            if ($object->isInitialized('exitCode') && $object->getExitCode() !== null) {
                $data['ExitCode'] = $object->getExitCode();
            }
            if ($object->isInitialized('processConfig') && $object->getProcessConfig() !== null) {
                $data['ProcessConfig'] = $this->normalizer->normalize($object->getProcessConfig(), 'json', $context);
            }
            if ($object->isInitialized('openStdin') && $object->getOpenStdin() !== null) {
                $data['OpenStdin'] = $object->getOpenStdin();
            }
            if ($object->isInitialized('openStderr') && $object->getOpenStderr() !== null) {
                $data['OpenStderr'] = $object->getOpenStderr();
            }
            if ($object->isInitialized('openStdout') && $object->getOpenStdout() !== null) {
                $data['OpenStdout'] = $object->getOpenStdout();
            }
            if ($object->isInitialized('containerID') && $object->getContainerID() !== null) {
                $data['ContainerID'] = $object->getContainerID();
            }
            if ($object->isInitialized('pid') && $object->getPid() !== null) {
                $data['Pid'] = $object->getPid();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ExecIdJsonGetResponse200' => false];
        }
    }
} else {
    class ExecIdJsonGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ExecIdJsonGetResponse200';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ExecIdJsonGetResponse200';
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
            $object = new ExecIdJsonGetResponse200();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('CanRemove', $data)) {
                $object->setCanRemove($data['CanRemove']);
            }
            if (array_key_exists('DetachKeys', $data)) {
                $object->setDetachKeys($data['DetachKeys']);
            }
            if (array_key_exists('ID', $data)) {
                $object->setID($data['ID']);
            }
            if (array_key_exists('Running', $data)) {
                $object->setRunning($data['Running']);
            }
            if (array_key_exists('ExitCode', $data)) {
                $object->setExitCode($data['ExitCode']);
            }
            if (array_key_exists('ProcessConfig', $data)) {
                $object->setProcessConfig($this->denormalizer->denormalize($data['ProcessConfig'], 'Docker\API\Model\ProcessConfig', 'json', $context));
            }
            if (array_key_exists('OpenStdin', $data)) {
                $object->setOpenStdin($data['OpenStdin']);
            }
            if (array_key_exists('OpenStderr', $data)) {
                $object->setOpenStderr($data['OpenStderr']);
            }
            if (array_key_exists('OpenStdout', $data)) {
                $object->setOpenStdout($data['OpenStdout']);
            }
            if (array_key_exists('ContainerID', $data)) {
                $object->setContainerID($data['ContainerID']);
            }
            if (array_key_exists('Pid', $data)) {
                $object->setPid($data['Pid']);
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
            if ($object->isInitialized('canRemove') && $object->getCanRemove() !== null) {
                $data['CanRemove'] = $object->getCanRemove();
            }
            if ($object->isInitialized('detachKeys') && $object->getDetachKeys() !== null) {
                $data['DetachKeys'] = $object->getDetachKeys();
            }
            if ($object->isInitialized('iD') && $object->getID() !== null) {
                $data['ID'] = $object->getID();
            }
            if ($object->isInitialized('running') && $object->getRunning() !== null) {
                $data['Running'] = $object->getRunning();
            }
            if ($object->isInitialized('exitCode') && $object->getExitCode() !== null) {
                $data['ExitCode'] = $object->getExitCode();
            }
            if ($object->isInitialized('processConfig') && $object->getProcessConfig() !== null) {
                $data['ProcessConfig'] = $this->normalizer->normalize($object->getProcessConfig(), 'json', $context);
            }
            if ($object->isInitialized('openStdin') && $object->getOpenStdin() !== null) {
                $data['OpenStdin'] = $object->getOpenStdin();
            }
            if ($object->isInitialized('openStderr') && $object->getOpenStderr() !== null) {
                $data['OpenStderr'] = $object->getOpenStderr();
            }
            if ($object->isInitialized('openStdout') && $object->getOpenStdout() !== null) {
                $data['OpenStdout'] = $object->getOpenStdout();
            }
            if ($object->isInitialized('containerID') && $object->getContainerID() !== null) {
                $data['ContainerID'] = $object->getContainerID();
            }
            if ($object->isInitialized('pid') && $object->getPid() !== null) {
                $data['Pid'] = $object->getPid();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ExecIdJsonGetResponse200' => false];
        }
    }
}
