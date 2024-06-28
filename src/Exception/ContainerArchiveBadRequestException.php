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

namespace Docker\API\Exception;

use Docker\API\Model\ContainersIdArchiveGetResponse400;
use Psr\Http\Message\ResponseInterface;

class ContainerArchiveBadRequestException extends BadRequestException
{
    /**
     * @var ContainersIdArchiveGetResponse400
     */
    private $containersIdArchiveGetResponse400;

    /**
     * @var ResponseInterface
     */
    private $response;

    public function __construct(ContainersIdArchiveGetResponse400 $containersIdArchiveGetResponse400, ResponseInterface $response)
    {
        parent::__construct('Bad parameter');
        $this->containersIdArchiveGetResponse400 = $containersIdArchiveGetResponse400;
        $this->response = $response;
    }

    public function getContainersIdArchiveGetResponse400(): ContainersIdArchiveGetResponse400
    {
        return $this->containersIdArchiveGetResponse400;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
