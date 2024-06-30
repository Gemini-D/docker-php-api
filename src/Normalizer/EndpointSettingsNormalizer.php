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
use Docker\API\Model\EndpointSettings;
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
    class EndpointSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\EndpointSettings';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\EndpointSettings';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new EndpointSettings();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('IPAMConfig', $data) && $data['IPAMConfig'] !== null) {
                $object->setIPAMConfig($this->denormalizer->denormalize($data['IPAMConfig'], 'Docker\API\Model\EndpointIPAMConfig', 'json', $context));
            } elseif (array_key_exists('IPAMConfig', $data) && $data['IPAMConfig'] === null) {
                $object->setIPAMConfig(null);
            }
            if (array_key_exists('Links', $data)) {
                $values = [];
                foreach ($data['Links'] ?? [] as $value) {
                    $values[] = $value;
                }
                $object->setLinks($values);
            }
            if (array_key_exists('Aliases', $data)) {
                $values_1 = [];
                foreach ($data['Aliases'] ?? [] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setAliases($values_1);
            }
            if (array_key_exists('NetworkID', $data)) {
                $object->setNetworkID($data['NetworkID']);
            }
            if (array_key_exists('EndpointID', $data)) {
                $object->setEndpointID($data['EndpointID']);
            }
            if (array_key_exists('Gateway', $data)) {
                $object->setGateway($data['Gateway']);
            }
            if (array_key_exists('IPAddress', $data)) {
                $object->setIPAddress($data['IPAddress']);
            }
            if (array_key_exists('IPPrefixLen', $data)) {
                $object->setIPPrefixLen($data['IPPrefixLen']);
            }
            if (array_key_exists('IPv6Gateway', $data)) {
                $object->setIPv6Gateway($data['IPv6Gateway']);
            }
            if (array_key_exists('GlobalIPv6Address', $data)) {
                $object->setGlobalIPv6Address($data['GlobalIPv6Address']);
            }
            if (array_key_exists('GlobalIPv6PrefixLen', $data)) {
                $object->setGlobalIPv6PrefixLen($data['GlobalIPv6PrefixLen']);
            }
            if (array_key_exists('MacAddress', $data)) {
                $object->setMacAddress($data['MacAddress']);
            }
            if (array_key_exists('DriverOpts', $data) && $data['DriverOpts'] !== null) {
                $values_2 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['DriverOpts'] ?? [] as $key => $value_2) {
                    if ($value_2 === null) {
                        $values_2[$key] = null;
                        continue;
                    }
                    $values_2[$key] = $value_2;
                }
                $object->setDriverOpts($values_2);
            } elseif (array_key_exists('DriverOpts', $data) && $data['DriverOpts'] === null) {
                $object->setDriverOpts(null);
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('iPAMConfig') && $object->getIPAMConfig() !== null) {
                $data['IPAMConfig'] = $this->normalizer->normalize($object->getIPAMConfig(), 'json', $context);
            }
            if ($object->isInitialized('links') && $object->getLinks() !== null) {
                $values = [];
                foreach ($object->getLinks() as $value) {
                    $values[] = $value;
                }
                $data['Links'] = $values;
            }
            if ($object->isInitialized('aliases') && $object->getAliases() !== null) {
                $values_1 = [];
                foreach ($object->getAliases() as $value_1) {
                    $values_1[] = $value_1;
                }
                $data['Aliases'] = $values_1;
            }
            if ($object->isInitialized('networkID') && $object->getNetworkID() !== null) {
                $data['NetworkID'] = $object->getNetworkID();
            }
            if ($object->isInitialized('endpointID') && $object->getEndpointID() !== null) {
                $data['EndpointID'] = $object->getEndpointID();
            }
            if ($object->isInitialized('gateway') && $object->getGateway() !== null) {
                $data['Gateway'] = $object->getGateway();
            }
            if ($object->isInitialized('iPAddress') && $object->getIPAddress() !== null) {
                $data['IPAddress'] = $object->getIPAddress();
            }
            if ($object->isInitialized('iPPrefixLen') && $object->getIPPrefixLen() !== null) {
                $data['IPPrefixLen'] = $object->getIPPrefixLen();
            }
            if ($object->isInitialized('iPv6Gateway') && $object->getIPv6Gateway() !== null) {
                $data['IPv6Gateway'] = $object->getIPv6Gateway();
            }
            if ($object->isInitialized('globalIPv6Address') && $object->getGlobalIPv6Address() !== null) {
                $data['GlobalIPv6Address'] = $object->getGlobalIPv6Address();
            }
            if ($object->isInitialized('globalIPv6PrefixLen') && $object->getGlobalIPv6PrefixLen() !== null) {
                $data['GlobalIPv6PrefixLen'] = $object->getGlobalIPv6PrefixLen();
            }
            if ($object->isInitialized('macAddress') && $object->getMacAddress() !== null) {
                $data['MacAddress'] = $object->getMacAddress();
            }
            if ($object->isInitialized('driverOpts') && $object->getDriverOpts() !== null) {
                $values_2 = [];
                foreach ($object->getDriverOpts() as $key => $value_2) {
                    $values_2[$key] = $value_2;
                }
                $data['DriverOpts'] = $values_2;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\EndpointSettings' => false];
        }
    }
} else {
    class EndpointSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\EndpointSettings';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\EndpointSettings';
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
            $object = new EndpointSettings();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('IPAMConfig', $data) && $data['IPAMConfig'] !== null) {
                $object->setIPAMConfig($this->denormalizer->denormalize($data['IPAMConfig'], 'Docker\API\Model\EndpointIPAMConfig', 'json', $context));
            } elseif (array_key_exists('IPAMConfig', $data) && $data['IPAMConfig'] === null) {
                $object->setIPAMConfig(null);
            }
            if (array_key_exists('Links', $data)) {
                $values = [];
                foreach ($data['Links'] ?? [] as $value) {
                    $values[] = $value;
                }
                $object->setLinks($values);
            }
            if (array_key_exists('Aliases', $data)) {
                $values_1 = [];
                foreach ($data['Aliases'] ?? [] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setAliases($values_1);
            }
            if (array_key_exists('NetworkID', $data)) {
                $object->setNetworkID($data['NetworkID']);
            }
            if (array_key_exists('EndpointID', $data)) {
                $object->setEndpointID($data['EndpointID']);
            }
            if (array_key_exists('Gateway', $data)) {
                $object->setGateway($data['Gateway']);
            }
            if (array_key_exists('IPAddress', $data)) {
                $object->setIPAddress($data['IPAddress']);
            }
            if (array_key_exists('IPPrefixLen', $data)) {
                $object->setIPPrefixLen($data['IPPrefixLen']);
            }
            if (array_key_exists('IPv6Gateway', $data)) {
                $object->setIPv6Gateway($data['IPv6Gateway']);
            }
            if (array_key_exists('GlobalIPv6Address', $data)) {
                $object->setGlobalIPv6Address($data['GlobalIPv6Address']);
            }
            if (array_key_exists('GlobalIPv6PrefixLen', $data)) {
                $object->setGlobalIPv6PrefixLen($data['GlobalIPv6PrefixLen']);
            }
            if (array_key_exists('MacAddress', $data)) {
                $object->setMacAddress($data['MacAddress']);
            }
            if (array_key_exists('DriverOpts', $data) && $data['DriverOpts'] !== null) {
                $values_2 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['DriverOpts'] ?? [] as $key => $value_2) {
                    if ($value_2 === null) {
                        $values_2[$key] = null;
                        continue;
                    }
                    $values_2[$key] = $value_2;
                }
                $object->setDriverOpts($values_2);
            } elseif (array_key_exists('DriverOpts', $data) && $data['DriverOpts'] === null) {
                $object->setDriverOpts(null);
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
            if ($object->isInitialized('iPAMConfig') && $object->getIPAMConfig() !== null) {
                $data['IPAMConfig'] = $this->normalizer->normalize($object->getIPAMConfig(), 'json', $context);
            }
            if ($object->isInitialized('links') && $object->getLinks() !== null) {
                $values = [];
                foreach ($object->getLinks() as $value) {
                    $values[] = $value;
                }
                $data['Links'] = $values;
            }
            if ($object->isInitialized('aliases') && $object->getAliases() !== null) {
                $values_1 = [];
                foreach ($object->getAliases() as $value_1) {
                    $values_1[] = $value_1;
                }
                $data['Aliases'] = $values_1;
            }
            if ($object->isInitialized('networkID') && $object->getNetworkID() !== null) {
                $data['NetworkID'] = $object->getNetworkID();
            }
            if ($object->isInitialized('endpointID') && $object->getEndpointID() !== null) {
                $data['EndpointID'] = $object->getEndpointID();
            }
            if ($object->isInitialized('gateway') && $object->getGateway() !== null) {
                $data['Gateway'] = $object->getGateway();
            }
            if ($object->isInitialized('iPAddress') && $object->getIPAddress() !== null) {
                $data['IPAddress'] = $object->getIPAddress();
            }
            if ($object->isInitialized('iPPrefixLen') && $object->getIPPrefixLen() !== null) {
                $data['IPPrefixLen'] = $object->getIPPrefixLen();
            }
            if ($object->isInitialized('iPv6Gateway') && $object->getIPv6Gateway() !== null) {
                $data['IPv6Gateway'] = $object->getIPv6Gateway();
            }
            if ($object->isInitialized('globalIPv6Address') && $object->getGlobalIPv6Address() !== null) {
                $data['GlobalIPv6Address'] = $object->getGlobalIPv6Address();
            }
            if ($object->isInitialized('globalIPv6PrefixLen') && $object->getGlobalIPv6PrefixLen() !== null) {
                $data['GlobalIPv6PrefixLen'] = $object->getGlobalIPv6PrefixLen();
            }
            if ($object->isInitialized('macAddress') && $object->getMacAddress() !== null) {
                $data['MacAddress'] = $object->getMacAddress();
            }
            if ($object->isInitialized('driverOpts') && $object->getDriverOpts() !== null) {
                $values_2 = [];
                foreach ($object->getDriverOpts() as $key => $value_2) {
                    $values_2[$key] = $value_2;
                }
                $data['DriverOpts'] = $values_2;
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\EndpointSettings' => false];
        }
    }
}
