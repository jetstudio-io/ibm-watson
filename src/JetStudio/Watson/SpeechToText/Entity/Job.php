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
 * Date: 02/04/2020
 */

declare(strict_types=1);

namespace JetStudio\Watson\SpeechToText\Entity;

class Job
{
    /**
     * The identifier of the model that is to be used for the recognition request.
     * See Languages and models. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-models#models
     * @var string
     */
    private string $model = Model::DEFAULT_MODEL;

    /**
     * @var CallbackUrl|null
     */
    private ?CallbackUrl $callBackUrl = null;

    /**
     * If the job includes a callback URL, a comma-separated list of notification events to which to subscribe.
     * Valid events are:
     * - recognitions.started :
     *          generates a callback notification when the service begins to process the job.
     * - recognitions.completed :
     *          generates a callback notification when the job is complete.
     *          You must use the Check a job method to retrieve the results before they time out or are deleted.
     * - recognitions.completed_with_results :
     *          generates a callback notification when the job is complete.
     *          The notification includes the results of the request.
     * - recognitions.failed :
     *          generates a callback notification
     *          if the service experiences an error while processing the job.
     *
     * The recognitions.completed and recognitions.completed_with_results events are incompatible.
     * You can specify only of the two events. If the job includes a callback URL,
     * omit the parameter to subscribe to the default events: recognitions.started, recognitions.completed,
     * and recognitions.failed. If the job does not include a callback URL, omit the parameter.
     *
     * Allowable values:
     * [recognitions.started,recognitions.completed,recognitions.completed_with_results,recognitions.failed]
     *
     * @var string[]
     */
    private array $events = [];

    /**
     * The number of minutes for which the results are to be available after the job has finished.
     * If not delivered via a callback, the results must be retrieved within this time.
     * Omit the parameter to use a time to live of one week. The parameter is valid with or without a callback URL.
     *
     * @var int
     */
    private int $resultsTtl = 0;

    /**
     * The customization ID (GUID) of a custom language model that is to be used with the recognition request.
     * The base model of the specified custom language model must match the model specified with the model parameter.
     * You must make the request with credentials for the instance of the service that owns the custom model.
     * By default, no custom language model is used.
     * See Custom models. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-input#custom-input
     * Note: Use this parameter instead of the deprecated customization_id parameter.
     *
     * @var string
     */
    private string $languageCustomizationId = '';

    /**
     * The customization ID (GUID) of a custom acoustic model that is to be used with the recognition request.
     * The base model of the specified custom acoustic model must match the model specified with the model parameter.
     * You must make the request with credentials for the instance of the service that owns the custom model.
     * By default, no custom acoustic model is used.
     * See Custom models. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-input#custom-input
     *
     * @var string
     */
    private string $acousticCustomizationId = '';

    /**
     * The version of the specified base model that is to be used with the recognition request.
     * Multiple versions of a base model can exist when a model is updated for internal improvements.
     * The parameter is intended primarily for use with custom models that have been upgraded for a new base model.
     * The default value depends on whether the parameter is used with or without a custom model.
     * See Base model version. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-input#version
     *
     * @var string
     */
    private string $baseModelVersion = '';

    /**
     * If you specify the customization ID (GUID) of a custom language model with the recognition request,
     * the customization weight tells the service how much weight to give to words
     * from the custom language model compared to those from the base model for the current request.
     * Specify a value between 0.0 and 1.0. Unless a different customization weight was specified
     * for the custom model when it was trained, the default value is 0.3.
     * A customization weight that you specify overrides a weight that was specified when the custom model was trained.
     * The default value yields the best performance in general. Assign a higher value
     * if your audio makes frequent use of OOV words from the custom model.
     * Use caution when setting the weight: a higher value can improve the accuracy of phrases
     * from the custom model's domain, but it can negatively affect performance on non-domain phrases.
     * See Custom models. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-input#custom-input
     *
     * @var string
     */
    private string $customizationWeight = '';

    /**
     * The time in seconds after which, if only silence (no speech) is detected in streaming audio,
     * the connection is closed with a 400 error. The parameter is useful for stopping audio submission
     * from a live microphone when a user simply walks away. Use -1 for infinity.
     * See Inactivity timeout. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-input#timeouts-inactivity
     * Default: 30
     *
     * @var int
     */
    private int $inactivityTimeout = 30;

    /**
     * An array of keyword strings to spot in the audio. Each keyword string can include one or more string tokens.
     * Keywords are spotted only in the final results, not in interim hypotheses. If you specify any keywords,
     * you must also specify a keywords threshold. Omit the parameter or specify an empty array
     * if you do not need to spot keywords. You can spot a maximum of 1000 keywords with a single request.
     * A single keyword can have a maximum length of 1024 characters, though the maximum effective length
     * for double-byte languages might be shorter. Keywords are case-insensitive.
     * See Keyword spotting. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-output#keyword_spotting
     *
     * @var string[]
     */
    private array $keywords = [];

    /**
     * A confidence value that is the lower bound for spotting a keyword. A word is considered to match a keyword
     * if its confidence is greater than or equal to the threshold. Specify a probability between 0.0 and 1.0.
     * If you specify a threshold, you must also specify one or more keywords.
     * The service performs no keyword spotting if you omit either parameter.
     * See Keyword spotting. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-output#keyword_spotting
     *
     * @var float
     */
    private float $keywordsThreshold = 0.0;

    /**
     * The maximum number of alternative transcripts that the service is to return.
     * By default, the service returns a single transcript.
     * If you specify a value of 0, the service uses the default value, 1.
     * See Maximum alternatives. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-output#max_alternatives
     * Default: 1
     *
     * @var int
     */
    private int $maxAlternatives = 1;

    /**
     * A confidence value that is the lower bound for identifying a hypothesis as a possible word alternative
     * (also known as "Confusion Networks"). An alternative word is considered
     * if its confidence is greater than or equal to the threshold.
     * Specify a probability between 0.0 and 1.0.
     * By default, the service computes no alternative words.
     * See Word alternatives. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-output#word_alternatives
     *
     * @var float|null
     */
    private ?float $wordAlternativesThreshold = null;

    /**
     * If true, the service returns a confidence measure in the range of 0.0 to 1.0 for each word.
     * By default, the service returns no word confidence scores.
     * See Word confidence. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-output#word_confidence
     * Default: false
     *
     * @var bool
     */
    private bool $wordConfidence = false;

    /**
     * If true, the service returns time alignment for each word. By default, no timestamps are returned.
     * See Word timestamps. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-output#word_timestamps
     * Default: false
     *
     * @var bool
     */
    private bool $timestamps = false;

    /**
     * If true, the service filters profanity from all output except for keyword results
     * by replacing inappropriate words with a series of asterisks.
     * Set the parameter to false to return results with no censoring.
     * Applies to US English transcription only.
     * See Profanity filtering. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-output#profanity_filter
     * Default: true
     *
     * @var bool
     */
    private bool $profanityFilter = false;

    /**
     * If true, the service converts dates, times, series of digits and numbers, phone numbers, currency values,
     * and internet addresses into more readable, conventional representations
     * in the final transcript of a recognition request.
     * For US English, the service also converts certain keyword strings to punctuation symbols.
     * By default, the service performs no smart formatting.
     * Note: Applies to US English, Japanese, and Spanish transcription only.
     * See Smart formatting. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-output#smart_formatting
     * Default: false
     *
     * @var bool
     */
    private bool $smartFormatting = false;

    /**
     * If true, the response includes labels that identify which words were spoken
     * by which participants in a multi-person exchange. By default, the service returns no speaker labels.
     * Setting speaker_labels to true forces the timestamps parameter to be true,
     * regardless of whether you specify false for the parameter.
     * Note: Applies to US English, German, Japanese, Korean, and Spanish (both broadband and narrowband models)
     * and UK English (narrowband model) transcription only.
     * To determine whether a language model supports speaker labels,
     * you can also use the Get a model method and check that the attribute speaker_labels is set to true.
     * See Speaker labels. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-output#speaker_labels
     * Default: false
     *
     * @var bool
     */
    private bool $speakerLabels = false;

    /**
     * The name of a grammar that is to be used with the recognition request.
     * If you specify a grammar, you must also use the language_customization_id parameter
     * to specify the name of the custom language model for which the grammar is defined.
     * The service recognizes only strings that are recognized by the specified grammar;
     * it does not recognize other custom words from the model's words resource.
     * See Grammars. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-input#grammars-input
     *
     * @var string
     */
    private string $grammarName = '';

    /**
     * If true, the service redacts, or masks, numeric data from final transcripts.
     * The feature redacts any number that has three or more consecutive digits
     * by replacing each digit with an X character. It is intended to redact sensitive numeric data,
     * such as credit card numbers. By default, the service performs no redaction.
     * When you enable redaction, the service automatically enables smart formatting,
     * regardless of whether you explicitly disable that feature. To ensure maximum security,
     * the service also disables keyword spotting (ignores the keywords and keywords_threshold parameters)
     * and returns only a single final transcript (forces the max_alternatives parameter to be 1).
     * Note: Applies to US English, Japanese, and Korean transcription only.
     * See Numeric redaction. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-output#redaction
     * Default: false
     *
     * @var bool
     */
    private bool $redaction = false;

    /**
     * If true, requests processing metrics about the service's transcription of the input audio.
     * The service returns processing metrics at the interval specified by the processing_metrics_interval parameter.
     * It also returns processing metrics for transcription events, for example, for final and interim results.
     * By default, the service returns no processing metrics.
     * See Processing metrics. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-metrics#processing_metrics
     * Default: false
     *
     * @var bool
     */
    private bool $processingMetrics = false;

    /**
     * Specifies the interval in real wall-clock seconds at which the service is to return processing metrics.
     * The parameter is ignored unless the processing_metrics parameter is set to true.
     * The parameter accepts a minimum value of 0.1 seconds. The level of precision is not restricted,
     * so you can specify values such as 0.25 and 0.125. The service does not impose a maximum value.
     * If you want to receive processing metrics only for transcription events instead of at periodic intervals,
     * set the value to a large number. If the value is larger than the duration of the audio,
     * the service returns processing metrics only for transcription events.
     * See Processing metrics. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-metrics#processing_metrics
     * Default: 1
     *
     * @var int
     */
    private int $processingMetricsInterval = 1;

    /**
     * If true, requests detailed information about the signal characteristics of the input audio.
     * The service returns audio metrics with the final transcription results.
     * By default, the service returns no audio metrics.
     * See Audio metrics. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-metrics#audio_metrics
     * Default: false
     *
     * @var bool
     */
    private bool $audioMetrics = false;

    /**
     * If true, specifies the duration of the pause interval at which the service splits a transcript
     * into multiple final results. If the service detects pauses or extended silence
     * before it reaches the end of the audio stream, its response can include multiple final results.
     * Silence indicates a point at which the speaker pauses between spoken words or phrases.
     * Specify a value for the pause interval in the range of 0.0 to 120.0.
     * A value greater than 0 specifies the interval that the service is to use for speech recognition.
     * A value of 0 indicates that the service is to use the default interval.
     * It is equivalent to omitting the parameter. The default pause interval for most languages is 0.8 seconds;
     * the default for Chinese is 0.6 seconds.
     * See End of phrase silence time https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-output#silence_time
     * Default: 0.8
     *
     * @var float
     */
    private float $endOfPhraseSilenceTime = 0.8;

    /**
     * If true, directs the service to split the transcript into multiple final results based on
     * semantic features of the input, for example, at the conclusion of meaningful phrases such as sentences.
     * The service bases its understanding of semantic features on the base language model that you use with a request.
     * Custom language models and grammars can also influence how and where the service splits a transcript.
     * By default, the service splits transcripts based solely on the pause interval.
     * See Split transcript at phrase end.
     * https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-output#split_transcript
     * Default: false
     *
     * @var bool
     */
    private bool $splitTranscriptAtPhraseEnd = false;

    /**
     * The sensitivity of speech activity detection that the service is to perform.
     * Use the parameter to suppress word insertions from music, coughing, and other non-speech events.
     * The service biases the audio it passes for speech recognition
     * by evaluating the input audio against prior models of speech and non-speech activity.
     * Specify a value between 0.0 and 1.0:
     *      0.0 suppresses all audio (no speech is transcribed).
     *      0.5 (the default) provides a reasonable compromise for the level of sensitivity.
     *      1.0 suppresses no audio (speech detection sensitivity is disabled).
     * The values increase on a monotonic curve.
     * See Speech Activity Detection. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-input#detection
     * Default: 0.5
     *
     * @var float
     */
    private float $speechDetectorSensitivity = 0.5;

    /**
     * The level to which the service is to suppress background audio based on its volume
     * to prevent it from being transcribed as speech.
     * Use the parameter to suppress side conversations or background noise.
     * Specify a value in the range of 0.0 to 1.0:
     *      0.0 (the default) provides no suppression (background audio suppression is disabled).
     *      0.5 provides a reasonable level of audio suppression for general usage.
     *      1.0 suppresses all audio (no audio is transcribed).
     * The values increase on a monotonic curve.
     * See Speech Activity Detection. https://cloud.ibm.com/docs/speech-to-text?topic=speech-to-text-input#detection
     * Default: 0
     *
     * @var float
     */
    private float $backgroundAudioSuppression = 0.0;

    /**
     * File name (full path) which is used to create a job
     * @var string
     */
    private string $fileName = '';

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     * @return Job
     */
    public function setModel(string $model): Job
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return CallbackUrl|null
     */
    public function getCallBackUrl(): ?CallbackUrl
    {
        return $this->callBackUrl;
    }

    /**
     * @param CallbackUrl|null $callBackUrl
     * @return Job
     */
    public function setCallBackUrl(?CallbackUrl $callBackUrl): Job
    {
        $this->callBackUrl = $callBackUrl;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }

    /**
     * @param string[] $events
     * @return Job
     */
    public function setEvents(array $events): Job
    {
        $this->events = $events;
        return $this;
    }

    /**
     * @return int
     */
    public function getResultsTtl(): int
    {
        return $this->resultsTtl;
    }

    /**
     * @param int $resultsTtl
     * @return Job
     */
    public function setResultsTtl(int $resultsTtl): Job
    {
        $this->resultsTtl = $resultsTtl;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguageCustomizationId(): string
    {
        return $this->languageCustomizationId;
    }

    /**
     * @param string $languageCustomizationId
     * @return Job
     */
    public function setLanguageCustomizationId(string $languageCustomizationId): Job
    {
        $this->languageCustomizationId = $languageCustomizationId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAcousticCustomizationId(): string
    {
        return $this->acousticCustomizationId;
    }

    /**
     * @param string $acousticCustomizationId
     * @return Job
     */
    public function setAcousticCustomizationId(string $acousticCustomizationId): Job
    {
        $this->acousticCustomizationId = $acousticCustomizationId;
        return $this;
    }

    /**
     * @return string
     */
    public function getBaseModelVersion(): string
    {
        return $this->baseModelVersion;
    }

    /**
     * @param string $baseModelVersion
     * @return Job
     */
    public function setBaseModelVersion(string $baseModelVersion): Job
    {
        $this->baseModelVersion = $baseModelVersion;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomizationWeight(): string
    {
        return $this->customizationWeight;
    }

    /**
     * @param string $customizationWeight
     * @return Job
     */
    public function setCustomizationWeight(string $customizationWeight): Job
    {
        $this->customizationWeight = $customizationWeight;
        return $this;
    }

    /**
     * @return int
     */
    public function getInactivityTimeout(): int
    {
        return $this->inactivityTimeout;
    }

    /**
     * @param int $inactivityTimeout
     * @return Job
     */
    public function setInactivityTimeout(int $inactivityTimeout): Job
    {
        $this->inactivityTimeout = $inactivityTimeout;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * @param string[] $keywords
     * @return Job
     */
    public function setKeywords(array $keywords): Job
    {
        $this->keywords = $keywords;
        return $this;
    }

    /**
     * @return float
     */
    public function getKeywordsThreshold(): float
    {
        return $this->keywordsThreshold;
    }

    /**
     * @param float $keywordsThreshold
     * @return Job
     */
    public function setKeywordsThreshold(float $keywordsThreshold): Job
    {
        $this->keywordsThreshold = $keywordsThreshold;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxAlternatives(): int
    {
        return $this->maxAlternatives;
    }

    /**
     * @param int $maxAlternatives
     * @return Job
     */
    public function setMaxAlternatives(int $maxAlternatives): Job
    {
        $this->maxAlternatives = $maxAlternatives;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getWordAlternativesThreshold(): ?float
    {
        return $this->wordAlternativesThreshold;
    }

    /**
     * @param float|null $wordAlternativesThreshold
     * @return Job
     */
    public function setWordAlternativesThreshold(?float $wordAlternativesThreshold): Job
    {
        $this->wordAlternativesThreshold = $wordAlternativesThreshold;
        return $this;
    }

    /**
     * @return bool
     */
    public function isWordConfidence(): bool
    {
        return $this->wordConfidence;
    }

    /**
     * @param bool $wordConfidence
     * @return Job
     */
    public function setWordConfidence(bool $wordConfidence): Job
    {
        $this->wordConfidence = $wordConfidence;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTimestamps(): bool
    {
        return $this->timestamps;
    }

    /**
     * @param bool $timestamps
     * @return Job
     */
    public function setTimestamps(bool $timestamps): Job
    {
        $this->timestamps = $timestamps;
        return $this;
    }

    /**
     * @return bool
     */
    public function isProfanityFilter(): bool
    {
        return $this->profanityFilter;
    }

    /**
     * @param bool $profanityFilter
     * @return Job
     */
    public function setProfanityFilter(bool $profanityFilter): Job
    {
        $this->profanityFilter = $profanityFilter;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSmartFormatting(): bool
    {
        return $this->smartFormatting;
    }

    /**
     * @param bool $smartFormatting
     * @return Job
     */
    public function setSmartFormatting(bool $smartFormatting): Job
    {
        $this->smartFormatting = $smartFormatting;
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
     * @return Job
     */
    public function setSpeakerLabels(bool $speakerLabels): Job
    {
        $this->speakerLabels = $speakerLabels;
        return $this;
    }

    /**
     * @return string
     */
    public function getGrammarName(): string
    {
        return $this->grammarName;
    }

    /**
     * @param string $grammarName
     * @return Job
     */
    public function setGrammarName(string $grammarName): Job
    {
        $this->grammarName = $grammarName;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRedaction(): bool
    {
        return $this->redaction;
    }

    /**
     * @param bool $redaction
     * @return Job
     */
    public function setRedaction(bool $redaction): Job
    {
        $this->redaction = $redaction;
        return $this;
    }

    /**
     * @return bool
     */
    public function isProcessingMetrics(): bool
    {
        return $this->processingMetrics;
    }

    /**
     * @param bool $processingMetrics
     * @return Job
     */
    public function setProcessingMetrics(bool $processingMetrics): Job
    {
        $this->processingMetrics = $processingMetrics;
        return $this;
    }

    /**
     * @return int
     */
    public function getProcessingMetricsInterval(): int
    {
        return $this->processingMetricsInterval;
    }

    /**
     * @param int $processingMetricsInterval
     * @return Job
     */
    public function setProcessingMetricsInterval(int $processingMetricsInterval): Job
    {
        $this->processingMetricsInterval = $processingMetricsInterval;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAudioMetrics(): bool
    {
        return $this->audioMetrics;
    }

    /**
     * @param bool $audioMetrics
     * @return Job
     */
    public function setAudioMetrics(bool $audioMetrics): Job
    {
        $this->audioMetrics = $audioMetrics;
        return $this;
    }

    /**
     * @return float
     */
    public function getEndOfPhraseSilenceTime(): float
    {
        return $this->endOfPhraseSilenceTime;
    }

    /**
     * @param float $endOfPhraseSilenceTime
     * @return Job
     */
    public function setEndOfPhraseSilenceTime(float $endOfPhraseSilenceTime): Job
    {
        $this->endOfPhraseSilenceTime = $endOfPhraseSilenceTime;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSplitTranscriptAtPhraseEnd(): bool
    {
        return $this->splitTranscriptAtPhraseEnd;
    }

    /**
     * @param bool $splitTranscriptAtPhraseEnd
     * @return Job
     */
    public function setSplitTranscriptAtPhraseEnd(bool $splitTranscriptAtPhraseEnd): Job
    {
        $this->splitTranscriptAtPhraseEnd = $splitTranscriptAtPhraseEnd;
        return $this;
    }

    /**
     * @return float
     */
    public function getSpeechDetectorSensitivity(): float
    {
        return $this->speechDetectorSensitivity;
    }

    /**
     * @param float $speechDetectorSensitivity
     * @return Job
     */
    public function setSpeechDetectorSensitivity(float $speechDetectorSensitivity): Job
    {
        $this->speechDetectorSensitivity = $speechDetectorSensitivity;
        return $this;
    }

    /**
     * @return float
     */
    public function getBackgroundAudioSuppression(): float
    {
        return $this->backgroundAudioSuppression;
    }

    /**
     * @param float $backgroundAudioSuppression
     * @return Job
     */
    public function setBackgroundAudioSuppression(float $backgroundAudioSuppression): Job
    {
        $this->backgroundAudioSuppression = $backgroundAudioSuppression;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return Job
     */
    public function setFileName(string $fileName): Job
    {
        $this->fileName = $fileName;
        return $this;
    }
}
