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

namespace JetStudio\Watson\SpeechToText\Entity\RecognitionResult;

use JMS\Serializer\Annotation as Serializer;

class ProcessingMetrics
{
    /**
     * If processing metrics are requested, information about the service's processing of the input audio.
     * Processing metrics are not available with the synchronous Recognize audio method.
     *
     * @Serializer\Type("JetStudio\Watson\SpeechToText\Entity\ProcessedAudio")
     * @var ProcessedAudio;
     */
    private ProcessedAudio $processedAudio;

    /**
     * The amount of real time in seconds that has passed since the service received the first byte of input audio.
     * Values in this field are generally multiples of the specified metrics interval, with two differences:
     *      - Values might not reflect exact intervals (for instance, 0.25, 0.5, and so on).
     *      Actual values might be 0.27, 0.52, and so on, depending on when the service receives and processes audio.
     *      - The service also returns values for transcription events if you set the interim_results parameter to true.
     *      The service returns both processing metrics and transcription results when such events occur.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $wallClockSinceFirstByteReceived = 0.0;

    /**
     * An indication of whether the metrics apply to a periodic interval or a transcription event:
     * - true: means that the response was triggered by a specified processing interval.
     *      The information contains processing metrics only.
     * - false: means that the response was triggered by a transcription event.
     *      The information contains processing metrics plus transcription results.
     * Use the field to identify why the service generated the response and to filter different results if necessary.
     *
     * @Serializer\Type("boolean")
     * @var bool
     */
    private bool $periodic = false;
}
