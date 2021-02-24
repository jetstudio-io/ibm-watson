<?php

/**
 * Copyright (c) 2020. Jet Studio
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

/**
 * Project ibm-watson
 * @author Louis Nguyen <louis.nguyen@jetstudio.io>
 * Date: 31/03/2020
 */

declare(strict_types=1);

namespace JetStudio\Watson\SpeechToText\Services;

use GuzzleHttp\Exception\GuzzleException;
use JetStudio\Watson\SpeechToText\Client;
use JMS\Serializer\SerializerInterface;

abstract class BaseService
{
    /**
     * The service uri which must be override in child class
     * @var string
     */
    protected string $serviceUri = '';

    /**
     * @var Client
     */
    protected Client $client;

    /**
     * @var SerializerInterface
     */
    protected SerializerInterface $serializer;

    /**
     * BaseService constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->serializer = SerializerFactory::build();
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }

    /**
     * @param Client $client
     * @return BaseService
     */
    public function setClient(Client $client): BaseService
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @param array $params
     * @return array
     */
    protected function get(array $params = []): array
    {
        $res = $this->client->get($this->serviceUri, $params);
        return $this->handleResponse($res);
    }

    /**
     * @param array $params
     * @return string
     */
    protected function getString(array $params = []): string
    {
        return $this->client->get($this->serviceUri, $params);
    }

    /**
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    protected function post(array $params = []): array
    {
        $res = $this->client->post($this->serviceUri, $params);
        return $this->handleResponse($res);
    }

    /**
     * @param string $fileName
     * @param array $params
     * @return array
     */
    protected function postWithStream(string $fileName, array $params = []): array
    {
        $res = $this->client->postWithStream($this->serviceUri, $fileName, $params);
        return $this->handleResponse($res);
    }

    protected function handleResponse(string $res): array
    {
        if ($res) {
            $array = json_decode($res, true);
            if ($array && is_array($array)) {
                return $array;
            }
        }
        return [];
    }
}
