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

namespace JetStudio\Watson\SpeechToText\Services;

use JetStudio\Watson\SpeechToText\Entity\CallbackUrl;

class CallbackUrlService extends BaseService
{
    public const STATUS = ['created', 'already created'];
    public const REGISTER_URI = 'v1/register_callback';
    public const UNREGISTER_URI = 'v1/unregister_callback';
    protected string $serviceUri = 'v1/register_callback';

    /**
     * @param CallbackUrl $callbackUrl
     * @return bool
     */
    public function register(CallbackUrl $callbackUrl): bool
    {
        $params = [
            'callback_url' => $callbackUrl->getCallbackUrl(),
        ];

        if ($callbackUrl->getUserSecret()) {
            $params['user_secret'] = $callbackUrl->getUserSecret();
        }

        $this->serviceUri = self::REGISTER_URI;
        $res = $this->post($params);
        if (in_array($res['status'], self::STATUS)) {
            return true;
        }
        return false;
    }

    /**
     * @param CallbackUrl $callbackUrl
     * @return bool
     */
    public function unregister(CallbackUrl $callbackUrl): bool
    {
        $params = [
            'callback_url' => $callbackUrl->getCallbackUrl(),
        ];

        $this->serviceUri = self::UNREGISTER_URI;
        $res = $this->post($params);
        if (!empty($res)) {
            return true;
        }
        return false;
    }
}
