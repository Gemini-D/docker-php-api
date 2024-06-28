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

use Docker\API\Exception\ImageCommitInternalServerErrorException;
use Docker\API\Exception\ImageCommitNotFoundException;
use Docker\API\Model\ContainerConfig;
use Docker\API\Model\IdResponse;
use Docker\API\Runtime\Client\BaseEndpoint;
use Docker\API\Runtime\Client\Endpoint;
use Docker\API\Runtime\Client\EndpointTrait;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class ImageCommit extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

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
     */
    public function __construct(ContainerConfig $containerConfig, array $queryParameters = [])
    {
        $this->body = $containerConfig;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/commit';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return $this->getSerializedBody($serializer);
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
        $optionsResolver->setDefined(['container', 'repo', 'tag', 'comment', 'author', 'pause', 'changes']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['pause' => true]);
        $optionsResolver->addAllowedTypes('container', ['string']);
        $optionsResolver->addAllowedTypes('repo', ['string']);
        $optionsResolver->addAllowedTypes('tag', ['string']);
        $optionsResolver->addAllowedTypes('comment', ['string']);
        $optionsResolver->addAllowedTypes('author', ['string']);
        $optionsResolver->addAllowedTypes('pause', ['bool']);
        $optionsResolver->addAllowedTypes('changes', ['string']);
        return $optionsResolver;
    }

    /**
     * @return null|IdResponse
     * @throws ImageCommitNotFoundException
     * @throws ImageCommitInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 201) {
            return $serializer->deserialize($body, 'Docker\API\Model\IdResponse', 'json');
        }
        if ($status === 404) {
            throw new ImageCommitNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 500) {
            throw new ImageCommitInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }
}
