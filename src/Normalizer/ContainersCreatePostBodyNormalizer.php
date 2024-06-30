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
use Docker\API\Model\ContainersCreatePostBody;
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
    class ContainersCreatePostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ContainersCreatePostBody';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ContainersCreatePostBody';
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ContainersCreatePostBody();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Hostname', $data)) {
                $object->setHostname($data['Hostname']);
            }
            if (array_key_exists('Domainname', $data)) {
                $object->setDomainname($data['Domainname']);
            }
            if (array_key_exists('User', $data)) {
                $object->setUser($data['User']);
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
            if (array_key_exists('ExposedPorts', $data)) {
                $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['ExposedPorts'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setExposedPorts($values);
            }
            if (array_key_exists('Tty', $data)) {
                $object->setTty($data['Tty']);
            }
            if (array_key_exists('OpenStdin', $data)) {
                $object->setOpenStdin($data['OpenStdin']);
            }
            if (array_key_exists('StdinOnce', $data)) {
                $object->setStdinOnce($data['StdinOnce']);
            }
            if (array_key_exists('Env', $data)) {
                $values_1 = [];
                foreach ($data['Env'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setEnv($values_1);
            }
            if (array_key_exists('Cmd', $data)) {
                $values_2 = [];
                foreach ($data['Cmd'] as $value_2) {
                    $values_2[] = $value_2;
                }
                $object->setCmd($values_2);
            }
            if (array_key_exists('Healthcheck', $data)) {
                $object->setHealthcheck($this->denormalizer->denormalize($data['Healthcheck'], 'Docker\API\Model\HealthConfig', 'json', $context));
            }
            if (array_key_exists('ArgsEscaped', $data)) {
                $object->setArgsEscaped($data['ArgsEscaped']);
            }
            if (array_key_exists('Image', $data)) {
                $object->setImage($data['Image']);
            }
            if (array_key_exists('Volumes', $data)) {
                $values_3 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Volumes'] as $key_1 => $value_3) {
                    $values_3[$key_1] = $value_3;
                }
                $object->setVolumes($values_3);
            }
            if (array_key_exists('WorkingDir', $data)) {
                $object->setWorkingDir($data['WorkingDir']);
            }
            if (array_key_exists('Entrypoint', $data)) {
                $values_4 = [];
                foreach ($data['Entrypoint'] as $value_4) {
                    $values_4[] = $value_4;
                }
                $object->setEntrypoint($values_4);
            }
            if (array_key_exists('NetworkDisabled', $data)) {
                $object->setNetworkDisabled($data['NetworkDisabled']);
            }
            if (array_key_exists('MacAddress', $data)) {
                $object->setMacAddress($data['MacAddress']);
            }
            if (array_key_exists('OnBuild', $data)) {
                $values_5 = [];
                foreach ($data['OnBuild'] as $value_5) {
                    $values_5[] = $value_5;
                }
                $object->setOnBuild($values_5);
            }
            if (array_key_exists('Labels', $data)) {
                $values_6 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key_2 => $value_6) {
                    $values_6[$key_2] = $value_6;
                }
                $object->setLabels($values_6);
            }
            if (array_key_exists('StopSignal', $data)) {
                $object->setStopSignal($data['StopSignal']);
            }
            if (array_key_exists('StopTimeout', $data)) {
                $object->setStopTimeout($data['StopTimeout']);
            }
            if (array_key_exists('Shell', $data)) {
                $values_7 = [];
                foreach ($data['Shell'] as $value_7) {
                    $values_7[] = $value_7;
                }
                $object->setShell($values_7);
            }
            if (array_key_exists('HostConfig', $data)) {
                $object->setHostConfig($this->denormalizer->denormalize($data['HostConfig'], 'Docker\API\Model\HostConfig', 'json', $context));
            }
            if (array_key_exists('NetworkingConfig', $data)) {
                $object->setNetworkingConfig($this->denormalizer->denormalize($data['NetworkingConfig'], 'Docker\API\Model\ContainersCreatePostBodyNetworkingConfig', 'json', $context));
            }
            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $data = [];
            if ($object->isInitialized('hostname') && $object->getHostname() !== null) {
                $data['Hostname'] = $object->getHostname();
            }
            if ($object->isInitialized('domainname') && $object->getDomainname() !== null) {
                $data['Domainname'] = $object->getDomainname();
            }
            if ($object->isInitialized('user') && $object->getUser() !== null) {
                $data['User'] = $object->getUser();
            }
            if ($object->isInitialized('attachStdin') && $object->getAttachStdin() !== null) {
                $data['AttachStdin'] = $object->getAttachStdin();
            }
            if ($object->isInitialized('attachStdout') && $object->getAttachStdout() !== null) {
                $data['AttachStdout'] = $object->getAttachStdout();
            }
            if ($object->isInitialized('attachStderr') && $object->getAttachStderr() !== null) {
                $data['AttachStderr'] = $object->getAttachStderr();
            }
            if ($object->isInitialized('exposedPorts') && $object->getExposedPorts() !== null) {
                $values = [];
                foreach ($object->getExposedPorts() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['ExposedPorts'] = $values;
            }
            if ($object->isInitialized('tty') && $object->getTty() !== null) {
                $data['Tty'] = $object->getTty();
            }
            if ($object->isInitialized('openStdin') && $object->getOpenStdin() !== null) {
                $data['OpenStdin'] = $object->getOpenStdin();
            }
            if ($object->isInitialized('stdinOnce') && $object->getStdinOnce() !== null) {
                $data['StdinOnce'] = $object->getStdinOnce();
            }
            if ($object->isInitialized('env') && $object->getEnv() !== null) {
                $values_1 = [];
                foreach ($object->getEnv() as $value_1) {
                    $values_1[] = $value_1;
                }
                $data['Env'] = $values_1;
            }
            if ($object->isInitialized('cmd') && $object->getCmd() !== null) {
                $values_2 = [];
                foreach ($object->getCmd() as $value_2) {
                    $values_2[] = $value_2;
                }
                $data['Cmd'] = $values_2;
            }
            if ($object->isInitialized('healthcheck') && $object->getHealthcheck() !== null) {
                $data['Healthcheck'] = $this->normalizer->normalize($object->getHealthcheck(), 'json', $context);
            }
            if ($object->isInitialized('argsEscaped') && $object->getArgsEscaped() !== null) {
                $data['ArgsEscaped'] = $object->getArgsEscaped();
            }
            if ($object->isInitialized('image') && $object->getImage() !== null) {
                $data['Image'] = $object->getImage();
            }
            if ($object->isInitialized('volumes') && $object->getVolumes() !== null) {
                $values_3 = [];
                foreach ($object->getVolumes() as $key_1 => $value_3) {
                    $values_3[$key_1] = $value_3;
                }
                $data['Volumes'] = $values_3;
            }
            if ($object->isInitialized('workingDir') && $object->getWorkingDir() !== null) {
                $data['WorkingDir'] = $object->getWorkingDir();
            }
            if ($object->isInitialized('entrypoint') && $object->getEntrypoint() !== null) {
                $values_4 = [];
                foreach ($object->getEntrypoint() as $value_4) {
                    $values_4[] = $value_4;
                }
                $data['Entrypoint'] = $values_4;
            }
            if ($object->isInitialized('networkDisabled') && $object->getNetworkDisabled() !== null) {
                $data['NetworkDisabled'] = $object->getNetworkDisabled();
            }
            if ($object->isInitialized('macAddress') && $object->getMacAddress() !== null) {
                $data['MacAddress'] = $object->getMacAddress();
            }
            if ($object->isInitialized('onBuild') && $object->getOnBuild() !== null) {
                $values_5 = [];
                foreach ($object->getOnBuild() as $value_5) {
                    $values_5[] = $value_5;
                }
                $data['OnBuild'] = $values_5;
            }
            if ($object->isInitialized('labels') && $object->getLabels() !== null) {
                $values_6 = [];
                foreach ($object->getLabels() as $key_2 => $value_6) {
                    $values_6[$key_2] = $value_6;
                }
                $data['Labels'] = $values_6;
            }
            if ($object->isInitialized('stopSignal') && $object->getStopSignal() !== null) {
                $data['StopSignal'] = $object->getStopSignal();
            }
            if ($object->isInitialized('stopTimeout') && $object->getStopTimeout() !== null) {
                $data['StopTimeout'] = $object->getStopTimeout();
            }
            if ($object->isInitialized('shell') && $object->getShell() !== null) {
                $values_7 = [];
                foreach ($object->getShell() as $value_7) {
                    $values_7[] = $value_7;
                }
                $data['Shell'] = $values_7;
            }
            if ($object->isInitialized('hostConfig') && $object->getHostConfig() !== null) {
                $data['HostConfig'] = $this->normalizer->normalize($object->getHostConfig(), 'json', $context);
            }
            if ($object->isInitialized('networkingConfig') && $object->getNetworkingConfig() !== null) {
                $data['NetworkingConfig'] = $this->normalizer->normalize($object->getNetworkingConfig(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ContainersCreatePostBody' => false];
        }
    }
} else {
    class ContainersCreatePostBodyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return $type === 'Docker\API\Model\ContainersCreatePostBody';
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return is_object($data) && get_class($data) === 'Docker\API\Model\ContainersCreatePostBody';
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
            $object = new ContainersCreatePostBody();
            if ($data === null || is_array($data) === false) {
                return $object;
            }
            if (array_key_exists('Hostname', $data)) {
                $object->setHostname($data['Hostname']);
            }
            if (array_key_exists('Domainname', $data)) {
                $object->setDomainname($data['Domainname']);
            }
            if (array_key_exists('User', $data)) {
                $object->setUser($data['User']);
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
            if (array_key_exists('ExposedPorts', $data)) {
                $values = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['ExposedPorts'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setExposedPorts($values);
            }
            if (array_key_exists('Tty', $data)) {
                $object->setTty($data['Tty']);
            }
            if (array_key_exists('OpenStdin', $data)) {
                $object->setOpenStdin($data['OpenStdin']);
            }
            if (array_key_exists('StdinOnce', $data)) {
                $object->setStdinOnce($data['StdinOnce']);
            }
            if (array_key_exists('Env', $data)) {
                $values_1 = [];
                foreach ($data['Env'] as $value_1) {
                    $values_1[] = $value_1;
                }
                $object->setEnv($values_1);
            }
            if (array_key_exists('Cmd', $data)) {
                $values_2 = [];
                foreach ($data['Cmd'] as $value_2) {
                    $values_2[] = $value_2;
                }
                $object->setCmd($values_2);
            }
            if (array_key_exists('Healthcheck', $data)) {
                $object->setHealthcheck($this->denormalizer->denormalize($data['Healthcheck'], 'Docker\API\Model\HealthConfig', 'json', $context));
            }
            if (array_key_exists('ArgsEscaped', $data)) {
                $object->setArgsEscaped($data['ArgsEscaped']);
            }
            if (array_key_exists('Image', $data)) {
                $object->setImage($data['Image']);
            }
            if (array_key_exists('Volumes', $data)) {
                $values_3 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Volumes'] as $key_1 => $value_3) {
                    $values_3[$key_1] = $value_3;
                }
                $object->setVolumes($values_3);
            }
            if (array_key_exists('WorkingDir', $data)) {
                $object->setWorkingDir($data['WorkingDir']);
            }
            if (array_key_exists('Entrypoint', $data)) {
                $values_4 = [];
                foreach ($data['Entrypoint'] as $value_4) {
                    $values_4[] = $value_4;
                }
                $object->setEntrypoint($values_4);
            }
            if (array_key_exists('NetworkDisabled', $data)) {
                $object->setNetworkDisabled($data['NetworkDisabled']);
            }
            if (array_key_exists('MacAddress', $data)) {
                $object->setMacAddress($data['MacAddress']);
            }
            if (array_key_exists('OnBuild', $data)) {
                $values_5 = [];
                foreach ($data['OnBuild'] as $value_5) {
                    $values_5[] = $value_5;
                }
                $object->setOnBuild($values_5);
            }
            if (array_key_exists('Labels', $data)) {
                $values_6 = new ArrayObject([], ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['Labels'] as $key_2 => $value_6) {
                    $values_6[$key_2] = $value_6;
                }
                $object->setLabels($values_6);
            }
            if (array_key_exists('StopSignal', $data)) {
                $object->setStopSignal($data['StopSignal']);
            }
            if (array_key_exists('StopTimeout', $data)) {
                $object->setStopTimeout($data['StopTimeout']);
            }
            if (array_key_exists('Shell', $data)) {
                $values_7 = [];
                foreach ($data['Shell'] as $value_7) {
                    $values_7[] = $value_7;
                }
                $object->setShell($values_7);
            }
            if (array_key_exists('HostConfig', $data)) {
                $object->setHostConfig($this->denormalizer->denormalize($data['HostConfig'], 'Docker\API\Model\HostConfig', 'json', $context));
            }
            if (array_key_exists('NetworkingConfig', $data)) {
                $object->setNetworkingConfig($this->denormalizer->denormalize($data['NetworkingConfig'], 'Docker\API\Model\ContainersCreatePostBodyNetworkingConfig', 'json', $context));
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
            if ($object->isInitialized('hostname') && $object->getHostname() !== null) {
                $data['Hostname'] = $object->getHostname();
            }
            if ($object->isInitialized('domainname') && $object->getDomainname() !== null) {
                $data['Domainname'] = $object->getDomainname();
            }
            if ($object->isInitialized('user') && $object->getUser() !== null) {
                $data['User'] = $object->getUser();
            }
            if ($object->isInitialized('attachStdin') && $object->getAttachStdin() !== null) {
                $data['AttachStdin'] = $object->getAttachStdin();
            }
            if ($object->isInitialized('attachStdout') && $object->getAttachStdout() !== null) {
                $data['AttachStdout'] = $object->getAttachStdout();
            }
            if ($object->isInitialized('attachStderr') && $object->getAttachStderr() !== null) {
                $data['AttachStderr'] = $object->getAttachStderr();
            }
            if ($object->isInitialized('exposedPorts') && $object->getExposedPorts() !== null) {
                $values = [];
                foreach ($object->getExposedPorts() as $key => $value) {
                    $values[$key] = $value;
                }
                $data['ExposedPorts'] = $values;
            }
            if ($object->isInitialized('tty') && $object->getTty() !== null) {
                $data['Tty'] = $object->getTty();
            }
            if ($object->isInitialized('openStdin') && $object->getOpenStdin() !== null) {
                $data['OpenStdin'] = $object->getOpenStdin();
            }
            if ($object->isInitialized('stdinOnce') && $object->getStdinOnce() !== null) {
                $data['StdinOnce'] = $object->getStdinOnce();
            }
            if ($object->isInitialized('env') && $object->getEnv() !== null) {
                $values_1 = [];
                foreach ($object->getEnv() as $value_1) {
                    $values_1[] = $value_1;
                }
                $data['Env'] = $values_1;
            }
            if ($object->isInitialized('cmd') && $object->getCmd() !== null) {
                $values_2 = [];
                foreach ($object->getCmd() as $value_2) {
                    $values_2[] = $value_2;
                }
                $data['Cmd'] = $values_2;
            }
            if ($object->isInitialized('healthcheck') && $object->getHealthcheck() !== null) {
                $data['Healthcheck'] = $this->normalizer->normalize($object->getHealthcheck(), 'json', $context);
            }
            if ($object->isInitialized('argsEscaped') && $object->getArgsEscaped() !== null) {
                $data['ArgsEscaped'] = $object->getArgsEscaped();
            }
            if ($object->isInitialized('image') && $object->getImage() !== null) {
                $data['Image'] = $object->getImage();
            }
            if ($object->isInitialized('volumes') && $object->getVolumes() !== null) {
                $values_3 = [];
                foreach ($object->getVolumes() as $key_1 => $value_3) {
                    $values_3[$key_1] = $value_3;
                }
                $data['Volumes'] = $values_3;
            }
            if ($object->isInitialized('workingDir') && $object->getWorkingDir() !== null) {
                $data['WorkingDir'] = $object->getWorkingDir();
            }
            if ($object->isInitialized('entrypoint') && $object->getEntrypoint() !== null) {
                $values_4 = [];
                foreach ($object->getEntrypoint() as $value_4) {
                    $values_4[] = $value_4;
                }
                $data['Entrypoint'] = $values_4;
            }
            if ($object->isInitialized('networkDisabled') && $object->getNetworkDisabled() !== null) {
                $data['NetworkDisabled'] = $object->getNetworkDisabled();
            }
            if ($object->isInitialized('macAddress') && $object->getMacAddress() !== null) {
                $data['MacAddress'] = $object->getMacAddress();
            }
            if ($object->isInitialized('onBuild') && $object->getOnBuild() !== null) {
                $values_5 = [];
                foreach ($object->getOnBuild() as $value_5) {
                    $values_5[] = $value_5;
                }
                $data['OnBuild'] = $values_5;
            }
            if ($object->isInitialized('labels') && $object->getLabels() !== null) {
                $values_6 = [];
                foreach ($object->getLabels() as $key_2 => $value_6) {
                    $values_6[$key_2] = $value_6;
                }
                $data['Labels'] = $values_6;
            }
            if ($object->isInitialized('stopSignal') && $object->getStopSignal() !== null) {
                $data['StopSignal'] = $object->getStopSignal();
            }
            if ($object->isInitialized('stopTimeout') && $object->getStopTimeout() !== null) {
                $data['StopTimeout'] = $object->getStopTimeout();
            }
            if ($object->isInitialized('shell') && $object->getShell() !== null) {
                $values_7 = [];
                foreach ($object->getShell() as $value_7) {
                    $values_7[] = $value_7;
                }
                $data['Shell'] = $values_7;
            }
            if ($object->isInitialized('hostConfig') && $object->getHostConfig() !== null) {
                $data['HostConfig'] = $this->normalizer->normalize($object->getHostConfig(), 'json', $context);
            }
            if ($object->isInitialized('networkingConfig') && $object->getNetworkingConfig() !== null) {
                $data['NetworkingConfig'] = $this->normalizer->normalize($object->getNetworkingConfig(), 'json', $context);
            }
            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\ContainersCreatePostBody' => false];
        }
    }
}
