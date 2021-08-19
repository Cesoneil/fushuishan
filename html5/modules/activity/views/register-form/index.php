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
        display: block;
        width: 33.33%;
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
        background-color: #f4f4f4;
        text-align: center;
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
    .agree{  font-size: 12px;  }
    .field-member-gender{
        width: 15%;  float: left;
    }
    .field-member-mobile{
        width: 65%;  float: left;
    }
    .self-mobile {
        width: 35%;  float: right;  line-height: 65px
    }

    .box-header{
        background-color: #f1f1f1;height: 30px;line-height: 30px;padding-left: 15px;
    }
    .focus-info {
        color: red;
    }
    .total-human{
        font-size: 14px;
    }
    .operator{
        line-height: 24px;
    }
    .auto-mobile{
        line-height: 36px;
    }
</style>
<div class="position-ref full-height">
    <div class="content">
        <a href="#form">
            <img class="user-image head_portrait" src="<?php echo \yii\helpers\Url::to('@web/resources/img/head_img.jpg');?>"/>
        </a>
        <div class="box-header">
            <span class="header-left">
                <i class="fa fa-xxx">🔉</i>
                <span> <span style="color: red;">北京 陈** 178****8032</span> 已领取</span>
            </span>
            <span class="header-right"> |
                <i class="fa fa-xxx">🚩</i>
                <span>已有<span class="total-human focus-info">8532</span>人领取</span>
            </span>
        </div>
        <div id="form" class="box">
            <?php $form = ActiveForm::begin([
                'id' => 'registerNK-form'
            ]); ?>
            <div class="box-body">
                <?= $form->field($model, 'realname')->textInput() ?>
                <?= $form->field($model, 'mobile')->textInput() ?>
                <div class="self-mobile"><span><i>o</i><span class="info-state">使用本机号码</s></span></div>
                <span class="agree operator">使用本机号码即为同意
                    <span class="info-state">
                        <span class="move">《中国移动服务条款》</span>
                        <span class="unicom" hidden>《中国联通服务条款》</span>
                        <span class="telecom" hidden>《中国电信服务条款》</span>
                    </span>
                </span>
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
                <span class="agree auto-mobile" style="line-height: 36px">自动输入历史手机号 <span class="info-state">《个人信息授权与保护声明》</span></span>
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