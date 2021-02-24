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

namespace JetStudio\Watson\SpeechToText\Entity;

use JetStudio\Watson\SpeechToText\Entity\Model\SupportedFeature;
use JMS\Serializer\Annotation as Serializer;

class Model
{
    public const ALLOWED_MODELS = [
        'ar-AR_BroadbandModel',
        'de-DE_BroadbandModel',
        'de-DE_NarrowbandModel',
        'en-GB_BroadbandModel',
        'en-GB_NarrowbandModel',
        'en-US_BroadbandModel',
        'en-US_NarrowbandModel',
        'en-US_ShortForm_NarrowbandModel',
        'es-AR_BroadbandModel',
        'es-AR_NarrowbandModel',
        'es-CL_BroadbandModel',
        'es-CL_NarrowbandModel',
        'es-CO_BroadbandModel',
        'es-CO_NarrowbandModel',
        'es-ES_BroadbandModel',
        'es-ES_NarrowbandModel',
        'es-MX_BroadbandModel',
        'es-MX_NarrowbandModel',
        'es-PE_BroadbandModel',
        'es-PE_NarrowbandModel',
        'fr-FR_BroadbandModel',
        'fr-FR_NarrowbandModel',
        'it-IT_BroadbandModel',
        'it-IT_NarrowbandModel',
        'ja-JP_BroadbandModel',
        'ja-JP_NarrowbandModel',
        'ko-KR_BroadbandModel',
        'ko-KR_NarrowbandModel',
        'nl-NL_BroadbandModel',
        'nl-NL_NarrowbandModel',
        'pt-BR_BroadbandModel',
        'pt-BR_NarrowbandModel',
        'zh-CN_BroadbandModel',
        'zh-CN_NarrowbandModel'
    ];

    public const DEFAULT_MODEL = 'en-US_BroadbandModel';

    /**
     * The name of the model for use as an identifier in calls to the service
     * (for example en-US_BroadbandModel)
     *
     * @var string
     * @Serializer\Type("string")
     */
    private string $name = self::DEFAULT_MODEL;

    /**
     * The language identifier of the model (for example en-US)
     *
     * @var string
     * @Serializer\Type("string")
     */
    private string $language = 'en-US';

    /**
     * The sampling rate (minimum acceptable rate for audio) used by the model in Hertz.
     * NarrowbandModel: 8000
     * BroadbandModel: 16000
     *
     * @var int
     * @Serializer\Type("int")
     */
    private int $rate = 8000;

    /**
     * The URI for the model.
     *
     * @var string
     * @Serializer\Type("string")
     */
    private string $url = '';

    /**
     * Additional service features that are supported with the model.
     *
     * @var SupportedFeature
     * @Serializer\Type("JetStudio\Watson\SpeechToText\Entity\Model\SupportedFeature")
     */
    private SupportedFeature $supportedFeatures;

    /**
     * A brief description of the model.
     *
     * @var string
     * @Serializer\Type("string")
     */
    private string $description = '';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Model
     */
    public function setName(string $name): Model
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return Model
     */
    public function setLanguage(string $language): Model
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     * @return Model
     */
    public function setRate(int $rate): Model
    {
        $this->rate = $rate;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Model
     */
    public function setUrl(string $url): Model
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return SupportedFeature
     */
    public function getSupportedFeatures(): SupportedFeature
    {
        return $this->supportedFeatures;
    }

    /**
     * @param SupportedFeature $supportedFeatures
     * @return Model
     */
    public function setSupportedFeatures(SupportedFeature $supportedFeatures): Model
    {
        $this->supportedFeatures = $supportedFeatures;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Model
     */
    public function setDescription(string $description): Model
    {
        $this->description = $description;
        return $this;
    }
}
