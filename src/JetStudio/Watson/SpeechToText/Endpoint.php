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

class Endpoint
{
    public const DALLAS = 'api.us-south.speech-to-text.watson.cloud.ibm.com';
    public const WASHINGTON = 'api.us-east.speech-to-text.watson.cloud.ibm.com';
    public const FRANKFURT = 'api.eu-de.speech-to-text.watson.cloud.ibm.com';
    public const SYDNEY = 'api.au-syd.speech-to-text.watson.cloud.ibm.com';
    public const TOKYO = 'api.jp-tok.speech-to-text.watson.cloud.ibm.com';
    public const LONDON = 'api.eu-gb.speech-to-text.watson.cloud.ibm.com';
    public const SEOUL = 'api.kr-seo.speech-to-text.watson.cloud.ibm.com';
}
