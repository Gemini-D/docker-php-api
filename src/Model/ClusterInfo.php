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

namespace Docker\API\Model;

class ClusterInfo
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * The ID of the swarm.
     *
     * @var string
     */
    protected $iD;

    /**
     * The version number of the object such as node, service, etc. This is needed to avoid conflicting writes.
     * The client must send the version number along with the modified specification when updating these objects.
     * This approach ensures safe concurrency and determinism in that the change on the object
     * may not be applied if the version number has changed from the last read. In other words,
     * if two update requests specify the same base version, only one of the requests can succeed.
     * As a result, two separate update requests that happen at the same time will not
     * unintentionally overwrite each other.
     *
     * @var ObjectVersion
     */
    protected $version;

    /**
     * Date and time at which the swarm was initialised in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @var string
     */
    protected $createdAt;

    /**
     * Date and time at which the swarm was last updated in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     *
     * @var string
     */
    protected $updatedAt;

    /**
     * User modifiable swarm configuration.
     *
     * @var SwarmSpec
     */
    protected $spec;

    /**
     * Information about the issuer of leaf TLS certificates and the trusted root CA certificate.
     *
     * @var TLSInfo
     */
    protected $tLSInfo;

    /**
     * Whether there is currently a root CA rotation in progress for the swarm.
     *
     * @var bool
     */
    protected $rootRotationInProgress;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * The ID of the swarm.
     */
    public function getID(): string
    {
        return $this->iD;
    }

    /**
     * The ID of the swarm.
     */
    public function setID(string $iD): self
    {
        $this->initialized['iD'] = true;
        $this->iD = $iD;
        return $this;
    }

    /**
     * The version number of the object such as node, service, etc. This is needed to avoid conflicting writes.
     * The client must send the version number along with the modified specification when updating these objects.
     * This approach ensures safe concurrency and determinism in that the change on the object
     * may not be applied if the version number has changed from the last read. In other words,
     * if two update requests specify the same base version, only one of the requests can succeed.
     * As a result, two separate update requests that happen at the same time will not
     * unintentionally overwrite each other.
     */
    public function getVersion(): ObjectVersion
    {
        return $this->version;
    }

    /**
     * The version number of the object such as node, service, etc. This is needed to avoid conflicting writes.
     * The client must send the version number along with the modified specification when updating these objects.
     * This approach ensures safe concurrency and determinism in that the change on the object
     * may not be applied if the version number has changed from the last read. In other words,
     * if two update requests specify the same base version, only one of the requests can succeed.
     * As a result, two separate update requests that happen at the same time will not
     * unintentionally overwrite each other.
     */
    public function setVersion(ObjectVersion $version): self
    {
        $this->initialized['version'] = true;
        $this->version = $version;
        return $this;
    }

    /**
     * Date and time at which the swarm was initialised in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * Date and time at which the swarm was initialised in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Date and time at which the swarm was last updated in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * Date and time at which the swarm was last updated in
     * [RFC 3339](https://www.ietf.org/rfc/rfc3339.txt) format with nano-seconds.
     */
    public function setUpdatedAt(string $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * User modifiable swarm configuration.
     */
    public function getSpec(): SwarmSpec
    {
        return $this->spec;
    }

    /**
     * User modifiable swarm configuration.
     */
    public function setSpec(SwarmSpec $spec): self
    {
        $this->initialized['spec'] = true;
        $this->spec = $spec;
        return $this;
    }

    /**
     * Information about the issuer of leaf TLS certificates and the trusted root CA certificate.
     */
    public function getTLSInfo(): TLSInfo
    {
        return $this->tLSInfo;
    }

    /**
     * Information about the issuer of leaf TLS certificates and the trusted root CA certificate.
     */
    public function setTLSInfo(TLSInfo $tLSInfo): self
    {
        $this->initialized['tLSInfo'] = true;
        $this->tLSInfo = $tLSInfo;
        return $this;
    }

    /**
     * Whether there is currently a root CA rotation in progress for the swarm.
     */
    public function getRootRotationInProgress(): bool
    {
        return $this->rootRotationInProgress;
    }

    /**
     * Whether there is currently a root CA rotation in progress for the swarm.
     */
    public function setRootRotationInProgress(bool $rootRotationInProgress): self
    {
        $this->initialized['rootRotationInProgress'] = true;
        $this->rootRotationInProgress = $rootRotationInProgress;
        return $this;
    }
}
