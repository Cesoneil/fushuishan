<?php

//* @var $form yii\bootstrap\ActiveForm */
$this->title = '【限时免费体验】解决 男性阳痿、早泄、勃起无力等问题，延长性爱时间、增大增粗--选择知缘堂';
//标题部分可以更改
use yii\bootstrap\ActiveForm;
use html5\assets\AppAsset;
AppAsset::register($this);
?>
<style>
    .has-success .form-control {
        border-color: #ccc;
    }
     .has-success .control-label {
        color: #76838f;
     }
     label{
         font-weight:300;
     }
     .form-control{
        color: #000000;
         font-size: 14px;
         font-weight: 400;
     }
    .content{
        z-index: 1;
        padding-bottom: 0px;
    }
    .form-group {
        margin: -3px auto;
    }
    .row > .col-lg-4 {
        width: 33.33%;
        float: left;
    }
    .user-image{
        width: 100%;
    }
    .box{
        margin: 10px 15px;
        text-align: left;
    }
    .info-state{
        color: #4e9fe4;
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
        z-index: 2;
    }
    .agree{  font-size: 12px; font-weight: 300; }
    .field-member-gender{
        width: 15%;  float: left;
    }
    .box-header{
        background-color: #f1f1f1;height: 30px;line-height: 30px;padding-left: 10px;
    }
    .focus-info {
        color: red;
    }
    .total-human{
        font-size: 14px;
        font-weight: 500;
    }
    .operator{
        line-height: 24px;
        width: 100%;
    }
    .auto-mobile{
        line-height: 36px;
    }
    .call{
        width: 50px;
        height: 50px;
        border-radius:50px ;
        border:solid red 1px;
        z-index:3;
        position: fixed;
        right: 5px;
        bottom: 80px;
    }
    .btn-submit {
        background-color:#4e9fe4; width: 80%;padding: 40px auto;letter-spacing:5px;font-size: 20px;font-weight: 400;
        border-radius: 10px;
    }
    .row{
       height: 66px;
    }
</style>
<div class="">
    <div class="content">
        <a href="#form">
            <img class="user-image" src="<?php echo \yii\helpers\Url::to('@web/resources/img/head_img.jpg');?>"/>
        </a>
        <div class="box-header">
            <span class="header-left">
                <i class="fa fa-xxx">🔉</i>
                <span><span class="focus-info">北京 陈** 178****8032</span> 已领取</span>
            </span>
            <span class="header-right"> |
                <i class="fa fa-xxx">🚩</i>
                <span>已有<span class="total-human focus-info">8532</span>人领取</span>
            </span>
        </div>
        <div id="form" class="box">
            <?php $form = ActiveForm::begin(['id' => 'register-form']); ?>
            <div class="box-body">
                <?= $form->field($model, 'realname')->textInput() ?>
                <?= $form->field($model, 'mobile')->textInput() ?>
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
                <span class="agree auto-mobile">自动输入历史手机号<span class="info-state">《个人信息授权与保护声明》</span></span>
            </div>
            <div class="box-footer text-center">
                <button class="btn btn-submit btn-primary" type="submit">立即领取</button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <a href="#form">
            <img class="user-image" src="<?php echo \yii\helpers\Url::to('@web/resources/img/zhucedan_bg.jpg');?>"/>
        </a>
        <!--   platform_support -->
        <div class="support">优瑞建站提供技术支持</div>
    </div>
<!--    这里提供是否可以展示或者不展示处理 ,如果不展示需要把.content对底部的padding的50像素取消-->
    <div class="agreement agree">提交即视为您已阅读并同意<span class="info-state">《个人信息保护声明》</span></div>
    <div class="call">电话</div>
<!--    共有7个弹窗，1个运营商服务条款 1个手机验证码，1个提交成功弹窗，1个商户用的信息申明弹窗 1个官方使用信息申明弹窗 1个电话弹窗，再加一个异常弹窗-->
</div>