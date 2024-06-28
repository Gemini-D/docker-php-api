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

use Docker\API\Exception\ServiceLogsInternalServerErrorException;
use Docker\API\Exception\ServiceLogsNotFoundException;
use Docker\API\Exception\ServiceLogsServiceUnavailableException;
use Docker\API\Runtime\Client\BaseEndpoint;
use Docker\API\Runtime\Client\Endpoint;
use Docker\API\Runtime\Client\EndpointTrait;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class ServiceLogs extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    protected $id;

    /**
     * Get `stdout` and `stderr` logs from a service.
     *
     **Note**: This endpoint works only for services with the `json-file` or `journald` logging drivers.
     *
     * @param string $id ID or name of the service
     * @param array $queryParameters {
     * @var bool $details show service context and extra details provided to logs
     * @var bool $follow Return the logs as a stream.
     *
     * This will return a `101` HTTP response with a `Connection: upgrade` header, then hijack the HTTP connection to send raw output. For more information about hijacking and the stream format, [see the documentation for the attach endpoint](#operation/ContainerAttach).
     *
     * @var bool $stdout Return logs from `stdout`
     * @var bool $stderr Return logs from `stderr`
     * @var int $since Only return logs since this time, as a UNIX timestamp
     * @var bool $timestamps Add timestamps to every log line
     * @var string $tail Only return this number of log lines from the end of the logs. Specify as an integer or `all` to output all log lines.
     *             }
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
        return str_replace(['{id}'], [$this->id], '/services/{id}/logs');
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
        $optionsResolver->setDefined(['details', 'follow', 'stdout', 'stderr', 'since', 'timestamps', 'tail']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['details' => false, 'follow' => false, 'stdout' => false, 'stderr' => false, 'since' => 0, 'timestamps' => false, 'tail' => 'all']);
        $optionsResolver->addAllowedTypes('details', ['bool']);
        $optionsResolver->addAllowedTypes('follow', ['bool']);
        $optionsResolver->addAllowedTypes('stdout', ['bool']);
        $optionsResolver->addAllowedTypes('stderr', ['bool']);
        $optionsResolver->addAllowedTypes('since', ['int']);
        $optionsResolver->addAllowedTypes('timestamps', ['bool']);
        $optionsResolver->addAllowedTypes('tail', ['string']);
        return $optionsResolver;
    }

    /**
     * @throws ServiceLogsNotFoundException
     * @throws ServiceLogsInternalServerErrorException
     * @throws ServiceLogsServiceUnavailableException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 101) {
            return json_decode($body);
        }
        if ($status === 200) {
            return json_decode($body);
        }
        if ($status === 404) {
            throw new ServiceLogsNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 500) {
            throw new ServiceLogsInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 503) {
            throw new ServiceLogsServiceUnavailableException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }
}
