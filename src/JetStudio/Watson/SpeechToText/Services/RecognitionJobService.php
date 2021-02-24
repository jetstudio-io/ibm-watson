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
 * Date: 05/04/2020
 */

declare(strict_types=1);

namespace JetStudio\Watson\SpeechToText\Services;

use JetStudio\Watson\SpeechToText\Entity\Job;
use JetStudio\Watson\SpeechToText\Entity\RecognitionJob;

class RecognitionJobService extends BaseService
{
    public const JOB_URI = 'v1/recognitions';
    protected string $serviceUri = self::JOB_URI;

    /**
     * Currently, we don't support to create a job with full parameters
     * We just support to create a job with these parameters:
     * - model
     * - callback_url
     * - events
     * - user_token
     * - inactive_timeout
     *
     * @param Job $job
     * @return RecognitionJob|null
     */
    public function createJob(Job $job): ?RecognitionJob
    {
        $callbackUrl = $job->getCallBackUrl();

        $request = [
            'model' => $job->getModel(),
            'inactivity_timeout' => $job->getInactivityTimeout(),
            'timestamps' => var_export($job->isTimestamps(), true),
            'smart_formatting' => var_export($job->isSmartFormatting(), true),
        ];

        if ($callbackUrl) {
            $request['callback_url'] = $callbackUrl->getCallbackUrl();
            $request['events'] = implode(',', $job->getEvents());
        }

        // Make sure that service uri is point to right api endpoint
        $this->serviceUri = self::JOB_URI;
        $res = $this->postWithStream($job->getFileName(), $request);
        $json = json_encode($res);
        if ($json) {
            /** @var RecognitionJob $recognitionJob*/
            $recognitionJob = $this->serializer->deserialize($json, RecognitionJob::class, 'json');
            return $recognitionJob;
        } else {
            return null;
        }
    }

    /**
     * @param RecognitionJob $job
     * @return RecognitionJob
     */
    public function checkJob(RecognitionJob $job): RecognitionJob
    {
        $jobId = $job->getId();
        $this->serviceUri = self::JOB_URI . '/' . $jobId;
        $res = $this->getString();
        /** @var RecognitionJob $recognitionJob */
        $recognitionJob = $this->serializer->deserialize($res, RecognitionJob::class, 'json');
        return $recognitionJob;
    }
}
