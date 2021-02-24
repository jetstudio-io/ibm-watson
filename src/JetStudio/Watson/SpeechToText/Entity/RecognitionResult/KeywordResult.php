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

namespace JetStudio\Watson\SpeechToText\Entity\RecognitionResult;

use JMS\Serializer\Annotation as Serializer;

class KeywordResult
{
    /**
     * A specified keyword normalized to the spoken phrase that matched in the audio input.
     *
     * @Serializer\Type("string")
     * @var string
     */
    private string $normalizedText = '';

    /**
     * The start time in seconds of the keyword match.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $startTime = 0.0;

    /**
     * The end time in seconds of the keyword match.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $endTime = 0.0;

    /**
     * A confidence score for the keyword match in the range of 0.0 to 1.0.
     * Constraints: 0 ≤ value ≤ 1
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $confidence = 0.0;

    /**
     * @return string
     */
    public function getNormalizedText(): string
    {
        return $this->normalizedText;
    }

    /**
     * @param string $normalizedText
     * @return KeywordResult
     */
    public function setNormalizedText(string $normalizedText): KeywordResult
    {
        $this->normalizedText = $normalizedText;
        return $this;
    }

    /**
     * @return float
     */
    public function getStartTime(): float
    {
        return $this->startTime;
    }

    /**
     * @param float $startTime
     * @return KeywordResult
     */
    public function setStartTime(float $startTime): KeywordResult
    {
        $this->startTime = $startTime;
        return $this;
    }

    /**
     * @return float
     */
    public function getEndTime(): float
    {
        return $this->endTime;
    }

    /**
     * @param float $endTime
     * @return KeywordResult
     */
    public function setEndTime(float $endTime): KeywordResult
    {
        $this->endTime = $endTime;
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
     * @return KeywordResult
     */
    public function setConfidence(float $confidence): KeywordResult
    {
        $this->confidence = $confidence;
        return $this;
    }
}
