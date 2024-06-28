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

use Docker\API\Exception\NetworkCreateForbiddenException;
use Docker\API\Exception\NetworkCreateInternalServerErrorException;
use Docker\API\Exception\NetworkCreateNotFoundException;
use Docker\API\Model\NetworksCreatePostBody;
use Docker\API\Model\NetworksCreatePostResponse201;
use Docker\API\Runtime\Client\BaseEndpoint;
use Docker\API\Runtime\Client\Endpoint;
use Docker\API\Runtime\Client\EndpointTrait;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

class NetworkCreate extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * @param NetworksCreatePostBody $networkConfig Network configuration
     */
    public function __construct(NetworksCreatePostBody $networkConfig)
    {
        $this->body = $networkConfig;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/networks/create';
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
     * @return null|NetworksCreatePostResponse201
     * @throws NetworkCreateForbiddenException
     * @throws NetworkCreateNotFoundException
     * @throws NetworkCreateInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 201) {
            return $serializer->deserialize($body, 'Docker\API\Model\NetworksCreatePostResponse201', 'json');
        }
        if ($status === 403) {
            throw new NetworkCreateForbiddenException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 404) {
            throw new NetworkCreateNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 500) {
            throw new NetworkCreateInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }
}
