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

class AudioMetricsHistogramBin
{
    /**
     * The lower boundary of the bin in the histogram.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $begin = 0.0;

    /**
     * The upper boundary of the bin in the histogram.
     *
     * @Serializer\Type("float")
     * @var float
     */
    private float $end = 0.0;

    /**
     * The number of values in the bin of the histogram.
     *
     * @Serializer\Type("int")
     * @var int
     */
    private int $count = 0;

    /**
     * @return float
     */
    public function getBegin(): float
    {
        return $this->begin;
    }

    /**
     * @param float $begin
     * @return AudioMetricsHistogramBin
     */
    public function setBegin(float $begin): AudioMetricsHistogramBin
    {
        $this->begin = $begin;
        return $this;
    }

    /**
     * @return float
     */
    public function getEnd(): float
    {
        return $this->end;
    }

    /**
     * @param float $end
     * @return AudioMetricsHistogramBin
     */
    public function setEnd(float $end): AudioMetricsHistogramBin
    {
        $this->end = $end;
        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     * @return AudioMetricsHistogramBin
     */
    public function setCount(int $count): AudioMetricsHistogramBin
    {
        $this->count = $count;
        return $this;
    }
}
