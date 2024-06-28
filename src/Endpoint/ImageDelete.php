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

use Docker\API\Exception\ImageDeleteConflictException;
use Docker\API\Exception\ImageDeleteInternalServerErrorException;
use Docker\API\Exception\ImageDeleteNotFoundException;
use Docker\API\Runtime\Client\BaseEndpoint;
use Docker\API\Runtime\Client\Endpoint;
use Docker\API\Runtime\Client\EndpointTrait;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class ImageDelete extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    protected $name;

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
     */
    public function __construct(string $name, array $queryParameters = [])
    {
        $this->name = $name;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{name}'], [$this->name], '/images/{name}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
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
        $optionsResolver->setDefined(['force', 'noprune']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['force' => false, 'noprune' => false]);
        $optionsResolver->addAllowedTypes('force', ['bool']);
        $optionsResolver->addAllowedTypes('noprune', ['bool']);
        return $optionsResolver;
    }

    /**
     * @return null|\Docker\API\Model\ImageDeleteResponseItem[]
     * @throws ImageDeleteNotFoundException
     * @throws ImageDeleteConflictException
     * @throws ImageDeleteInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 200) {
            return $serializer->deserialize($body, 'Docker\API\Model\ImageDeleteResponseItem[]', 'json');
        }
        if ($status === 404) {
            throw new ImageDeleteNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 409) {
            throw new ImageDeleteConflictException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 500) {
            throw new ImageDeleteInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }
}
