<?php
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Docker\API\Endpoint;

use Docker\API\Exception\ContainerAttachWebsocketBadRequestException;
use Docker\API\Exception\ContainerAttachWebsocketInternalServerErrorException;
use Docker\API\Exception\ContainerAttachWebsocketNotFoundException;
use Docker\API\Runtime\Client\BaseEndpoint;
use Docker\API\Runtime\Client\Endpoint;
use Docker\API\Runtime\Client\EndpointTrait;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class ContainerAttachWebsocket extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    protected $id;

    /**
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     * @var string $detachKeys Override the key sequence for detaching a container.Format is a single character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`, `@`, `^`, `[`, `,`, or `_`.
     * @var bool $logs Return logs
     * @var bool $stream Return stream
     * @var bool $stdin Attach to `stdin`
     * @var bool $stdout Attach to `stdout`
     * @var bool $stderr Attach to `stderr`
     *           }
     */
    public function __construct(string $id, array $queryParameters = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/attach/ws');
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
        $optionsResolver->setDefined(['detachKeys', 'logs', 'stream', 'stdin', 'stdout', 'stderr']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['logs' => false, 'stream' => false, 'stdin' => false, 'stdout' => false, 'stderr' => false]);
        $optionsResolver->addAllowedTypes('detachKeys', ['string']);
        $optionsResolver->addAllowedTypes('logs', ['bool']);
        $optionsResolver->addAllowedTypes('stream', ['bool']);
        $optionsResolver->addAllowedTypes('stdin', ['bool']);
        $optionsResolver->addAllowedTypes('stdout', ['bool']);
        $optionsResolver->addAllowedTypes('stderr', ['bool']);
        return $optionsResolver;
    }

    /**
     * @throws ContainerAttachWebsocketBadRequestException
     * @throws ContainerAttachWebsocketNotFoundException
     * @throws ContainerAttachWebsocketInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 101) {
            return null;
        }
        if ($status === 200) {
            return null;
        }
        if ($status === 400) {
            throw new ContainerAttachWebsocketBadRequestException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 404) {
            throw new ContainerAttachWebsocketNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 500) {
            throw new ContainerAttachWebsocketInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }
}
