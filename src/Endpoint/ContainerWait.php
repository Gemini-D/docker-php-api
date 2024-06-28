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

use Docker\API\Exception\ContainerWaitInternalServerErrorException;
use Docker\API\Exception\ContainerWaitNotFoundException;
use Docker\API\Model\ContainersIdWaitPostResponse200;
use Docker\API\Runtime\Client\BaseEndpoint;
use Docker\API\Runtime\Client\Endpoint;
use Docker\API\Runtime\Client\EndpointTrait;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class ContainerWait extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    protected $id;

    /**
     * Block until a container stops, then returns the exit code.
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var string $condition Wait until a container state reaches the given condition, either 'not-running' (default), 'next-exit', or 'removed'.
     *             }
     */
    public function __construct(string $id, array $queryParameters = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/wait');
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
        $optionsResolver->setDefined(['condition']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['condition' => 'not-running']);
        $optionsResolver->addAllowedTypes('condition', ['string']);
        return $optionsResolver;
    }

    /**
     * @return null|ContainersIdWaitPostResponse200
     * @throws ContainerWaitNotFoundException
     * @throws ContainerWaitInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 200) {
            return $serializer->deserialize($body, 'Docker\API\Model\ContainersIdWaitPostResponse200', 'json');
        }
        if ($status === 404) {
            throw new ContainerWaitNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 500) {
            throw new ContainerWaitInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }
}
