<?php

//* @var $form yii\bootstrap\ActiveForm */
$this->title = '【限时免费体验】解决 男性阳痿、早泄、勃起无力等问题，延长性爱时间、增大增粗--选择知缘堂';

use yii\bootstrap\ActiveForm;
use html5\assets\AppAsset;


AppAsset::register($this);
?>
<style>
    .content{
        z-index: 1;
        padding-bottom: 50px;
    }
    .form-group {
        text-align: left;
        margin: -2px auto;
    }
    .row > .col-lg-4 {
        width: 33.333%;
        float: left;
    }
    .user-image{
        width: 100%;
    }
    .box{
        margin: 10px 15px;
    }
    .info-state{
        color: blue;
    }
    .support{
        font-size: 12px;
        line-height: 30px;
        background-color: #f4f4f4;;
    }
    .agreement{
        width:100%;
        text-align: center;
        background-color: #f4f4f4;
        line-height: 50px;
        position: fixed;
        bottom: 0px;
        z-index: 99;
        display: block;
    }
    .agree{
        font-size: 12px;
    }
    .field-member-gender{
        width: 15%;
        float: left;
    }
    .field-member-mobile{
        width: 65%;
        float: left;
      }
    .self-mobile {
        width: 35%;
        line-height: 69px;
        float: right;
    }
</style>
<div class="position-ref full-height">
    <div class="content">
        <a href="#form">
            <img class="user-image head_portrait" src="<?php echo \yii\helpers\Url::to('@web/resources/img/head_img.jpg');?>"/>
        </a>
        <div class="box-header" style="  background-color: #f1f1f1;height: 30px;line-height: 30px">
            <div class="header-left" style="float: left; width: 60%;">
                <i class="fa fa-circle text-success">🎺</i>
                <span> <span style="color: red;font-size: 14px">北京 陈* 178 **** 8032</span> 已领取</span>
            </div>
            <div class="header-right" style="float: right;width: 40%;font-size: 12px;border-left: solid #fff;">
                <i class="fa fa-circle text-success">🚩</i>
                <span>目前已有<span class="total-human" style="font-size: 14px;color: red;">532</span>人成功领取</span>
            </div>
        </div>
        <div id="form" class="box">
            <?php $form = ActiveForm::begin([
                'id' => 'registerNK-form'
            ]); ?>
            <div class="box-body">
                <?= $form->field($model, 'realname')->textInput() ?>
                <?= $form->field($model, 'mobile')->textInput() ?>
                <div class="self-mobile"><span><i>o</i><span class="info-state">使用本机号码</s></span></div>
                <div style="padding:2px; text-align: left;">
                    <span class="agree">
                        使用本机号码即为同意
                        <span class="info-state">
                            <span class="move">《中国移动服务条款》</span>
                            <span class="unicom" hidden>《中国联通服务条款》</span>
                            <span class="telecom" hidden>《中国电信服务条款》</span>
                        </span>
                </div>
                <?= \common\widgets\provinces\Provinces::widget([
                    'form' => $form,
                    'model' => $model,
                    'template' => 'short',
                    'provincesName' => 'province_id',// 省字段名
                    'cityName' => 'city_id',// 市字段名
                    'areaName' => 'area_id',// 区字段名
                ]); ?>
                <?= $form->field($model, 'address')->textarea() ?>
                <?= $form->field($model, 'gender')->checkbox() ?>
                <div style="line-height: 40px; text-align: right;width: 85%">
                    <span class="agree">自动输入历史手机号 <span class="info-state">《个人信息授权与保护声明》</span></span>
                </div>
            </div>
            <div class="box-footer text-center">
                <button style="background-color:#4e9fe4;width: 80%;padding: 40px auto;letter-spacing:5px;font-size: 20px;font-weight: 400" class="btn btn-primary" type="submit">立即提交</button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <a href="#form">
            <img class="user-image head_portrait" src="<?php echo \yii\helpers\Url::to('@web/resources/img/zhucedan_bg.jpg');?>"/>
        </a>
        <div class="support">优瑞建站仅向商家提供技术支持</div>
    </div>
    <div class="agreement agree">提交即视为您已阅读并同意<span class="info-state"><<个人信息保护声明>></span></div>
    <div hidden>
        成功弹窗，并且产生邀请码。深度挖掘
    </div>
</div>