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

class WordAlternativeResults
{
    /**
     * The start time in seconds of the word from the input audio that corresponds to the word alternatives.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $startTime = 0.0;

    /**
     * The end time in seconds of the word from the input audio that corresponds to the word alternatives.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $endTime = 0.0;

    /**
     * @Serializer\Type("array<JetStudio\Watson\SpeechToText\Entity\RecognitionResult\WordAlternativeResult>")
     * @var WordAlternativeResult[]
     */
    private array $alternatives = [];

    /**
     * @return float
     */
    public function getStartTime(): float
    {
        return $this->startTime;
    }

    /**
     * @param float $startTime
     * @return WordAlternativeResults
     */
    public function setStartTime(float $startTime): WordAlternativeResults
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
     * @return WordAlternativeResults
     */
    public function setEndTime(float $endTime): WordAlternativeResults
    {
        $this->endTime = $endTime;
        return $this;
    }

    /**
     * @return WordAlternativeResult[]
     */
    public function getAlternatives(): array
    {
        return $this->alternatives;
    }

    /**
     * @param WordAlternativeResult[] $alternatives
     * @return WordAlternativeResults
     */
    public function setAlternatives(array $alternatives): WordAlternativeResults
    {
        $this->alternatives = $alternatives;
        return $this;
    }
}
