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

use JetStudio\Watson\SpeechToText\Entity\RecognitionResult\AudioMetrics\AudioMetricsDetails;
use JMS\Serializer\Annotation as Serializer;

class AudioMetrics
{
    /**
     * The interval in seconds (typically 0.1 seconds) at which the service calculated the audio metrics.
     * In other words, how often the service calculated the metrics.
     * A single unit in each histogram (see the AudioMetricsHistogramBin object)
     * is calculated based on a sampling_interval length of audio.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $samplingInterval = 0.0;

    /**
     * Detailed information about the signal characteristics of the input audio.
     * @Serializer\Type("JetStudio\Watson\SpeechToText\Entity\RecognitionResult\AudioMetrics\AudioMetricsDetails")
     * @var AudioMetricsDetails
     */
    private AudioMetricsDetails $accumulated;

    /**
     * @return float
     */
    public function getSamplingInterval(): float
    {
        return $this->samplingInterval;
    }

    /**
     * @param float $samplingInterval
     * @return AudioMetrics
     */
    public function setSamplingInterval(float $samplingInterval): AudioMetrics
    {
        $this->samplingInterval = $samplingInterval;
        return $this;
    }

    /**
     * @return AudioMetricsDetails
     */
    public function getAccumulated(): AudioMetricsDetails
    {
        return $this->accumulated;
    }

    /**
     * @param AudioMetricsDetails $accumulated
     * @return AudioMetrics
     */
    public function setAccumulated(AudioMetricsDetails $accumulated): AudioMetrics
    {
        $this->accumulated = $accumulated;
        return $this;
    }
}
