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
 * Date: 04/04/2020
 */

declare(strict_types=1);

namespace JetStudio\Watson\SpeechToText\Entity;

use JetStudio\Watson\SpeechToText\Entity\RecognitionResult\SpeechRecognitionResults;
use JMS\Serializer\Annotation as Serializer;

/**
 * Information about a current asynchronous speech recognition job.
 *
 * Class RecognitionJob
 * @package JetStudio\Watson\SpeechToText\Entity
 */
class RecognitionJob
{
    public const STATUS_WAITING = 'waiting';
    public const STATUS_PROCESSING = 'processing';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_FAILED = 'failed';

    /**
     * The ID of the asynchronous job.
     *
     * @Serializer\Type("string")
     * @var string
     */
    private string $id = '';

    /**
     * The current status of the job:
     *      waiting:
     *          The service is preparing the job for processing.
     *          The service returns this status when the job is initially created
     *          or when it is waiting for capacity to process the job.
     *          The job remains in this state until the service has the capacity to begin processing it.
     *      processing:
     *          The service is actively processing the job.
     *      completed:
     *          The service has finished processing the job. If the job specified a callback URL
     *          and the event recognitions.completed_with_results,
     *          the service sent the results with the callback notification.
     *          Otherwise, you must retrieve the results by checking the individual job.
     *      failed:
     *          The job failed.
     *
     * @Serializer\Type("string")
     * @var string
     */
    private string $status = '';

    /**
     * The date and time in Coordinated Universal Time (UTC) at which the job was created.
     * The value is provided in full ISO 8601 format (YYYY-MM-DDThh:mm:ss.sTZD).
     *
     * @Serializer\Type("string")
     * @var string
     */
    private string $created = '';

    /**
     * The date and time in Coordinated Universal Time (UTC) at which the job was last updated by the service.
     * The value is provided in full ISO 8601 format (YYYY-MM-DDThh:mm:ss.sTZD).
     * This field is returned only by the Check jobs and Check a job methods.
     *
     * @Serializer\Type("string")
     * @var string|null
     */
    private ?string $updated;

    /**
     * The URL to use to request information about the job with the Check a job method.
     * This field is returned only by the Create a job method.
     *
     * @Serializer\Type("string")
     * @var string|null
     */
    private ?string $url;

    /**
     * The user token associated with a job that was created with a callback URL and a user token.
     * This field can be returned only by the Check jobs method.
     *
     * @Serializer\Type("string")
     * @var string|null
     */
    private ?string $userToken;

    /**
     * An array of warning messages about invalid parameters included with the request.
     * Each warning includes a descriptive message and a list of invalid argument strings,
     * for example, "unexpected query parameter 'user_token', query parameter 'callback_url' was not specified".
     * The request succeeds despite the warnings.
     * This field can be returned only by the Create a job method.
     *
     * @Serializer\Type("array")
     * @var string[]
     */
    private array $warnings = [];

    /**
     * If the status is completed, the results of the recognition request as an array
     * that includes a single instance of a SpeechRecognitionResults object.
     * This field is returned only by the Check a job method.
     *
     * @Serializer\Type("array<JetStudio\Watson\SpeechToText\Entity\RecognitionResult\SpeechRecognitionResults>")
     * @var SpeechRecognitionResults|null
     */
    private ?SpeechRecognitionResults $results = null;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return RecognitionJob
     */
    public function setId(string $id): RecognitionJob
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return RecognitionJob
     */
    public function setStatus(string $status): RecognitionJob
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreated(): string
    {
        return $this->created;
    }

    /**
     * @param string $created
     * @return RecognitionJob
     */
    public function setCreated(string $created): RecognitionJob
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdated(): ?string
    {
        return $this->updated;
    }

    /**
     * @param string|null $updated
     * @return RecognitionJob
     */
    public function setUpdated(?string $updated): RecognitionJob
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return RecognitionJob
     */
    public function setUrl(?string $url): RecognitionJob
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserToken(): ?string
    {
        return $this->userToken;
    }

    /**
     * @param string|null $userToken
     * @return RecognitionJob
     */
    public function setUserToken(?string $userToken): RecognitionJob
    {
        $this->userToken = $userToken;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getWarnings(): array
    {
        return $this->warnings;
    }

    /**
     * @param string[] $warnings
     * @return RecognitionJob
     */
    public function setWarnings(array $warnings): RecognitionJob
    {
        $this->warnings = $warnings;
        return $this;
    }

    /**
     * @return SpeechRecognitionResults|null
     */
    public function getResults(): ?SpeechRecognitionResults
    {
        return $this->results;
    }

    /**
     * @param SpeechRecognitionResults|null $results
     * @return RecognitionJob
     */
    public function setResults(?SpeechRecognitionResults $results): RecognitionJob
    {
        $this->results = $results;
        return $this;
    }
}
