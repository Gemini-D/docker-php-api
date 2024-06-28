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

class TaskSpecContainerSpecPrivilegesCredentialSpec
{
    /**
     * @var array
     */
    protected $initialized = [];

    /**
     * Load credential spec from this file. The file is read by the daemon, and must be present in the
     * `CredentialSpecs` subdirectory in the docker data directory, which defaults to
     * `C:\ProgramData\Docker\` on Windows.
     *
     * For example, specifying `spec.json` loads `C:\ProgramData\Docker\CredentialSpecs\spec.json`.
     *
     * <p><br /></p>
     *
     * > **Note**: `CredentialSpec.File` and `CredentialSpec.Registry` are mutually exclusive.
     *
     * @var string
     */
    protected $file;

    /**
     * Load credential spec from this value in the Windows registry. The specified registry value must be
     * located in:
     *
     * `HKLM\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Virtualization\Containers\CredentialSpecs`
     *
     * <p><br /></p>
     *
     *
     * > **Note**: `CredentialSpec.File` and `CredentialSpec.Registry` are mutually exclusive.
     *
     * @var string
     */
    protected $registry;

    public function isInitialized($property): bool
    {
        return array_key_exists($property, $this->initialized);
    }

    /**
     * Load credential spec from this file. The file is read by the daemon, and must be present in the
     * `CredentialSpecs` subdirectory in the docker data directory, which defaults to
     * `C:\ProgramData\Docker\` on Windows.
     *
     * For example, specifying `spec.json` loads `C:\ProgramData\Docker\CredentialSpecs\spec.json`.
     *
     * <p><br /></p>
     *
     * > **Note**: `CredentialSpec.File` and `CredentialSpec.Registry` are mutually exclusive.
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * Load credential spec from this file. The file is read by the daemon, and must be present in the
     * `CredentialSpecs` subdirectory in the docker data directory, which defaults to
     * `C:\ProgramData\Docker\` on Windows.
     *
     * For example, specifying `spec.json` loads `C:\ProgramData\Docker\CredentialSpecs\spec.json`.
     *
     * <p><br /></p>
     *
     * > **Note**: `CredentialSpec.File` and `CredentialSpec.Registry` are mutually exclusive.
     */
    public function setFile(string $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;
        return $this;
    }

    /**
     * Load credential spec from this value in the Windows registry. The specified registry value must be
     * located in:
     *
     * `HKLM\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Virtualization\Containers\CredentialSpecs`
     *
     * <p><br /></p>
     *
     *
     * > **Note**: `CredentialSpec.File` and `CredentialSpec.Registry` are mutually exclusive.
     */
    public function getRegistry(): string
    {
        return $this->registry;
    }

    /**
     * Load credential spec from this value in the Windows registry. The specified registry value must be
     * located in:
     *
     * `HKLM\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Virtualization\Containers\CredentialSpecs`
     *
     * <p><br /></p>
     *
     *
     * > **Note**: `CredentialSpec.File` and `CredentialSpec.Registry` are mutually exclusive.
     */
    public function setRegistry(string $registry): self
    {
        $this->initialized['registry'] = true;
        $this->registry = $registry;
        return $this;
    }
}
