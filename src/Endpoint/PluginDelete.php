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

use Docker\API\Exception\PluginDeleteInternalServerErrorException;
use Docker\API\Exception\PluginDeleteNotFoundException;
use Docker\API\Model\Plugin;
use Docker\API\Runtime\Client\BaseEndpoint;
use Docker\API\Runtime\Client\Endpoint;
use Docker\API\Runtime\Client\EndpointTrait;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class PluginDelete extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    protected $name;

    /**
     * @param string $name The name of the plugin. The `:latest` tag is optional, and is the default if omitted.
     * @param array $queryParameters {
     * @var bool $force Disable the plugin before removing. This may result in issues if the plugin is in use by a container.
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
        return str_replace(['{name}'], [$this->name], '/plugins/{name}');
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
        $optionsResolver->setDefined(['force']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['force' => false]);
        $optionsResolver->addAllowedTypes('force', ['bool']);
        return $optionsResolver;
    }

    /**
     * @return null|Plugin
     * @throws PluginDeleteNotFoundException
     * @throws PluginDeleteInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ($status === 200) {
            return $serializer->deserialize($body, 'Docker\API\Model\Plugin', 'json');
        }
        if ($status === 404) {
            throw new PluginDeleteNotFoundException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
        if ($status === 500) {
            throw new PluginDeleteInternalServerErrorException($serializer->deserialize($body, 'Docker\API\Model\ErrorResponse', 'json'), $response);
        }
    }
}
