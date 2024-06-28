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

use Docker\API\Exception\SystemAuthInternalServerErrorException;
use Docker\API\Model\AuthConfig;
use Docker\API\Model\AuthPostResponse200;
use Docker\API\Runtime\Client\BaseEndpoint;
use Docker\API\Runtime\Client\Endpoint;
use Docker\API\Runtime\Client\EndpointTrait;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

class SystemAuth extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Validate credentials for a registry and, if available, get an identity token for accessing the registry without password.
     *
     * @param AuthConfig $authConfig Authentication to check
     */
    public function __construct(AuthConfig $authConfig)
    {
        $this->body = $authConfig;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/auth';
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

    /**
     * @return null|AuthPostResponse200
     * @throws SystemAuthInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 200) {
            return $serializer->deserialize($body, 'Docker\API\Model\AuthPostResponse200', 'json');
        }
        if ($status === 204) {
            return null;
        }
        if ($status === 500) {
            throw new SystemAuthInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }
}
