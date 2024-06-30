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
use Docker\API\Model\Image;
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
    class ImageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Image';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Image';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Image();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Id', $data)) {
                $object->setId($data['Id']);
            }
            if (array_key_exists('RepoTags', $data)) {
                $values = [];
                foreach ($data['RepoTags'] ?? [] as $value) {
                    $values[] = $value;
                }
                $object->setRepoTags($values);
            }
            if (array_key_exists('RepoDigests', $data)) {
                $values_1 = [];
                foreach ($data['RepoDigests'] ?? [] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setRepoDigests($values_1);
            }
            if (array_key_exists('Parent', $data)) {
                $object->setParent($data['Parent']);
            }
            if (array_key_exists('Comment', $data)) {
                $object->setComment($data['Comment']);
            }
            if (array_key_exists('Created', $data)) {
                $object->setCreated($data['Created']);
            }
            if (array_key_exists('Container', $data)) {
                $object->setContainer($data['Container']);
            }
            if (array_key_exists('ContainerConfig', $data)) {
                $object->setContainerConfig($this->denormalizer->denormalize($data['ContainerConfig'], 'Docker\API\Model\ContainerConfig', 'json', $context));
            }
            if (array_key_exists('DockerVersion', $data)) {
                $object->setDockerVersion($data['DockerVersion']);
            }
            if (array_key_exists('Author', $data)) {
                $object->setAuthor($data['Author']);
            }
            if (array_key_exists('Config', $data)) {
                $object->setConfig($this->denormalizer->denormalize($data['Config'], 'Docker\API\Model\ContainerConfig', 'json', $context));
            }
            if (array_key_exists('Architecture', $data)) {
                $object->setArchitecture($data['Architecture']);
            }
            if (array_key_exists('Os', $data)) {
                $object->setOs($data['Os']);
            }
            if (array_key_exists('OsVersion', $data)) {
                $object->setOsVersion($data['OsVersion']);
            }
            if (array_key_exists('Size', $data)) {
                $object->setSize($data['Size']);
            }
            if (array_key_exists('VirtualSize', $data)) {
                $object->setVirtualSize($data['VirtualSize']);
            }
            if (array_key_exists('GraphDriver', $data)) {
                $object->setGraphDriver($this->denormalizer->denormalize($data['GraphDriver'], 'Docker\API\Model\GraphDriverData', 'json', $context));
            }
            if (array_key_exists('RootFS', $data)) {
                $object->setRootFS($this->denormalizer->denormalize($data['RootFS'], 'Docker\API\Model\ImageRootFS', 'json', $context));
            }
            if (array_key_exists('Metadata', $data)) {
                $object->setMetadata($this->denormalizer->denormalize($data['Metadata'], 'Docker\API\Model\ImageMetadata', 'json', $context));
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            $data['Id'] = $object->getId();
            if ($object->isInitialized('repoTags') && $object->getRepoTags() !== null) {
                $values = [];
                foreach ($object->getRepoTags() as $value) {
                    $values[] = $value;
                }
                $data['RepoTags'] = $values;
            }
            if ($object->isInitialized('repoDigests') && $object->getRepoDigests() !== null) {
                $values_1 = [];
                foreach ($object->getRepoDigests() as $value_1) {
                    $values_1[] = $value_1;
                }
                $data['RepoDigests'] = $values_1;
            }
            $data['Parent'] = $object->getParent();
            $data['Comment'] = $object->getComment();
            $data['Created'] = $object->getCreated();
            $data['Container'] = $object->getContainer();
            if ($object->isInitialized('containerConfig') && $object->getContainerConfig() !== null) {
                $data['ContainerConfig'] = $this->normalizer->normalize($object->getContainerConfig(), 'json', $context);
            }
            $data['DockerVersion'] = $object->getDockerVersion();
            $data['Author'] = $object->getAuthor();
            if ($object->isInitialized('config') && $object->getConfig() !== null) {
                $data['Config'] = $this->normalizer->normalize($object->getConfig(), 'json', $context);
            }
            $data['Architecture'] = $object->getArchitecture();
            $data['Os'] = $object->getOs();
            if ($object->isInitialized('osVersion') && $object->getOsVersion() !== null) {
                $data['OsVersion'] = $object->getOsVersion();
            }
            $data['Size'] = $object->getSize();
            $data['VirtualSize'] = $object->getVirtualSize();
            $data['GraphDriver'] = $this->normalizer->normalize($object->getGraphDriver(), 'json', $context);
            $data['RootFS'] = $this->normalizer->normalize($object->getRootFS(), 'json', $context);
            if ($object->isInitialized('metadata') && $object->getMetadata() !== null) {
                $data['Metadata'] = $this->normalizer->normalize($object->getMetadata(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Image' => false];
        }
    }
} else {
    class ImageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Image';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Image';
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
            $object = new Image();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Id', $data)) {
                $object->setId($data['Id']);
            }
            if (array_key_exists('RepoTags', $data)) {
                $values = [];
                foreach ($data['RepoTags'] ?? [] as $value) {
                    $values[] = $value;
                }
                $object->setRepoTags($values);
            }
            if (array_key_exists('RepoDigests', $data)) {
                $values_1 = [];
                foreach ($data['RepoDigests'] ?? [] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setRepoDigests($values_1);
            }
            if (array_key_exists('Parent', $data)) {
                $object->setParent($data['Parent']);
            }
            if (array_key_exists('Comment', $data)) {
                $object->setComment($data['Comment']);
            }
            if (array_key_exists('Created', $data)) {
                $object->setCreated($data['Created']);
            }
            if (array_key_exists('Container', $data)) {
                $object->setContainer($data['Container']);
            }
            if (array_key_exists('ContainerConfig', $data)) {
                $object->setContainerConfig($this->denormalizer->denormalize($data['ContainerConfig'], 'Docker\API\Model\ContainerConfig', 'json', $context));
            }
            if (array_key_exists('DockerVersion', $data)) {
                $object->setDockerVersion($data['DockerVersion']);
            }
            if (array_key_exists('Author', $data)) {
                $object->setAuthor($data['Author']);
            }
            if (array_key_exists('Config', $data)) {
                $object->setConfig($this->denormalizer->denormalize($data['Config'], 'Docker\API\Model\ContainerConfig', 'json', $context));
            }
            if (array_key_exists('Architecture', $data)) {
                $object->setArchitecture($data['Architecture']);
            }
            if (array_key_exists('Os', $data)) {
                $object->setOs($data['Os']);
            }
            if (array_key_exists('OsVersion', $data)) {
                $object->setOsVersion($data['OsVersion']);
            }
            if (array_key_exists('Size', $data)) {
                $object->setSize($data['Size']);
            }
            if (array_key_exists('VirtualSize', $data)) {
                $object->setVirtualSize($data['VirtualSize']);
            }
            if (array_key_exists('GraphDriver', $data)) {
                $object->setGraphDriver($this->denormalizer->denormalize($data['GraphDriver'], 'Docker\API\Model\GraphDriverData', 'json', $context));
            }
            if (array_key_exists('RootFS', $data)) {
                $object->setRootFS($this->denormalizer->denormalize($data['RootFS'], 'Docker\API\Model\ImageRootFS', 'json', $context));
            }
            if (array_key_exists('Metadata', $data)) {
                $object->setMetadata($this->denormalizer->denormalize($data['Metadata'], 'Docker\API\Model\ImageMetadata', 'json', $context));
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
            $data['Id'] = $object->getId();
            if ($object->isInitialized('repoTags') && $object->getRepoTags() !== null) {
                $values = [];
                foreach ($object->getRepoTags() as $value) {
                    $values[] = $value;
                }
                $data['RepoTags'] = $values;
            }
            if ($object->isInitialized('repoDigests') && $object->getRepoDigests() !== null) {
                $values_1 = [];
                foreach ($object->getRepoDigests() as $value_1) {
                    $values_1[] = $value_1;
                }
                $data['RepoDigests'] = $values_1;
            }
            $data['Parent'] = $object->getParent();
            $data['Comment'] = $object->getComment();
            $data['Created'] = $object->getCreated();
            $data['Container'] = $object->getContainer();
            if ($object->isInitialized('containerConfig') && $object->getContainerConfig() !== null) {
                $data['ContainerConfig'] = $this->normalizer->normalize($object->getContainerConfig(), 'json', $context);
            }
            $data['DockerVersion'] = $object->getDockerVersion();
            $data['Author'] = $object->getAuthor();
            if ($object->isInitialized('config') && $object->getConfig() !== null) {
                $data['Config'] = $this->normalizer->normalize($object->getConfig(), 'json', $context);
            }
            $data['Architecture'] = $object->getArchitecture();
            $data['Os'] = $object->getOs();
            if ($object->isInitialized('osVersion') && $object->getOsVersion() !== null) {
                $data['OsVersion'] = $object->getOsVersion();
            }
            $data['Size'] = $object->getSize();
            $data['VirtualSize'] = $object->getVirtualSize();
            $data['GraphDriver'] = $this->normalizer->normalize($object->getGraphDriver(), 'json', $context);
            $data['RootFS'] = $this->normalizer->normalize($object->getRootFS(), 'json', $context);
            if ($object->isInitialized('metadata') && $object->getMetadata() !== null) {
                $data['Metadata'] = $this->normalizer->normalize($object->getMetadata(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Image' => false];
        }
    }
}
