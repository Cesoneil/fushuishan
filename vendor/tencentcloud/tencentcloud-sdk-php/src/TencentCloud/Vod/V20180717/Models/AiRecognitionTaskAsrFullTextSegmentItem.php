<?php
/*
 * Copyright (c) 2017-2018 THL A29 Limited, a Tencent company. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace TencentCloud\Vod\V20180717\Models;
use TencentCloud\Common\AbstractModel;

/**
 * @method float getConfidence() 获取识别片段置信度。取值：0~100。
 * @method void setConfidence(float $Confidence) 设置识别片段置信度。取值：0~100。
 * @method float getStartTimeOffset() 获取识别片段起始的偏移时间，单位：秒。
 * @method void setStartTimeOffset(float $StartTimeOffset) 设置识别片段起始的偏移时间，单位：秒。
 * @method float getEndTimeOffset() 获取识别片段终止的偏移时间，单位：秒。
 * @method void setEndTimeOffset(float $EndTimeOffset) 设置识别片段终止的偏移时间，单位：秒。
 * @method string getText() 获取识别文本。
 * @method void setText(string $Text) 设置识别文本。
 */

/**
 *语音全文识别片段。
 */
class AiRecognitionTaskAsrFullTextSegmentItem extends AbstractModel
{
    /**
     * @var float 识别片段置信度。取值：0~100。
     */
    public $Confidence;

    /**
     * @var float 识别片段起始的偏移时间，单位：秒。
     */
    public $StartTimeOffset;

    /**
     * @var float 识别片段终止的偏移时间，单位：秒。
     */
    public $EndTimeOffset;

    /**
     * @var string 识别文本。
     */
    public $Text;
    /**
     * @param float $Confidence 识别片段置信度。取值：0~100。
     * @param float $StartTimeOffset 识别片段起始的偏移时间，单位：秒。
     * @param float $EndTimeOffset 识别片段终止的偏移时间，单位：秒。
     * @param string $Text 识别文本。
     */
    function __construct()
    {

    }
    /**
     * 内部实现，用户禁止调用
     */
    public function deserialize($param)
    {
        if ($param === null) {
            return;
        }
        if (array_key_exists("Confidence",$param) and $param["Confidence"] !== null) {
            $this->Confidence = $param["Confidence"];
        }

        if (array_key_exists("StartTimeOffset",$param) and $param["StartTimeOffset"] !== null) {
            $this->StartTimeOffset = $param["StartTimeOffset"];
        }

        if (array_key_exists("EndTimeOffset",$param) and $param["EndTimeOffset"] !== null) {
            $this->EndTimeOffset = $param["EndTimeOffset"];
        }

        if (array_key_exists("Text",$param) and $param["Text"] !== null) {
            $this->Text = $param["Text"];
        }
    }
}
