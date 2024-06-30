<?php
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Docker\API;

use Docker\API\Endpoint\BuildPrune;
use Docker\API\Endpoint\ConfigCreate;
use Docker\API\Endpoint\ConfigDelete;
use Docker\API\Endpoint\ConfigInspect;
use Docker\API\Endpoint\ConfigList;
use Docker\API\Endpoint\ConfigUpdate;
use Docker\API\Endpoint\ContainerArchive;
use Docker\API\Endpoint\ContainerArchiveInfo;
use Docker\API\Endpoint\ContainerAttach;
use Docker\API\Endpoint\ContainerAttachWebsocket;
use Docker\API\Endpoint\ContainerChanges;
use Docker\API\Endpoint\ContainerCreate;
use Docker\API\Endpoint\ContainerDelete;
use Docker\API\Endpoint\ContainerExec;
use Docker\API\Endpoint\ContainerExport;
use Docker\API\Endpoint\ContainerInspect;
use Docker\API\Endpoint\ContainerKill;
use Docker\API\Endpoint\ContainerList;
use Docker\API\Endpoint\ContainerLogs;
use Docker\API\Endpoint\ContainerPause;
use Docker\API\Endpoint\ContainerPrune;
use Docker\API\Endpoint\ContainerRename;
use Docker\API\Endpoint\ContainerResize;
use Docker\API\Endpoint\ContainerRestart;
use Docker\API\Endpoint\ContainerStart;
use Docker\API\Endpoint\ContainerStats;
use Docker\API\Endpoint\ContainerStop;
use Docker\API\Endpoint\ContainerTop;
use Docker\API\Endpoint\ContainerUnpause;
use Docker\API\Endpoint\ContainerUpdate;
use Docker\API\Endpoint\ContainerWait;
use Docker\API\Endpoint\DistributionInspect;
use Docker\API\Endpoint\ExecInspect;
use Docker\API\Endpoint\ExecResize;
use Docker\API\Endpoint\ExecStart;
use Docker\API\Endpoint\GetPluginPrivileges;
use Docker\API\Endpoint\ImageBuild;
use Docker\API\Endpoint\ImageCommit;
use Docker\API\Endpoint\ImageCreate;
use Docker\API\Endpoint\ImageDelete;
use Docker\API\Endpoint\ImageGet;
use Docker\API\Endpoint\ImageGetAll;
use Docker\API\Endpoint\ImageHistory;
use Docker\API\Endpoint\ImageInspect;
use Docker\API\Endpoint\ImageList;
use Docker\API\Endpoint\ImageLoad;
use Docker\API\Endpoint\ImagePrune;
use Docker\API\Endpoint\ImagePush;
use Docker\API\Endpoint\ImageSearch;
use Docker\API\Endpoint\ImageTag;
use Docker\API\Endpoint\NetworkConnect;
use Docker\API\Endpoint\NetworkCreate;
use Docker\API\Endpoint\NetworkDelete;
use Docker\API\Endpoint\NetworkDisconnect;
use Docker\API\Endpoint\NetworkInspect;
use Docker\API\Endpoint\NetworkList;
use Docker\API\Endpoint\NetworkPrune;
use Docker\API\Endpoint\NodeDelete;
use Docker\API\Endpoint\NodeInspect;
use Docker\API\Endpoint\NodeList;
use Docker\API\Endpoint\NodeUpdate;
use Docker\API\Endpoint\PluginCreate;
use Docker\API\Endpoint\PluginDelete;
use Docker\API\Endpoint\PluginDisable;
use Docker\API\Endpoint\PluginEnable;
use Docker\API\Endpoint\PluginInspect;
use Docker\API\Endpoint\PluginList;
use Docker\API\Endpoint\PluginPull;
use Docker\API\Endpoint\PluginPush;
use Docker\API\Endpoint\PluginSet;
use Docker\API\Endpoint\PluginUpgrade;
use Docker\API\Endpoint\PutContainerArchive;
use Docker\API\Endpoint\SecretCreate;
use Docker\API\Endpoint\SecretDelete;
use Docker\API\Endpoint\SecretInspect;
use Docker\API\Endpoint\SecretList;
use Docker\API\Endpoint\SecretUpdate;
use Docker\API\Endpoint\ServiceCreate;
use Docker\API\Endpoint\ServiceDelete;
use Docker\API\Endpoint\ServiceInspect;
use Docker\API\Endpoint\ServiceList;
use Docker\API\Endpoint\ServiceLogs;
use Docker\API\Endpoint\ServiceUpdate;
use Docker\API\Endpoint\Session;
use Docker\API\Endpoint\SwarmInit;
use Docker\API\Endpoint\SwarmInspect;
use Docker\API\Endpoint\SwarmJoin;
use Docker\API\Endpoint\SwarmLeave;
use Docker\API\Endpoint\SwarmUnlock;
use Docker\API\Endpoint\SwarmUnlockkey;
use Docker\API\Endpoint\SwarmUpdate;
use Docker\API\Endpoint\SystemAuth;
use Docker\API\Endpoint\SystemDataUsage;
use Docker\API\Endpoint\SystemEvents;
use Docker\API\Endpoint\SystemPing;
use Docker\API\Endpoint\SystemVersion;
use Docker\API\Endpoint\TaskInspect;
use Docker\API\Endpoint\TaskList;
use Docker\API\Endpoint\TaskLogs;
use Docker\API\Endpoint\VolumeCreate;
use Docker\API\Endpoint\VolumeDelete;
use Docker\API\Endpoint\VolumeInspect;
use Docker\API\Endpoint\VolumeList;
use Docker\API\Endpoint\VolumePrune;
use Docker\API\Exception\BuildPruneInternalServerErrorException;
use Docker\API\Exception\ConfigCreateConflictException;
use Docker\API\Exception\ConfigCreateInternalServerErrorException;
use Docker\API\Exception\ConfigCreateServiceUnavailableException;
use Docker\API\Exception\ConfigDeleteInternalServerErrorException;
use Docker\API\Exception\ConfigDeleteNotFoundException;
use Docker\API\Exception\ConfigDeleteServiceUnavailableException;
use Docker\API\Exception\ConfigInspectInternalServerErrorException;
use Docker\API\Exception\ConfigInspectNotFoundException;
use Docker\API\Exception\ConfigInspectServiceUnavailableException;
use Docker\API\Exception\ConfigListInternalServerErrorException;
use Docker\API\Exception\ConfigListServiceUnavailableException;
use Docker\API\Exception\ConfigUpdateBadRequestException;
use Docker\API\Exception\ConfigUpdateInternalServerErrorException;
use Docker\API\Exception\ConfigUpdateNotFoundException;
use Docker\API\Exception\ConfigUpdateServiceUnavailableException;
use Docker\API\Exception\ContainerArchiveBadRequestException;
use Docker\API\Exception\ContainerArchiveInfoBadRequestException;
use Docker\API\Exception\ContainerArchiveInfoInternalServerErrorException;
use Docker\API\Exception\ContainerArchiveInfoNotFoundException;
use Docker\API\Exception\ContainerArchiveInternalServerErrorException;
use Docker\API\Exception\ContainerArchiveNotFoundException;
use Docker\API\Exception\ContainerAttachBadRequestException;
use Docker\API\Exception\ContainerAttachInternalServerErrorException;
use Docker\API\Exception\ContainerAttachNotFoundException;
use Docker\API\Exception\ContainerAttachWebsocketBadRequestException;
use Docker\API\Exception\ContainerAttachWebsocketInternalServerErrorException;
use Docker\API\Exception\ContainerAttachWebsocketNotFoundException;
use Docker\API\Exception\ContainerChangesInternalServerErrorException;
use Docker\API\Exception\ContainerChangesNotFoundException;
use Docker\API\Exception\ContainerCreateBadRequestException;
use Docker\API\Exception\ContainerCreateConflictException;
use Docker\API\Exception\ContainerCreateInternalServerErrorException;
use Docker\API\Exception\ContainerCreateNotFoundException;
use Docker\API\Exception\ContainerDeleteBadRequestException;
use Docker\API\Exception\ContainerDeleteConflictException;
use Docker\API\Exception\ContainerDeleteInternalServerErrorException;
use Docker\API\Exception\ContainerDeleteNotFoundException;
use Docker\API\Exception\ContainerExecConflictException;
use Docker\API\Exception\ContainerExecInternalServerErrorException;
use Docker\API\Exception\ContainerExecNotFoundException;
use Docker\API\Exception\ContainerExportInternalServerErrorException;
use Docker\API\Exception\ContainerExportNotFoundException;
use Docker\API\Exception\ContainerInspectInternalServerErrorException;
use Docker\API\Exception\ContainerInspectNotFoundException;
use Docker\API\Exception\ContainerKillInternalServerErrorException;
use Docker\API\Exception\ContainerKillNotFoundException;
use Docker\API\Exception\ContainerListBadRequestException;
use Docker\API\Exception\ContainerListInternalServerErrorException;
use Docker\API\Exception\ContainerLogsInternalServerErrorException;
use Docker\API\Exception\ContainerLogsNotFoundException;
use Docker\API\Exception\ContainerPauseInternalServerErrorException;
use Docker\API\Exception\ContainerPauseNotFoundException;
use Docker\API\Exception\ContainerPruneInternalServerErrorException;
use Docker\API\Exception\ContainerRenameConflictException;
use Docker\API\Exception\ContainerRenameInternalServerErrorException;
use Docker\API\Exception\ContainerRenameNotFoundException;
use Docker\API\Exception\ContainerResizeInternalServerErrorException;
use Docker\API\Exception\ContainerResizeNotFoundException;
use Docker\API\Exception\ContainerRestartInternalServerErrorException;
use Docker\API\Exception\ContainerRestartNotFoundException;
use Docker\API\Exception\ContainerStartInternalServerErrorException;
use Docker\API\Exception\ContainerStartNotFoundException;
use Docker\API\Exception\ContainerStatsInternalServerErrorException;
use Docker\API\Exception\ContainerStatsNotFoundException;
use Docker\API\Exception\ContainerStopInternalServerErrorException;
use Docker\API\Exception\ContainerStopNotFoundException;
use Docker\API\Exception\ContainerTopInternalServerErrorException;
use Docker\API\Exception\ContainerTopNotFoundException;
use Docker\API\Exception\ContainerUnpauseInternalServerErrorException;
use Docker\API\Exception\ContainerUnpauseNotFoundException;
use Docker\API\Exception\ContainerUpdateInternalServerErrorException;
use Docker\API\Exception\ContainerUpdateNotFoundException;
use Docker\API\Exception\ContainerWaitInternalServerErrorException;
use Docker\API\Exception\ContainerWaitNotFoundException;
use Docker\API\Exception\DistributionInspectInternalServerErrorException;
use Docker\API\Exception\DistributionInspectUnauthorizedException;
use Docker\API\Exception\ExecInspectInternalServerErrorException;
use Docker\API\Exception\ExecInspectNotFoundException;
use Docker\API\Exception\ExecResizeNotFoundException;
use Docker\API\Exception\ExecStartConflictException;
use Docker\API\Exception\ExecStartNotFoundException;
use Docker\API\Exception\GetPluginPrivilegesInternalServerErrorException;
use Docker\API\Exception\ImageBuildBadRequestException;
use Docker\API\Exception\ImageBuildInternalServerErrorException;
use Docker\API\Exception\ImageCommitInternalServerErrorException;
use Docker\API\Exception\ImageCommitNotFoundException;
use Docker\API\Exception\ImageCreateInternalServerErrorException;
use Docker\API\Exception\ImageCreateNotFoundException;
use Docker\API\Exception\ImageDeleteConflictException;
use Docker\API\Exception\ImageDeleteInternalServerErrorException;
use Docker\API\Exception\ImageDeleteNotFoundException;
use Docker\API\Exception\ImageGetAllInternalServerErrorException;
use Docker\API\Exception\ImageGetInternalServerErrorException;
use Docker\API\Exception\ImageHistoryInternalServerErrorException;
use Docker\API\Exception\ImageHistoryNotFoundException;
use Docker\API\Exception\ImageInspectInternalServerErrorException;
use Docker\API\Exception\ImageInspectNotFoundException;
use Docker\API\Exception\ImageListInternalServerErrorException;
use Docker\API\Exception\ImageLoadInternalServerErrorException;
use Docker\API\Exception\ImagePruneInternalServerErrorException;
use Docker\API\Exception\ImagePushInternalServerErrorException;
use Docker\API\Exception\ImagePushNotFoundException;
use Docker\API\Exception\ImageSearchInternalServerErrorException;
use Docker\API\Exception\ImageTagBadRequestException;
use Docker\API\Exception\ImageTagConflictException;
use Docker\API\Exception\ImageTagInternalServerErrorException;
use Docker\API\Exception\ImageTagNotFoundException;
use Docker\API\Exception\NetworkConnectForbiddenException;
use Docker\API\Exception\NetworkConnectInternalServerErrorException;
use Docker\API\Exception\NetworkConnectNotFoundException;
use Docker\API\Exception\NetworkCreateForbiddenException;
use Docker\API\Exception\NetworkCreateInternalServerErrorException;
use Docker\API\Exception\NetworkCreateNotFoundException;
use Docker\API\Exception\NetworkDeleteForbiddenException;
use Docker\API\Exception\NetworkDeleteInternalServerErrorException;
use Docker\API\Exception\NetworkDeleteNotFoundException;
use Docker\API\Exception\NetworkDisconnectForbiddenException;
use Docker\API\Exception\NetworkDisconnectInternalServerErrorException;
use Docker\API\Exception\NetworkDisconnectNotFoundException;
use Docker\API\Exception\NetworkInspectInternalServerErrorException;
use Docker\API\Exception\NetworkInspectNotFoundException;
use Docker\API\Exception\NetworkListInternalServerErrorException;
use Docker\API\Exception\NetworkPruneInternalServerErrorException;
use Docker\API\Exception\NodeDeleteInternalServerErrorException;
use Docker\API\Exception\NodeDeleteNotFoundException;
use Docker\API\Exception\NodeDeleteServiceUnavailableException;
use Docker\API\Exception\NodeInspectInternalServerErrorException;
use Docker\API\Exception\NodeInspectNotFoundException;
use Docker\API\Exception\NodeInspectServiceUnavailableException;
use Docker\API\Exception\NodeListInternalServerErrorException;
use Docker\API\Exception\NodeListServiceUnavailableException;
use Docker\API\Exception\NodeUpdateBadRequestException;
use Docker\API\Exception\NodeUpdateInternalServerErrorException;
use Docker\API\Exception\NodeUpdateNotFoundException;
use Docker\API\Exception\NodeUpdateServiceUnavailableException;
use Docker\API\Exception\PluginCreateInternalServerErrorException;
use Docker\API\Exception\PluginDeleteInternalServerErrorException;
use Docker\API\Exception\PluginDeleteNotFoundException;
use Docker\API\Exception\PluginDisableInternalServerErrorException;
use Docker\API\Exception\PluginDisableNotFoundException;
use Docker\API\Exception\PluginEnableInternalServerErrorException;
use Docker\API\Exception\PluginEnableNotFoundException;
use Docker\API\Exception\PluginInspectInternalServerErrorException;
use Docker\API\Exception\PluginInspectNotFoundException;
use Docker\API\Exception\PluginListInternalServerErrorException;
use Docker\API\Exception\PluginPullInternalServerErrorException;
use Docker\API\Exception\PluginPushInternalServerErrorException;
use Docker\API\Exception\PluginPushNotFoundException;
use Docker\API\Exception\PluginSetInternalServerErrorException;
use Docker\API\Exception\PluginSetNotFoundException;
use Docker\API\Exception\PluginUpgradeInternalServerErrorException;
use Docker\API\Exception\PluginUpgradeNotFoundException;
use Docker\API\Exception\PutContainerArchiveBadRequestException;
use Docker\API\Exception\PutContainerArchiveForbiddenException;
use Docker\API\Exception\PutContainerArchiveInternalServerErrorException;
use Docker\API\Exception\PutContainerArchiveNotFoundException;
use Docker\API\Exception\SecretCreateConflictException;
use Docker\API\Exception\SecretCreateInternalServerErrorException;
use Docker\API\Exception\SecretCreateServiceUnavailableException;
use Docker\API\Exception\SecretDeleteInternalServerErrorException;
use Docker\API\Exception\SecretDeleteNotFoundException;
use Docker\API\Exception\SecretDeleteServiceUnavailableException;
use Docker\API\Exception\SecretInspectInternalServerErrorException;
use Docker\API\Exception\SecretInspectNotFoundException;
use Docker\API\Exception\SecretInspectServiceUnavailableException;
use Docker\API\Exception\SecretListInternalServerErrorException;
use Docker\API\Exception\SecretListServiceUnavailableException;
use Docker\API\Exception\SecretUpdateBadRequestException;
use Docker\API\Exception\SecretUpdateInternalServerErrorException;
use Docker\API\Exception\SecretUpdateNotFoundException;
use Docker\API\Exception\SecretUpdateServiceUnavailableException;
use Docker\API\Exception\ServiceCreateBadRequestException;
use Docker\API\Exception\ServiceCreateConflictException;
use Docker\API\Exception\ServiceCreateForbiddenException;
use Docker\API\Exception\ServiceCreateInternalServerErrorException;
use Docker\API\Exception\ServiceCreateServiceUnavailableException;
use Docker\API\Exception\ServiceDeleteInternalServerErrorException;
use Docker\API\Exception\ServiceDeleteNotFoundException;
use Docker\API\Exception\ServiceDeleteServiceUnavailableException;
use Docker\API\Exception\ServiceInspectInternalServerErrorException;
use Docker\API\Exception\ServiceInspectNotFoundException;
use Docker\API\Exception\ServiceInspectServiceUnavailableException;
use Docker\API\Exception\ServiceListInternalServerErrorException;
use Docker\API\Exception\ServiceListServiceUnavailableException;
use Docker\API\Exception\ServiceLogsInternalServerErrorException;
use Docker\API\Exception\ServiceLogsNotFoundException;
use Docker\API\Exception\ServiceLogsServiceUnavailableException;
use Docker\API\Exception\ServiceUpdateBadRequestException;
use Docker\API\Exception\ServiceUpdateInternalServerErrorException;
use Docker\API\Exception\ServiceUpdateNotFoundException;
use Docker\API\Exception\ServiceUpdateServiceUnavailableException;
use Docker\API\Exception\SessionBadRequestException;
use Docker\API\Exception\SessionInternalServerErrorException;
use Docker\API\Exception\SwarmInitBadRequestException;
use Docker\API\Exception\SwarmInitInternalServerErrorException;
use Docker\API\Exception\SwarmInitServiceUnavailableException;
use Docker\API\Exception\SwarmInspectInternalServerErrorException;
use Docker\API\Exception\SwarmInspectNotFoundException;
use Docker\API\Exception\SwarmInspectServiceUnavailableException;
use Docker\API\Exception\SwarmJoinBadRequestException;
use Docker\API\Exception\SwarmJoinInternalServerErrorException;
use Docker\API\Exception\SwarmJoinServiceUnavailableException;
use Docker\API\Exception\SwarmLeaveInternalServerErrorException;
use Docker\API\Exception\SwarmLeaveServiceUnavailableException;
use Docker\API\Exception\SwarmUnlockInternalServerErrorException;
use Docker\API\Exception\SwarmUnlockkeyInternalServerErrorException;
use Docker\API\Exception\SwarmUnlockkeyServiceUnavailableException;
use Docker\API\Exception\SwarmUnlockServiceUnavailableException;
use Docker\API\Exception\SwarmUpdateBadRequestException;
use Docker\API\Exception\SwarmUpdateInternalServerErrorException;
use Docker\API\Exception\SwarmUpdateServiceUnavailableException;
use Docker\API\Exception\SystemAuthInternalServerErrorException;
use Docker\API\Exception\SystemDataUsageInternalServerErrorException;
use Docker\API\Exception\SystemEventsBadRequestException;
use Docker\API\Exception\SystemEventsInternalServerErrorException;
use Docker\API\Exception\SystemInfoInternalServerErrorException;
use Docker\API\Exception\SystemPingInternalServerErrorException;
use Docker\API\Exception\SystemVersionInternalServerErrorException;
use Docker\API\Exception\TaskInspectInternalServerErrorException;
use Docker\API\Exception\TaskInspectNotFoundException;
use Docker\API\Exception\TaskInspectServiceUnavailableException;
use Docker\API\Exception\TaskListInternalServerErrorException;
use Docker\API\Exception\TaskListServiceUnavailableException;
use Docker\API\Exception\TaskLogsInternalServerErrorException;
use Docker\API\Exception\TaskLogsNotFoundException;
use Docker\API\Exception\TaskLogsServiceUnavailableException;
use Docker\API\Exception\VolumeCreateInternalServerErrorException;
use Docker\API\Exception\VolumeDeleteConflictException;
use Docker\API\Exception\VolumeDeleteInternalServerErrorException;
use Docker\API\Exception\VolumeDeleteNotFoundException;
use Docker\API\Exception\VolumeInspectInternalServerErrorException;
use Docker\API\Exception\VolumeInspectNotFoundException;
use Docker\API\Exception\VolumeListInternalServerErrorException;
use Docker\API\Exception\VolumePruneInternalServerErrorException;
use Docker\API\Model\AuthConfig;
use Docker\API\Model\AuthPostResponse200;
use Docker\API\Model\BuildPrunePostResponse200;
use Docker\API\Model\Config;
use Docker\API\Model\ConfigsCreatePostBody;
use Docker\API\Model\ConfigSpec;
use Docker\API\Model\ContainerConfig;
use Docker\API\Model\ContainersCreatePostBody;
use Docker\API\Model\ContainersCreatePostResponse201;
use Docker\API\Model\ContainersIdExecPostBody;
use Docker\API\Model\ContainersIdJsonGetResponse200;
use Docker\API\Model\ContainersIdTopGetResponse200;
use Docker\API\Model\ContainersIdUpdatePostBody;
use Docker\API\Model\ContainersIdUpdatePostResponse200;
use Docker\API\Model\ContainersIdWaitPostResponse200;
use Docker\API\Model\ContainersPrunePostResponse200;
use Docker\API\Model\DistributionNameJsonGetResponse200;
use Docker\API\Model\ErrorResponse;
use Docker\API\Model\EventsGetResponse200;
use Docker\API\Model\ExecIdJsonGetResponse200;
use Docker\API\Model\ExecIdStartPostBody;
use Docker\API\Model\IdResponse;
use Docker\API\Model\Image;
use Docker\API\Model\ImagesPrunePostResponse200;
use Docker\API\Model\Network;
use Docker\API\Model\NetworksCreatePostBody;
use Docker\API\Model\NetworksCreatePostResponse201;
use Docker\API\Model\NetworksIdConnectPostBody;
use Docker\API\Model\NetworksIdDisconnectPostBody;
use Docker\API\Model\NetworksPrunePostResponse200;
use Docker\API\Model\Node;
use Docker\API\Model\NodeSpec;
use Docker\API\Model\Plugin;
use Docker\API\Model\Secret;
use Docker\API\Model\SecretsCreatePostBody;
use Docker\API\Model\SecretSpec;
use Docker\API\Model\Service;
use Docker\API\Model\ServicesCreatePostBody;
use Docker\API\Model\ServicesCreatePostResponse201;
use Docker\API\Model\ServicesIdUpdatePostBody;
use Docker\API\Model\ServiceUpdateResponse;
use Docker\API\Model\Swarm;
use Docker\API\Model\SwarmInitPostBody;
use Docker\API\Model\SwarmJoinPostBody;
use Docker\API\Model\SwarmSpec;
use Docker\API\Model\SwarmUnlockkeyGetResponse200;
use Docker\API\Model\SwarmUnlockPostBody;
use Docker\API\Model\SystemDfGetResponse200;
use Docker\API\Model\SystemInfo;
use Docker\API\Model\Task;
use Docker\API\Model\VersionGetResponse200;
use Docker\API\Model\Volume;
use Docker\API\Model\VolumesCreatePostBody;
use Docker\API\Model\VolumesGetResponse200;
use Docker\API\Model\VolumesPrunePostResponse200;
use Docker\API\Normalizer\JaneObjectNormalizer;
use Http\Client\Common\PluginClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Serializer;

class Client extends Runtime\Client\Client
{
    /**
     * Returns a list of containers. For details on the format, see [the inspect endpoint](#operation/ContainerInspect).
     *
     * Note that it uses a different, smaller representation of a container than inspecting a single container. For example,
     * the list of linked containers is not propagated .
     *
     * @param array $queryParameters {
     * @var bool $all Return all containers. By default, only running containers are shown
     * @var int $limit return this number of most recently created containers, including non-running ones
     * @var bool $size return the size of container as fields `SizeRw` and `SizeRootFs`
     * @var string $filters Filters to process on the container list, encoded as JSON (a `map[string][]string`). For example, `{"status": ["paused"]}` will only return paused containers. Available filters:
     *
     * - `ancestor`=(`<image-name>[:<tag>]`, `<image id>`, or `<image@digest>`)
     * - `before`=(`<container id>` or `<container name>`)
     * - `expose`=(`<port>[/<proto>]`|`<startport-endport>/[<proto>]`)
     * - `exited=<int>` containers with exit code of `<int>`
     * - `health`=(`starting`|`healthy`|`unhealthy`|`none`)
     * - `id=<ID>` a container's ID
     * - `isolation=`(`default`|`process`|`hyperv`) (Windows daemon only)
     * - `is-task=`(`true`|`false`)
     * - `label=key` or `label="key=value"` of a container label
     * - `name=<name>` a container's name
     * - `network`=(`<network id>` or `<network name>`)
     * - `publish`=(`<port>[/<proto>]`|`<startport-endport>/[<proto>]`)
     * - `since`=(`<container id>` or `<container name>`)
     * - `status=`(`created`|`restarting`|`running`|`removing`|`paused`|`exited`|`dead`)
     * - `volume`=(`<volume name>` or `<mount point destination>`)
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Docker\API\Model\ContainerSummaryItem[]|\Psr\Http\Message\ResponseInterface
     * @throws ContainerListBadRequestException
     * @throws ContainerListInternalServerErrorException
     */
    public function containerList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerList($queryParameters), $fetch);
    }

    /**
     * @param ContainersCreatePostBody $body Container to create
     * @param array $queryParameters {
     * @var string $name Assign the specified name to the container. Must match `/?[a-zA-Z0-9_-]+`.
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ContainersCreatePostResponse201|ResponseInterface
     * @throws ContainerCreateBadRequestException
     * @throws ContainerCreateNotFoundException
     * @throws ContainerCreateConflictException
     * @throws ContainerCreateInternalServerErrorException
     */
    public function containerCreate(ContainersCreatePostBody $body, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerCreate($body, $queryParameters), $fetch);
    }

    /**
     * Return low-level information about a container.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var bool $size Return the size of container as fields `SizeRw` and `SizeRootFs`
     *           }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ContainersIdJsonGetResponse200|ResponseInterface
     * @throws ContainerInspectNotFoundException
     * @throws ContainerInspectInternalServerErrorException
     */
    public function containerInspect(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerInspect($id, $queryParameters), $fetch);
    }

    /**
     * On Unix systems, this is done by running the `ps` command. This endpoint is not supported on Windows.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var string $ps_args The arguments to pass to `ps`. For example, `aux`
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ContainersIdTopGetResponse200|ResponseInterface
     * @throws ContainerTopNotFoundException
     * @throws ContainerTopInternalServerErrorException
     */
    public function containerTop(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerTop($id, $queryParameters), $fetch);
    }

    /**
     * Get `stdout` and `stderr` logs from a container.
     *
     * Note: This endpoint works only for containers with the `json-file` or `journald` logging driver.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var bool $follow Return the logs as a stream.
     *
     * This will return a `101` HTTP response with a `Connection: upgrade` header, then hijack the HTTP connection to send raw output. For more information about hijacking and the stream format, [see the documentation for the attach endpoint](#operation/ContainerAttach).
     *
     * @var bool $stdout Return logs from `stdout`
     * @var bool $stderr Return logs from `stderr`
     * @var int $since Only return logs since this time, as a UNIX timestamp
     * @var int $until Only return logs before this time, as a UNIX timestamp
     * @var bool $timestamps Add timestamps to every log line
     * @var string $tail Only return this number of log lines from the end of the logs. Specify as an integer or `all` to output all log lines.
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ContainerLogsNotFoundException
     * @throws ContainerLogsInternalServerErrorException
     */
    public function containerLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerLogs($id, $queryParameters), $fetch);
    }

    /**
     * Returns which files in a container's filesystem have been added, deleted,
     * or modified. The `Kind` of modification can be one of:
     *
     * - `0`: Modified
     * - `1`: Added
     * - `2`: Deleted
     *
     * @param string $id ID or name of the container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Docker\API\Model\ContainersIdChangesGetResponse200Item[]|\Psr\Http\Message\ResponseInterface
     * @throws ContainerChangesNotFoundException
     * @throws ContainerChangesInternalServerErrorException
     */
    public function containerChanges(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerChanges($id), $fetch);
    }

    /**
     * Export the contents of a container as a tarball.
     *
     * @param string $id ID or name of the container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ContainerExportNotFoundException
     * @throws ContainerExportInternalServerErrorException
     */
    public function containerExport(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerExport($id), $fetch);
    }

    /**
     * This endpoint returns a live stream of a container’s resource usage
     * statistics.
     *
     * The `precpu_stats` is the CPU statistic of last read, which is used
     * for calculating the CPU usage percentage. It is not the same as the
     * `cpu_stats` field.
     *
     * If either `precpu_stats.online_cpus` or `cpu_stats.online_cpus` is
     * nil then for compatibility with older daemons the length of the
     * corresponding `cpu_usage.percpu_usage` array should be used.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var bool $stream Stream the output. If false, the stats will be output once and then it will disconnect.
     *           }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ContainerStatsNotFoundException
     * @throws ContainerStatsInternalServerErrorException
     */
    public function containerStats(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerStats($id, $queryParameters), $fetch);
    }

    /**
     * Resize the TTY for a container. You must restart the container for the resize to take effect.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var int $h Height of the tty session in characters
     * @var int $w Width of the tty session in characters
     *          }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ContainerResizeNotFoundException
     * @throws ContainerResizeInternalServerErrorException
     */
    public function containerResize(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerResize($id, $queryParameters), $fetch);
    }

    /**
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var string $detachKeys Override the key sequence for detaching a container. Format is a single character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`, `@`, `^`, `[`, `,` or `_`.
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ErrorResponse|ResponseInterface
     * @throws ContainerStartNotFoundException
     * @throws ContainerStartInternalServerErrorException
     */
    public function containerStart(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerStart($id, $queryParameters), $fetch);
    }

    /**
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var int $t Number of seconds to wait before killing the container
     *          }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ErrorResponse|ResponseInterface
     * @throws ContainerStopNotFoundException
     * @throws ContainerStopInternalServerErrorException
     */
    public function containerStop(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerStop($id, $queryParameters), $fetch);
    }

    /**
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var int $t Number of seconds to wait before killing the container
     *          }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ContainerRestartNotFoundException
     * @throws ContainerRestartInternalServerErrorException
     */
    public function containerRestart(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerRestart($id, $queryParameters), $fetch);
    }

    /**
     * Send a POSIX signal to a container, defaulting to killing to the container.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var string $signal Signal to send to the container as an integer or string (e.g. `SIGINT`)
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ContainerKillNotFoundException
     * @throws ContainerKillInternalServerErrorException
     */
    public function containerKill(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerKill($id, $queryParameters), $fetch);
    }

    /**
     * Change various configuration options of a container without having to recreate it.
     *
     * @param string $id ID or name of the container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ContainersIdUpdatePostResponse200|ResponseInterface
     * @throws ContainerUpdateNotFoundException
     * @throws ContainerUpdateInternalServerErrorException
     */
    public function containerUpdate(string $id, ContainersIdUpdatePostBody $update, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerUpdate($id, $update), $fetch);
    }

    /**
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var string $name New name for the container
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ContainerRenameNotFoundException
     * @throws ContainerRenameConflictException
     * @throws ContainerRenameInternalServerErrorException
     */
    public function containerRename(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerRename($id, $queryParameters), $fetch);
    }

    /**
     * Use the cgroups freezer to suspend all processes in a container.
     *
     * Traditionally, when suspending a process the `SIGSTOP` signal is used, which is observable by the process being suspended. With the cgroups freezer the process is unaware, and unable to capture, that it is being suspended, and subsequently resumed.
     *
     * @param string $id ID or name of the container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ContainerPauseNotFoundException
     * @throws ContainerPauseInternalServerErrorException
     */
    public function containerPause(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerPause($id), $fetch);
    }

    /**
     * Resume a container which has been paused.
     *
     * @param string $id ID or name of the container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ContainerUnpauseNotFoundException
     * @throws ContainerUnpauseInternalServerErrorException
     */
    public function containerUnpause(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerUnpause($id), $fetch);
    }

    /**
     * Attach to a container to read its output or send it input. You can attach to the same container multiple times and you can reattach to containers that have been detached.
     *
     * Either the `stream` or `logs` parameter must be `true` for this endpoint to do anything.
     *
     * See [the documentation for the `docker attach` command](https://docs.docker.com/engine/reference/commandline/attach/) for more details.
     *
     * ### Hijacking
     *
     * This endpoint hijacks the HTTP connection to transport `stdin`, `stdout`, and `stderr` on the same socket.
     *
     * This is the response from the daemon for an attach request:
     *
     * ```
     * HTTP/1.1 200 OK
     * Content-Type: application/vnd.docker.raw-stream
     *
     * [STREAM]
     * ```
     *
     * After the headers and two new lines, the TCP connection can now be used for raw, bidirectional communication between the client and server.
     *
     * To hint potential proxies about connection hijacking, the Docker client can also optionally send connection upgrade headers.
     *
     * For example, the client sends this request to upgrade the connection:
     *
     * ```
     * POST /containers/16253994b7c4/attach?stream=1&stdout=1 HTTP/1.1
     * Upgrade: tcp
     * Connection: Upgrade
     * ```
     *
     * The Docker daemon will respond with a `101 UPGRADED` response, and will similarly follow with the raw stream:
     *
     * ```
     * HTTP/1.1 101 UPGRADED
     * Content-Type: application/vnd.docker.raw-stream
     * Connection: Upgrade
     * Upgrade: tcp
     *
     * [STREAM]
     * ```
     *
     * ### Stream format
     *
     * When the TTY setting is disabled in [`POST /containers/create`](#operation/ContainerCreate), the stream over the hijacked connected is multiplexed to separate out `stdout` and `stderr`. The stream consists of a series of frames, each containing a header and a payload.
     *
     * The header contains the information which the stream writes (`stdout` or `stderr`). It also contains the size of the associated frame encoded in the last four bytes (`uint32`).
     *
     * It is encoded on the first eight bytes like this:
     *
     * ```go
     * header := [8]byte{STREAM_TYPE, 0, 0, 0, SIZE1, SIZE2, SIZE3, SIZE4}
     * ```
     *
     * `STREAM_TYPE` can be:
     *
     * - 0: `stdin` (is written on `stdout`)
     * - 1: `stdout`
     * - 2: `stderr`
     *
     * `SIZE1, SIZE2, SIZE3, SIZE4` are the four bytes of the `uint32` size encoded as big endian.
     *
     * Following the header is the payload, which is the specified number of bytes of `STREAM_TYPE`.
     *
     * The simplest way to implement this protocol is the following:
     *
     * 1. Read 8 bytes.
     * 2. Choose `stdout` or `stderr` depending on the first byte.
     * 3. Extract the frame size from the last four bytes.
     * 4. Read the extracted size and output it on the correct output.
     * 5. Goto 1.
     *
     * ### Stream format when using a TTY
     *
     * When the TTY setting is enabled in [`POST /containers/create`](#operation/ContainerCreate), the stream is not multiplexed. The data exchanged over the hijacked connection is simply the raw data from the process PTY and client's `stdin`.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var string $detachKeys Override the key sequence for detaching a container.Format is a single character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`, `@`, `^`, `[`, `,` or `_`.
     * @var bool $logs Replay previous logs from the container.
     *
     * This is useful for attaching to a container that has started and you want to output everything since the container started.
     *
     * If `stream` is also enabled, once all the previous output has been returned, it will seamlessly transition into streaming current output.
     *
     * @var bool $stream Stream attached streams from the time the request was made onwards
     * @var bool $stdin Attach to `stdin`
     * @var bool $stdout Attach to `stdout`
     * @var bool $stderr Attach to `stderr`
     *           }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ContainerAttachBadRequestException
     * @throws ContainerAttachNotFoundException
     * @throws ContainerAttachInternalServerErrorException
     */
    public function containerAttach(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerAttach($id, $queryParameters), $fetch);
    }

    /**
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var string $detachKeys Override the key sequence for detaching a container.Format is a single character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`, `@`, `^`, `[`, `,`, or `_`.
     * @var bool $logs Return logs
     * @var bool $stream Return stream
     * @var bool $stdin Attach to `stdin`
     * @var bool $stdout Attach to `stdout`
     * @var bool $stderr Attach to `stderr`
     *           }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ContainerAttachWebsocketBadRequestException
     * @throws ContainerAttachWebsocketNotFoundException
     * @throws ContainerAttachWebsocketInternalServerErrorException
     */
    public function containerAttachWebsocket(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerAttachWebsocket($id, $queryParameters), $fetch);
    }

    /**
     * Block until a container stops, then returns the exit code.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var string $condition Wait until a container state reaches the given condition, either 'not-running' (default), 'next-exit', or 'removed'.
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ContainersIdWaitPostResponse200|ResponseInterface
     * @throws ContainerWaitNotFoundException
     * @throws ContainerWaitInternalServerErrorException
     */
    public function containerWait(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerWait($id, $queryParameters), $fetch);
    }

    /**
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var bool $v remove the volumes associated with the container
     * @var bool $force if the container is running, kill it before removing it
     * @var bool $link Remove the specified link associated with the container.
     *           }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ContainerDeleteBadRequestException
     * @throws ContainerDeleteNotFoundException
     * @throws ContainerDeleteConflictException
     * @throws ContainerDeleteInternalServerErrorException
     */
    public function containerDelete(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerDelete($id, $queryParameters), $fetch);
    }

    /**
     * Get a tar archive of a resource in the filesystem of container id.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var string $path Resource in the container’s filesystem to archive.
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ContainerArchiveBadRequestException
     * @throws ContainerArchiveNotFoundException
     * @throws ContainerArchiveInternalServerErrorException
     */
    public function containerArchive(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerArchive($id, $queryParameters), $fetch);
    }

    /**
     * A response header `X-Docker-Container-Path-Stat` is return containing a base64 - encoded JSON object with some filesystem header information about the path.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var string $path Resource in the container’s filesystem to archive.
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ContainerArchiveInfoBadRequestException
     * @throws ContainerArchiveInfoNotFoundException
     * @throws ContainerArchiveInfoInternalServerErrorException
     */
    public function containerArchiveInfo(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerArchiveInfo($id, $queryParameters), $fetch);
    }

    /**
     * Upload a tar archive to be extracted to a path in the filesystem of container id.
     *
     * @param string $id ID or name of the container
     * @param string $inputStream the input stream must be a tar archive compressed with one of the following algorithms: identity (no compression), gzip, bzip2, xz
     * @param array $queryParameters {
     * @var string $path path to a directory in the container to extract the archive’s contents into
     * @var string $noOverwriteDirNonDir If “1”, “true”, or “True” then it will be an error if unpacking the given content would cause an existing directory to be replaced with a non-directory and vice versa.
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws PutContainerArchiveBadRequestException
     * @throws PutContainerArchiveForbiddenException
     * @throws PutContainerArchiveNotFoundException
     * @throws PutContainerArchiveInternalServerErrorException
     */
    public function putContainerArchive(string $id, string $inputStream, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PutContainerArchive($id, $inputStream, $queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     * @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`).
     *
     * Available filters:
     * - `until=<timestamp>` Prune containers created before this timestamp. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon machine’s time.
     * - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune containers with (or without, in case `label!=...` is used) the specified labels.
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ContainersPrunePostResponse200|ResponseInterface
     * @throws ContainerPruneInternalServerErrorException
     */
    public function containerPrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerPrune($queryParameters), $fetch);
    }

    /**
     * Returns a list of images on the server. Note that it uses a different, smaller representation of an image than inspecting a single image.
     *
     * @param array $queryParameters {
     * @var bool $all Show all images. Only images from a final layer (no children) are shown by default.
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to process on the images list. Available filters:
     *
     * - `before`=(`<image-name>[:<tag>]`,  `<image id>` or `<image@digest>`)
     * - `dangling=true`
     * - `label=key` or `label="key=value"` of an image label
     * - `reference`=(`<image-name>[:<tag>]`)
     * - `since`=(`<image-name>[:<tag>]`,  `<image id>` or `<image@digest>`)
     *
     * @var bool $digests Show digest information as a `RepoDigests` field on each image.
     *           }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Docker\API\Model\ImageSummary[]|\Psr\Http\Message\ResponseInterface
     * @throws ImageListInternalServerErrorException
     */
    public function imageList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageList($queryParameters), $fetch);
    }

    /**
     * Build an image from a tar archive with a `Dockerfile` in it.
     *
     * The `Dockerfile` specifies how the image is built from the tar archive. It is typically in the archive's root, but can be at a different path or have a different name by specifying the `dockerfile` parameter. [See the `Dockerfile` reference for more information](https://docs.docker.com/engine/reference/builder/).
     *
     * The Docker daemon performs a preliminary validation of the `Dockerfile` before starting the build, and returns an error if the syntax is incorrect. After that, each instruction is run one-by-one until the ID of the new image is output.
     *
     * The build is canceled if the client drops the connection by quitting or being killed.
     *
     * @param resource|StreamInterface|string $inputStream a tar archive compressed with one of the following algorithms: identity (no compression), gzip, bzip2, xz
     * @param array $queryParameters {
     * @var string $dockerfile Path within the build context to the `Dockerfile`. This is ignored if `remote` is specified and points to an external `Dockerfile`.
     * @var string $t A name and optional tag to apply to the image in the `name:tag` format. If you omit the tag the default `latest` value is assumed. You can provide several `t` parameters.
     * @var string $extrahosts Extra hosts to add to /etc/hosts
     * @var string $remote A Git repository URI or HTTP/HTTPS context URI. If the URI points to a single text file, the file’s contents are placed into a file called `Dockerfile` and the image is built from that file. If the URI points to a tarball, the file is downloaded by the daemon and the contents therein used as the context for the build. If the URI points to a tarball and the `dockerfile` parameter is also specified, there must be a file with the corresponding path inside the tarball.
     * @var bool $q suppress verbose build output
     * @var bool $nocache do not use the cache when building the image
     * @var string $cachefrom JSON array of images used for build cache resolution
     * @var string $pull attempt to pull the image even if an older image exists locally
     * @var bool $rm remove intermediate containers after a successful build
     * @var bool $forcerm always remove intermediate containers, even upon failure
     * @var int $memory set memory limit for build
     * @var int $memswap Total memory (memory + swap). Set as `-1` to disable swap.
     * @var int $cpushares CPU shares (relative weight)
     * @var string $cpusetcpus CPUs in which to allow execution (e.g., `0-3`, `0,1`).
     * @var int $cpuperiod the length of a CPU period in microseconds
     * @var int $cpuquota microseconds of CPU time that the container can get in a CPU period
     * @var string $buildargs JSON map of string pairs for build-time variables. Users pass these values at build-time. Docker uses the buildargs as the environment context for commands run via the `Dockerfile` RUN instruction, or for variable expansion in other `Dockerfile` instructions. This is not meant for passing secret values. [Read more about the buildargs instruction.](https://docs.docker.com/engine/reference/builder/#arg)
     * @var int $shmsize Size of `/dev/shm` in bytes. The size must be greater than 0. If omitted the system uses 64MB.
     * @var bool $squash Squash the resulting images layers into a single layer. *(Experimental release only.)*
     * @var string $labels arbitrary key/value labels to set on the image, as a JSON map of string pairs
     * @var string $networkmode Sets the networking mode for the run commands during build. Supported standard values are: `bridge`, `host`, `none`, and `container:<name|id>`. Any other value is taken as a custom network's name to which this container should connect to.
     * @var string $platform Platform in the format os[/arch[/variant]]
     *             }
     * @param array $headerParameters {
     * @var string $Content-type
     * @var string $X-Registry-Config This is a base64-encoded JSON object with auth configurations for multiple registries that a build may refer to.
     *
     * The key is a registry URL, and the value is an auth configuration object, [as described in the authentication section](#section/Authentication). For example:
     *
     * ```
     * {
     * "docker.example.com": {
     * "username": "janedoe",
     * "password": "hunter2"
     * },
     * "https://index.docker.io/v1/": {
     * "username": "mobydock",
     * "password": "conta1n3rize14"
     * }
     * }
     * ```
     *
     * Only the registry domain name (and port if not the default 443) are required. However, for legacy reasons, the Docker Hub registry must be specified with both a `https://` prefix and a `/v1/` suffix even though Docker will prefer to use the v2 registry API.
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ImageBuildBadRequestException
     * @throws ImageBuildInternalServerErrorException
     */
    public function imageBuild($inputStream, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageBuild($inputStream, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|BuildPrunePostResponse200|ResponseInterface
     * @throws BuildPruneInternalServerErrorException
     */
    public function buildPrune(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new BuildPrune(), $fetch);
    }

    /**
     * Create an image by either pulling it from a registry or importing it.
     *
     * @param string $inputImage Image content if the value `-` has been specified in fromSrc query parameter
     * @param array $queryParameters {
     * @var string $fromImage Name of the image to pull. The name may include a tag or digest. This parameter may only be used when pulling an image. The pull is cancelled if the HTTP connection is closed.
     * @var string $fromSrc Source to import. The value may be a URL from which the image can be retrieved or `-` to read the image from the request body. This parameter may only be used when importing an image.
     * @var string $repo Repository name given to an image when it is imported. The repo may include a tag. This parameter may only be used when importing an image.
     * @var string $tag Tag or digest. If empty when pulling an image, this causes all tags for the given image to be pulled.
     * @var string $platform Platform in the format os[/arch[/variant]]
     *             }
     * @param array $headerParameters {
     * @var string $X-Registry-Auth A base64-encoded auth configuration. [See the authentication section for details.](#section/Authentication)
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ImageCreateNotFoundException
     * @throws ImageCreateInternalServerErrorException
     */
    public function imageCreate(string $inputImage, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageCreate($inputImage, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * Return low-level information about an image.
     *
     * @param string $name Image name or id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|Image|ResponseInterface
     * @throws ImageInspectNotFoundException
     * @throws ImageInspectInternalServerErrorException
     */
    public function imageInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageInspect($name), $fetch);
    }

    /**
     * Return parent layers of an image.
     *
     * @param string $name Image name or ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Docker\API\Model\ImagesNameHistoryGetResponse200Item[]|\Psr\Http\Message\ResponseInterface
     * @throws ImageHistoryNotFoundException
     * @throws ImageHistoryInternalServerErrorException
     */
    public function imageHistory(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageHistory($name), $fetch);
    }

    /**
     * Push an image to a registry.
     *
     * If you wish to push an image on to a private registry, that image must already have a tag which references the registry. For example, `registry.example.com/myimage:latest`.
     *
     * The push is cancelled if the HTTP connection is closed.
     *
     * @param string $name image name or ID
     * @param array $queryParameters {
     * @var string $tag The tag to associate with the image on the registry.
     *             }
     * @param array $headerParameters {
     * @var string $X-Registry-Auth A base64-encoded auth configuration. [See the authentication section for details.](#section/Authentication)
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ImagePushNotFoundException
     * @throws ImagePushInternalServerErrorException
     */
    public function imagePush(string $name, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImagePush($name, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * Tag an image so that it becomes part of a repository.
     *
     * @param string $name image name or ID to tag
     * @param array $queryParameters {
     * @var string $repo The repository to tag in. For example, `someuser/someimage`.
     * @var string $tag The name of the new tag.
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ImageTagBadRequestException
     * @throws ImageTagNotFoundException
     * @throws ImageTagConflictException
     * @throws ImageTagInternalServerErrorException
     */
    public function imageTag(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageTag($name, $queryParameters), $fetch);
    }

    /**
     * Remove an image, along with any untagged parent images that were
     * referenced by that image.
     *
     * Images can't be removed if they have descendant images, are being
     * used by a running container or are being used by a build.
     *
     * @param string $name Image name or ID
     * @param array $queryParameters {
     * @var bool $force Remove the image even if it is being used by stopped containers or has other tags
     * @var bool $noprune Do not delete untagged parent images
     *           }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Docker\API\Model\ImageDeleteResponseItem[]|\Psr\Http\Message\ResponseInterface
     * @throws ImageDeleteNotFoundException
     * @throws ImageDeleteConflictException
     * @throws ImageDeleteInternalServerErrorException
     */
    public function imageDelete(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageDelete($name, $queryParameters), $fetch);
    }

    /**
     * Search for an image on Docker Hub.
     *
     * @param array $queryParameters {
     * @var string $term Term to search
     * @var int $limit Maximum number of results to return
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to process on the images list. Available filters:
     *
     * - `is-automated=(true|false)`
     * - `is-official=(true|false)`
     * - `stars=<number>` Matches images that has at least 'number' stars.
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Docker\API\Model\ImagesSearchGetResponse200Item[]|\Psr\Http\Message\ResponseInterface
     * @throws ImageSearchInternalServerErrorException
     */
    public function imageSearch(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageSearch($queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     * @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`). Available filters:
     *
     * - `dangling=<boolean>` When set to `true` (or `1`), prune only
     * unused *and* untagged images. When set to `false`
     * (or `0`), all unused images are pruned.
     * - `until=<string>` Prune images created before this timestamp. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon machine’s time.
     * - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune images with (or without, in case `label!=...` is used) the specified labels.
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ImagesPrunePostResponse200|ResponseInterface
     * @throws ImagePruneInternalServerErrorException
     */
    public function imagePrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImagePrune($queryParameters), $fetch);
    }

    /**
     * Validate credentials for a registry and, if available, get an identity token for accessing the registry without password.
     *
     * @param AuthConfig $authConfig Authentication to check
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|AuthPostResponse200|ResponseInterface
     * @throws SystemAuthInternalServerErrorException
     */
    public function systemAuth(AuthConfig $authConfig, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SystemAuth($authConfig), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface|SystemInfo
     * @throws SystemInfoInternalServerErrorException
     */
    public function systemInfo(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SystemInfo(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface|VersionGetResponse200
     * @throws SystemVersionInternalServerErrorException
     */
    public function systemVersion(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SystemVersion(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws SystemPingInternalServerErrorException
     */
    public function systemPing(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SystemPing(), $fetch);
    }

    /**
     * @param ContainerConfig $containerConfig The container configuration
     * @param array $queryParameters {
     * @var string $container The ID or name of the container to commit
     * @var string $repo Repository name for the created image
     * @var string $tag Tag name for the create image
     * @var string $comment Commit message
     * @var string $author Author of the image (e.g., `John Hannibal Smith <hannibal@a-team.com>`)
     * @var bool $pause Whether to pause the container before committing
     * @var string $changes `Dockerfile` instructions to apply while committing
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|IdResponse|ResponseInterface
     * @throws ImageCommitNotFoundException
     * @throws ImageCommitInternalServerErrorException
     */
    public function imageCommit(ContainerConfig $containerConfig, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageCommit($containerConfig, $queryParameters), $fetch);
    }

    /**
     * Stream real-time events from the server.
     *
     * Various objects within Docker report events when something happens to them.
     *
     * Containers report these events: `attach`, `commit`, `copy`, `create`, `destroy`, `detach`, `die`, `exec_create`, `exec_detach`, `exec_start`, `exec_die`, `export`, `health_status`, `kill`, `oom`, `pause`, `rename`, `resize`, `restart`, `start`, `stop`, `top`, `unpause`, and `update`
     *
     * Images report these events: `delete`, `import`, `load`, `pull`, `push`, `save`, `tag`, and `untag`
     *
     * Volumes report these events: `create`, `mount`, `unmount`, and `destroy`
     *
     * Networks report these events: `create`, `connect`, `disconnect`, `destroy`, `update`, and `remove`
     *
     * The Docker daemon reports these events: `reload`
     *
     * Services report these events: `create`, `update`, and `remove`
     *
     * Nodes report these events: `create`, `update`, and `remove`
     *
     * Secrets report these events: `create`, `update`, and `remove`
     *
     * Configs report these events: `create`, `update`, and `remove`
     *
     * @param array $queryParameters {
     * @var string $since show events created since this timestamp then stream new events
     * @var string $until show events created until this timestamp then stop streaming
     * @var string $filters A JSON encoded value of filters (a `map[string][]string`) to process on the event list. Available filters:
     *
     * - `config=<string>` config name or ID
     * - `container=<string>` container name or ID
     * - `daemon=<string>` daemon name or ID
     * - `event=<string>` event type
     * - `image=<string>` image name or ID
     * - `label=<string>` image or container label
     * - `network=<string>` network name or ID
     * - `node=<string>` node ID
     * - `plugin`=<string> plugin name or ID
     * - `scope`=<string> local or swarm
     * - `secret=<string>` secret name or ID
     * - `service=<string>` service name or ID
     * - `type=<string>` object to filter by, one of `container`, `image`, `volume`, `network`, `daemon`, `plugin`, `node`, `service`, `secret` or `config`
     * - `volume=<string>` volume name
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|EventsGetResponse200|ResponseInterface
     * @throws SystemEventsBadRequestException
     * @throws SystemEventsInternalServerErrorException
     */
    public function systemEvents(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SystemEvents($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface|SystemDfGetResponse200
     * @throws SystemDataUsageInternalServerErrorException
     */
    public function systemDataUsage(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SystemDataUsage(), $fetch);
    }

    /**
     * Get a tarball containing all images and metadata for a repository.
     *
     * If `name` is a specific name and tag (e.g. `ubuntu:latest`), then only that image (and its parents) are returned. If `name` is an image ID, similarly only that image (and its parents) are returned, but with the exclusion of the `repositories` file in the tarball, as there were no image names referenced.
     *
     * ### Image tarball format
     *
     * An image tarball contains one directory per image layer (named using its long ID), each containing these files:
     *
     * - `VERSION`: currently `1.0` - the file format version
     * - `json`: detailed layer information, similar to `docker inspect layer_id`
     * - `layer.tar`: A tarfile containing the filesystem changes in this layer
     *
     * The `layer.tar` file contains `aufs` style `.wh..wh.aufs` files and directories for storing attribute changes and deletions.
     *
     * If the tarball defines a repository, the tarball should also include a `repositories` file at the root that contains a list of repository and tag names mapped to layer IDs.
     *
     * ```json
     * {
     * "hello-world": {
     * "latest": "565a9d68a73f6706862bfe8409a7f659776d4d60a8d096eb4a3cbce6999cc2a1"
     * }
     * }
     * ```
     *
     * @param string $name Image name or ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ImageGetInternalServerErrorException
     */
    public function imageGet(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageGet($name), $fetch);
    }

    /**
     * Get a tarball containing all images and metadata for several image repositories.
     *
     * For each value of the `names` parameter: if it is a specific name and tag (e.g. `ubuntu:latest`), then only that image (and its parents) are returned; if it is an image ID, similarly only that image (and its parents) are returned and there would be no names referenced in the 'repositories' file for this image ID.
     *
     * For details on the format, see [the export image endpoint](#operation/ImageGet).
     *
     * @param array $queryParameters {
     * @var array $names Image names to filter by
     *            }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ImageGetAllInternalServerErrorException
     */
    public function imageGetAll(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageGetAll($queryParameters), $fetch);
    }

    /**
     * Load a set of images and tags into a repository.
     *
     * For details on the format, see [the export image endpoint](#operation/ImageGet).
     *
     * @param resource|StreamInterface|string $imagesTarball Tar archive containing images
     * @param array $queryParameters {
     * @var bool $quiet Suppress progress details during load.
     *           }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ImageLoadInternalServerErrorException
     */
    public function imageLoad($imagesTarball, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ImageLoad($imagesTarball, $queryParameters), $fetch);
    }

    /**
     * Run a command inside a running container.
     *
     * @param string $id ID or name of container
     * @param ContainersIdExecPostBody $execConfig Exec configuration
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|IdResponse|ResponseInterface
     * @throws ContainerExecNotFoundException
     * @throws ContainerExecConflictException
     * @throws ContainerExecInternalServerErrorException
     */
    public function containerExec(string $id, ContainersIdExecPostBody $execConfig, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ContainerExec($id, $execConfig), $fetch);
    }

    /**
     * Starts a previously set up exec instance. If detach is true, this endpoint returns immediately after starting the command. Otherwise, it sets up an interactive session with the command.
     *
     * @param string $id Exec instance ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ExecStartNotFoundException
     * @throws ExecStartConflictException
     */
    public function execStart(string $id, ExecIdStartPostBody $execStartConfig, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ExecStart($id, $execStartConfig), $fetch);
    }

    /**
     * Resize the TTY session used by an exec instance. This endpoint only works if `tty` was specified as part of creating and starting the exec instance.
     *
     * @param string $id Exec instance ID
     * @param array $queryParameters {
     * @var int $h Height of the TTY session in characters
     * @var int $w Width of the TTY session in characters
     *          }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ExecResizeNotFoundException
     */
    public function execResize(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ExecResize($id, $queryParameters), $fetch);
    }

    /**
     * Return low-level information about an exec instance.
     *
     * @param string $id Exec instance ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ExecIdJsonGetResponse200|ResponseInterface
     * @throws ExecInspectNotFoundException
     * @throws ExecInspectInternalServerErrorException
     */
    public function execInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ExecInspect($id), $fetch);
    }

    /**
     * @param array $queryParameters {
     * @var string $filters JSON encoded value of the filters (a `map[string][]string`) to
     *             process on the volumes list. Available filters:
     *
     * - `dangling=<boolean>` When set to `true` (or `1`), returns all
     * volumes that are not in use by a container. When set to `false`
     * (or `0`), only volumes that are in use by one or more
     * containers are returned.
     * - `driver=<volume-driver-name>` Matches volumes based on their driver.
     * - `label=<key>` or `label=<key>:<value>` Matches volumes based on
     * the presence of a `label` alone or a `label` and a value.
     * - `name=<volume-name>` Matches all or part of a volume name.
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface|VolumesGetResponse200
     * @throws VolumeListInternalServerErrorException
     */
    public function volumeList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new VolumeList($queryParameters), $fetch);
    }

    /**
     * @param VolumesCreatePostBody $volumeConfig Volume configuration
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface|Volume
     * @throws VolumeCreateInternalServerErrorException
     */
    public function volumeCreate(VolumesCreatePostBody $volumeConfig, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new VolumeCreate($volumeConfig), $fetch);
    }

    /**
     * Instruct the driver to remove the volume.
     *
     * @param string $name Volume name or ID
     * @param array $queryParameters {
     * @var bool $force Force the removal of the volume
     *           }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws VolumeDeleteNotFoundException
     * @throws VolumeDeleteConflictException
     * @throws VolumeDeleteInternalServerErrorException
     */
    public function volumeDelete(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new VolumeDelete($name, $queryParameters), $fetch);
    }

    /**
     * @param string $name Volume name or ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface|Volume
     * @throws VolumeInspectNotFoundException
     * @throws VolumeInspectInternalServerErrorException
     */
    public function volumeInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new VolumeInspect($name), $fetch);
    }

    /**
     * @param array $queryParameters {
     * @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`).
     *
     * Available filters:
     * - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune volumes with (or without, in case `label!=...` is used) the specified labels.
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface|VolumesPrunePostResponse200
     * @throws VolumePruneInternalServerErrorException
     */
    public function volumePrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new VolumePrune($queryParameters), $fetch);
    }

    /**
     * Returns a list of networks. For details on the format, see [the network inspect endpoint](#operation/NetworkInspect).
     *
     * Note that it uses a different, smaller representation of a network than inspecting a single network. For example,
     * the list of containers attached to the network is not propagated in API versions 1.28 and up.
     *
     * @param array $queryParameters {
     * @var string $filters JSON encoded value of the filters (a `map[string][]string`) to process on the networks list. Available filters:
     *
     * - `driver=<driver-name>` Matches a network's driver.
     * - `id=<network-id>` Matches all or part of a network ID.
     * - `label=<key>` or `label=<key>=<value>` of a network label.
     * - `name=<network-name>` Matches all or part of a network name.
     * - `scope=["swarm"|"global"|"local"]` Filters networks by scope (`swarm`, `global`, or `local`).
     * - `type=["custom"|"builtin"]` Filters networks by type. The `custom` keyword returns all user-defined networks.
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Docker\API\Model\Network[]|\Psr\Http\Message\ResponseInterface
     * @throws NetworkListInternalServerErrorException
     */
    public function networkList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new NetworkList($queryParameters), $fetch);
    }

    /**
     * @param string $id Network ID or name
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws NetworkDeleteForbiddenException
     * @throws NetworkDeleteNotFoundException
     * @throws NetworkDeleteInternalServerErrorException
     */
    public function networkDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new NetworkDelete($id), $fetch);
    }

    /**
     * @param string $id Network ID or name
     * @param array $queryParameters {
     * @var bool $verbose Detailed inspect output for troubleshooting
     * @var string $scope Filter the network by scope (swarm, global, or local)
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|Network|ResponseInterface
     * @throws NetworkInspectNotFoundException
     * @throws NetworkInspectInternalServerErrorException
     */
    public function networkInspect(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new NetworkInspect($id, $queryParameters), $fetch);
    }

    /**
     * @param NetworksCreatePostBody $networkConfig Network configuration
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|NetworksCreatePostResponse201|ResponseInterface
     * @throws NetworkCreateForbiddenException
     * @throws NetworkCreateNotFoundException
     * @throws NetworkCreateInternalServerErrorException
     */
    public function networkCreate(NetworksCreatePostBody $networkConfig, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new NetworkCreate($networkConfig), $fetch);
    }

    /**
     * @param string $id Network ID or name
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws NetworkConnectForbiddenException
     * @throws NetworkConnectNotFoundException
     * @throws NetworkConnectInternalServerErrorException
     */
    public function networkConnect(string $id, NetworksIdConnectPostBody $container, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new NetworkConnect($id, $container), $fetch);
    }

    /**
     * @param string $id Network ID or name
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws NetworkDisconnectForbiddenException
     * @throws NetworkDisconnectNotFoundException
     * @throws NetworkDisconnectInternalServerErrorException
     */
    public function networkDisconnect(string $id, NetworksIdDisconnectPostBody $container, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new NetworkDisconnect($id, $container), $fetch);
    }

    /**
     * @param array $queryParameters {
     * @var string $filters Filters to process on the prune list, encoded as JSON (a `map[string][]string`).
     *
     * Available filters:
     * - `until=<timestamp>` Prune networks created before this timestamp. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon machine’s time.
     * - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune networks with (or without, in case `label!=...` is used) the specified labels.
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|NetworksPrunePostResponse200|ResponseInterface
     * @throws NetworkPruneInternalServerErrorException
     */
    public function networkPrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new NetworkPrune($queryParameters), $fetch);
    }

    /**
     * Returns information about installed plugins.
     *
     * @param array $queryParameters {
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to process on the plugin list. Available filters:
     *
     * - `capability=<capability name>`
     * - `enable=<true>|<false>`
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Docker\API\Model\Plugin[]|\Psr\Http\Message\ResponseInterface
     * @throws PluginListInternalServerErrorException
     */
    public function pluginList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PluginList($queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     * @var string $remote The name of the plugin. The `:latest` tag is optional, and is the default if omitted.
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Docker\API\Model\PluginsPrivilegesGetResponse200Item[]|\Psr\Http\Message\ResponseInterface
     * @throws GetPluginPrivilegesInternalServerErrorException
     */
    public function getPluginPrivileges(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new GetPluginPrivileges($queryParameters), $fetch);
    }

    /**
     * Pulls and installs a plugin. After the plugin is installed, it can be enabled using the [`POST /plugins/{name}/enable` endpoint](#operation/PostPluginsEnable).
     *
     * @param array $queryParameters {
     * @var string $remote Remote reference for plugin to install.
     *
     * The `:latest` tag is optional, and is used as the default if omitted.
     *
     * @var string $name Local name for the pulled plugin.
     *
     * The `:latest` tag is optional, and is used as the default if omitted.
     *
     * }
     * @param array $headerParameters {
     * @var string $X-Registry-Auth A base64-encoded auth configuration to use when pulling a plugin from a registry. [See the authentication section for details.](#section/Authentication)
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws PluginPullInternalServerErrorException
     */
    public function pluginPull(array $body, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PluginPull($body, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param string $name The name of the plugin. The `:latest` tag is optional, and is the default if omitted.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|Plugin|ResponseInterface
     * @throws PluginInspectNotFoundException
     * @throws PluginInspectInternalServerErrorException
     */
    public function pluginInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PluginInspect($name), $fetch);
    }

    /**
     * @param string $name The name of the plugin. The `:latest` tag is optional, and is the default if omitted.
     * @param array $queryParameters {
     * @var bool $force Disable the plugin before removing. This may result in issues if the plugin is in use by a container.
     *           }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|Plugin|ResponseInterface
     * @throws PluginDeleteNotFoundException
     * @throws PluginDeleteInternalServerErrorException
     */
    public function pluginDelete(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PluginDelete($name, $queryParameters), $fetch);
    }

    /**
     * @param string $name The name of the plugin. The `:latest` tag is optional, and is the default if omitted.
     * @param array $queryParameters {
     * @var int $timeout Set the HTTP client timeout (in seconds)
     *          }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws PluginEnableNotFoundException
     * @throws PluginEnableInternalServerErrorException
     */
    public function pluginEnable(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PluginEnable($name, $queryParameters), $fetch);
    }

    /**
     * @param string $name The name of the plugin. The `:latest` tag is optional, and is the default if omitted.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws PluginDisableNotFoundException
     * @throws PluginDisableInternalServerErrorException
     */
    public function pluginDisable(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PluginDisable($name), $fetch);
    }

    /**
     * @param string $name The name of the plugin. The `:latest` tag is optional, and is the default if omitted.
     * @param array $queryParameters {
     * @var string $remote Remote reference to upgrade to.
     *
     * The `:latest` tag is optional, and is used as the default if omitted.
     *
     * }
     * @param array $headerParameters {
     * @var string $X-Registry-Auth A base64-encoded auth configuration to use when pulling a plugin from a registry. [See the authentication section for details.](#section/Authentication)
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws PluginUpgradeNotFoundException
     * @throws PluginUpgradeInternalServerErrorException
     */
    public function pluginUpgrade(string $name, array $body, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PluginUpgrade($name, $body, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param resource|StreamInterface|string $tarContext Path to tar containing plugin rootfs and manifest
     * @param array $queryParameters {
     * @var string $name The name of the plugin. The `:latest` tag is optional, and is the default if omitted.
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws PluginCreateInternalServerErrorException
     */
    public function pluginCreate($tarContext, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PluginCreate($tarContext, $queryParameters), $fetch);
    }

    /**
     * Push a plugin to the registry.
     *
     * @param string $name The name of the plugin. The `:latest` tag is optional, and is the default if omitted.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws PluginPushNotFoundException
     * @throws PluginPushInternalServerErrorException
     */
    public function pluginPush(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PluginPush($name), $fetch);
    }

    /**
     * @param string $name The name of the plugin. The `:latest` tag is optional, and is the default if omitted.
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws PluginSetNotFoundException
     * @throws PluginSetInternalServerErrorException
     */
    public function pluginSet(string $name, array $body, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new PluginSet($name, $body), $fetch);
    }

    /**
     * @param array $queryParameters {
     * @var string $filters Filters to process on the nodes list, encoded as JSON (a `map[string][]string`).
     *
     * Available filters:
     * - `id=<node id>`
     * - `label=<engine label>`
     * - `membership=`(`accepted`|`pending`)`
     * - `name=<node name>`
     * - `role=`(`manager`|`worker`)`
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Docker\API\Model\Node[]|\Psr\Http\Message\ResponseInterface
     * @throws NodeListInternalServerErrorException
     * @throws NodeListServiceUnavailableException
     */
    public function nodeList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new NodeList($queryParameters), $fetch);
    }

    /**
     * @param string $id The ID or name of the node
     * @param array $queryParameters {
     * @var bool $force Force remove a node from the swarm
     *           }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws NodeDeleteNotFoundException
     * @throws NodeDeleteInternalServerErrorException
     * @throws NodeDeleteServiceUnavailableException
     */
    public function nodeDelete(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new NodeDelete($id, $queryParameters), $fetch);
    }

    /**
     * @param string $id The ID or name of the node
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|Node|ResponseInterface
     * @throws NodeInspectNotFoundException
     * @throws NodeInspectInternalServerErrorException
     * @throws NodeInspectServiceUnavailableException
     */
    public function nodeInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new NodeInspect($id), $fetch);
    }

    /**
     * @param string $id The ID of the node
     * @param array $queryParameters {
     * @var int $version The version number of the node object being updated. This is required to avoid conflicting writes.
     *          }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws NodeUpdateBadRequestException
     * @throws NodeUpdateNotFoundException
     * @throws NodeUpdateInternalServerErrorException
     * @throws NodeUpdateServiceUnavailableException
     */
    public function nodeUpdate(string $id, NodeSpec $body, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new NodeUpdate($id, $body, $queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface|Swarm
     * @throws SwarmInspectNotFoundException
     * @throws SwarmInspectInternalServerErrorException
     * @throws SwarmInspectServiceUnavailableException
     */
    public function swarmInspect(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SwarmInspect(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws SwarmInitBadRequestException
     * @throws SwarmInitInternalServerErrorException
     * @throws SwarmInitServiceUnavailableException
     */
    public function swarmInit(SwarmInitPostBody $body, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SwarmInit($body), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws SwarmJoinBadRequestException
     * @throws SwarmJoinInternalServerErrorException
     * @throws SwarmJoinServiceUnavailableException
     */
    public function swarmJoin(SwarmJoinPostBody $body, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SwarmJoin($body), $fetch);
    }

    /**
     * @param array $queryParameters {
     * @var bool $force Force leave swarm, even if this is the last manager or that it will break the cluster.
     *           }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws SwarmLeaveInternalServerErrorException
     * @throws SwarmLeaveServiceUnavailableException
     */
    public function swarmLeave(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SwarmLeave($queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     * @var int $version The version number of the swarm object being updated. This is required to avoid conflicting writes.
     * @var bool $rotateWorkerToken rotate the worker join token
     * @var bool $rotateManagerToken rotate the manager join token
     * @var bool $rotateManagerUnlockKey Rotate the manager unlock key.
     *           }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws SwarmUpdateBadRequestException
     * @throws SwarmUpdateInternalServerErrorException
     * @throws SwarmUpdateServiceUnavailableException
     */
    public function swarmUpdate(SwarmSpec $body, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SwarmUpdate($body, $queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface|SwarmUnlockkeyGetResponse200
     * @throws SwarmUnlockkeyInternalServerErrorException
     * @throws SwarmUnlockkeyServiceUnavailableException
     */
    public function swarmUnlockkey(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SwarmUnlockkey(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws SwarmUnlockInternalServerErrorException
     * @throws SwarmUnlockServiceUnavailableException
     */
    public function swarmUnlock(SwarmUnlockPostBody $body, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SwarmUnlock($body), $fetch);
    }

    /**
     * @param array $queryParameters {
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to process on the services list. Available filters:
     *
     * - `id=<service id>`
     * - `label=<service label>`
     * - `mode=["replicated"|"global"]`
     * - `name=<service name>`
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Docker\API\Model\Service[]|\Psr\Http\Message\ResponseInterface
     * @throws ServiceListInternalServerErrorException
     * @throws ServiceListServiceUnavailableException
     */
    public function serviceList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ServiceList($queryParameters), $fetch);
    }

    /**
     * @param array $headerParameters {
     * @var string $X-Registry-Auth A base64-encoded auth configuration for pulling from private registries. [See the authentication section for details.](#section/Authentication)
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface|ServicesCreatePostResponse201
     * @throws ServiceCreateBadRequestException
     * @throws ServiceCreateForbiddenException
     * @throws ServiceCreateConflictException
     * @throws ServiceCreateInternalServerErrorException
     * @throws ServiceCreateServiceUnavailableException
     */
    public function serviceCreate(ServicesCreatePostBody $body, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ServiceCreate($body, $headerParameters), $fetch);
    }

    /**
     * @param string $id ID or name of service
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ServiceDeleteNotFoundException
     * @throws ServiceDeleteInternalServerErrorException
     * @throws ServiceDeleteServiceUnavailableException
     */
    public function serviceDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ServiceDelete($id), $fetch);
    }

    /**
     * @param string $id ID or name of service
     * @param array $queryParameters {
     * @var bool $insertDefaults Fill empty fields with default values.
     *           }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface|Service
     * @throws ServiceInspectNotFoundException
     * @throws ServiceInspectInternalServerErrorException
     * @throws ServiceInspectServiceUnavailableException
     */
    public function serviceInspect(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ServiceInspect($id, $queryParameters), $fetch);
    }

    /**
     * @param string $id ID or name of service
     * @param array $queryParameters {
     * @var int $version The version number of the service object being updated. This is required to avoid conflicting writes.
     * @var string $registryAuthFrom If the X-Registry-Auth header is not specified, this parameter indicates where to find registry authorization credentials. The valid values are `spec` and `previous-spec`.
     * @var string $rollback Set to this parameter to `previous` to cause a server-side rollback to the previous service spec. The supplied spec will be ignored in this case.
     *             }
     * @param array $headerParameters {
     * @var string $X-Registry-Auth A base64-encoded auth configuration for pulling from private registries. [See the authentication section for details.](#section/Authentication)
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface|ServiceUpdateResponse
     * @throws ServiceUpdateBadRequestException
     * @throws ServiceUpdateNotFoundException
     * @throws ServiceUpdateInternalServerErrorException
     * @throws ServiceUpdateServiceUnavailableException
     */
    public function serviceUpdate(string $id, ServicesIdUpdatePostBody $body, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ServiceUpdate($id, $body, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * Get `stdout` and `stderr` logs from a service.
     *
     **Note**: This endpoint works only for services with the `json-file` or `journald` logging drivers.
     *
     * @param string $id ID or name of the service
     * @param array $queryParameters {
     * @var bool $details show service context and extra details provided to logs
     * @var bool $follow Return the logs as a stream.
     *
     * This will return a `101` HTTP response with a `Connection: upgrade` header, then hijack the HTTP connection to send raw output. For more information about hijacking and the stream format, [see the documentation for the attach endpoint](#operation/ContainerAttach).
     *
     * @var bool $stdout Return logs from `stdout`
     * @var bool $stderr Return logs from `stderr`
     * @var int $since Only return logs since this time, as a UNIX timestamp
     * @var bool $timestamps Add timestamps to every log line
     * @var string $tail Only return this number of log lines from the end of the logs. Specify as an integer or `all` to output all log lines.
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ServiceLogsNotFoundException
     * @throws ServiceLogsInternalServerErrorException
     * @throws ServiceLogsServiceUnavailableException
     */
    public function serviceLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ServiceLogs($id, $queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to process on the tasks list. Available filters:
     *
     * - `desired-state=(running | shutdown | accepted)`
     * - `id=<task id>`
     * - `label=key` or `label="key=value"`
     * - `name=<task name>`
     * - `node=<node id or name>`
     * - `service=<service name>`
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Docker\API\Model\Task[]|\Psr\Http\Message\ResponseInterface
     * @throws TaskListInternalServerErrorException
     * @throws TaskListServiceUnavailableException
     */
    public function taskList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new TaskList($queryParameters), $fetch);
    }

    /**
     * @param string $id ID of the task
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface|Task
     * @throws TaskInspectNotFoundException
     * @throws TaskInspectInternalServerErrorException
     * @throws TaskInspectServiceUnavailableException
     */
    public function taskInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new TaskInspect($id), $fetch);
    }

    /**
     * Get `stdout` and `stderr` logs from a task.
     *
     **Note**: This endpoint works only for services with the `json-file` or `journald` logging drivers.
     *
     * @param string $id ID of the task
     * @param array $queryParameters {
     * @var bool $details show task context and extra details provided to logs
     * @var bool $follow Return the logs as a stream.
     *
     * This will return a `101` HTTP response with a `Connection: upgrade` header, then hijack the HTTP connection to send raw output. For more information about hijacking and the stream format, [see the documentation for the attach endpoint](#operation/ContainerAttach).
     *
     * @var bool $stdout Return logs from `stdout`
     * @var bool $stderr Return logs from `stderr`
     * @var int $since Only return logs since this time, as a UNIX timestamp
     * @var bool $timestamps Add timestamps to every log line
     * @var string $tail Only return this number of log lines from the end of the logs. Specify as an integer or `all` to output all log lines.
     *             }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws TaskLogsNotFoundException
     * @throws TaskLogsInternalServerErrorException
     * @throws TaskLogsServiceUnavailableException
     */
    public function taskLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new TaskLogs($id, $queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to process on the secrets list. Available filters:
     *
     * - `id=<secret id>`
     * - `label=<key> or label=<key>=value`
     * - `name=<secret name>`
     * - `names=<secret name>`
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Docker\API\Model\Secret[]|\Psr\Http\Message\ResponseInterface
     * @throws SecretListInternalServerErrorException
     * @throws SecretListServiceUnavailableException
     */
    public function secretList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SecretList($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|IdResponse|ResponseInterface
     * @throws SecretCreateConflictException
     * @throws SecretCreateInternalServerErrorException
     * @throws SecretCreateServiceUnavailableException
     */
    public function secretCreate(SecretsCreatePostBody $body, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SecretCreate($body), $fetch);
    }

    /**
     * @param string $id ID of the secret
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws SecretDeleteNotFoundException
     * @throws SecretDeleteInternalServerErrorException
     * @throws SecretDeleteServiceUnavailableException
     */
    public function secretDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SecretDelete($id), $fetch);
    }

    /**
     * @param string $id ID of the secret
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface|Secret
     * @throws SecretInspectNotFoundException
     * @throws SecretInspectInternalServerErrorException
     * @throws SecretInspectServiceUnavailableException
     */
    public function secretInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SecretInspect($id), $fetch);
    }

    /**
     * @param string $id The ID or name of the secret
     * @param SecretSpec $body The spec of the secret to update. Currently, only the Labels field can be updated. All other fields must remain unchanged from the [SecretInspect endpoint](#operation/SecretInspect) response values.
     * @param array $queryParameters {
     * @var int $version The version number of the secret object being updated. This is required to avoid conflicting writes.
     *          }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws SecretUpdateBadRequestException
     * @throws SecretUpdateNotFoundException
     * @throws SecretUpdateInternalServerErrorException
     * @throws SecretUpdateServiceUnavailableException
     */
    public function secretUpdate(string $id, SecretSpec $body, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new SecretUpdate($id, $body, $queryParameters), $fetch);
    }

    /**
     * @param array $queryParameters {
     * @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to process on the configs list. Available filters:
     *
     * - `id=<config id>`
     * - `label=<key> or label=<key>=value`
     * - `name=<config name>`
     * - `names=<config name>`
     *
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|\Docker\API\Model\Config[]|\Psr\Http\Message\ResponseInterface
     * @throws ConfigListInternalServerErrorException
     * @throws ConfigListServiceUnavailableException
     */
    public function configList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ConfigList($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|IdResponse|ResponseInterface
     * @throws ConfigCreateConflictException
     * @throws ConfigCreateInternalServerErrorException
     * @throws ConfigCreateServiceUnavailableException
     */
    public function configCreate(ConfigsCreatePostBody $body, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ConfigCreate($body), $fetch);
    }

    /**
     * @param string $id ID of the config
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ConfigDeleteNotFoundException
     * @throws ConfigDeleteInternalServerErrorException
     * @throws ConfigDeleteServiceUnavailableException
     */
    public function configDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ConfigDelete($id), $fetch);
    }

    /**
     * @param string $id ID of the config
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|Config|ResponseInterface
     * @throws ConfigInspectNotFoundException
     * @throws ConfigInspectInternalServerErrorException
     * @throws ConfigInspectServiceUnavailableException
     */
    public function configInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ConfigInspect($id), $fetch);
    }

    /**
     * @param string $id The ID or name of the config
     * @param ConfigSpec $body The spec of the config to update. Currently, only the Labels field can be updated. All other fields must remain unchanged from the [ConfigInspect endpoint](#operation/ConfigInspect) response values.
     * @param array $queryParameters {
     * @var int $version The version number of the config object being updated. This is required to avoid conflicting writes.
     *          }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws ConfigUpdateBadRequestException
     * @throws ConfigUpdateNotFoundException
     * @throws ConfigUpdateInternalServerErrorException
     * @throws ConfigUpdateServiceUnavailableException
     */
    public function configUpdate(string $id, ConfigSpec $body, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new ConfigUpdate($id, $body, $queryParameters), $fetch);
    }

    /**
     * Return image digest and platform information by contacting the registry.
     *
     * @param string $name Image name or id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|DistributionNameJsonGetResponse200|ResponseInterface
     * @throws DistributionInspectUnauthorizedException
     * @throws DistributionInspectInternalServerErrorException
     */
    public function distributionInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new DistributionInspect($name), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @return null|ResponseInterface
     * @throws SessionBadRequestException
     * @throws SessionInternalServerErrorException
     */
    public function session(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Session(), $fetch);
    }

    public static function create($httpClient = null, array $additionalPlugins = [], array $additionalNormalizers = [])
    {
        if ($httpClient === null) {
            $httpClient = Psr18ClientDiscovery::find();
            $plugins = [];
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new PluginClient($httpClient, $plugins);
        }
        $requestFactory = Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = [new ArrayDenormalizer(), new JaneObjectNormalizer()];
        if (count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new Serializer($normalizers, [new JsonEncoder(new JsonEncode(), new JsonDecode(['json_decode_associative' => true]))]);
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
