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
 * Date: 02/04/2020
 */

declare(strict_types=1);

namespace JetStudio\Watson\SpeechToText\Entity;

class CallbackUrl
{
    /**
     * @var string
     */
    private string $callbackUrl = '';

    /**
     * @var string
     */
    private string $userSecret = '';

    /**
     * @var string
     */
    private string $userToken = '';

    /**
     * @return string
     */
    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    /**
     * @param string $callbackUrl
     * @return CallbackUrl
     */
    public function setCallbackUrl(string $callbackUrl): CallbackUrl
    {
        $this->callbackUrl = $callbackUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserSecret(): string
    {
        return $this->userSecret;
    }

    /**
     * @param string $userSecret
     * @return CallbackUrl
     */
    public function setUserSecret(string $userSecret): CallbackUrl
    {
        $this->userSecret = $userSecret;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserToken(): string
    {
        return $this->userToken;
    }

    /**
     * @param string $userToken
     * @return CallbackUrl
     */
    public function setUserToken(string $userToken): CallbackUrl
    {
        $this->userToken = $userToken;
        return $this;
    }
}
