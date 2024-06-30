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
use Docker\API\Model\ContainersIdJsonGetResponse200State;
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
    class ContainersIdJsonGetResponse200StateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ContainersIdJsonGetResponse200State';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ContainersIdJsonGetResponse200State';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ContainersIdJsonGetResponse200State();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Status', $data)) {
                $object->setStatus($data['Status']);
            }
            if (array_key_exists('Running', $data)) {
                $object->setRunning($data['Running']);
            }
            if (array_key_exists('Paused', $data)) {
                $object->setPaused($data['Paused']);
            }
            if (array_key_exists('Restarting', $data)) {
                $object->setRestarting($data['Restarting']);
            }
            if (array_key_exists('OOMKilled', $data)) {
                $object->setOOMKilled($data['OOMKilled']);
            }
            if (array_key_exists('Dead', $data)) {
                $object->setDead($data['Dead']);
            }
            if (array_key_exists('Pid', $data)) {
                $object->setPid($data['Pid']);
            }
            if (array_key_exists('ExitCode', $data)) {
                $object->setExitCode($data['ExitCode']);
            }
            if (array_key_exists('Error', $data)) {
                $object->setError($data['Error']);
            }
            if (array_key_exists('StartedAt', $data)) {
                $object->setStartedAt($data['StartedAt']);
            }
            if (array_key_exists('FinishedAt', $data)) {
                $object->setFinishedAt($data['FinishedAt']);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $data['Status'] = $object->getStatus();
            }
            if ($object->isInitialized('running') && $object->getRunning() !== null) {
                $data['Running'] = $object->getRunning();
            }
            if ($object->isInitialized('paused') && $object->getPaused() !== null) {
                $data['Paused'] = $object->getPaused();
            }
            if ($object->isInitialized('restarting') && $object->getRestarting() !== null) {
                $data['Restarting'] = $object->getRestarting();
            }
            if ($object->isInitialized('oOMKilled') && $object->getOOMKilled() !== null) {
                $data['OOMKilled'] = $object->getOOMKilled();
            }
            if ($object->isInitialized('dead') && $object->getDead() !== null) {
                $data['Dead'] = $object->getDead();
            }
            if ($object->isInitialized('pid') && $object->getPid() !== null) {
                $data['Pid'] = $object->getPid();
            }
            if ($object->isInitialized('exitCode') && $object->getExitCode() !== null) {
                $data['ExitCode'] = $object->getExitCode();
            }
            if ($object->isInitialized('error') && $object->getError() !== null) {
                $data['Error'] = $object->getError();
            }
            if ($object->isInitialized('startedAt') && $object->getStartedAt() !== null) {
                $data['StartedAt'] = $object->getStartedAt();
            }
            if ($object->isInitialized('finishedAt') && $object->getFinishedAt() !== null) {
                $data['FinishedAt'] = $object->getFinishedAt();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ContainersIdJsonGetResponse200State' => false];
        }
    }
} else {
    class ContainersIdJsonGetResponse200StateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ContainersIdJsonGetResponse200State';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ContainersIdJsonGetResponse200State';
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
            $object = new ContainersIdJsonGetResponse200State();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Status', $data)) {
                $object->setStatus($data['Status']);
            }
            if (array_key_exists('Running', $data)) {
                $object->setRunning($data['Running']);
            }
            if (array_key_exists('Paused', $data)) {
                $object->setPaused($data['Paused']);
            }
            if (array_key_exists('Restarting', $data)) {
                $object->setRestarting($data['Restarting']);
            }
            if (array_key_exists('OOMKilled', $data)) {
                $object->setOOMKilled($data['OOMKilled']);
            }
            if (array_key_exists('Dead', $data)) {
                $object->setDead($data['Dead']);
            }
            if (array_key_exists('Pid', $data)) {
                $object->setPid($data['Pid']);
            }
            if (array_key_exists('ExitCode', $data)) {
                $object->setExitCode($data['ExitCode']);
            }
            if (array_key_exists('Error', $data)) {
                $object->setError($data['Error']);
            }
            if (array_key_exists('StartedAt', $data)) {
                $object->setStartedAt($data['StartedAt']);
            }
            if (array_key_exists('FinishedAt', $data)) {
                $object->setFinishedAt($data['FinishedAt']);
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
            if ($object->isInitialized('status') && $object->getStatus() !== null) {
                $data['Status'] = $object->getStatus();
            }
            if ($object->isInitialized('running') && $object->getRunning() !== null) {
                $data['Running'] = $object->getRunning();
            }
            if ($object->isInitialized('paused') && $object->getPaused() !== null) {
                $data['Paused'] = $object->getPaused();
            }
            if ($object->isInitialized('restarting') && $object->getRestarting() !== null) {
                $data['Restarting'] = $object->getRestarting();
            }
            if ($object->isInitialized('oOMKilled') && $object->getOOMKilled() !== null) {
                $data['OOMKilled'] = $object->getOOMKilled();
            }
            if ($object->isInitialized('dead') && $object->getDead() !== null) {
                $data['Dead'] = $object->getDead();
            }
            if ($object->isInitialized('pid') && $object->getPid() !== null) {
                $data['Pid'] = $object->getPid();
            }
            if ($object->isInitialized('exitCode') && $object->getExitCode() !== null) {
                $data['ExitCode'] = $object->getExitCode();
            }
            if ($object->isInitialized('error') && $object->getError() !== null) {
                $data['Error'] = $object->getError();
            }
            if ($object->isInitialized('startedAt') && $object->getStartedAt() !== null) {
                $data['StartedAt'] = $object->getStartedAt();
            }
            if ($object->isInitialized('finishedAt') && $object->getFinishedAt() !== null) {
                $data['FinishedAt'] = $object->getFinishedAt();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ContainersIdJsonGetResponse200State' => false];
        }
    }
}
