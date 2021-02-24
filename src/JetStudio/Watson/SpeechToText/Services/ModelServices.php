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

namespace JetStudio\Watson\SpeechToText\Services;

use JetStudio\Watson\SpeechToText\Entity\Model;

class ModelServices extends BaseService
{
    /**
     * @var string
     */
    protected string $serviceUri = 'v1/models';

    /**
     * @return Model[]
     */
    public function getModels(): array
    {
        $res = $this->get();
        $models = [];
        if (!empty($res) && isset($res['models'])) {
            foreach ($res['models'] as $dataArray) {
                $json = json_encode($dataArray);
                if ($json) {
                    /** @var Model $model */
                    $model = $this->serializer->deserialize($json, Model::class, 'json');
                    $models[] = $model;
                }
            }
        }

        return $models;
    }

    /**
     * @param string $modelId
     * @return Model|null
     */
    public function getModel(string $modelId): ?Model
    {
        // Change service uri to get a model info
        $oldUrl = $this->serviceUri;
        $this->serviceUri = 'v1/models/' . $modelId;
        $res = $this->get();
        if (empty($res)) {
            // Roll back service uri
            $this->serviceUri = $oldUrl;
            return null;
        }
        $json = json_encode($res);
        if ($json) {
            /** @var Model $model */
            $model = $this->serializer->deserialize($json, Model::class, 'json');
            return $model;
        } else {
            return null;
        }
    }
}
