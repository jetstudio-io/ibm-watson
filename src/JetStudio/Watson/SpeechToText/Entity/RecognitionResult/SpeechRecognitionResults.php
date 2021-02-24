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

class SpeechRecognitionResults
{
    /**
     * An array of SpeechRecognitionResult objects that can include interim and final results
     * (interim results are returned only if supported by the method).
     * Final results are guaranteed not to change; interim results might be replaced
     * by further interim results and final results. The service periodically sends updates to the results list;
     * the result_index is set to the lowest index in the array that has changed; it is incremented for new results.
     *
     * @Serializer\Type("array<JetStudio\Watson\SpeechToText\Entity\RecognitionResult\SpeechRecognitionResult>")
     * @var SpeechRecognitionResult[]|null
     */
    private ?array $results = null;

    /**
     * An index that indicates a change point in the results array.
     * The service increments the index only for additional results that it sends for new audio for the same request.
     *
     * @Serializer\Type("int")
     * @var int|null
     */
    private ?int $resultIndex = null;

    /**
     * An array of SpeakerLabelsResult objects that identifies
     * which words were spoken by which speakers in a multi-person exchange.
     * The array is returned only if the speaker_labels parameter is true.
     * When interim results are also requested for methods that support them,
     * it is possible for a SpeechRecognitionResults object to include only the speaker_labels field.
     *
     * @Serializer\Type("array<JetStudio\Watson\SpeechToText\Entity\RecognitionResult\SpeakerLabelsResult>")
     * @var SpeakerLabelsResult[]|null
     */
    private ?array $speakerLabels = null;

    /**
     * If processing metrics are requested, information about the service's processing of the input audio.
     * Processing metrics are not available with the synchronous Recognize audio method.
     *
     * @Serializer\Type("JetStudio\Watson\SpeechToText\Entity\RecognitionResult\ProcessingMetrics")
     * @var ProcessingMetrics|null
     */
    private ?ProcessingMetrics $processingMetrics = null;

    /**
     * If audio metrics are requested, information about the signal characteristics of the input audio.
     *
     * @Serializer\Type("JetStudio\Watson\SpeechToText\Entity\RecognitionResult\AudioMetrics")
     * @var AudioMetrics|null
     */
    private ?AudioMetrics $audioMetrics = null;

    /**
     * An array of warning messages associated with the request:
     * - Warnings for invalid parameters or fields can include a descriptive message
     *   and a list of invalid argument strings, for example, "Unknown arguments:"
     *   or "Unknown url query arguments:" followed by a list of the form "{invalid_arg_1}, {invalid_arg_2}."
     * - The following warning is returned if the request passes a custom model
     *   that is based on an older version of a base model for which an updated version is available:
     *   "Using previous version of base model, because your custom model has been built with it.
     *   Please note that this version will be supported only for a limited time.
     *   Consider updating your custom model to the new base model.
     *   If you do not do that you will be automatically switched to base model
     *   when you used the non-updated custom model."
     * In both cases, the request succeeds despite the warnings.
     *
     * @Serializer\Type("array")
     * @var string[]|null
     */
    private ?array $warnings = null;

    /**
     * @return SpeechRecognitionResult[]|null
     */
    public function getResults(): ?array
    {
        return $this->results;
    }

    /**
     * @param SpeechRecognitionResult[]|null $results
     * @return SpeechRecognitionResults
     */
    public function setResults(?array $results): SpeechRecognitionResults
    {
        $this->results = $results;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getResultIndex(): ?int
    {
        return $this->resultIndex;
    }

    /**
     * @param int|null $resultIndex
     * @return SpeechRecognitionResults
     */
    public function setResultIndex(?int $resultIndex): SpeechRecognitionResults
    {
        $this->resultIndex = $resultIndex;
        return $this;
    }

    /**
     * @return SpeakerLabelsResult[]|null
     */
    public function getSpeakerLabels(): ?array
    {
        return $this->speakerLabels;
    }

    /**
     * @param SpeakerLabelsResult[]|null $speakerLabels
     * @return SpeechRecognitionResults
     */
    public function setSpeakerLabels(?array $speakerLabels): SpeechRecognitionResults
    {
        $this->speakerLabels = $speakerLabels;
        return $this;
    }

    /**
     * @return ProcessingMetrics|null
     */
    public function getProcessingMetrics(): ?ProcessingMetrics
    {
        return $this->processingMetrics;
    }

    /**
     * @param ProcessingMetrics|null $processingMetrics
     * @return SpeechRecognitionResults
     */
    public function setProcessingMetrics(?ProcessingMetrics $processingMetrics): SpeechRecognitionResults
    {
        $this->processingMetrics = $processingMetrics;
        return $this;
    }

    /**
     * @return AudioMetrics|null
     */
    public function getAudioMetrics(): ?AudioMetrics
    {
        return $this->audioMetrics;
    }

    /**
     * @param AudioMetrics|null $audioMetrics
     * @return SpeechRecognitionResults
     */
    public function setAudioMetrics(?AudioMetrics $audioMetrics): SpeechRecognitionResults
    {
        $this->audioMetrics = $audioMetrics;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getWarnings(): ?array
    {
        return $this->warnings;
    }

    /**
     * @param string[]|null $warnings
     * @return SpeechRecognitionResults
     */
    public function setWarnings(?array $warnings): SpeechRecognitionResults
    {
        $this->warnings = $warnings;
        return $this;
    }
}
