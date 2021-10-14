<?php
use yii\bootstrap\ActiveForm;
use \addons\AdvertisingMarketing\common\enums\RegisterFormDynamic;

//* @var $form yii\bootstrap\ActiveForm */
$this->title = $register_config->title;
//标题部分可以更改
$dynamic = $register_config->header_dynamic;
?>
<style>
    .liuguang {
        margin: 0;
        background: -webkit-linear-gradient(left, #ffffff, #ff0000 6.25%, #ff7d00 12.5%, #ffff00 18.75%, #00ff00 25%, #00ffff 31.25%,
        #0000ff 37.5%, #ff00ff 43.75%, #ffff00 50%, #ff0000 56.25%, #ff7d00 62.5%, #ffff00 68.75%, #00ff00 75%, #00ffff 81.25%,
        #0000ff 87.5%, #ff00ff 93.75%, #ffff00 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-size: 200% 100%;
        animation: masked-animation 2s infinite linear;
    }

    @keyframes masked-animation {
        0% {
            background-position: 0 0;
        }
        100% {
            background-position: -100%, 0;
        }
    }

    .ziti {
        animation: mymove 2s infinite;
        -webkit-animation: mymove 2s infinite; /*Safari and Chrome*/
        animation-direction: alternate; /*轮流反向播放动画。*/
        animation-timing-function: ease-in-out; /*动画的速度曲线*/
        /* Safari 和 Chrome */
        -webkit-animation: mymove 2s infinite;
        -webkit-animation-direction: alternate; /*轮流反向播放动画。*/
        -webkit-animation-timing-function: ease-in-out; /*动画的速度曲线*/
    }

    @keyframes mymove {
        0% {
            transform: scale(1); /*开始为原始大小*/
        }
        25% {
            transform: scale(1.1); /*放大1.1倍*/
        }
        50% {
            transform: scale(1);
        }
        75% {
            transform: scale(1.1);
        }

    }

    @-webkit-keyframes mymove /*Safari and Chrome*/
    {
        0% {
            transform: scale(1); /*开始为原始大小*/
        }
        25% {
            transform: scale(1.1); /*放大1.1倍*/
        }
        50% {
            transform: scale(1);
        }
        75% {
            transform: scale(1.1);
        }
    }
</style>
<div class="">
    <div class="content">
        <!--        * @property int $header_img_show_mode 头部图片展示方式[1:排列展示;2:轮播展示]-->
        <a href="javascript:viod(0)">
            <?= $header_ui ?>
        </a>
        <!--        * @property int $header_dynamic 头部动态[0:不展示；1:只展示动态;2:只展示人数;3:全部展示]-->
        <div id="form">
            <div class="box-header" <?php if ($dynamic == RegisterFormDynamic::CLOSE) {
                echo 'style="display:none"';
            } ?>>
                <div class="header-left" <?php if ($dynamic == RegisterFormDynamic::NUMBERS) {
                    echo 'style="display:none"';
                } ?>>
                    <i class="fa fa-xxx">🔉</i>
                    <style>
                        .itemq {display:inline }
                    </style>
                    <div class="rotate">

                        <div class="itemq"><span class="focus-info">北京 陈** 178****8032</span> 已领取</div>
                    </div>
                </div>
                <div class="header-right" <?php if ($dynamic == RegisterFormDynamic::DYNAMIC) {
                    echo 'style="display:none"';
                } ?>>
                    <i class="fa fa-xxx">🚩</i>
                    <span>已有<span
                                class="total-human focus-info"><?= $register_config->register_number ?></span>人领取</span>
                </div>
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
                <span class="agree auto-mobile"><span class="info-state">《个人信息授权与保护声明》</span></span>
                <div class="box-footer text-center">
                    <button class="btn btn-submit btn-primary ziti" type="submit">立即领取</button>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <a href="javascript:viod(0)">
            <?php if ($register_config->footer_img) {
                foreach ($register_config->footer_img as $footer_img) { ?>
                    <img class="user-image" src="<?= $footer_img ?>"/>
                <?php }
            } ?>
        </a>
        <!--   platform_support -->
        <div class="support">优瑞建站仅向商家提供技术支持</div>
    </div>
    <!--    这里提供是否可以展示或者不展示处理 ,如果不展示需要把.content对底部的padding的50像素取消-->
    <!--    <div class="agreement agree">提交即视为您已阅读并同意<span class="info-state">《个人信息保护声明》</span></div>-->
    <div class="call" style="display: <?= empty($register_config->support_phone) ? 'none' : 'block' ?>;">
        <a href="tel:<?= $register_config->support_phone ?>">
            <img class="user-image"
                 src="<?php echo \yii\helpers\Url::to('@web/resources/img/c24868204628945e09255237e546a4f8.gif'); ?>"/>
            <!--            <span class="glyphicon glyphicon-earphone" aria-hidden="true" style="color:red;font-size: 36px;padding: 5px"></span>-->
        </a>
    </div>
    <!--    共有7个弹窗，1个运营商服务条款 1个手机验证码，1个提交成功弹窗，1个商户用的信息申明弹窗 1个官方使用信息申明弹窗 1个电话弹窗，再加一个异常弹窗-->
</div>


<script>
    $(function () {
        var len = $('.rotate').children().length;
        setInterval(function () {

        }，1000);
        $(".itemq:first").fadeIn();
    })
    myFade($(".itemq:first"));

    var myFade = function (posts) {
        posts.fadeIn("slow", function () {
            var nextOne = $(this).next('.posts');
            if (nextOne.length > 0) {
                myFade(nextOne);
            }
        });
    }


</script>