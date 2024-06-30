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
use Docker\API\Model\VersionGetResponse200;
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
    class VersionGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\VersionGetResponse200';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\VersionGetResponse200';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new VersionGetResponse200();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Platform', $data)) {
                $object->setPlatform($this->denormalizer->denormalize($data['Platform'], 'Docker\API\Model\VersionGetResponse200Platform', 'json', $context));
            }
            if (array_key_exists('Components', $data)) {
                $values = [];
                foreach ($data['Components'] ?? [] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\VersionGetResponse200ComponentsItem', 'json', $context);
                }
                $object->setComponents($values);
            }
            if (array_key_exists('Version', $data)) {
                $object->setVersion($data['Version']);
            }
            if (array_key_exists('ApiVersion', $data)) {
                $object->setApiVersion($data['ApiVersion']);
            }
            if (array_key_exists('MinAPIVersion', $data)) {
                $object->setMinAPIVersion($data['MinAPIVersion']);
            }
            if (array_key_exists('GitCommit', $data)) {
                $object->setGitCommit($data['GitCommit']);
            }
            if (array_key_exists('GoVersion', $data)) {
                $object->setGoVersion($data['GoVersion']);
            }
            if (array_key_exists('Os', $data)) {
                $object->setOs($data['Os']);
            }
            if (array_key_exists('Arch', $data)) {
                $object->setArch($data['Arch']);
            }
            if (array_key_exists('KernelVersion', $data)) {
                $object->setKernelVersion($data['KernelVersion']);
            }
            if (array_key_exists('Experimental', $data)) {
                $object->setExperimental($data['Experimental']);
            }
            if (array_key_exists('BuildTime', $data)) {
                $object->setBuildTime($data['BuildTime']);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('platform') && $object->getPlatform() !== null) {
                $data['Platform'] = $this->normalizer->normalize($object->getPlatform(), 'json', $context);
            }
            if ($object->isInitialized('components') && $object->getComponents() !== null) {
                $values = [];
                foreach ($object->getComponents() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Components'] = $values;
            }
            if ($object->isInitialized('version') && $object->getVersion() !== null) {
                $data['Version'] = $object->getVersion();
            }
            if ($object->isInitialized('apiVersion') && $object->getApiVersion() !== null) {
                $data['ApiVersion'] = $object->getApiVersion();
            }
            if ($object->isInitialized('minAPIVersion') && $object->getMinAPIVersion() !== null) {
                $data['MinAPIVersion'] = $object->getMinAPIVersion();
            }
            if ($object->isInitialized('gitCommit') && $object->getGitCommit() !== null) {
                $data['GitCommit'] = $object->getGitCommit();
            }
            if ($object->isInitialized('goVersion') && $object->getGoVersion() !== null) {
                $data['GoVersion'] = $object->getGoVersion();
            }
            if ($object->isInitialized('os') && $object->getOs() !== null) {
                $data['Os'] = $object->getOs();
            }
            if ($object->isInitialized('arch') && $object->getArch() !== null) {
                $data['Arch'] = $object->getArch();
            }
            if ($object->isInitialized('kernelVersion') && $object->getKernelVersion() !== null) {
                $data['KernelVersion'] = $object->getKernelVersion();
            }
            if ($object->isInitialized('experimental') && $object->getExperimental() !== null) {
                $data['Experimental'] = $object->getExperimental();
            }
            if ($object->isInitialized('buildTime') && $object->getBuildTime() !== null) {
                $data['BuildTime'] = $object->getBuildTime();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\VersionGetResponse200' => false];
        }
    }
} else {
    class VersionGetResponse200Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\VersionGetResponse200';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\VersionGetResponse200';
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
            $object = new VersionGetResponse200();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Platform', $data)) {
                $object->setPlatform($this->denormalizer->denormalize($data['Platform'], 'Docker\API\Model\VersionGetResponse200Platform', 'json', $context));
            }
            if (array_key_exists('Components', $data)) {
                $values = [];
                foreach ($data['Components'] ?? [] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, 'Docker\API\Model\VersionGetResponse200ComponentsItem', 'json', $context);
                }
                $object->setComponents($values);
            }
            if (array_key_exists('Version', $data)) {
                $object->setVersion($data['Version']);
            }
            if (array_key_exists('ApiVersion', $data)) {
                $object->setApiVersion($data['ApiVersion']);
            }
            if (array_key_exists('MinAPIVersion', $data)) {
                $object->setMinAPIVersion($data['MinAPIVersion']);
            }
            if (array_key_exists('GitCommit', $data)) {
                $object->setGitCommit($data['GitCommit']);
            }
            if (array_key_exists('GoVersion', $data)) {
                $object->setGoVersion($data['GoVersion']);
            }
            if (array_key_exists('Os', $data)) {
                $object->setOs($data['Os']);
            }
            if (array_key_exists('Arch', $data)) {
                $object->setArch($data['Arch']);
            }
            if (array_key_exists('KernelVersion', $data)) {
                $object->setKernelVersion($data['KernelVersion']);
            }
            if (array_key_exists('Experimental', $data)) {
                $object->setExperimental($data['Experimental']);
            }
            if (array_key_exists('BuildTime', $data)) {
                $object->setBuildTime($data['BuildTime']);
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
            if ($object->isInitialized('platform') && $object->getPlatform() !== null) {
                $data['Platform'] = $this->normalizer->normalize($object->getPlatform(), 'json', $context);
            }
            if ($object->isInitialized('components') && $object->getComponents() !== null) {
                $values = [];
                foreach ($object->getComponents() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['Components'] = $values;
            }
            if ($object->isInitialized('version') && $object->getVersion() !== null) {
                $data['Version'] = $object->getVersion();
            }
            if ($object->isInitialized('apiVersion') && $object->getApiVersion() !== null) {
                $data['ApiVersion'] = $object->getApiVersion();
            }
            if ($object->isInitialized('minAPIVersion') && $object->getMinAPIVersion() !== null) {
                $data['MinAPIVersion'] = $object->getMinAPIVersion();
            }
            if ($object->isInitialized('gitCommit') && $object->getGitCommit() !== null) {
                $data['GitCommit'] = $object->getGitCommit();
            }
            if ($object->isInitialized('goVersion') && $object->getGoVersion() !== null) {
                $data['GoVersion'] = $object->getGoVersion();
            }
            if ($object->isInitialized('os') && $object->getOs() !== null) {
                $data['Os'] = $object->getOs();
            }
            if ($object->isInitialized('arch') && $object->getArch() !== null) {
                $data['Arch'] = $object->getArch();
            }
            if ($object->isInitialized('kernelVersion') && $object->getKernelVersion() !== null) {
                $data['KernelVersion'] = $object->getKernelVersion();
            }
            if ($object->isInitialized('experimental') && $object->getExperimental() !== null) {
                $data['Experimental'] = $object->getExperimental();
            }
            if ($object->isInitialized('buildTime') && $object->getBuildTime() !== null) {
                $data['BuildTime'] = $object->getBuildTime();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\VersionGetResponse200' => false];
        }
    }
}
