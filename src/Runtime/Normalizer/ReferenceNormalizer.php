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

namespace Docker\API\Runtime\Normalizer;

use ArrayObject;
use Jane\Component\JsonSchemaRuntime\Reference;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (Kernel::MAJOR_VERSION >= 7 || Kernel::MAJOR_VERSION === 6 && Kernel::MINOR_VERSION === 4) {
    class ReferenceNormalizer implements NormalizerInterface
    {
        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $ref = [];
            $ref['$ref'] = (string) $object->getReferenceUri();
            return $ref;
        }

        public function supportsNormalization($data, $format = null): bool
        {
            return $data instanceof Reference;
        }
    }
} else {
    class ReferenceNormalizer implements NormalizerInterface
    {
        public function normalize($object, $format = null, array $context = [])
        {
            $ref = [];
            $ref['$ref'] = (string) $object->getReferenceUri();
            return $ref;
        }

        public function supportsNormalization($data, $format = null): bool
        {
            return $data instanceof Reference;
        }
    }
}
