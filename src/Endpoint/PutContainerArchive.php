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

namespace Docker\API\Endpoint;

use Docker\API\Exception\PutContainerArchiveBadRequestException;
use Docker\API\Exception\PutContainerArchiveForbiddenException;
use Docker\API\Exception\PutContainerArchiveInternalServerErrorException;
use Docker\API\Exception\PutContainerArchiveNotFoundException;
use Docker\API\Runtime\Client\BaseEndpoint;
use Docker\API\Runtime\Client\Endpoint;
use Docker\API\Runtime\Client\EndpointTrait;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class PutContainerArchive extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    protected $id;

    /**
     * Upload a tar archive to be extracted to a path in the filesystem of container id.
     *
     * @param string $id ID or name of the container
     * @param string $inputStream the input stream must be a tar archive compressed with one of the following algorithms: identity (no compression), gzip, bzip2, xz
     * @param array $queryParameters {
     * @var string $path path to a directory in the container to extract the archive’s contents into
     * @var string $noOverwriteDirNonDir If “1”, “true”, or “True” then it will be an error if unpacking the given content would cause an existing directory to be replaced with a non-directory and vice versa.
     *             }
     */
    public function __construct(string $id, string $inputStream, array $queryParameters = [])
    {
        $this->id = $id;
        $this->body = $inputStream;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/archive');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], $this->body];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }

    protected function getQueryOptionsResolver(): OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['path', 'noOverwriteDirNonDir']);
        $optionsResolver->setRequired(['path']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('path', ['string']);
        $optionsResolver->addAllowedTypes('noOverwriteDirNonDir', ['string']);
        return $optionsResolver;
    }

    /**
     * @throws PutContainerArchiveBadRequestException
     * @throws PutContainerArchiveForbiddenException
     * @throws PutContainerArchiveNotFoundException
     * @throws PutContainerArchiveInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 200) {
            return null;
        }
        if ($status === 400) {
            throw new PutContainerArchiveBadRequestException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 403) {
            throw new PutContainerArchiveForbiddenException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 404) {
            throw new PutContainerArchiveNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 500) {
            throw new PutContainerArchiveInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }
}
