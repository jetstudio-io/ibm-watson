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
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

/**
 * Project ibm-watson
 * @author Louis Nguyen <louis.nguyen@jetstudio.io>
 * Date: 29/03/2020
 */

declare(strict_types=1);

namespace JetStudio\Watson\SpeechToText;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Psr7\Utils;

class Client
{
    public const SUCCESS_CODE = [200, 201, 202];
    // Currently we support only flac, mp3 & mpeg audio file
    public const ALLOWED_CONTENT_TYPE = [
        'audio/flac', 'audio/mp3', 'audio/mpeg'
    ];
    /**
     * @var string
     */
    private string $apiKey;

    /**
     * @var string
     */
    private string $url;
    /**
     * @var HttpClient
     */
    private HttpClient $httpClient;

    /**
     * @var array
     */
    private array $authOption = [];

    /**
     * Client constructor.
     * @param string $apiKey
     * @param string $url
     */
    public function __construct(string $apiKey, string $url)
    {
        $this->apiKey = $apiKey;
        $this->url = $url;
        $this->authOption = [
            'auth' => ['apikey', $this->apiKey]
        ];
        // Add slash at the end of url to make base uri correct
        if ($url[strlen($url) - 1] !== '/') {
            $url .= '/';
        }
        $this->httpClient = new HttpClient(
            [
                'base_uri' => $url
            ]
        );
    }

    /**
     * @param string $uri
     * @param array $params
     * @return string
     * @throws RequestException
     */
    public function get(string $uri, array $params = []): string
    {
        $uri .= $this->buildQueryParams($params);
        $request = new Request('GET', $uri);
        $response = $this->httpClient->send($request, $this->authOption);
        return $this->handleResponse($response);
    }

    /**
     * @param string $uri
     * @param array $params
     * @return string
     * @throws GuzzleException
     */
    public function post(string $uri, array $params = []): string
    {
        $uri .= $this->buildQueryParams($params);
        $request = new Request('POST', $uri);
        $response = $this->httpClient->send($request, $this->authOption);
        return $this->handleResponse($response);
    }

    /**
     * @param string $uri
     * @param string $filename
     * @param array $params
     * @return string
     */
    public function postWithStream(string $uri, string $filename, array $params = []): string
    {
        $uri .= $this->buildQueryParams($params);
        $contentType = mime_content_type($filename);
        $fileResource = fopen($filename, 'r');
        $stream = Utils::streamFor($fileResource);
        $request = new Request('POST', $uri);
        $requestOption = [
            'headers' => [
                'Content-Type' => $contentType,
            ],
            'auth' => $this->authOption['auth'],
            'body' => $stream,
        ];
        $response = $this->httpClient->send($request, $requestOption);
        return $this->handleResponse($response);
    }

    /**
     * @param array $params
     * @return string
     */
    private function buildQueryParams(array $params = []): string
    {
        if (!empty($params)) {
            $urlParams = '?' . http_build_query($params);
        } else {
            $urlParams = '';
        }
        return $urlParams;
    }

    /**
     * @param ResponseInterface $response
     * @return string
     */
    private function handleResponse(ResponseInterface $response): string
    {
        if (in_array($response->getStatusCode(), self::SUCCESS_CODE)) {
            return $response->getBody()->getContents();
        }
        return '';
    }
}
