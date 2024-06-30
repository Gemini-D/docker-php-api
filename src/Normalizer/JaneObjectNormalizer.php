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
use Docker\API\Runtime\Normalizer\CheckArray;
use Docker\API\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (! class_exists(Kernel::class) or (Kernel::MAJOR_VERSION >= 7 or Kernel::MAJOR_VERSION === 6 and Kernel::MINOR_VERSION === 4)) {
    class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        protected $normalizers = [
            'Docker\API\Model\Port' => 'Docker\API\Normalizer\PortNormalizer',
            'Docker\API\Model\MountPoint' => 'Docker\API\Normalizer\MountPointNormalizer',
            'Docker\API\Model\DeviceMapping' => 'Docker\API\Normalizer\DeviceMappingNormalizer',
            'Docker\API\Model\ThrottleDevice' => 'Docker\API\Normalizer\ThrottleDeviceNormalizer',
            'Docker\API\Model\Mount' => 'Docker\API\Normalizer\MountNormalizer',
            'Docker\API\Model\MountBindOptions' => 'Docker\API\Normalizer\MountBindOptionsNormalizer',
            'Docker\API\Model\MountVolumeOptions' => 'Docker\API\Normalizer\MountVolumeOptionsNormalizer',
            'Docker\API\Model\MountVolumeOptionsDriverConfig' => 'Docker\API\Normalizer\MountVolumeOptionsDriverConfigNormalizer',
            'Docker\API\Model\MountTmpfsOptions' => 'Docker\API\Normalizer\MountTmpfsOptionsNormalizer',
            'Docker\API\Model\RestartPolicy' => 'Docker\API\Normalizer\RestartPolicyNormalizer',
            'Docker\API\Model\Resources' => 'Docker\API\Normalizer\ResourcesNormalizer',
            'Docker\API\Model\ResourcesBlkioWeightDeviceItem' => 'Docker\API\Normalizer\ResourcesBlkioWeightDeviceItemNormalizer',
            'Docker\API\Model\ResourcesUlimitsItem' => 'Docker\API\Normalizer\ResourcesUlimitsItemNormalizer',
            'Docker\API\Model\ResourceObject' => 'Docker\API\Normalizer\ResourceObjectNormalizer',
            'Docker\API\Model\GenericResourcesItem' => 'Docker\API\Normalizer\GenericResourcesItemNormalizer',
            'Docker\API\Model\GenericResourcesItemNamedResourceSpec' => 'Docker\API\Normalizer\GenericResourcesItemNamedResourceSpecNormalizer',
            'Docker\API\Model\GenericResourcesItemDiscreteResourceSpec' => 'Docker\API\Normalizer\GenericResourcesItemDiscreteResourceSpecNormalizer',
            'Docker\API\Model\HealthConfig' => 'Docker\API\Normalizer\HealthConfigNormalizer',
            'Docker\API\Model\HostConfig' => 'Docker\API\Normalizer\HostConfigNormalizer',
            'Docker\API\Model\HostConfigLogConfig' => 'Docker\API\Normalizer\HostConfigLogConfigNormalizer',
            'Docker\API\Model\ContainerConfig' => 'Docker\API\Normalizer\ContainerConfigNormalizer',
            'Docker\API\Model\NetworkSettings' => 'Docker\API\Normalizer\NetworkSettingsNormalizer',
            'Docker\API\Model\Address' => 'Docker\API\Normalizer\AddressNormalizer',
            'Docker\API\Model\PortBinding' => 'Docker\API\Normalizer\PortBindingNormalizer',
            'Docker\API\Model\GraphDriverData' => 'Docker\API\Normalizer\GraphDriverDataNormalizer',
            'Docker\API\Model\Image' => 'Docker\API\Normalizer\ImageNormalizer',
            'Docker\API\Model\ImageRootFS' => 'Docker\API\Normalizer\ImageRootFSNormalizer',
            'Docker\API\Model\ImageMetadata' => 'Docker\API\Normalizer\ImageMetadataNormalizer',
            'Docker\API\Model\ImageSummary' => 'Docker\API\Normalizer\ImageSummaryNormalizer',
            'Docker\API\Model\AuthConfig' => 'Docker\API\Normalizer\AuthConfigNormalizer',
            'Docker\API\Model\ProcessConfig' => 'Docker\API\Normalizer\ProcessConfigNormalizer',
            'Docker\API\Model\Volume' => 'Docker\API\Normalizer\VolumeNormalizer',
            'Docker\API\Model\VolumeUsageData' => 'Docker\API\Normalizer\VolumeUsageDataNormalizer',
            'Docker\API\Model\Network' => 'Docker\API\Normalizer\NetworkNormalizer',
            'Docker\API\Model\IPAM' => 'Docker\API\Normalizer\IPAMNormalizer',
            'Docker\API\Model\NetworkContainer' => 'Docker\API\Normalizer\NetworkContainerNormalizer',
            'Docker\API\Model\BuildInfo' => 'Docker\API\Normalizer\BuildInfoNormalizer',
            'Docker\API\Model\ImageID' => 'Docker\API\Normalizer\ImageIDNormalizer',
            'Docker\API\Model\CreateImageInfo' => 'Docker\API\Normalizer\CreateImageInfoNormalizer',
            'Docker\API\Model\PushImageInfo' => 'Docker\API\Normalizer\PushImageInfoNormalizer',
            'Docker\API\Model\ErrorDetail' => 'Docker\API\Normalizer\ErrorDetailNormalizer',
            'Docker\API\Model\ProgressDetail' => 'Docker\API\Normalizer\ProgressDetailNormalizer',
            'Docker\API\Model\ErrorResponse' => 'Docker\API\Normalizer\ErrorResponseNormalizer',
            'Docker\API\Model\IdResponse' => 'Docker\API\Normalizer\IdResponseNormalizer',
            'Docker\API\Model\EndpointSettings' => 'Docker\API\Normalizer\EndpointSettingsNormalizer',
            'Docker\API\Model\EndpointIPAMConfig' => 'Docker\API\Normalizer\EndpointIPAMConfigNormalizer',
            'Docker\API\Model\PluginMount' => 'Docker\API\Normalizer\PluginMountNormalizer',
            'Docker\API\Model\PluginDevice' => 'Docker\API\Normalizer\PluginDeviceNormalizer',
            'Docker\API\Model\PluginEnv' => 'Docker\API\Normalizer\PluginEnvNormalizer',
            'Docker\API\Model\PluginInterfaceType' => 'Docker\API\Normalizer\PluginInterfaceTypeNormalizer',
            'Docker\API\Model\Plugin' => 'Docker\API\Normalizer\PluginNormalizer',
            'Docker\API\Model\PluginSettings' => 'Docker\API\Normalizer\PluginSettingsNormalizer',
            'Docker\API\Model\PluginConfig' => 'Docker\API\Normalizer\PluginConfigNormalizer',
            'Docker\API\Model\PluginConfigInterface' => 'Docker\API\Normalizer\PluginConfigInterfaceNormalizer',
            'Docker\API\Model\PluginConfigUser' => 'Docker\API\Normalizer\PluginConfigUserNormalizer',
            'Docker\API\Model\PluginConfigNetwork' => 'Docker\API\Normalizer\PluginConfigNetworkNormalizer',
            'Docker\API\Model\PluginConfigLinux' => 'Docker\API\Normalizer\PluginConfigLinuxNormalizer',
            'Docker\API\Model\PluginConfigArgs' => 'Docker\API\Normalizer\PluginConfigArgsNormalizer',
            'Docker\API\Model\PluginConfigRootfs' => 'Docker\API\Normalizer\PluginConfigRootfsNormalizer',
            'Docker\API\Model\ObjectVersion' => 'Docker\API\Normalizer\ObjectVersionNormalizer',
            'Docker\API\Model\NodeSpec' => 'Docker\API\Normalizer\NodeSpecNormalizer',
            'Docker\API\Model\Node' => 'Docker\API\Normalizer\NodeNormalizer',
            'Docker\API\Model\NodeDescription' => 'Docker\API\Normalizer\NodeDescriptionNormalizer',
            'Docker\API\Model\Platform' => 'Docker\API\Normalizer\PlatformNormalizer',
            'Docker\API\Model\EngineDescription' => 'Docker\API\Normalizer\EngineDescriptionNormalizer',
            'Docker\API\Model\EngineDescriptionPluginsItem' => 'Docker\API\Normalizer\EngineDescriptionPluginsItemNormalizer',
            'Docker\API\Model\TLSInfo' => 'Docker\API\Normalizer\TLSInfoNormalizer',
            'Docker\API\Model\NodeStatus' => 'Docker\API\Normalizer\NodeStatusNormalizer',
            'Docker\API\Model\ManagerStatus' => 'Docker\API\Normalizer\ManagerStatusNormalizer',
            'Docker\API\Model\SwarmSpec' => 'Docker\API\Normalizer\SwarmSpecNormalizer',
            'Docker\API\Model\SwarmSpecOrchestration' => 'Docker\API\Normalizer\SwarmSpecOrchestrationNormalizer',
            'Docker\API\Model\SwarmSpecRaft' => 'Docker\API\Normalizer\SwarmSpecRaftNormalizer',
            'Docker\API\Model\SwarmSpecDispatcher' => 'Docker\API\Normalizer\SwarmSpecDispatcherNormalizer',
            'Docker\API\Model\SwarmSpecCAConfig' => 'Docker\API\Normalizer\SwarmSpecCAConfigNormalizer',
            'Docker\API\Model\SwarmSpecCAConfigExternalCAsItem' => 'Docker\API\Normalizer\SwarmSpecCAConfigExternalCAsItemNormalizer',
            'Docker\API\Model\SwarmSpecEncryptionConfig' => 'Docker\API\Normalizer\SwarmSpecEncryptionConfigNormalizer',
            'Docker\API\Model\SwarmSpecTaskDefaults' => 'Docker\API\Normalizer\SwarmSpecTaskDefaultsNormalizer',
            'Docker\API\Model\SwarmSpecTaskDefaultsLogDriver' => 'Docker\API\Normalizer\SwarmSpecTaskDefaultsLogDriverNormalizer',
            'Docker\API\Model\ClusterInfo' => 'Docker\API\Normalizer\ClusterInfoNormalizer',
            'Docker\API\Model\JoinTokens' => 'Docker\API\Normalizer\JoinTokensNormalizer',
            'Docker\API\Model\Swarm' => 'Docker\API\Normalizer\SwarmNormalizer',
            'Docker\API\Model\TaskSpec' => 'Docker\API\Normalizer\TaskSpecNormalizer',
            'Docker\API\Model\TaskSpecPluginSpec' => 'Docker\API\Normalizer\TaskSpecPluginSpecNormalizer',
            'Docker\API\Model\TaskSpecPluginSpecPluginPrivilegeItem' => 'Docker\API\Normalizer\TaskSpecPluginSpecPluginPrivilegeItemNormalizer',
            'Docker\API\Model\TaskSpecContainerSpec' => 'Docker\API\Normalizer\TaskSpecContainerSpecNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecPrivileges' => 'Docker\API\Normalizer\TaskSpecContainerSpecPrivilegesNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec' => 'Docker\API\Normalizer\TaskSpecContainerSpecPrivilegesCredentialSpecNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecPrivilegesSELinuxContext' => 'Docker\API\Normalizer\TaskSpecContainerSpecPrivilegesSELinuxContextNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecDNSConfig' => 'Docker\API\Normalizer\TaskSpecContainerSpecDNSConfigNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecSecretsItem' => 'Docker\API\Normalizer\TaskSpecContainerSpecSecretsItemNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecSecretsItemFile' => 'Docker\API\Normalizer\TaskSpecContainerSpecSecretsItemFileNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecConfigsItem' => 'Docker\API\Normalizer\TaskSpecContainerSpecConfigsItemNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecConfigsItemFile' => 'Docker\API\Normalizer\TaskSpecContainerSpecConfigsItemFileNormalizer',
            'Docker\API\Model\TaskSpecResources' => 'Docker\API\Normalizer\TaskSpecResourcesNormalizer',
            'Docker\API\Model\TaskSpecRestartPolicy' => 'Docker\API\Normalizer\TaskSpecRestartPolicyNormalizer',
            'Docker\API\Model\TaskSpecPlacement' => 'Docker\API\Normalizer\TaskSpecPlacementNormalizer',
            'Docker\API\Model\TaskSpecPlacementPreferencesItem' => 'Docker\API\Normalizer\TaskSpecPlacementPreferencesItemNormalizer',
            'Docker\API\Model\TaskSpecPlacementPreferencesItemSpread' => 'Docker\API\Normalizer\TaskSpecPlacementPreferencesItemSpreadNormalizer',
            'Docker\API\Model\TaskSpecNetworksItem' => 'Docker\API\Normalizer\TaskSpecNetworksItemNormalizer',
            'Docker\API\Model\TaskSpecLogDriver' => 'Docker\API\Normalizer\TaskSpecLogDriverNormalizer',
            'Docker\API\Model\Task' => 'Docker\API\Normalizer\TaskNormalizer',
            'Docker\API\Model\TaskStatus' => 'Docker\API\Normalizer\TaskStatusNormalizer',
            'Docker\API\Model\TaskStatusContainerStatus' => 'Docker\API\Normalizer\TaskStatusContainerStatusNormalizer',
            'Docker\API\Model\ServiceSpec' => 'Docker\API\Normalizer\ServiceSpecNormalizer',
            'Docker\API\Model\ServiceSpecMode' => 'Docker\API\Normalizer\ServiceSpecModeNormalizer',
            'Docker\API\Model\ServiceSpecModeReplicated' => 'Docker\API\Normalizer\ServiceSpecModeReplicatedNormalizer',
            'Docker\API\Model\ServiceSpecUpdateConfig' => 'Docker\API\Normalizer\ServiceSpecUpdateConfigNormalizer',
            'Docker\API\Model\ServiceSpecRollbackConfig' => 'Docker\API\Normalizer\ServiceSpecRollbackConfigNormalizer',
            'Docker\API\Model\ServiceSpecNetworksItem' => 'Docker\API\Normalizer\ServiceSpecNetworksItemNormalizer',
            'Docker\API\Model\EndpointPortConfig' => 'Docker\API\Normalizer\EndpointPortConfigNormalizer',
            'Docker\API\Model\EndpointSpec' => 'Docker\API\Normalizer\EndpointSpecNormalizer',
            'Docker\API\Model\Service' => 'Docker\API\Normalizer\ServiceNormalizer',
            'Docker\API\Model\ServiceEndpoint' => 'Docker\API\Normalizer\ServiceEndpointNormalizer',
            'Docker\API\Model\ServiceEndpointVirtualIPsItem' => 'Docker\API\Normalizer\ServiceEndpointVirtualIPsItemNormalizer',
            'Docker\API\Model\ServiceUpdateStatus' => 'Docker\API\Normalizer\ServiceUpdateStatusNormalizer',
            'Docker\API\Model\ImageDeleteResponseItem' => 'Docker\API\Normalizer\ImageDeleteResponseItemNormalizer',
            'Docker\API\Model\ServiceUpdateResponse' => 'Docker\API\Normalizer\ServiceUpdateResponseNormalizer',
            'Docker\API\Model\ContainerSummaryItem' => 'Docker\API\Normalizer\ContainerSummaryItemNormalizer',
            'Docker\API\Model\ContainerSummaryItemHostConfig' => 'Docker\API\Normalizer\ContainerSummaryItemHostConfigNormalizer',
            'Docker\API\Model\ContainerSummaryItemNetworkSettings' => 'Docker\API\Normalizer\ContainerSummaryItemNetworkSettingsNormalizer',
            'Docker\API\Model\Driver' => 'Docker\API\Normalizer\DriverNormalizer',
            'Docker\API\Model\SecretSpec' => 'Docker\API\Normalizer\SecretSpecNormalizer',
            'Docker\API\Model\Secret' => 'Docker\API\Normalizer\SecretNormalizer',
            'Docker\API\Model\ConfigSpec' => 'Docker\API\Normalizer\ConfigSpecNormalizer',
            'Docker\API\Model\Config' => 'Docker\API\Normalizer\ConfigNormalizer',
            'Docker\API\Model\SystemInfo' => 'Docker\API\Normalizer\SystemInfoNormalizer',
            'Docker\API\Model\PluginsInfo' => 'Docker\API\Normalizer\PluginsInfoNormalizer',
            'Docker\API\Model\RegistryServiceConfig' => 'Docker\API\Normalizer\RegistryServiceConfigNormalizer',
            'Docker\API\Model\IndexInfo' => 'Docker\API\Normalizer\IndexInfoNormalizer',
            'Docker\API\Model\Runtime' => 'Docker\API\Normalizer\RuntimeNormalizer',
            'Docker\API\Model\Commit' => 'Docker\API\Normalizer\CommitNormalizer',
            'Docker\API\Model\SwarmInfo' => 'Docker\API\Normalizer\SwarmInfoNormalizer',
            'Docker\API\Model\PeerNode' => 'Docker\API\Normalizer\PeerNodeNormalizer',
            'Docker\API\Model\ContainersCreatePostBody' => 'Docker\API\Normalizer\ContainersCreatePostBodyNormalizer',
            'Docker\API\Model\ContainersCreatePostBodyNetworkingConfig' => 'Docker\API\Normalizer\ContainersCreatePostBodyNetworkingConfigNormalizer',
            'Docker\API\Model\ContainersCreatePostResponse201' => 'Docker\API\Normalizer\ContainersCreatePostResponse201Normalizer',
            'Docker\API\Model\ContainersIdJsonGetResponse200' => 'Docker\API\Normalizer\ContainersIdJsonGetResponse200Normalizer',
            'Docker\API\Model\ContainersIdJsonGetResponse200State' => 'Docker\API\Normalizer\ContainersIdJsonGetResponse200StateNormalizer',
            'Docker\API\Model\ContainersIdTopGetResponse200' => 'Docker\API\Normalizer\ContainersIdTopGetResponse200Normalizer',
            'Docker\API\Model\ContainersIdChangesGetResponse200Item' => 'Docker\API\Normalizer\ContainersIdChangesGetResponse200ItemNormalizer',
            'Docker\API\Model\ContainersIdUpdatePostBody' => 'Docker\API\Normalizer\ContainersIdUpdatePostBodyNormalizer',
            'Docker\API\Model\ContainersIdUpdatePostResponse200' => 'Docker\API\Normalizer\ContainersIdUpdatePostResponse200Normalizer',
            'Docker\API\Model\ContainersIdWaitPostResponse200' => 'Docker\API\Normalizer\ContainersIdWaitPostResponse200Normalizer',
            'Docker\API\Model\ContainersIdWaitPostResponse200Error' => 'Docker\API\Normalizer\ContainersIdWaitPostResponse200ErrorNormalizer',
            'Docker\API\Model\ContainersIdArchiveGetResponse400' => 'Docker\API\Normalizer\ContainersIdArchiveGetResponse400Normalizer',
            'Docker\API\Model\ContainersIdArchiveHeadResponse400' => 'Docker\API\Normalizer\ContainersIdArchiveHeadResponse400Normalizer',
            'Docker\API\Model\ContainersPrunePostResponse200' => 'Docker\API\Normalizer\ContainersPrunePostResponse200Normalizer',
            'Docker\API\Model\BuildPrunePostResponse200' => 'Docker\API\Normalizer\BuildPrunePostResponse200Normalizer',
            'Docker\API\Model\ImagesNameHistoryGetResponse200Item' => 'Docker\API\Normalizer\ImagesNameHistoryGetResponse200ItemNormalizer',
            'Docker\API\Model\ImagesSearchGetResponse200Item' => 'Docker\API\Normalizer\ImagesSearchGetResponse200ItemNormalizer',
            'Docker\API\Model\ImagesPrunePostResponse200' => 'Docker\API\Normalizer\ImagesPrunePostResponse200Normalizer',
            'Docker\API\Model\AuthPostResponse200' => 'Docker\API\Normalizer\AuthPostResponse200Normalizer',
            'Docker\API\Model\VersionGetResponse200' => 'Docker\API\Normalizer\VersionGetResponse200Normalizer',
            'Docker\API\Model\VersionGetResponse200Platform' => 'Docker\API\Normalizer\VersionGetResponse200PlatformNormalizer',
            'Docker\API\Model\VersionGetResponse200ComponentsItem' => 'Docker\API\Normalizer\VersionGetResponse200ComponentsItemNormalizer',
            'Docker\API\Model\EventsGetResponse200' => 'Docker\API\Normalizer\EventsGetResponse200Normalizer',
            'Docker\API\Model\EventsGetResponse200Actor' => 'Docker\API\Normalizer\EventsGetResponse200ActorNormalizer',
            'Docker\API\Model\SystemDfGetResponse200' => 'Docker\API\Normalizer\SystemDfGetResponse200Normalizer',
            'Docker\API\Model\ContainersIdExecPostBody' => 'Docker\API\Normalizer\ContainersIdExecPostBodyNormalizer',
            'Docker\API\Model\ExecIdStartPostBody' => 'Docker\API\Normalizer\ExecIdStartPostBodyNormalizer',
            'Docker\API\Model\ExecIdJsonGetResponse200' => 'Docker\API\Normalizer\ExecIdJsonGetResponse200Normalizer',
            'Docker\API\Model\VolumesGetResponse200' => 'Docker\API\Normalizer\VolumesGetResponse200Normalizer',
            'Docker\API\Model\VolumesCreatePostBody' => 'Docker\API\Normalizer\VolumesCreatePostBodyNormalizer',
            'Docker\API\Model\VolumesPrunePostResponse200' => 'Docker\API\Normalizer\VolumesPrunePostResponse200Normalizer',
            'Docker\API\Model\NetworksCreatePostBody' => 'Docker\API\Normalizer\NetworksCreatePostBodyNormalizer',
            'Docker\API\Model\NetworksCreatePostResponse201' => 'Docker\API\Normalizer\NetworksCreatePostResponse201Normalizer',
            'Docker\API\Model\NetworksIdConnectPostBody' => 'Docker\API\Normalizer\NetworksIdConnectPostBodyNormalizer',
            'Docker\API\Model\NetworksIdDisconnectPostBody' => 'Docker\API\Normalizer\NetworksIdDisconnectPostBodyNormalizer',
            'Docker\API\Model\NetworksPrunePostResponse200' => 'Docker\API\Normalizer\NetworksPrunePostResponse200Normalizer',
            'Docker\API\Model\PluginsPrivilegesGetResponse200Item' => 'Docker\API\Normalizer\PluginsPrivilegesGetResponse200ItemNormalizer',
            'Docker\API\Model\PluginsPullPostBodyItem' => 'Docker\API\Normalizer\PluginsPullPostBodyItemNormalizer',
            'Docker\API\Model\PluginsNameUpgradePostBodyItem' => 'Docker\API\Normalizer\PluginsNameUpgradePostBodyItemNormalizer',
            'Docker\API\Model\SwarmInitPostBody' => 'Docker\API\Normalizer\SwarmInitPostBodyNormalizer',
            'Docker\API\Model\SwarmJoinPostBody' => 'Docker\API\Normalizer\SwarmJoinPostBodyNormalizer',
            'Docker\API\Model\SwarmUnlockkeyGetResponse200' => 'Docker\API\Normalizer\SwarmUnlockkeyGetResponse200Normalizer',
            'Docker\API\Model\SwarmUnlockPostBody' => 'Docker\API\Normalizer\SwarmUnlockPostBodyNormalizer',
            'Docker\API\Model\ServicesCreatePostBody' => 'Docker\API\Normalizer\ServicesCreatePostBodyNormalizer',
            'Docker\API\Model\ServicesCreatePostResponse201' => 'Docker\API\Normalizer\ServicesCreatePostResponse201Normalizer',
            'Docker\API\Model\ServicesIdUpdatePostBody' => 'Docker\API\Normalizer\ServicesIdUpdatePostBodyNormalizer',
            'Docker\API\Model\SecretsCreatePostBody' => 'Docker\API\Normalizer\SecretsCreatePostBodyNormalizer',
            'Docker\API\Model\ConfigsCreatePostBody' => 'Docker\API\Normalizer\ConfigsCreatePostBodyNormalizer',
            'Docker\API\Model\DistributionNameJsonGetResponse200' => 'Docker\API\Normalizer\DistributionNameJsonGetResponse200Normalizer',
            'Docker\API\Model\DistributionNameJsonGetResponse200Descriptor' => 'Docker\API\Normalizer\DistributionNameJsonGetResponse200DescriptorNormalizer',
            'Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem' => 'Docker\API\Normalizer\DistributionNameJsonGetResponse200PlatformsItemNormalizer',
            '\Jane\Component\JsonSchemaRuntime\Reference' => '\Docker\API\Runtime\Normalizer\ReferenceNormalizer',
        ];

        protected $normalizersCache = [];

        public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
        {
            return array_key_exists($type, $this->normalizers);
        }

        public function supportsNormalization($data, $format = null, array $context = []): bool
        {
            return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): null|array|ArrayObject|bool|float|int|string
        {
            $normalizerClass = $this->normalizers[get_class($object)];
            $normalizer = $this->getNormalizer($normalizerClass);
            return $normalizer->normalize($object, $format, $context);
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            $denormalizerClass = $this->normalizers[$type];
            $denormalizer = $this->getNormalizer($denormalizerClass);
            return $denormalizer->denormalize($data, $type, $format, $context);
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Port' => false, 'Docker\API\Model\MountPoint' => false, 'Docker\API\Model\DeviceMapping' => false, 'Docker\API\Model\ThrottleDevice' => false, 'Docker\API\Model\Mount' => false, 'Docker\API\Model\MountBindOptions' => false, 'Docker\API\Model\MountVolumeOptions' => false, 'Docker\API\Model\MountVolumeOptionsDriverConfig' => false, 'Docker\API\Model\MountTmpfsOptions' => false, 'Docker\API\Model\RestartPolicy' => false, 'Docker\API\Model\Resources' => false, 'Docker\API\Model\ResourcesBlkioWeightDeviceItem' => false, 'Docker\API\Model\ResourcesUlimitsItem' => false, 'Docker\API\Model\ResourceObject' => false, 'Docker\API\Model\GenericResourcesItem' => false, 'Docker\API\Model\GenericResourcesItemNamedResourceSpec' => false, 'Docker\API\Model\GenericResourcesItemDiscreteResourceSpec' => false, 'Docker\API\Model\HealthConfig' => false, 'Docker\API\Model\HostConfig' => false, 'Docker\API\Model\HostConfigLogConfig' => false, 'Docker\API\Model\ContainerConfig' => false, 'Docker\API\Model\NetworkSettings' => false, 'Docker\API\Model\Address' => false, 'Docker\API\Model\PortBinding' => false, 'Docker\API\Model\GraphDriverData' => false, 'Docker\API\Model\Image' => false, 'Docker\API\Model\ImageRootFS' => false, 'Docker\API\Model\ImageMetadata' => false, 'Docker\API\Model\ImageSummary' => false, 'Docker\API\Model\AuthConfig' => false, 'Docker\API\Model\ProcessConfig' => false, 'Docker\API\Model\Volume' => false, 'Docker\API\Model\VolumeUsageData' => false, 'Docker\API\Model\Network' => false, 'Docker\API\Model\IPAM' => false, 'Docker\API\Model\NetworkContainer' => false, 'Docker\API\Model\BuildInfo' => false, 'Docker\API\Model\ImageID' => false, 'Docker\API\Model\CreateImageInfo' => false, 'Docker\API\Model\PushImageInfo' => false, 'Docker\API\Model\ErrorDetail' => false, 'Docker\API\Model\ProgressDetail' => false, 'Docker\API\Model\ErrorResponse' => false, 'Docker\API\Model\IdResponse' => false, 'Docker\API\Model\EndpointSettings' => false, 'Docker\API\Model\EndpointIPAMConfig' => false, 'Docker\API\Model\PluginMount' => false, 'Docker\API\Model\PluginDevice' => false, 'Docker\API\Model\PluginEnv' => false, 'Docker\API\Model\PluginInterfaceType' => false, 'Docker\API\Model\Plugin' => false, 'Docker\API\Model\PluginSettings' => false, 'Docker\API\Model\PluginConfig' => false, 'Docker\API\Model\PluginConfigInterface' => false, 'Docker\API\Model\PluginConfigUser' => false, 'Docker\API\Model\PluginConfigNetwork' => false, 'Docker\API\Model\PluginConfigLinux' => false, 'Docker\API\Model\PluginConfigArgs' => false, 'Docker\API\Model\PluginConfigRootfs' => false, 'Docker\API\Model\ObjectVersion' => false, 'Docker\API\Model\NodeSpec' => false, 'Docker\API\Model\Node' => false, 'Docker\API\Model\NodeDescription' => false, 'Docker\API\Model\Platform' => false, 'Docker\API\Model\EngineDescription' => false, 'Docker\API\Model\EngineDescriptionPluginsItem' => false, 'Docker\API\Model\TLSInfo' => false, 'Docker\API\Model\NodeStatus' => false, 'Docker\API\Model\ManagerStatus' => false, 'Docker\API\Model\SwarmSpec' => false, 'Docker\API\Model\SwarmSpecOrchestration' => false, 'Docker\API\Model\SwarmSpecRaft' => false, 'Docker\API\Model\SwarmSpecDispatcher' => false, 'Docker\API\Model\SwarmSpecCAConfig' => false, 'Docker\API\Model\SwarmSpecCAConfigExternalCAsItem' => false, 'Docker\API\Model\SwarmSpecEncryptionConfig' => false, 'Docker\API\Model\SwarmSpecTaskDefaults' => false, 'Docker\API\Model\SwarmSpecTaskDefaultsLogDriver' => false, 'Docker\API\Model\ClusterInfo' => false, 'Docker\API\Model\JoinTokens' => false, 'Docker\API\Model\Swarm' => false, 'Docker\API\Model\TaskSpec' => false, 'Docker\API\Model\TaskSpecPluginSpec' => false, 'Docker\API\Model\TaskSpecPluginSpecPluginPrivilegeItem' => false, 'Docker\API\Model\TaskSpecContainerSpec' => false, 'Docker\API\Model\TaskSpecContainerSpecPrivileges' => false, 'Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec' => false, 'Docker\API\Model\TaskSpecContainerSpecPrivilegesSELinuxContext' => false, 'Docker\API\Model\TaskSpecContainerSpecDNSConfig' => false, 'Docker\API\Model\TaskSpecContainerSpecSecretsItem' => false, 'Docker\API\Model\TaskSpecContainerSpecSecretsItemFile' => false, 'Docker\API\Model\TaskSpecContainerSpecConfigsItem' => false, 'Docker\API\Model\TaskSpecContainerSpecConfigsItemFile' => false, 'Docker\API\Model\TaskSpecResources' => false, 'Docker\API\Model\TaskSpecRestartPolicy' => false, 'Docker\API\Model\TaskSpecPlacement' => false, 'Docker\API\Model\TaskSpecPlacementPreferencesItem' => false, 'Docker\API\Model\TaskSpecPlacementPreferencesItemSpread' => false, 'Docker\API\Model\TaskSpecNetworksItem' => false, 'Docker\API\Model\TaskSpecLogDriver' => false, 'Docker\API\Model\Task' => false, 'Docker\API\Model\TaskStatus' => false, 'Docker\API\Model\TaskStatusContainerStatus' => false, 'Docker\API\Model\ServiceSpec' => false, 'Docker\API\Model\ServiceSpecMode' => false, 'Docker\API\Model\ServiceSpecModeReplicated' => false, 'Docker\API\Model\ServiceSpecUpdateConfig' => false, 'Docker\API\Model\ServiceSpecRollbackConfig' => false, 'Docker\API\Model\ServiceSpecNetworksItem' => false, 'Docker\API\Model\EndpointPortConfig' => false, 'Docker\API\Model\EndpointSpec' => false, 'Docker\API\Model\Service' => false, 'Docker\API\Model\ServiceEndpoint' => false, 'Docker\API\Model\ServiceEndpointVirtualIPsItem' => false, 'Docker\API\Model\ServiceUpdateStatus' => false, 'Docker\API\Model\ImageDeleteResponseItem' => false, 'Docker\API\Model\ServiceUpdateResponse' => false, 'Docker\API\Model\ContainerSummaryItem' => false, 'Docker\API\Model\ContainerSummaryItemHostConfig' => false, 'Docker\API\Model\ContainerSummaryItemNetworkSettings' => false, 'Docker\API\Model\Driver' => false, 'Docker\API\Model\SecretSpec' => false, 'Docker\API\Model\Secret' => false, 'Docker\API\Model\ConfigSpec' => false, 'Docker\API\Model\Config' => false, 'Docker\API\Model\SystemInfo' => false, 'Docker\API\Model\PluginsInfo' => false, 'Docker\API\Model\RegistryServiceConfig' => false, 'Docker\API\Model\IndexInfo' => false, 'Docker\API\Model\Runtime' => false, 'Docker\API\Model\Commit' => false, 'Docker\API\Model\SwarmInfo' => false, 'Docker\API\Model\PeerNode' => false, 'Docker\API\Model\ContainersCreatePostBody' => false, 'Docker\API\Model\ContainersCreatePostBodyNetworkingConfig' => false, 'Docker\API\Model\ContainersCreatePostResponse201' => false, 'Docker\API\Model\ContainersIdJsonGetResponse200' => false, 'Docker\API\Model\ContainersIdJsonGetResponse200State' => false, 'Docker\API\Model\ContainersIdTopGetResponse200' => false, 'Docker\API\Model\ContainersIdChangesGetResponse200Item' => false, 'Docker\API\Model\ContainersIdUpdatePostBody' => false, 'Docker\API\Model\ContainersIdUpdatePostResponse200' => false, 'Docker\API\Model\ContainersIdWaitPostResponse200' => false, 'Docker\API\Model\ContainersIdWaitPostResponse200Error' => false, 'Docker\API\Model\ContainersIdArchiveGetResponse400' => false, 'Docker\API\Model\ContainersIdArchiveHeadResponse400' => false, 'Docker\API\Model\ContainersPrunePostResponse200' => false, 'Docker\API\Model\BuildPrunePostResponse200' => false, 'Docker\API\Model\ImagesNameHistoryGetResponse200Item' => false, 'Docker\API\Model\ImagesSearchGetResponse200Item' => false, 'Docker\API\Model\ImagesPrunePostResponse200' => false, 'Docker\API\Model\AuthPostResponse200' => false, 'Docker\API\Model\VersionGetResponse200' => false, 'Docker\API\Model\VersionGetResponse200Platform' => false, 'Docker\API\Model\VersionGetResponse200ComponentsItem' => false, 'Docker\API\Model\EventsGetResponse200' => false, 'Docker\API\Model\EventsGetResponse200Actor' => false, 'Docker\API\Model\SystemDfGetResponse200' => false, 'Docker\API\Model\ContainersIdExecPostBody' => false, 'Docker\API\Model\ExecIdStartPostBody' => false, 'Docker\API\Model\ExecIdJsonGetResponse200' => false, 'Docker\API\Model\VolumesGetResponse200' => false, 'Docker\API\Model\VolumesCreatePostBody' => false, 'Docker\API\Model\VolumesPrunePostResponse200' => false, 'Docker\API\Model\NetworksCreatePostBody' => false, 'Docker\API\Model\NetworksCreatePostResponse201' => false, 'Docker\API\Model\NetworksIdConnectPostBody' => false, 'Docker\API\Model\NetworksIdDisconnectPostBody' => false, 'Docker\API\Model\NetworksPrunePostResponse200' => false, 'Docker\API\Model\PluginsPrivilegesGetResponse200Item' => false, 'Docker\API\Model\PluginsPullPostBodyItem' => false, 'Docker\API\Model\PluginsNameUpgradePostBodyItem' => false, 'Docker\API\Model\SwarmInitPostBody' => false, 'Docker\API\Model\SwarmJoinPostBody' => false, 'Docker\API\Model\SwarmUnlockkeyGetResponse200' => false, 'Docker\API\Model\SwarmUnlockPostBody' => false, 'Docker\API\Model\ServicesCreatePostBody' => false, 'Docker\API\Model\ServicesCreatePostResponse201' => false, 'Docker\API\Model\ServicesIdUpdatePostBody' => false, 'Docker\API\Model\SecretsCreatePostBody' => false, 'Docker\API\Model\ConfigsCreatePostBody' => false, 'Docker\API\Model\DistributionNameJsonGetResponse200' => false, 'Docker\API\Model\DistributionNameJsonGetResponse200Descriptor' => false, 'Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem' => false, '\Jane\Component\JsonSchemaRuntime\Reference' => false];
        }

        private function getNormalizer(string $normalizerClass)
        {
            return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
        }

        private function initNormalizer(string $normalizerClass)
        {
            $normalizer = new $normalizerClass();
            $normalizer->setNormalizer($this->normalizer);
            $normalizer->setDenormalizer($this->denormalizer);
            $this->normalizersCache[$normalizerClass] = $normalizer;
            return $normalizer;
        }
    }
} else {
    class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use CheckArray;
        use ValidatorTrait;

        protected $normalizers = [
            'Docker\API\Model\Port' => 'Docker\API\Normalizer\PortNormalizer',
            'Docker\API\Model\MountPoint' => 'Docker\API\Normalizer\MountPointNormalizer',
            'Docker\API\Model\DeviceMapping' => 'Docker\API\Normalizer\DeviceMappingNormalizer',
            'Docker\API\Model\ThrottleDevice' => 'Docker\API\Normalizer\ThrottleDeviceNormalizer',
            'Docker\API\Model\Mount' => 'Docker\API\Normalizer\MountNormalizer',
            'Docker\API\Model\MountBindOptions' => 'Docker\API\Normalizer\MountBindOptionsNormalizer',
            'Docker\API\Model\MountVolumeOptions' => 'Docker\API\Normalizer\MountVolumeOptionsNormalizer',
            'Docker\API\Model\MountVolumeOptionsDriverConfig' => 'Docker\API\Normalizer\MountVolumeOptionsDriverConfigNormalizer',
            'Docker\API\Model\MountTmpfsOptions' => 'Docker\API\Normalizer\MountTmpfsOptionsNormalizer',
            'Docker\API\Model\RestartPolicy' => 'Docker\API\Normalizer\RestartPolicyNormalizer',
            'Docker\API\Model\Resources' => 'Docker\API\Normalizer\ResourcesNormalizer',
            'Docker\API\Model\ResourcesBlkioWeightDeviceItem' => 'Docker\API\Normalizer\ResourcesBlkioWeightDeviceItemNormalizer',
            'Docker\API\Model\ResourcesUlimitsItem' => 'Docker\API\Normalizer\ResourcesUlimitsItemNormalizer',
            'Docker\API\Model\ResourceObject' => 'Docker\API\Normalizer\ResourceObjectNormalizer',
            'Docker\API\Model\GenericResourcesItem' => 'Docker\API\Normalizer\GenericResourcesItemNormalizer',
            'Docker\API\Model\GenericResourcesItemNamedResourceSpec' => 'Docker\API\Normalizer\GenericResourcesItemNamedResourceSpecNormalizer',
            'Docker\API\Model\GenericResourcesItemDiscreteResourceSpec' => 'Docker\API\Normalizer\GenericResourcesItemDiscreteResourceSpecNormalizer',
            'Docker\API\Model\HealthConfig' => 'Docker\API\Normalizer\HealthConfigNormalizer',
            'Docker\API\Model\HostConfig' => 'Docker\API\Normalizer\HostConfigNormalizer',
            'Docker\API\Model\HostConfigLogConfig' => 'Docker\API\Normalizer\HostConfigLogConfigNormalizer',
            'Docker\API\Model\ContainerConfig' => 'Docker\API\Normalizer\ContainerConfigNormalizer',
            'Docker\API\Model\NetworkSettings' => 'Docker\API\Normalizer\NetworkSettingsNormalizer',
            'Docker\API\Model\Address' => 'Docker\API\Normalizer\AddressNormalizer',
            'Docker\API\Model\PortBinding' => 'Docker\API\Normalizer\PortBindingNormalizer',
            'Docker\API\Model\GraphDriverData' => 'Docker\API\Normalizer\GraphDriverDataNormalizer',
            'Docker\API\Model\Image' => 'Docker\API\Normalizer\ImageNormalizer',
            'Docker\API\Model\ImageRootFS' => 'Docker\API\Normalizer\ImageRootFSNormalizer',
            'Docker\API\Model\ImageMetadata' => 'Docker\API\Normalizer\ImageMetadataNormalizer',
            'Docker\API\Model\ImageSummary' => 'Docker\API\Normalizer\ImageSummaryNormalizer',
            'Docker\API\Model\AuthConfig' => 'Docker\API\Normalizer\AuthConfigNormalizer',
            'Docker\API\Model\ProcessConfig' => 'Docker\API\Normalizer\ProcessConfigNormalizer',
            'Docker\API\Model\Volume' => 'Docker\API\Normalizer\VolumeNormalizer',
            'Docker\API\Model\VolumeUsageData' => 'Docker\API\Normalizer\VolumeUsageDataNormalizer',
            'Docker\API\Model\Network' => 'Docker\API\Normalizer\NetworkNormalizer',
            'Docker\API\Model\IPAM' => 'Docker\API\Normalizer\IPAMNormalizer',
            'Docker\API\Model\NetworkContainer' => 'Docker\API\Normalizer\NetworkContainerNormalizer',
            'Docker\API\Model\BuildInfo' => 'Docker\API\Normalizer\BuildInfoNormalizer',
            'Docker\API\Model\ImageID' => 'Docker\API\Normalizer\ImageIDNormalizer',
            'Docker\API\Model\CreateImageInfo' => 'Docker\API\Normalizer\CreateImageInfoNormalizer',
            'Docker\API\Model\PushImageInfo' => 'Docker\API\Normalizer\PushImageInfoNormalizer',
            'Docker\API\Model\ErrorDetail' => 'Docker\API\Normalizer\ErrorDetailNormalizer',
            'Docker\API\Model\ProgressDetail' => 'Docker\API\Normalizer\ProgressDetailNormalizer',
            'Docker\API\Model\ErrorResponse' => 'Docker\API\Normalizer\ErrorResponseNormalizer',
            'Docker\API\Model\IdResponse' => 'Docker\API\Normalizer\IdResponseNormalizer',
            'Docker\API\Model\EndpointSettings' => 'Docker\API\Normalizer\EndpointSettingsNormalizer',
            'Docker\API\Model\EndpointIPAMConfig' => 'Docker\API\Normalizer\EndpointIPAMConfigNormalizer',
            'Docker\API\Model\PluginMount' => 'Docker\API\Normalizer\PluginMountNormalizer',
            'Docker\API\Model\PluginDevice' => 'Docker\API\Normalizer\PluginDeviceNormalizer',
            'Docker\API\Model\PluginEnv' => 'Docker\API\Normalizer\PluginEnvNormalizer',
            'Docker\API\Model\PluginInterfaceType' => 'Docker\API\Normalizer\PluginInterfaceTypeNormalizer',
            'Docker\API\Model\Plugin' => 'Docker\API\Normalizer\PluginNormalizer',
            'Docker\API\Model\PluginSettings' => 'Docker\API\Normalizer\PluginSettingsNormalizer',
            'Docker\API\Model\PluginConfig' => 'Docker\API\Normalizer\PluginConfigNormalizer',
            'Docker\API\Model\PluginConfigInterface' => 'Docker\API\Normalizer\PluginConfigInterfaceNormalizer',
            'Docker\API\Model\PluginConfigUser' => 'Docker\API\Normalizer\PluginConfigUserNormalizer',
            'Docker\API\Model\PluginConfigNetwork' => 'Docker\API\Normalizer\PluginConfigNetworkNormalizer',
            'Docker\API\Model\PluginConfigLinux' => 'Docker\API\Normalizer\PluginConfigLinuxNormalizer',
            'Docker\API\Model\PluginConfigArgs' => 'Docker\API\Normalizer\PluginConfigArgsNormalizer',
            'Docker\API\Model\PluginConfigRootfs' => 'Docker\API\Normalizer\PluginConfigRootfsNormalizer',
            'Docker\API\Model\ObjectVersion' => 'Docker\API\Normalizer\ObjectVersionNormalizer',
            'Docker\API\Model\NodeSpec' => 'Docker\API\Normalizer\NodeSpecNormalizer',
            'Docker\API\Model\Node' => 'Docker\API\Normalizer\NodeNormalizer',
            'Docker\API\Model\NodeDescription' => 'Docker\API\Normalizer\NodeDescriptionNormalizer',
            'Docker\API\Model\Platform' => 'Docker\API\Normalizer\PlatformNormalizer',
            'Docker\API\Model\EngineDescription' => 'Docker\API\Normalizer\EngineDescriptionNormalizer',
            'Docker\API\Model\EngineDescriptionPluginsItem' => 'Docker\API\Normalizer\EngineDescriptionPluginsItemNormalizer',
            'Docker\API\Model\TLSInfo' => 'Docker\API\Normalizer\TLSInfoNormalizer',
            'Docker\API\Model\NodeStatus' => 'Docker\API\Normalizer\NodeStatusNormalizer',
            'Docker\API\Model\ManagerStatus' => 'Docker\API\Normalizer\ManagerStatusNormalizer',
            'Docker\API\Model\SwarmSpec' => 'Docker\API\Normalizer\SwarmSpecNormalizer',
            'Docker\API\Model\SwarmSpecOrchestration' => 'Docker\API\Normalizer\SwarmSpecOrchestrationNormalizer',
            'Docker\API\Model\SwarmSpecRaft' => 'Docker\API\Normalizer\SwarmSpecRaftNormalizer',
            'Docker\API\Model\SwarmSpecDispatcher' => 'Docker\API\Normalizer\SwarmSpecDispatcherNormalizer',
            'Docker\API\Model\SwarmSpecCAConfig' => 'Docker\API\Normalizer\SwarmSpecCAConfigNormalizer',
            'Docker\API\Model\SwarmSpecCAConfigExternalCAsItem' => 'Docker\API\Normalizer\SwarmSpecCAConfigExternalCAsItemNormalizer',
            'Docker\API\Model\SwarmSpecEncryptionConfig' => 'Docker\API\Normalizer\SwarmSpecEncryptionConfigNormalizer',
            'Docker\API\Model\SwarmSpecTaskDefaults' => 'Docker\API\Normalizer\SwarmSpecTaskDefaultsNormalizer',
            'Docker\API\Model\SwarmSpecTaskDefaultsLogDriver' => 'Docker\API\Normalizer\SwarmSpecTaskDefaultsLogDriverNormalizer',
            'Docker\API\Model\ClusterInfo' => 'Docker\API\Normalizer\ClusterInfoNormalizer',
            'Docker\API\Model\JoinTokens' => 'Docker\API\Normalizer\JoinTokensNormalizer',
            'Docker\API\Model\Swarm' => 'Docker\API\Normalizer\SwarmNormalizer',
            'Docker\API\Model\TaskSpec' => 'Docker\API\Normalizer\TaskSpecNormalizer',
            'Docker\API\Model\TaskSpecPluginSpec' => 'Docker\API\Normalizer\TaskSpecPluginSpecNormalizer',
            'Docker\API\Model\TaskSpecPluginSpecPluginPrivilegeItem' => 'Docker\API\Normalizer\TaskSpecPluginSpecPluginPrivilegeItemNormalizer',
            'Docker\API\Model\TaskSpecContainerSpec' => 'Docker\API\Normalizer\TaskSpecContainerSpecNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecPrivileges' => 'Docker\API\Normalizer\TaskSpecContainerSpecPrivilegesNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec' => 'Docker\API\Normalizer\TaskSpecContainerSpecPrivilegesCredentialSpecNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecPrivilegesSELinuxContext' => 'Docker\API\Normalizer\TaskSpecContainerSpecPrivilegesSELinuxContextNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecDNSConfig' => 'Docker\API\Normalizer\TaskSpecContainerSpecDNSConfigNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecSecretsItem' => 'Docker\API\Normalizer\TaskSpecContainerSpecSecretsItemNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecSecretsItemFile' => 'Docker\API\Normalizer\TaskSpecContainerSpecSecretsItemFileNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecConfigsItem' => 'Docker\API\Normalizer\TaskSpecContainerSpecConfigsItemNormalizer',
            'Docker\API\Model\TaskSpecContainerSpecConfigsItemFile' => 'Docker\API\Normalizer\TaskSpecContainerSpecConfigsItemFileNormalizer',
            'Docker\API\Model\TaskSpecResources' => 'Docker\API\Normalizer\TaskSpecResourcesNormalizer',
            'Docker\API\Model\TaskSpecRestartPolicy' => 'Docker\API\Normalizer\TaskSpecRestartPolicyNormalizer',
            'Docker\API\Model\TaskSpecPlacement' => 'Docker\API\Normalizer\TaskSpecPlacementNormalizer',
            'Docker\API\Model\TaskSpecPlacementPreferencesItem' => 'Docker\API\Normalizer\TaskSpecPlacementPreferencesItemNormalizer',
            'Docker\API\Model\TaskSpecPlacementPreferencesItemSpread' => 'Docker\API\Normalizer\TaskSpecPlacementPreferencesItemSpreadNormalizer',
            'Docker\API\Model\TaskSpecNetworksItem' => 'Docker\API\Normalizer\TaskSpecNetworksItemNormalizer',
            'Docker\API\Model\TaskSpecLogDriver' => 'Docker\API\Normalizer\TaskSpecLogDriverNormalizer',
            'Docker\API\Model\Task' => 'Docker\API\Normalizer\TaskNormalizer',
            'Docker\API\Model\TaskStatus' => 'Docker\API\Normalizer\TaskStatusNormalizer',
            'Docker\API\Model\TaskStatusContainerStatus' => 'Docker\API\Normalizer\TaskStatusContainerStatusNormalizer',
            'Docker\API\Model\ServiceSpec' => 'Docker\API\Normalizer\ServiceSpecNormalizer',
            'Docker\API\Model\ServiceSpecMode' => 'Docker\API\Normalizer\ServiceSpecModeNormalizer',
            'Docker\API\Model\ServiceSpecModeReplicated' => 'Docker\API\Normalizer\ServiceSpecModeReplicatedNormalizer',
            'Docker\API\Model\ServiceSpecUpdateConfig' => 'Docker\API\Normalizer\ServiceSpecUpdateConfigNormalizer',
            'Docker\API\Model\ServiceSpecRollbackConfig' => 'Docker\API\Normalizer\ServiceSpecRollbackConfigNormalizer',
            'Docker\API\Model\ServiceSpecNetworksItem' => 'Docker\API\Normalizer\ServiceSpecNetworksItemNormalizer',
            'Docker\API\Model\EndpointPortConfig' => 'Docker\API\Normalizer\EndpointPortConfigNormalizer',
            'Docker\API\Model\EndpointSpec' => 'Docker\API\Normalizer\EndpointSpecNormalizer',
            'Docker\API\Model\Service' => 'Docker\API\Normalizer\ServiceNormalizer',
            'Docker\API\Model\ServiceEndpoint' => 'Docker\API\Normalizer\ServiceEndpointNormalizer',
            'Docker\API\Model\ServiceEndpointVirtualIPsItem' => 'Docker\API\Normalizer\ServiceEndpointVirtualIPsItemNormalizer',
            'Docker\API\Model\ServiceUpdateStatus' => 'Docker\API\Normalizer\ServiceUpdateStatusNormalizer',
            'Docker\API\Model\ImageDeleteResponseItem' => 'Docker\API\Normalizer\ImageDeleteResponseItemNormalizer',
            'Docker\API\Model\ServiceUpdateResponse' => 'Docker\API\Normalizer\ServiceUpdateResponseNormalizer',
            'Docker\API\Model\ContainerSummaryItem' => 'Docker\API\Normalizer\ContainerSummaryItemNormalizer',
            'Docker\API\Model\ContainerSummaryItemHostConfig' => 'Docker\API\Normalizer\ContainerSummaryItemHostConfigNormalizer',
            'Docker\API\Model\ContainerSummaryItemNetworkSettings' => 'Docker\API\Normalizer\ContainerSummaryItemNetworkSettingsNormalizer',
            'Docker\API\Model\Driver' => 'Docker\API\Normalizer\DriverNormalizer',
            'Docker\API\Model\SecretSpec' => 'Docker\API\Normalizer\SecretSpecNormalizer',
            'Docker\API\Model\Secret' => 'Docker\API\Normalizer\SecretNormalizer',
            'Docker\API\Model\ConfigSpec' => 'Docker\API\Normalizer\ConfigSpecNormalizer',
            'Docker\API\Model\Config' => 'Docker\API\Normalizer\ConfigNormalizer',
            'Docker\API\Model\SystemInfo' => 'Docker\API\Normalizer\SystemInfoNormalizer',
            'Docker\API\Model\PluginsInfo' => 'Docker\API\Normalizer\PluginsInfoNormalizer',
            'Docker\API\Model\RegistryServiceConfig' => 'Docker\API\Normalizer\RegistryServiceConfigNormalizer',
            'Docker\API\Model\IndexInfo' => 'Docker\API\Normalizer\IndexInfoNormalizer',
            'Docker\API\Model\Runtime' => 'Docker\API\Normalizer\RuntimeNormalizer',
            'Docker\API\Model\Commit' => 'Docker\API\Normalizer\CommitNormalizer',
            'Docker\API\Model\SwarmInfo' => 'Docker\API\Normalizer\SwarmInfoNormalizer',
            'Docker\API\Model\PeerNode' => 'Docker\API\Normalizer\PeerNodeNormalizer',
            'Docker\API\Model\ContainersCreatePostBody' => 'Docker\API\Normalizer\ContainersCreatePostBodyNormalizer',
            'Docker\API\Model\ContainersCreatePostBodyNetworkingConfig' => 'Docker\API\Normalizer\ContainersCreatePostBodyNetworkingConfigNormalizer',
            'Docker\API\Model\ContainersCreatePostResponse201' => 'Docker\API\Normalizer\ContainersCreatePostResponse201Normalizer',
            'Docker\API\Model\ContainersIdJsonGetResponse200' => 'Docker\API\Normalizer\ContainersIdJsonGetResponse200Normalizer',
            'Docker\API\Model\ContainersIdJsonGetResponse200State' => 'Docker\API\Normalizer\ContainersIdJsonGetResponse200StateNormalizer',
            'Docker\API\Model\ContainersIdTopGetResponse200' => 'Docker\API\Normalizer\ContainersIdTopGetResponse200Normalizer',
            'Docker\API\Model\ContainersIdChangesGetResponse200Item' => 'Docker\API\Normalizer\ContainersIdChangesGetResponse200ItemNormalizer',
            'Docker\API\Model\ContainersIdUpdatePostBody' => 'Docker\API\Normalizer\ContainersIdUpdatePostBodyNormalizer',
            'Docker\API\Model\ContainersIdUpdatePostResponse200' => 'Docker\API\Normalizer\ContainersIdUpdatePostResponse200Normalizer',
            'Docker\API\Model\ContainersIdWaitPostResponse200' => 'Docker\API\Normalizer\ContainersIdWaitPostResponse200Normalizer',
            'Docker\API\Model\ContainersIdWaitPostResponse200Error' => 'Docker\API\Normalizer\ContainersIdWaitPostResponse200ErrorNormalizer',
            'Docker\API\Model\ContainersIdArchiveGetResponse400' => 'Docker\API\Normalizer\ContainersIdArchiveGetResponse400Normalizer',
            'Docker\API\Model\ContainersIdArchiveHeadResponse400' => 'Docker\API\Normalizer\ContainersIdArchiveHeadResponse400Normalizer',
            'Docker\API\Model\ContainersPrunePostResponse200' => 'Docker\API\Normalizer\ContainersPrunePostResponse200Normalizer',
            'Docker\API\Model\BuildPrunePostResponse200' => 'Docker\API\Normalizer\BuildPrunePostResponse200Normalizer',
            'Docker\API\Model\ImagesNameHistoryGetResponse200Item' => 'Docker\API\Normalizer\ImagesNameHistoryGetResponse200ItemNormalizer',
            'Docker\API\Model\ImagesSearchGetResponse200Item' => 'Docker\API\Normalizer\ImagesSearchGetResponse200ItemNormalizer',
            'Docker\API\Model\ImagesPrunePostResponse200' => 'Docker\API\Normalizer\ImagesPrunePostResponse200Normalizer',
            'Docker\API\Model\AuthPostResponse200' => 'Docker\API\Normalizer\AuthPostResponse200Normalizer',
            'Docker\API\Model\VersionGetResponse200' => 'Docker\API\Normalizer\VersionGetResponse200Normalizer',
            'Docker\API\Model\VersionGetResponse200Platform' => 'Docker\API\Normalizer\VersionGetResponse200PlatformNormalizer',
            'Docker\API\Model\VersionGetResponse200ComponentsItem' => 'Docker\API\Normalizer\VersionGetResponse200ComponentsItemNormalizer',
            'Docker\API\Model\EventsGetResponse200' => 'Docker\API\Normalizer\EventsGetResponse200Normalizer',
            'Docker\API\Model\EventsGetResponse200Actor' => 'Docker\API\Normalizer\EventsGetResponse200ActorNormalizer',
            'Docker\API\Model\SystemDfGetResponse200' => 'Docker\API\Normalizer\SystemDfGetResponse200Normalizer',
            'Docker\API\Model\ContainersIdExecPostBody' => 'Docker\API\Normalizer\ContainersIdExecPostBodyNormalizer',
            'Docker\API\Model\ExecIdStartPostBody' => 'Docker\API\Normalizer\ExecIdStartPostBodyNormalizer',
            'Docker\API\Model\ExecIdJsonGetResponse200' => 'Docker\API\Normalizer\ExecIdJsonGetResponse200Normalizer',
            'Docker\API\Model\VolumesGetResponse200' => 'Docker\API\Normalizer\VolumesGetResponse200Normalizer',
            'Docker\API\Model\VolumesCreatePostBody' => 'Docker\API\Normalizer\VolumesCreatePostBodyNormalizer',
            'Docker\API\Model\VolumesPrunePostResponse200' => 'Docker\API\Normalizer\VolumesPrunePostResponse200Normalizer',
            'Docker\API\Model\NetworksCreatePostBody' => 'Docker\API\Normalizer\NetworksCreatePostBodyNormalizer',
            'Docker\API\Model\NetworksCreatePostResponse201' => 'Docker\API\Normalizer\NetworksCreatePostResponse201Normalizer',
            'Docker\API\Model\NetworksIdConnectPostBody' => 'Docker\API\Normalizer\NetworksIdConnectPostBodyNormalizer',
            'Docker\API\Model\NetworksIdDisconnectPostBody' => 'Docker\API\Normalizer\NetworksIdDisconnectPostBodyNormalizer',
            'Docker\API\Model\NetworksPrunePostResponse200' => 'Docker\API\Normalizer\NetworksPrunePostResponse200Normalizer',
            'Docker\API\Model\PluginsPrivilegesGetResponse200Item' => 'Docker\API\Normalizer\PluginsPrivilegesGetResponse200ItemNormalizer',
            'Docker\API\Model\PluginsPullPostBodyItem' => 'Docker\API\Normalizer\PluginsPullPostBodyItemNormalizer',
            'Docker\API\Model\PluginsNameUpgradePostBodyItem' => 'Docker\API\Normalizer\PluginsNameUpgradePostBodyItemNormalizer',
            'Docker\API\Model\SwarmInitPostBody' => 'Docker\API\Normalizer\SwarmInitPostBodyNormalizer',
            'Docker\API\Model\SwarmJoinPostBody' => 'Docker\API\Normalizer\SwarmJoinPostBodyNormalizer',
            'Docker\API\Model\SwarmUnlockkeyGetResponse200' => 'Docker\API\Normalizer\SwarmUnlockkeyGetResponse200Normalizer',
            'Docker\API\Model\SwarmUnlockPostBody' => 'Docker\API\Normalizer\SwarmUnlockPostBodyNormalizer',
            'Docker\API\Model\ServicesCreatePostBody' => 'Docker\API\Normalizer\ServicesCreatePostBodyNormalizer',
            'Docker\API\Model\ServicesCreatePostResponse201' => 'Docker\API\Normalizer\ServicesCreatePostResponse201Normalizer',
            'Docker\API\Model\ServicesIdUpdatePostBody' => 'Docker\API\Normalizer\ServicesIdUpdatePostBodyNormalizer',
            'Docker\API\Model\SecretsCreatePostBody' => 'Docker\API\Normalizer\SecretsCreatePostBodyNormalizer',
            'Docker\API\Model\ConfigsCreatePostBody' => 'Docker\API\Normalizer\ConfigsCreatePostBodyNormalizer',
            'Docker\API\Model\DistributionNameJsonGetResponse200' => 'Docker\API\Normalizer\DistributionNameJsonGetResponse200Normalizer',
            'Docker\API\Model\DistributionNameJsonGetResponse200Descriptor' => 'Docker\API\Normalizer\DistributionNameJsonGetResponse200DescriptorNormalizer',
            'Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem' => 'Docker\API\Normalizer\DistributionNameJsonGetResponse200PlatformsItemNormalizer',
            '\Jane\Component\JsonSchemaRuntime\Reference' => '\Docker\API\Runtime\Normalizer\ReferenceNormalizer',
        ];

        protected $normalizersCache = [];

        public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
        {
            return array_key_exists($type, $this->normalizers);
        }

        public function supportsNormalization($data, $format = null, array $context = []): bool
        {
            return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
        }

        /**
         * @param mixed $object
         * @param null|mixed $format
         * @return null|array|ArrayObject|bool|float|int|string
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $normalizerClass = $this->normalizers[get_class($object)];
            $normalizer = $this->getNormalizer($normalizerClass);
            return $normalizer->normalize($object, $format, $context);
        }

        /**
         * @param mixed $data
         * @param mixed $type
         * @param null|mixed $format
         * @return mixed
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            $denormalizerClass = $this->normalizers[$type];
            $denormalizer = $this->getNormalizer($denormalizerClass);
            return $denormalizer->denormalize($data, $type, $format, $context);
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return ['Docker\API\Model\Port' => false, 'Docker\API\Model\MountPoint' => false, 'Docker\API\Model\DeviceMapping' => false, 'Docker\API\Model\ThrottleDevice' => false, 'Docker\API\Model\Mount' => false, 'Docker\API\Model\MountBindOptions' => false, 'Docker\API\Model\MountVolumeOptions' => false, 'Docker\API\Model\MountVolumeOptionsDriverConfig' => false, 'Docker\API\Model\MountTmpfsOptions' => false, 'Docker\API\Model\RestartPolicy' => false, 'Docker\API\Model\Resources' => false, 'Docker\API\Model\ResourcesBlkioWeightDeviceItem' => false, 'Docker\API\Model\ResourcesUlimitsItem' => false, 'Docker\API\Model\ResourceObject' => false, 'Docker\API\Model\GenericResourcesItem' => false, 'Docker\API\Model\GenericResourcesItemNamedResourceSpec' => false, 'Docker\API\Model\GenericResourcesItemDiscreteResourceSpec' => false, 'Docker\API\Model\HealthConfig' => false, 'Docker\API\Model\HostConfig' => false, 'Docker\API\Model\HostConfigLogConfig' => false, 'Docker\API\Model\ContainerConfig' => false, 'Docker\API\Model\NetworkSettings' => false, 'Docker\API\Model\Address' => false, 'Docker\API\Model\PortBinding' => false, 'Docker\API\Model\GraphDriverData' => false, 'Docker\API\Model\Image' => false, 'Docker\API\Model\ImageRootFS' => false, 'Docker\API\Model\ImageMetadata' => false, 'Docker\API\Model\ImageSummary' => false, 'Docker\API\Model\AuthConfig' => false, 'Docker\API\Model\ProcessConfig' => false, 'Docker\API\Model\Volume' => false, 'Docker\API\Model\VolumeUsageData' => false, 'Docker\API\Model\Network' => false, 'Docker\API\Model\IPAM' => false, 'Docker\API\Model\NetworkContainer' => false, 'Docker\API\Model\BuildInfo' => false, 'Docker\API\Model\ImageID' => false, 'Docker\API\Model\CreateImageInfo' => false, 'Docker\API\Model\PushImageInfo' => false, 'Docker\API\Model\ErrorDetail' => false, 'Docker\API\Model\ProgressDetail' => false, 'Docker\API\Model\ErrorResponse' => false, 'Docker\API\Model\IdResponse' => false, 'Docker\API\Model\EndpointSettings' => false, 'Docker\API\Model\EndpointIPAMConfig' => false, 'Docker\API\Model\PluginMount' => false, 'Docker\API\Model\PluginDevice' => false, 'Docker\API\Model\PluginEnv' => false, 'Docker\API\Model\PluginInterfaceType' => false, 'Docker\API\Model\Plugin' => false, 'Docker\API\Model\PluginSettings' => false, 'Docker\API\Model\PluginConfig' => false, 'Docker\API\Model\PluginConfigInterface' => false, 'Docker\API\Model\PluginConfigUser' => false, 'Docker\API\Model\PluginConfigNetwork' => false, 'Docker\API\Model\PluginConfigLinux' => false, 'Docker\API\Model\PluginConfigArgs' => false, 'Docker\API\Model\PluginConfigRootfs' => false, 'Docker\API\Model\ObjectVersion' => false, 'Docker\API\Model\NodeSpec' => false, 'Docker\API\Model\Node' => false, 'Docker\API\Model\NodeDescription' => false, 'Docker\API\Model\Platform' => false, 'Docker\API\Model\EngineDescription' => false, 'Docker\API\Model\EngineDescriptionPluginsItem' => false, 'Docker\API\Model\TLSInfo' => false, 'Docker\API\Model\NodeStatus' => false, 'Docker\API\Model\ManagerStatus' => false, 'Docker\API\Model\SwarmSpec' => false, 'Docker\API\Model\SwarmSpecOrchestration' => false, 'Docker\API\Model\SwarmSpecRaft' => false, 'Docker\API\Model\SwarmSpecDispatcher' => false, 'Docker\API\Model\SwarmSpecCAConfig' => false, 'Docker\API\Model\SwarmSpecCAConfigExternalCAsItem' => false, 'Docker\API\Model\SwarmSpecEncryptionConfig' => false, 'Docker\API\Model\SwarmSpecTaskDefaults' => false, 'Docker\API\Model\SwarmSpecTaskDefaultsLogDriver' => false, 'Docker\API\Model\ClusterInfo' => false, 'Docker\API\Model\JoinTokens' => false, 'Docker\API\Model\Swarm' => false, 'Docker\API\Model\TaskSpec' => false, 'Docker\API\Model\TaskSpecPluginSpec' => false, 'Docker\API\Model\TaskSpecPluginSpecPluginPrivilegeItem' => false, 'Docker\API\Model\TaskSpecContainerSpec' => false, 'Docker\API\Model\TaskSpecContainerSpecPrivileges' => false, 'Docker\API\Model\TaskSpecContainerSpecPrivilegesCredentialSpec' => false, 'Docker\API\Model\TaskSpecContainerSpecPrivilegesSELinuxContext' => false, 'Docker\API\Model\TaskSpecContainerSpecDNSConfig' => false, 'Docker\API\Model\TaskSpecContainerSpecSecretsItem' => false, 'Docker\API\Model\TaskSpecContainerSpecSecretsItemFile' => false, 'Docker\API\Model\TaskSpecContainerSpecConfigsItem' => false, 'Docker\API\Model\TaskSpecContainerSpecConfigsItemFile' => false, 'Docker\API\Model\TaskSpecResources' => false, 'Docker\API\Model\TaskSpecRestartPolicy' => false, 'Docker\API\Model\TaskSpecPlacement' => false, 'Docker\API\Model\TaskSpecPlacementPreferencesItem' => false, 'Docker\API\Model\TaskSpecPlacementPreferencesItemSpread' => false, 'Docker\API\Model\TaskSpecNetworksItem' => false, 'Docker\API\Model\TaskSpecLogDriver' => false, 'Docker\API\Model\Task' => false, 'Docker\API\Model\TaskStatus' => false, 'Docker\API\Model\TaskStatusContainerStatus' => false, 'Docker\API\Model\ServiceSpec' => false, 'Docker\API\Model\ServiceSpecMode' => false, 'Docker\API\Model\ServiceSpecModeReplicated' => false, 'Docker\API\Model\ServiceSpecUpdateConfig' => false, 'Docker\API\Model\ServiceSpecRollbackConfig' => false, 'Docker\API\Model\ServiceSpecNetworksItem' => false, 'Docker\API\Model\EndpointPortConfig' => false, 'Docker\API\Model\EndpointSpec' => false, 'Docker\API\Model\Service' => false, 'Docker\API\Model\ServiceEndpoint' => false, 'Docker\API\Model\ServiceEndpointVirtualIPsItem' => false, 'Docker\API\Model\ServiceUpdateStatus' => false, 'Docker\API\Model\ImageDeleteResponseItem' => false, 'Docker\API\Model\ServiceUpdateResponse' => false, 'Docker\API\Model\ContainerSummaryItem' => false, 'Docker\API\Model\ContainerSummaryItemHostConfig' => false, 'Docker\API\Model\ContainerSummaryItemNetworkSettings' => false, 'Docker\API\Model\Driver' => false, 'Docker\API\Model\SecretSpec' => false, 'Docker\API\Model\Secret' => false, 'Docker\API\Model\ConfigSpec' => false, 'Docker\API\Model\Config' => false, 'Docker\API\Model\SystemInfo' => false, 'Docker\API\Model\PluginsInfo' => false, 'Docker\API\Model\RegistryServiceConfig' => false, 'Docker\API\Model\IndexInfo' => false, 'Docker\API\Model\Runtime' => false, 'Docker\API\Model\Commit' => false, 'Docker\API\Model\SwarmInfo' => false, 'Docker\API\Model\PeerNode' => false, 'Docker\API\Model\ContainersCreatePostBody' => false, 'Docker\API\Model\ContainersCreatePostBodyNetworkingConfig' => false, 'Docker\API\Model\ContainersCreatePostResponse201' => false, 'Docker\API\Model\ContainersIdJsonGetResponse200' => false, 'Docker\API\Model\ContainersIdJsonGetResponse200State' => false, 'Docker\API\Model\ContainersIdTopGetResponse200' => false, 'Docker\API\Model\ContainersIdChangesGetResponse200Item' => false, 'Docker\API\Model\ContainersIdUpdatePostBody' => false, 'Docker\API\Model\ContainersIdUpdatePostResponse200' => false, 'Docker\API\Model\ContainersIdWaitPostResponse200' => false, 'Docker\API\Model\ContainersIdWaitPostResponse200Error' => false, 'Docker\API\Model\ContainersIdArchiveGetResponse400' => false, 'Docker\API\Model\ContainersIdArchiveHeadResponse400' => false, 'Docker\API\Model\ContainersPrunePostResponse200' => false, 'Docker\API\Model\BuildPrunePostResponse200' => false, 'Docker\API\Model\ImagesNameHistoryGetResponse200Item' => false, 'Docker\API\Model\ImagesSearchGetResponse200Item' => false, 'Docker\API\Model\ImagesPrunePostResponse200' => false, 'Docker\API\Model\AuthPostResponse200' => false, 'Docker\API\Model\VersionGetResponse200' => false, 'Docker\API\Model\VersionGetResponse200Platform' => false, 'Docker\API\Model\VersionGetResponse200ComponentsItem' => false, 'Docker\API\Model\EventsGetResponse200' => false, 'Docker\API\Model\EventsGetResponse200Actor' => false, 'Docker\API\Model\SystemDfGetResponse200' => false, 'Docker\API\Model\ContainersIdExecPostBody' => false, 'Docker\API\Model\ExecIdStartPostBody' => false, 'Docker\API\Model\ExecIdJsonGetResponse200' => false, 'Docker\API\Model\VolumesGetResponse200' => false, 'Docker\API\Model\VolumesCreatePostBody' => false, 'Docker\API\Model\VolumesPrunePostResponse200' => false, 'Docker\API\Model\NetworksCreatePostBody' => false, 'Docker\API\Model\NetworksCreatePostResponse201' => false, 'Docker\API\Model\NetworksIdConnectPostBody' => false, 'Docker\API\Model\NetworksIdDisconnectPostBody' => false, 'Docker\API\Model\NetworksPrunePostResponse200' => false, 'Docker\API\Model\PluginsPrivilegesGetResponse200Item' => false, 'Docker\API\Model\PluginsPullPostBodyItem' => false, 'Docker\API\Model\PluginsNameUpgradePostBodyItem' => false, 'Docker\API\Model\SwarmInitPostBody' => false, 'Docker\API\Model\SwarmJoinPostBody' => false, 'Docker\API\Model\SwarmUnlockkeyGetResponse200' => false, 'Docker\API\Model\SwarmUnlockPostBody' => false, 'Docker\API\Model\ServicesCreatePostBody' => false, 'Docker\API\Model\ServicesCreatePostResponse201' => false, 'Docker\API\Model\ServicesIdUpdatePostBody' => false, 'Docker\API\Model\SecretsCreatePostBody' => false, 'Docker\API\Model\ConfigsCreatePostBody' => false, 'Docker\API\Model\DistributionNameJsonGetResponse200' => false, 'Docker\API\Model\DistributionNameJsonGetResponse200Descriptor' => false, 'Docker\API\Model\DistributionNameJsonGetResponse200PlatformsItem' => false, '\Jane\Component\JsonSchemaRuntime\Reference' => false];
        }

        private function getNormalizer(string $normalizerClass)
        {
            return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
        }

        private function initNormalizer(string $normalizerClass)
        {
            $normalizer = new $normalizerClass();
            $normalizer->setNormalizer($this->normalizer);
            $normalizer->setDenormalizer($this->denormalizer);
            $this->normalizersCache[$normalizerClass] = $normalizer;
            return $normalizer;
        }
    }
}
