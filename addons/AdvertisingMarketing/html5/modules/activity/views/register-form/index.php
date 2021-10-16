<?php
use yii\bootstrap\ActiveForm;
use common\helpers\Url;
use \addons\AdvertisingMarketing\common\enums\RegisterFormDynamic;

//* @var $form yii\bootstrap\ActiveForm */
$this->title = $register_config->title;
//标题部分可以更改
$dynamic = $register_config->header_dynamic;

?>
<div class="position-ref">
    <div class="content">
        <!--        * @property int $header_img_show_mode 头部图片展示方式[1:排列展示;2:轮播展示]-->
        <a href="javascript:viod(0)"><?= $header_ui ?></a>
        <!--        * @property int $header_dynamic 头部动态[0:不展示；1:只展示动态;2:只展示人数;3:全部展示]-->
        <div id="form">
            <div class="box-header" <?php if ($dynamic == RegisterFormDynamic::CLOSE) {
                echo 'style="display:none"';
            } ?>>
                <div class="header-left" <?php if ($dynamic == RegisterFormDynamic::NUMBERS) {
                    echo 'style="display:none"';
                } ?>>
                    <div class="rotate"><?= $users_info ?></div>
                </div>
            </div>
            <div class="header-right" <?php if ($dynamic == RegisterFormDynamic::CLOSE||$dynamic == RegisterFormDynamic::DYNAMIC) {
                echo 'style="display:none"';
            } ?>>
                <i class="fa fa-xxx">🚩</i>
                <span>已有<span class="total-human focus-info"><?= $register_config->register_number ?></span>人领取</span>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => $model->formName(),
                'enableAjaxValidation' => true,
                'validationUrl' => Url::to(['ajax-edit', 'id' => $model['id']]),
                'fieldConfig' => [
                    'template' => "<div class='form-lable'>{label}{hint}</div><div class='form-content'>{input}{error}</div>",
                ],]); ?>
            <div class="box-body box">
                <?= $form->field($model, 'name')->textInput()->hint('<span class="focus-info">*</span>（ 已加密，放心填写 ）') ?>
                <?= $form->field($model, 'mobile')->textInput()->hint('<span class="focus-info">*</span>（ 已加密，放心填写 ）') ?>
                <?= \common\widgets\provinces\Provinces::widget([
                    'form' => $form,
                    'model' => $model,
                    'template' => 'short',
                    'provincesName' => 'province_id',// 省字段名
                    'cityName' => 'city_id',// 市字段名
                    'areaName' => 'area_id',// 区字段名
                ]); ?>
                <?= $form->field($model, 'address')->textarea()->hint('<span class="focus-info">*</span>') ?>
                <?= $form->field($model, 'auto_mobile')->checkbox()->hint('<span class="agree auto-mobile"><span class="info-state">《个人信息授权与保护声明》</span></span>') ?>
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
    <!--    共有7个弹窗，1个运营商服务条款 1个手机验证码，1个提交成功弹窗，1个商户用的信息申明弹窗  ，再加一个异常弹窗-->
</div>


<script>
    $(function () {
        var len = $('.rotate').children().length - 1;
        count = Math.round(Math.random() * (len));
        $(".itemq").eq(count).fadeIn();

        time = Math.round(Math.random() * 3 + 5);
        var t = setInterval(lunbo, time * 1000);

        function lunbo() {
            count++;
            if (count > len) {
                count = 0;
            }
            $('.itemq:visible').slideUp(2000).fadeOut(2000);
            $(".itemq").eq(count).delay(2000).fadeIn(1000);

            clearInterval(t);
            time = Math.round(Math.random() * 5 + 5);
            t = setInterval(lunbo, time * 1000);
        }
    })

</script>