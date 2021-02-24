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

class SpeechRecognitionResult
{
    /**
     * An indication of whether the transcription results are final.
     * If true, the results for this utterance are not updated further;
     * no additional results are sent for a result_index once its results are indicated as final.
     *
     * @Serializer\Type("boolean")
     * @var bool
     */
    private bool $final = false;

    /**
     * An array of alternative transcripts.
     * The alternatives array can include additional requested output such as word confidence or timestamps.
     *
     * @Serializer\Type("array<JetStudio\Watson\SpeechToText\Entity\RecognitionResult\SpeechRecognitionAlternative>")
     * @var SpeechRecognitionAlternative[]
     */
    private array $alternatives = [];

    /**
     * A dictionary (or associative array) whose keys are the strings specified for keywords
     * if both that parameter and keywords_threshold are specified.
     * The value for each key is an array of matches spotted in the audio for that keyword.
     * Each match is described by a KeywordResult object.
     * A keyword for which no matches are found is omitted from the dictionary.
     * The dictionary is omitted entirely if no matches are found for any keywords.
     *
     * @Serializer\Type("array")
     * @var array
     */
    private array $keywordsResult = [];

    /**
     * An array of alternative hypotheses found for words of the input audio
     * if a word_alternatives_threshold is specified.
     *
     * @Serializer\Type("array<JetStudio\Watson\SpeechToText\Entity\RecognitionResult\WordAlternativeResults>")
     * @var WordAlternativeResults[]|null
     */
    private ?array $wordAlternatives = null;

    /**
     * If the split_transcript_at_phrase_end parameter is true, describes the reason for the split:
     * - end_of_data - The end of the input audio stream.
     * - full_stop - A full semantic stop, such as for the conclusion of a grammatical sentence.
     *   The insertion of splits is influenced by the base language model
     *   and biased by custom language models and grammars.
     * - reset - The amount of audio that is currently being processed exceeds the two-minute maximum.
     *   The service splits the transcript to avoid excessive memory use.
     * - silence - A pause or silence that is at least as long as the pause interval.
     * Possible values: [end_of_data, full_stop, reset, silence]
     *
     * @Serializer\Type("string")
     * @var string|null
     */
    private ?string $endOfUtterance = null;

    /**
     * @return bool
     */
    public function isFinal(): bool
    {
        return $this->final;
    }

    /**
     * @param bool $final
     * @return SpeechRecognitionResult
     */
    public function setFinal(bool $final): SpeechRecognitionResult
    {
        $this->final = $final;
        return $this;
    }

    /**
     * @return SpeechRecognitionAlternative[]
     */
    public function getAlternatives(): array
    {
        return $this->alternatives;
    }

    /**
     * @param SpeechRecognitionAlternative[] $alternatives
     * @return SpeechRecognitionResult
     */
    public function setAlternatives(array $alternatives): SpeechRecognitionResult
    {
        $this->alternatives = $alternatives;
        return $this;
    }

    /**
     * @return array
     */
    public function getKeywordsResult(): array
    {
        return $this->keywordsResult;
    }

    /**
     * @param array $keywordsResult
     * @return SpeechRecognitionResult
     */
    public function setKeywordsResult(array $keywordsResult): SpeechRecognitionResult
    {
        $this->keywordsResult = $keywordsResult;
        return $this;
    }

    /**
     * @return WordAlternativeResults[]|null
     */
    public function getWordAlternatives(): ?array
    {
        return $this->wordAlternatives;
    }

    /**
     * @param WordAlternativeResults[]|null $wordAlternatives
     * @return SpeechRecognitionResult
     */
    public function setWordAlternatives(?array $wordAlternatives): SpeechRecognitionResult
    {
        $this->wordAlternatives = $wordAlternatives;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEndOfUtterance(): ?string
    {
        return $this->endOfUtterance;
    }

    /**
     * @param string|null $endOfUtterance
     * @return SpeechRecognitionResult
     */
    public function setEndOfUtterance(?string $endOfUtterance): SpeechRecognitionResult
    {
        $this->endOfUtterance = $endOfUtterance;
        return $this;
    }
}
