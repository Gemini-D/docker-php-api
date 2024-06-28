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
use Docker\API\Model\ImagesSearchGetResponse200Item;
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
    class ImagesSearchGetResponse200ItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ImagesSearchGetResponse200Item';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ImagesSearchGetResponse200Item';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ImagesSearchGetResponse200Item();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('description', $data)) {
                $object->setDescription($data['description']);
            }
            if (array_key_exists('is_official', $data)) {
                $object->setIsOfficial($data['is_official']);
            }
            if (array_key_exists('is_automated', $data)) {
                $object->setIsAutomated($data['is_automated']);
            }
            if (array_key_exists('name', $data)) {
                $object->setName($data['name']);
            }
            if (array_key_exists('star_count', $data)) {
                $object->setStarCount($data['star_count']);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('description') && $object->getDescription() !== null) {
                $data['description'] = $object->getDescription();
            }
            if ($object->isInitialized('isOfficial') && $object->getIsOfficial() !== null) {
                $data['is_official'] = $object->getIsOfficial();
            }
            if ($object->isInitialized('isAutomated') && $object->getIsAutomated() !== null) {
                $data['is_automated'] = $object->getIsAutomated();
            }
            if ($object->isInitialized('name') && $object->getName() !== null) {
                $data['name'] = $object->getName();
            }
            if ($object->isInitialized('starCount') && $object->getStarCount() !== null) {
                $data['star_count'] = $object->getStarCount();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ImagesSearchGetResponse200Item' => false];
        }
    }
} else {
    class ImagesSearchGetResponse200ItemNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ImagesSearchGetResponse200Item';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ImagesSearchGetResponse200Item';
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
            $object = new ImagesSearchGetResponse200Item();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('description', $data)) {
                $object->setDescription($data['description']);
            }
            if (array_key_exists('is_official', $data)) {
                $object->setIsOfficial($data['is_official']);
            }
            if (array_key_exists('is_automated', $data)) {
                $object->setIsAutomated($data['is_automated']);
            }
            if (array_key_exists('name', $data)) {
                $object->setName($data['name']);
            }
            if (array_key_exists('star_count', $data)) {
                $object->setStarCount($data['star_count']);
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
            if ($object->isInitialized('description') && $object->getDescription() !== null) {
                $data['description'] = $object->getDescription();
            }
            if ($object->isInitialized('isOfficial') && $object->getIsOfficial() !== null) {
                $data['is_official'] = $object->getIsOfficial();
            }
            if ($object->isInitialized('isAutomated') && $object->getIsAutomated() !== null) {
                $data['is_automated'] = $object->getIsAutomated();
            }
            if ($object->isInitialized('name') && $object->getName() !== null) {
                $data['name'] = $object->getName();
            }
            if ($object->isInitialized('starCount') && $object->getStarCount() !== null) {
                $data['star_count'] = $object->getStarCount();
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ImagesSearchGetResponse200Item' => false];
        }
    }
}
