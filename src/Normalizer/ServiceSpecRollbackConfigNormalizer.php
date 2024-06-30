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
use Docker\API\Model\ServiceSpecRollbackConfig;
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
use function is_int;

if (! class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class ServiceSpecRollbackConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ServiceSpecRollbackConfig';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ServiceSpecRollbackConfig';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ServiceSpecRollbackConfig();
            if (array_key_exists('MaxFailureRatio', $data) && is_int($data['MaxFailureRatio'])) {
                $data['MaxFailureRatio'] = (float) $data['MaxFailureRatio'];
            }
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Parallelism', $data)) {
                $object->setParallelism($data['Parallelism']);
            }
            if (array_key_exists('Delay', $data)) {
                $object->setDelay($data['Delay']);
            }
            if (array_key_exists('FailureAction', $data)) {
                $object->setFailureAction($data['FailureAction']);
            }
            if (array_key_exists('Monitor', $data)) {
                $object->setMonitor($data['Monitor']);
            }
            if (array_key_exists('MaxFailureRatio', $data)) {
                $object->setMaxFailureRatio($data['MaxFailureRatio']);
            }
            if (array_key_exists('Order', $data)) {
                $object->setOrder($data['Order']);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('parallelism') && $object->getParallelism() !== null) {
                $data['Parallelism'] = $object->getParallelism();
            }
            if ($object->isInitialized('delay') && $object->getDelay() !== null) {
                $data['Delay'] = $object->getDelay();
            }
            if ($object->isInitialized('failureAction') && $object->getFailureAction() !== null) {
                $data['FailureAction'] = $object->getFailureAction();
            }
            if ($object->isInitialized('monitor') && $object->getMonitor() !== null) {
                $data['Monitor'] = $object->getMonitor();
            }
            if ($object->isInitialized('maxFailureRatio') && $object->getMaxFailureRatio() !== null) {
                $data['MaxFailureRatio'] = $object->getMaxFailureRatio();
            }
            if ($object->isInitialized('order') && $object->getOrder() !== null) {
                $data['Order'] = $object->getOrder();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ServiceSpecRollbackConfig' => false];
        }
    }
} else {
    class ServiceSpecRollbackConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ServiceSpecRollbackConfig';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ServiceSpecRollbackConfig';
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
            $object = new ServiceSpecRollbackConfig();
            if (array_key_exists('MaxFailureRatio', $data) && is_int($data['MaxFailureRatio'])) {
                $data['MaxFailureRatio'] = (float) $data['MaxFailureRatio'];
            }
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Parallelism', $data)) {
                $object->setParallelism($data['Parallelism']);
            }
            if (array_key_exists('Delay', $data)) {
                $object->setDelay($data['Delay']);
            }
            if (array_key_exists('FailureAction', $data)) {
                $object->setFailureAction($data['FailureAction']);
            }
            if (array_key_exists('Monitor', $data)) {
                $object->setMonitor($data['Monitor']);
            }
            if (array_key_exists('MaxFailureRatio', $data)) {
                $object->setMaxFailureRatio($data['MaxFailureRatio']);
            }
            if (array_key_exists('Order', $data)) {
                $object->setOrder($data['Order']);
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
            if ($object->isInitialized('parallelism') && $object->getParallelism() !== null) {
                $data['Parallelism'] = $object->getParallelism();
            }
            if ($object->isInitialized('delay') && $object->getDelay() !== null) {
                $data['Delay'] = $object->getDelay();
            }
            if ($object->isInitialized('failureAction') && $object->getFailureAction() !== null) {
                $data['FailureAction'] = $object->getFailureAction();
            }
            if ($object->isInitialized('monitor') && $object->getMonitor() !== null) {
                $data['Monitor'] = $object->getMonitor();
            }
            if ($object->isInitialized('maxFailureRatio') && $object->getMaxFailureRatio() !== null) {
                $data['MaxFailureRatio'] = $object->getMaxFailureRatio();
            }
            if ($object->isInitialized('order') && $object->getOrder() !== null) {
                $data['Order'] = $object->getOrder();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ServiceSpecRollbackConfig' => false];
        }
    }
}
