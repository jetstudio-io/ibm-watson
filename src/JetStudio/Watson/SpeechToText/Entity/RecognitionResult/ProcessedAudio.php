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

class ProcessedAudio
{
    /**
     * The seconds of audio that the service has received as of this response.
     * The value of the field is greater than the values
     * of the transcription and speaker_labels fields during speech recognition processing,
     * since the service first has to receive the audio before it can begin to process it.
     * The final value can also be greater than the value
     * of the transcription and speaker_labels fields by a fractional number of seconds.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $received = 0.0;

    /**
     * The seconds of audio that the service has passed to its speech-processing engine as of this response.
     * The value of the field is greater than the values of the transcription and speaker_labels fields
     * during speech recognition processing. The received and seen_by_engine fields have identical values
     * when the service has finished processing all audio. This final value can be greater than
     * the value of the transcription and speaker_labels fields by a fractional number of seconds.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $seenByEngine = 0.0;

    /**
     * The seconds of audio that the service has processed for speech recognition as of this response.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $transcription = 0.0;

    /**
     * If speaker labels are requested,
     * the seconds of audio that the service has processed to determine speaker labels as of this response.
     * This value often trails the value of the transcription field during speech recognition processing.
     * The transcription and speaker_labels fields have identical values
     * when the service has finished processing all audio.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $speakerLabels = 0.0;

    /**
     * @return float
     */
    public function getReceived(): float
    {
        return $this->received;
    }

    /**
     * @param float $received
     * @return ProcessedAudio
     */
    public function setReceived(float $received): ProcessedAudio
    {
        $this->received = $received;
        return $this;
    }

    /**
     * @return float
     */
    public function getSeenByEngine(): float
    {
        return $this->seenByEngine;
    }

    /**
     * @param float $seenByEngine
     * @return ProcessedAudio
     */
    public function setSeenByEngine(float $seenByEngine): ProcessedAudio
    {
        $this->seenByEngine = $seenByEngine;
        return $this;
    }

    /**
     * @return float
     */
    public function getTranscription(): float
    {
        return $this->transcription;
    }

    /**
     * @param float $transcription
     * @return ProcessedAudio
     */
    public function setTranscription(float $transcription): ProcessedAudio
    {
        $this->transcription = $transcription;
        return $this;
    }

    /**
     * @return float
     */
    public function getSpeakerLabels(): float
    {
        return $this->speakerLabels;
    }

    /**
     * @param float $speakerLabels
     * @return ProcessedAudio
     */
    public function setSpeakerLabels(float $speakerLabels): ProcessedAudio
    {
        $this->speakerLabels = $speakerLabels;
        return $this;
    }
}
