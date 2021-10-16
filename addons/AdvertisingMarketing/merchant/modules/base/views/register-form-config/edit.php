<?php

use yii\widgets\ActiveForm;
use common\enums\StatusEnum;
use common\widgets\webuploader\Files;
use addons\AdvertisingMarketing\common\enums\RegisterFormModeEnum;
use addons\AdvertisingMarketing\common\enums\RegisterFormDynamic;

$this->title = $model->isNewRecord ? '创建' : '编辑';
$this->params['breadcrumbs'][] = ['label' => '注册单管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$updateName = $model->formName() . '[valueData][update]';
$createName = $model->formName() . '[valueData][create]';
?>

<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">注册单配置</h3>
            </div>
            <?php $form = ActiveForm::begin([
                'fieldConfig' => [
                    'template' => "<div class='col-sm-2 text-right'>{label}</div><div class='col-sm-10'>{hint}{input}{error}</div>",
                ],
            ]); ?>
            <div class="box-body">
                <?= $form->field($model, 'popularize_title')->textInput()->hint('推广标题和推广图片用于外部推广形式所用图片链接，用于外部引流'); ?>
                <?= $form->field($model, 'popularize_img')->widget(Files::class, [])->hint('作为外部推广主图,只支持上传单张图片，建议尺寸240px*600px'); ?>
                <?= $form->field($model, 'title')->textInput(); ?>
                <?= $form->field($model, 'header_img')->widget(Files::class, [
                    'config' => [
                        // 可设置自己的上传地址, 不设置则默认地址
                        // 'server' => '',
                        'pick' => ['multiple' => true,
                        ],
                    ]
                ])->hint('支持同时上传多张图片,多张图片之间可拖动调整位置'); ?>
                <?= $form->field($model, 'header_img_show_mode')->radioList(RegisterFormModeEnum::getMap())->hint('头部图片可以轮播展示或纵向展示'); ?>
                <?= $form->field($model, 'header_dynamic')->radioList(RegisterFormDynamic::getMap())->hint('表单部分动态展示方式'); ?>
                <?= $form->field($model, 'agreement')->widget(\common\widgets\ueditor\UEditor::class, [
                    'config' => [
                        'initialFrameHeight' => '200'
                    ]
                ])->hint('如果为空的情况则使用默认协议') ?>
                <?= $form->field($model, 'footer_img')->widget(Files::class, [
                    'config' => [
                        // 可设置自己的上传地址, 不设置则默认地址
                        // 'server' => '',
                        'pick' => [
                            'multiple' => true,
                        ],
                    ]
                ])->hint('支持同时上传多张图片,多张图片之间可拖动调整位置'); ?>
                <?= $form->field($model, 'support_phone')->textInput()->hint('只能为座机号010-xxxxxxx、400电话、手机号，空值则不显示电话按钮'); ?>
                <?= $form->field($model, 'status')->radioList(StatusEnum::getMap()) ?>
            </div>
            <div class="box-footer text-center">
                <span class="btn btn-primary" onclick="beforSubmit()">保存</span>
                <span class="btn btn-white" onclick="history.go(-1)">返回</span>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<script>
    // 验证提交
    function beforSubmit() {
        var submit = true;
        $('#registerformconfig-support_phone').each(function () {
            var reg=/^((0\d{2,3})-)(\d{7,8})$/; //判断为座机号码 0xx-xxxxxxx
            var reg2=/^400\d{7}$/;               //400电话
            var reg3 =/^[1][3456789][0-9]{9}$/;  //手机号
            if($(this).val().length!= 0 && !reg.test($(this).val()) && !reg2.test($(this).val()) && !reg3.test($(this).val())) {
                rfMsg('联系电话只能为座机号010-xxxx、400电话、手机号');
                submit = false;
            }
        });

        if (submit === true) {
            $('#w0').submit();
        }
    }
</script>