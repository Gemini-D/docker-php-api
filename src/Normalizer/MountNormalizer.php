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
use Docker\API\Model\Mount;
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
    class MountNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Mount';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Mount';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Mount();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Target', $data)) {
                $object->setTarget($data['Target']);
            }
            if (array_key_exists('Source', $data)) {
                $object->setSource($data['Source']);
            }
            if (array_key_exists('Type', $data)) {
                $object->setType($data['Type']);
            }
            if (array_key_exists('ReadOnly', $data)) {
                $object->setReadOnly($data['ReadOnly']);
            }
            if (array_key_exists('Consistency', $data)) {
                $object->setConsistency($data['Consistency']);
            }
            if (array_key_exists('BindOptions', $data)) {
                $object->setBindOptions($this->denormalizer->denormalize($data['BindOptions'], 'Docker\API\Model\MountBindOptions', 'json', $context));
            }
            if (array_key_exists('VolumeOptions', $data)) {
                $object->setVolumeOptions($this->denormalizer->denormalize($data['VolumeOptions'], 'Docker\API\Model\MountVolumeOptions', 'json', $context));
            }
            if (array_key_exists('TmpfsOptions', $data)) {
                $object->setTmpfsOptions($this->denormalizer->denormalize($data['TmpfsOptions'], 'Docker\API\Model\MountTmpfsOptions', 'json', $context));
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('target') && $object->getTarget() !== null) {
                $data['Target'] = $object->getTarget();
            }
            if ($object->isInitialized('source') && $object->getSource() !== null) {
                $data['Source'] = $object->getSource();
            }
            if ($object->isInitialized('type') && $object->getType() !== null) {
                $data['Type'] = $object->getType();
            }
            if ($object->isInitialized('readOnly') && $object->getReadOnly() !== null) {
                $data['ReadOnly'] = $object->getReadOnly();
            }
            if ($object->isInitialized('consistency') && $object->getConsistency() !== null) {
                $data['Consistency'] = $object->getConsistency();
            }
            if ($object->isInitialized('bindOptions') && $object->getBindOptions() !== null) {
                $data['BindOptions'] = $this->normalizer->normalize($object->getBindOptions(), 'json', $context);
            }
            if ($object->isInitialized('volumeOptions') && $object->getVolumeOptions() !== null) {
                $data['VolumeOptions'] = $this->normalizer->normalize($object->getVolumeOptions(), 'json', $context);
            }
            if ($object->isInitialized('tmpfsOptions') && $object->getTmpfsOptions() !== null) {
                $data['TmpfsOptions'] = $this->normalizer->normalize($object->getTmpfsOptions(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Mount' => false];
        }
    }
} else {
    class MountNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\Mount';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\Mount';
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
            $object = new Mount();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Target', $data)) {
                $object->setTarget($data['Target']);
            }
            if (array_key_exists('Source', $data)) {
                $object->setSource($data['Source']);
            }
            if (array_key_exists('Type', $data)) {
                $object->setType($data['Type']);
            }
            if (array_key_exists('ReadOnly', $data)) {
                $object->setReadOnly($data['ReadOnly']);
            }
            if (array_key_exists('Consistency', $data)) {
                $object->setConsistency($data['Consistency']);
            }
            if (array_key_exists('BindOptions', $data)) {
                $object->setBindOptions($this->denormalizer->denormalize($data['BindOptions'], 'Docker\API\Model\MountBindOptions', 'json', $context));
            }
            if (array_key_exists('VolumeOptions', $data)) {
                $object->setVolumeOptions($this->denormalizer->denormalize($data['VolumeOptions'], 'Docker\API\Model\MountVolumeOptions', 'json', $context));
            }
            if (array_key_exists('TmpfsOptions', $data)) {
                $object->setTmpfsOptions($this->denormalizer->denormalize($data['TmpfsOptions'], 'Docker\API\Model\MountTmpfsOptions', 'json', $context));
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
            if ($object->isInitialized('target') && $object->getTarget() !== null) {
                $data['Target'] = $object->getTarget();
            }
            if ($object->isInitialized('source') && $object->getSource() !== null) {
                $data['Source'] = $object->getSource();
            }
            if ($object->isInitialized('type') && $object->getType() !== null) {
                $data['Type'] = $object->getType();
            }
            if ($object->isInitialized('readOnly') && $object->getReadOnly() !== null) {
                $data['ReadOnly'] = $object->getReadOnly();
            }
            if ($object->isInitialized('consistency') && $object->getConsistency() !== null) {
                $data['Consistency'] = $object->getConsistency();
            }
            if ($object->isInitialized('bindOptions') && $object->getBindOptions() !== null) {
                $data['BindOptions'] = $this->normalizer->normalize($object->getBindOptions(), 'json', $context);
            }
            if ($object->isInitialized('volumeOptions') && $object->getVolumeOptions() !== null) {
                $data['VolumeOptions'] = $this->normalizer->normalize($object->getVolumeOptions(), 'json', $context);
            }
            if ($object->isInitialized('tmpfsOptions') && $object->getTmpfsOptions() !== null) {
                $data['TmpfsOptions'] = $this->normalizer->normalize($object->getTmpfsOptions(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Mount' => false];
        }
    }
}
