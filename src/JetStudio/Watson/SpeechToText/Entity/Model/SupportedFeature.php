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
 * Date: 31/03/2020
 */

declare(strict_types=1);

namespace JetStudio\Watson\SpeechToText\Entity\Model;

use JMS\Serializer\Annotation as Serializer;

class SupportedFeature
{
    /**
     * Indicates whether the customization interface can be used
     * to create a custom language model based on the language model.
     *
     * @var bool
     * @Serializer\Type("boolean")
     */
    private bool $customLanguageModel = true;

    /**
     * Indicates whether the speaker_labels parameter can be used with the language model.
     *
     * @var bool
     * @Serializer\Type("boolean")
     */
    private bool $speakerLabels = true;

    /**
     * @return bool
     */
    public function isCustomLanguageModel(): bool
    {
        return $this->customLanguageModel;
    }

    /**
     * @param bool $customLanguageModel
     * @return SupportedFeature
     */
    public function setCustomLanguageModel(bool $customLanguageModel): SupportedFeature
    {
        $this->customLanguageModel = $customLanguageModel;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSpeakerLabels(): bool
    {
        return $this->speakerLabels;
    }

    /**
     * @param bool $speakerLabels
     * @return SupportedFeature
     */
    public function setSpeakerLabels(bool $speakerLabels): SupportedFeature
    {
        $this->speakerLabels = $speakerLabels;
        return $this;
    }
}
