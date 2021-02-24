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

class SpeechRecognitionAlternative
{
    /**
     * A transcription of the audio.
     *
     * @Serializer\Type("string")
     * @var string
     */
    private string $transcript = '';

    /**
     * A score that indicates the service's confidence in the transcript in the range of 0.0 to 1.0.
     * A confidence score is returned only for the best alternative and only with results marked as final.
     * Constraints: 0 ≤ value ≤ 1
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $confidence = 0.0;

    /**
     * Time alignments for each word from the transcript as a list of lists.
     * Each inner list consists of three elements: the word followed by its start and end time in seconds,
     * for example: [["hello",0.0,1.2],["world",1.2,2.5]].
     * Timestamps are returned only for the best alternative.
     *
     * @Serializer\Type("array")
     * @var string[]|null
     */
    private ?array $timestamps = null;

    /**
     * A confidence score for each word of the transcript as a list of lists.
     * Each inner list consists of two elements: the word and its confidence score in the range of 0.0 to 1.0,
     * for example: [["hello",0.95],["world",0.866]].
     * Confidence scores are returned only for the best alternative and only with results marked as final.
     *
     * @Serializer\Type("array")
     * @var string[]|null
     */
    private ?array $wordConfidence = null;

    /**
     * @return string
     */
    public function getTranscript(): string
    {
        return $this->transcript;
    }

    /**
     * @param string $transcript
     * @return SpeechRecognitionAlternative
     */
    public function setTranscript(string $transcript): SpeechRecognitionAlternative
    {
        $this->transcript = $transcript;
        return $this;
    }

    /**
     * @return float
     */
    public function getConfidence(): float
    {
        return $this->confidence;
    }

    /**
     * @param float $confidence
     * @return SpeechRecognitionAlternative
     */
    public function setConfidence(float $confidence): SpeechRecognitionAlternative
    {
        $this->confidence = $confidence;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getTimestamps(): ?array
    {
        return $this->timestamps;
    }

    /**
     * @param string[]|null $timestamps
     * @return SpeechRecognitionAlternative
     */
    public function setTimestamps(?array $timestamps): SpeechRecognitionAlternative
    {
        $this->timestamps = $timestamps;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getWordConfidence(): ?array
    {
        return $this->wordConfidence;
    }

    /**
     * @param string[]|null $wordConfidence
     * @return SpeechRecognitionAlternative
     */
    public function setWordConfidence(?array $wordConfidence): SpeechRecognitionAlternative
    {
        $this->wordConfidence = $wordConfidence;
        return $this;
    }
}
