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

class SpeakerLabelsResult
{
    /**
     * The start time of a word from the transcript.
     * The value matches the start time of a word from the timestamps array.
     *
     * @var float
     */
    private float $from = 0.0;

    /**
     * The end time of a word from the transcript.
     * The value matches the end time of a word from the timestamps array.
     *
     * @var float
     */
    private float $to = 0.0;

    /**
     * The numeric identifier that the service assigns to a speaker from the audio.
     * Speaker IDs begin at 0 initially but can evolve and change across interim results
     * (if supported by the method) and between interim and final results as the service processes the audio.
     * They are not guaranteed to be sequential, contiguous, or ordered.
     *
     * @var int
     */
    private int $speaker = 0;

    /**
     * A score that indicates the service's confidence in its identification of the speaker in the range of 0.0 to 1.0.
     *
     * @var float
     */
    private float $confidence = 0.0;

    /**
     * An indication of whether the service might further change word and speaker-label results.
     * A value of true means that the service guarantees not to send any further updates
     * for the current or any preceding results; false means that the service might send further updates to the results.
     *
     * @var bool
     */
    private bool $final = false;

    /**
     * @return float
     */
    public function getFrom(): float
    {
        return $this->from;
    }

    /**
     * @param float $from
     * @return SpeakerLabelsResult
     */
    public function setFrom(float $from): SpeakerLabelsResult
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return float
     */
    public function getTo(): float
    {
        return $this->to;
    }

    /**
     * @param float $to
     * @return SpeakerLabelsResult
     */
    public function setTo(float $to): SpeakerLabelsResult
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return int
     */
    public function getSpeaker(): int
    {
        return $this->speaker;
    }

    /**
     * @param int $speaker
     * @return SpeakerLabelsResult
     */
    public function setSpeaker(int $speaker): SpeakerLabelsResult
    {
        $this->speaker = $speaker;
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
     * @return SpeakerLabelsResult
     */
    public function setConfidence(float $confidence): SpeakerLabelsResult
    {
        $this->confidence = $confidence;
        return $this;
    }

    /**
     * @return bool
     */
    public function isFinal(): bool
    {
        return $this->final;
    }

    /**
     * @param bool $final
     * @return SpeakerLabelsResult
     */
    public function setFinal(bool $final): SpeakerLabelsResult
    {
        $this->final = $final;
        return $this;
    }
}
