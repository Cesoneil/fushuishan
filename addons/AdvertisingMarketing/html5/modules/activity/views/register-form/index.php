<?php

//* @var $form yii\bootstrap\ActiveForm */
$this->title = '【限时免费体验】解决 男性阳痿、早泄、勃起无力等问题，延长性爱时间、增大增粗--选择知缘堂';
//标题部分可以更改
use yii\bootstrap\ActiveForm;
?>

<div class="">
    <div class="content">
        <a href="#form">
            <img class="user-image" src="<?php echo \yii\helpers\Url::to('@web/resources/img/head_img.jpg'); ?>"/>
        </a>

        <div id="form">
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
            <?php $form = ActiveForm::begin(['id' => 'register-form']); ?>
            <div class="box-body box">
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
                <div class="box-footer text-center">
                    <button class="btn btn-submit btn-primary" type="submit">立即领取</button>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <a href="#form">
            <img class="user-image" src="<?php echo \yii\helpers\Url::to('@web/resources/img/zhucedan_bg.jpg'); ?>"/>
        </a>
        <!--   platform_support -->
        <div class="support">优瑞建站提供技术支持</div>
    </div>
    <!--    这里提供是否可以展示或者不展示处理 ,如果不展示需要把.content对底部的padding的50像素取消-->
    <div class="agreement agree">提交即视为您已阅读并同意<span class="info-state">《个人信息保护声明》</span></div>
    <div class="call">电话</div>
    <!--    共有7个弹窗，1个运营商服务条款 1个手机验证码，1个提交成功弹窗，1个商户用的信息申明弹窗 1个官方使用信息申明弹窗 1个电话弹窗，再加一个异常弹窗-->
</div>