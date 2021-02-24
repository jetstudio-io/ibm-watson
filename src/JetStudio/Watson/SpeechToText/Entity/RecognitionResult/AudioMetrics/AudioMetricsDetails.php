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

namespace JetStudio\Watson\SpeechToText\Entity\RecognitionResult\AudioMetrics;

use JMS\Serializer\Annotation as Serializer;

class AudioMetricsDetails
{
    /**
     * If true, indicates the end of the audio stream, meaning that transcription is complete.
     * Currently, the field is always true. The service returns metrics just once per audio stream.
     * The results provide aggregated audio metrics that pertain to the complete audio stream.
     *
     * @Serializer\Type("boolean")
     * @var bool
     */
    private bool $final = false;

    /**
     * The end time in seconds of the block of audio to which the metrics apply.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $endTime = 0.0;

    /**
     * The ratio of speech to non-speech segments in the audio signal. The value lies in the range of 0.0 to 1.0.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $speechRatio = 0.0;

    /**
     * The probability that the audio signal is missing the upper half of its frequency content.
     * - A value close to 1.0 typically indicates artificially up-sampled audio,
     *   which negatively impacts the accuracy of the transcription results.
     * - A value at or near 0.0 indicates that the audio signal is good and has a full spectrum.
     * - A value around 0.5 means that detection of the frequency content is unreliable or not available.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $highFrequencyLoss = 0.0;

    /**
     * An array of AudioMetricsHistogramBin objects that defines
     * a histogram of the cumulative direct current (DC) component of the audio signal.
     *
     * @Serializer\Type(array<JetStudio\Watson\SpeechToText\Entity\RecognitionResult\AudioMetrics\AudioMetricsHistogramBin>)
     * @var AudioMetricsHistogramBin[]
     */
    private array $directCurrentOffset = [];

    /**
     * An array of AudioMetricsHistogramBin objects
     * that defines a histogram of the clipping rate for the audio segments.
     * The clipping rate is defined as the fraction of samples in the segment
     * that reach the maximum or minimum value that is offered by the audio quantization range.
     * The service auto-detects either a 16-bit Pulse-Code Modulation(PCM)
     * audio range (-32768 to +32767) or a unit range (-1.0 to +1.0).
     * The clipping rate is between 0.0 and 1.0,
     * with higher values indicating possible degradation of speech recognition.
     *
     * @Serializer\Type(array<JetStudio\Watson\SpeechToText\Entity\RecognitionResult\AudioMetrics\AudioMetricsHistogramBin>)
     * @var AudioMetricsHistogramBin[]
     */
    private array $clippingRate = [];

    /**
     * An array of AudioMetricsHistogramBin objects
     * that defines a histogram of the signal level in segments of the audio that contain speech.
     * The signal level is computed as the Root-Mean-Square (RMS)
     * value in a decibel (dB) scale normalized to the range 0.0 (minimum level) to 1.0 (maximum level).
     *
     * @Serializer\Type(array<JetStudio\Watson\SpeechToText\Entity\RecognitionResult\AudioMetrics\AudioMetricsHistogramBin>)
     * @var AudioMetricsHistogramBin[]
     */
    private array $speechLevel = [];

    /**
     * An array of AudioMetricsHistogramBin objects
     * that defines a histogram of the signal level in segments of the audio that do not contain speech.
     * The signal level is computed as the Root-Mean-Square (RMS)
     * value in a decibel (dB) scale normalized to the range 0.0 (minimum level) to 1.0 (maximum level).
     *
     * @Serializer\Type(array<JetStudio\Watson\SpeechToText\Entity\RecognitionResult\AudioMetrics\AudioMetricsHistogramBin>)
     * @var AudioMetricsHistogramBin[]
     */
    private array $nonSpeechLevel = [];

    /**
     * The signal-to-noise ratio (SNR) for the audio signal.
     * The value indicates the ratio of speech to noise in the audio.
     * A valid value lies in the range of 0 to 100 decibels (dB).
     * The service omits the field if it cannot compute the SNR for the audio.
     *
     * @Serializer\Type("float")
     * @var float|null
     */
    private ?float $signalToNoiseRatio = null;

    /**
     * @return bool
     */
    public function isFinal(): bool
    {
        return $this->final;
    }

    /**
     * @param bool $final
     * @return AudioMetricsDetails
     */
    public function setFinal(bool $final): AudioMetricsDetails
    {
        $this->final = $final;
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
     * @return AudioMetricsDetails
     */
    public function setEndTime(float $endTime): AudioMetricsDetails
    {
        $this->endTime = $endTime;
        return $this;
    }

    /**
     * @return float
     */
    public function getSpeechRatio(): float
    {
        return $this->speechRatio;
    }

    /**
     * @param float $speechRatio
     * @return AudioMetricsDetails
     */
    public function setSpeechRatio(float $speechRatio): AudioMetricsDetails
    {
        $this->speechRatio = $speechRatio;
        return $this;
    }

    /**
     * @return float
     */
    public function getHighFrequencyLoss(): float
    {
        return $this->highFrequencyLoss;
    }

    /**
     * @param float $highFrequencyLoss
     * @return AudioMetricsDetails
     */
    public function setHighFrequencyLoss(float $highFrequencyLoss): AudioMetricsDetails
    {
        $this->highFrequencyLoss = $highFrequencyLoss;
        return $this;
    }

    /**
     * @return AudioMetricsHistogramBin[]
     */
    public function getDirectCurrentOffset(): array
    {
        return $this->directCurrentOffset;
    }

    /**
     * @param AudioMetricsHistogramBin[] $directCurrentOffset
     * @return AudioMetricsDetails
     */
    public function setDirectCurrentOffset(array $directCurrentOffset): AudioMetricsDetails
    {
        $this->directCurrentOffset = $directCurrentOffset;
        return $this;
    }

    /**
     * @return AudioMetricsHistogramBin[]
     */
    public function getClippingRate(): array
    {
        return $this->clippingRate;
    }

    /**
     * @param AudioMetricsHistogramBin[] $clippingRate
     * @return AudioMetricsDetails
     */
    public function setClippingRate(array $clippingRate): AudioMetricsDetails
    {
        $this->clippingRate = $clippingRate;
        return $this;
    }

    /**
     * @return AudioMetricsHistogramBin[]
     */
    public function getSpeechLevel(): array
    {
        return $this->speechLevel;
    }

    /**
     * @param AudioMetricsHistogramBin[] $speechLevel
     * @return AudioMetricsDetails
     */
    public function setSpeechLevel(array $speechLevel): AudioMetricsDetails
    {
        $this->speechLevel = $speechLevel;
        return $this;
    }

    /**
     * @return AudioMetricsHistogramBin[]
     */
    public function getNonSpeechLevel(): array
    {
        return $this->nonSpeechLevel;
    }

    /**
     * @param AudioMetricsHistogramBin[] $nonSpeechLevel
     * @return AudioMetricsDetails
     */
    public function setNonSpeechLevel(array $nonSpeechLevel): AudioMetricsDetails
    {
        $this->nonSpeechLevel = $nonSpeechLevel;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getSignalToNoiseRatio(): ?float
    {
        return $this->signalToNoiseRatio;
    }

    /**
     * @param float|null $signalToNoiseRatio
     * @return AudioMetricsDetails
     */
    public function setSignalToNoiseRatio(?float $signalToNoiseRatio): AudioMetricsDetails
    {
        $this->signalToNoiseRatio = $signalToNoiseRatio;
        return $this;
    }
}
