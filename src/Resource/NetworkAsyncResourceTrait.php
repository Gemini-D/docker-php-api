<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Docker\API\Resource;

use Jane\OpenApiRuntime\Client\QueryParam;

trait NetworkAsyncResourceTrait
{
    /**
     * Returns a list of networks. For details on the format, see [the network inspect endpoint](#operation/NetworkInspect).

    Note that it uses a different, smaller representation of a network than inspecting a single network. For example,
    the list of containers attached to the network is not propagated in API versions 1.28 and up.

     *
     * @param array $parameters {
     *
     *     @var string $filters JSON encoded value of the filters (a `map[string][]string`) to process on the networks list. Available filters:

     * }
     * @param string                 $fetch             Fetch mode (object or response)
     * @param \Amp\CancellationToken $cancellationToken Token to cancel the request
     *
     * @throws \Docker\API\Exception\NetworkListInternalServerErrorException
     *
     * @return \Amp\Promise<\Amp\Artax\Response|\Docker\API\Model\Network>
     */
    public function networkList(array $parameters = [], string $fetch = self::FETCH_OBJECT, \Amp\CancellationToken $cancellationToken = null): \Amp\Promise
    {
        return \Amp\call(function () use ($parameters, $fetch, $cancellationToken) {
            $queryParam = new QueryParam();
            $queryParam->addQueryParameter('filters', false, ['string']);
            $url = '/networks';
            $url = $url . ('?' . $queryParam->buildQueryString($parameters));
            $headers = array_merge(['Accept' => ['application/json']], $queryParam->buildHeaders($parameters));
            $body = $queryParam->buildFormDataString($parameters);
            $request = new \Amp\Artax\Request($url, 'GET');
            $request = $request->withHeaders($headers);
            $request = $request->withBody($body);
            $response = (yield $this->httpClient->request($request, [], $cancellationToken));
            if (self::FETCH_OBJECT === $fetch) {
                if (200 === $response->getStatus()) {
                    return $this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\Network[]', 'json');
                }
                if (500 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkListInternalServerErrorException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
            }

            return $response;
        });
    }

    /**
     * @param string                 $id                Network ID or name
     * @param array                  $parameters        List of parameters
     * @param string                 $fetch             Fetch mode (object or response)
     * @param \Amp\CancellationToken $cancellationToken Token to cancel the request
     *
     * @throws \Docker\API\Exception\NetworkDeleteForbiddenException
     * @throws \Docker\API\Exception\NetworkDeleteNotFoundException
     * @throws \Docker\API\Exception\NetworkDeleteInternalServerErrorException
     *
     * @return \Amp\Promise<\Amp\Artax\Response|null>
     */
    public function networkDelete(string $id, array $parameters = [], string $fetch = self::FETCH_OBJECT, \Amp\CancellationToken $cancellationToken = null): \Amp\Promise
    {
        return \Amp\call(function () use ($id, $parameters, $fetch, $cancellationToken) {
            $queryParam = new QueryParam();
            $url = '/networks/{id}';
            $url = str_replace('{id}', urlencode($id), $url);
            $url = $url . ('?' . $queryParam->buildQueryString($parameters));
            $headers = array_merge(['Accept' => ['application/json']], $queryParam->buildHeaders($parameters));
            $body = $queryParam->buildFormDataString($parameters);
            $request = new \Amp\Artax\Request($url, 'DELETE');
            $request = $request->withHeaders($headers);
            $request = $request->withBody($body);
            $response = (yield $this->httpClient->request($request, [], $cancellationToken));
            if (self::FETCH_OBJECT === $fetch) {
                if (204 === $response->getStatus()) {
                    return null;
                }
                if (403 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkDeleteForbiddenException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
                if (404 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkDeleteNotFoundException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
                if (500 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkDeleteInternalServerErrorException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
            }

            return $response;
        });
    }

    /**
     * @param string $id         Network ID or name
     * @param array  $parameters {
     *
     *     @var bool $verbose Detailed inspect output for troubleshooting
     * }
     *
     * @param string                 $fetch             Fetch mode (object or response)
     * @param \Amp\CancellationToken $cancellationToken Token to cancel the request
     *
     * @throws \Docker\API\Exception\NetworkInspectNotFoundException
     * @throws \Docker\API\Exception\NetworkInspectInternalServerErrorException
     *
     * @return \Amp\Promise<\Amp\Artax\Response|\Docker\API\Model\Network>
     */
    public function networkInspect(string $id, array $parameters = [], string $fetch = self::FETCH_OBJECT, \Amp\CancellationToken $cancellationToken = null): \Amp\Promise
    {
        return \Amp\call(function () use ($id, $parameters, $fetch, $cancellationToken) {
            $queryParam = new QueryParam();
            $queryParam->addQueryParameter('verbose', false, ['bool'], false);
            $url = '/networks/{id}';
            $url = str_replace('{id}', urlencode($id), $url);
            $url = $url . ('?' . $queryParam->buildQueryString($parameters));
            $headers = array_merge(['Accept' => ['application/json']], $queryParam->buildHeaders($parameters));
            $body = $queryParam->buildFormDataString($parameters);
            $request = new \Amp\Artax\Request($url, 'GET');
            $request = $request->withHeaders($headers);
            $request = $request->withBody($body);
            $response = (yield $this->httpClient->request($request, [], $cancellationToken));
            if (self::FETCH_OBJECT === $fetch) {
                if (200 === $response->getStatus()) {
                    return $this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\Network', 'json');
                }
                if (404 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkInspectNotFoundException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
                if (500 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkInspectInternalServerErrorException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
            }

            return $response;
        });
    }

    /**
     * @param \Docker\API\Model\NetworksCreatePostBody $networkConfig     Network configuration
     * @param array                                    $parameters        List of parameters
     * @param string                                   $fetch             Fetch mode (object or response)
     * @param \Amp\CancellationToken                   $cancellationToken Token to cancel the request
     *
     * @throws \Docker\API\Exception\NetworkCreateForbiddenException
     * @throws \Docker\API\Exception\NetworkCreateNotFoundException
     * @throws \Docker\API\Exception\NetworkCreateInternalServerErrorException
     *
     * @return \Amp\Promise<\Amp\Artax\Response|\Docker\API\Model\NetworksCreatePostResponse201>
     */
    public function networkCreate(\Docker\API\Model\NetworksCreatePostBody $networkConfig, array $parameters = [], string $fetch = self::FETCH_OBJECT, \Amp\CancellationToken $cancellationToken = null): \Amp\Promise
    {
        return \Amp\call(function () use ($networkConfig, $parameters, $fetch, $cancellationToken) {
            $queryParam = new QueryParam();
            $url = '/networks/create';
            $url = $url . ('?' . $queryParam->buildQueryString($parameters));
            $headers = array_merge(['Accept' => ['application/json'], 'Content-Type' => ['application/json']], $queryParam->buildHeaders($parameters));
            $body = $this->serializer->serialize($networkConfig, 'json');
            $request = new \Amp\Artax\Request($url, 'POST');
            $request = $request->withHeaders($headers);
            $request = $request->withBody($body);
            $response = (yield $this->httpClient->request($request, [], $cancellationToken));
            if (self::FETCH_OBJECT === $fetch) {
                if (201 === $response->getStatus()) {
                    return $this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\NetworksCreatePostResponse201', 'json');
                }
                if (403 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkCreateForbiddenException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
                if (404 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkCreateNotFoundException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
                if (500 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkCreateInternalServerErrorException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
            }

            return $response;
        });
    }

    /**
     * @param string                                      $id                Network ID or name
     * @param \Docker\API\Model\NetworksIdConnectPostBody $container
     * @param array                                       $parameters        List of parameters
     * @param string                                      $fetch             Fetch mode (object or response)
     * @param \Amp\CancellationToken                      $cancellationToken Token to cancel the request
     *
     * @throws \Docker\API\Exception\NetworkConnectForbiddenException
     * @throws \Docker\API\Exception\NetworkConnectNotFoundException
     * @throws \Docker\API\Exception\NetworkConnectInternalServerErrorException
     *
     * @return \Amp\Promise<\Amp\Artax\Response|null>
     */
    public function networkConnect(string $id, \Docker\API\Model\NetworksIdConnectPostBody $container, array $parameters = [], string $fetch = self::FETCH_OBJECT, \Amp\CancellationToken $cancellationToken = null): \Amp\Promise
    {
        return \Amp\call(function () use ($id, $container, $parameters, $fetch, $cancellationToken) {
            $queryParam = new QueryParam();
            $url = '/networks/{id}/connect';
            $url = str_replace('{id}', urlencode($id), $url);
            $url = $url . ('?' . $queryParam->buildQueryString($parameters));
            $headers = array_merge(['Accept' => ['application/json'], 'Content-Type' => ['application/json']], $queryParam->buildHeaders($parameters));
            $body = $this->serializer->serialize($container, 'json');
            $request = new \Amp\Artax\Request($url, 'POST');
            $request = $request->withHeaders($headers);
            $request = $request->withBody($body);
            $response = (yield $this->httpClient->request($request, [], $cancellationToken));
            if (self::FETCH_OBJECT === $fetch) {
                if (200 === $response->getStatus()) {
                    return null;
                }
                if (403 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkConnectForbiddenException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
                if (404 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkConnectNotFoundException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
                if (500 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkConnectInternalServerErrorException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
            }

            return $response;
        });
    }

    /**
     * @param string                                         $id                Network ID or name
     * @param \Docker\API\Model\NetworksIdDisconnectPostBody $container
     * @param array                                          $parameters        List of parameters
     * @param string                                         $fetch             Fetch mode (object or response)
     * @param \Amp\CancellationToken                         $cancellationToken Token to cancel the request
     *
     * @throws \Docker\API\Exception\NetworkDisconnectForbiddenException
     * @throws \Docker\API\Exception\NetworkDisconnectNotFoundException
     * @throws \Docker\API\Exception\NetworkDisconnectInternalServerErrorException
     *
     * @return \Amp\Promise<\Amp\Artax\Response|null>
     */
    public function networkDisconnect(string $id, \Docker\API\Model\NetworksIdDisconnectPostBody $container, array $parameters = [], string $fetch = self::FETCH_OBJECT, \Amp\CancellationToken $cancellationToken = null): \Amp\Promise
    {
        return \Amp\call(function () use ($id, $container, $parameters, $fetch, $cancellationToken) {
            $queryParam = new QueryParam();
            $url = '/networks/{id}/disconnect';
            $url = str_replace('{id}', urlencode($id), $url);
            $url = $url . ('?' . $queryParam->buildQueryString($parameters));
            $headers = array_merge(['Accept' => ['application/json'], 'Content-Type' => ['application/json']], $queryParam->buildHeaders($parameters));
            $body = $this->serializer->serialize($container, 'json');
            $request = new \Amp\Artax\Request($url, 'POST');
            $request = $request->withHeaders($headers);
            $request = $request->withBody($body);
            $response = (yield $this->httpClient->request($request, [], $cancellationToken));
            if (self::FETCH_OBJECT === $fetch) {
                if (200 === $response->getStatus()) {
                    return null;
                }
                if (403 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkDisconnectForbiddenException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
                if (404 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkDisconnectNotFoundException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
                if (500 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkDisconnectInternalServerErrorException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
            }

            return $response;
        });
    }

    /**
     * @param array $parameters {
     *
     *     @var string $filters filters to process on the prune list, encoded as JSON (a `map[string][]string`)

     * }
     * @param string                 $fetch             Fetch mode (object or response)
     * @param \Amp\CancellationToken $cancellationToken Token to cancel the request
     *
     * @throws \Docker\API\Exception\NetworkPruneInternalServerErrorException
     *
     * @return \Amp\Promise<\Amp\Artax\Response|\Docker\API\Model\NetworksPrunePostResponse200>
     */
    public function networkPrune(array $parameters = [], string $fetch = self::FETCH_OBJECT, \Amp\CancellationToken $cancellationToken = null): \Amp\Promise
    {
        return \Amp\call(function () use ($parameters, $fetch, $cancellationToken) {
            $queryParam = new QueryParam();
            $queryParam->addQueryParameter('filters', false, ['string']);
            $url = '/networks/prune';
            $url = $url . ('?' . $queryParam->buildQueryString($parameters));
            $headers = array_merge(['Accept' => ['application/json']], $queryParam->buildHeaders($parameters));
            $body = $queryParam->buildFormDataString($parameters);
            $request = new \Amp\Artax\Request($url, 'POST');
            $request = $request->withHeaders($headers);
            $request = $request->withBody($body);
            $response = (yield $this->httpClient->request($request, [], $cancellationToken));
            if (self::FETCH_OBJECT === $fetch) {
                if (200 === $response->getStatus()) {
                    return $this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\NetworksPrunePostResponse200', 'json');
                }
                if (500 === $response->getStatus()) {
                    throw new \Docker\API\Exception\NetworkPruneInternalServerErrorException($this->serializer->deserialize((yield $response->getBody()), 'Docker\\API\\Model\\ErrorResponse', 'json'));
                }
            }

            return $response;
        });
    }
}
