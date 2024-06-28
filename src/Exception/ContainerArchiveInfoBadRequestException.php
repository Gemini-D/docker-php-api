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

use Docker\API\Model\ContainersIdArchiveHeadResponse400;
use Psr\Http\Message\ResponseInterface;

class ContainerArchiveInfoBadRequestException extends BadRequestException
{
    /**
     * @var ContainersIdArchiveHeadResponse400
     */
    private $containersIdArchiveHeadResponse400;

    /**
     * @var ResponseInterface
     */
    private $response;

    public function __construct(ContainersIdArchiveHeadResponse400 $containersIdArchiveHeadResponse400, ResponseInterface $response)
    {
        parent::__construct('Bad parameter');
        $this->containersIdArchiveHeadResponse400 = $containersIdArchiveHeadResponse400;
        $this->response = $response;
    }

    public function getContainersIdArchiveHeadResponse400(): ContainersIdArchiveHeadResponse400
    {
        return $this->containersIdArchiveHeadResponse400;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
