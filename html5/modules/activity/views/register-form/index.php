<?php
//* @var $form yii\bootstrap\ActiveForm */
$this->title = '【限时免费体验】解决男性阳痿、早泄、勃起无力等问题，延长性爱时间、增大增粗请选择知缘堂';

use yii\bootstrap\ActiveForm;
?>

<div class="position-ref full-height">
    <div class="content">
        <a href="#form">
            <img width="100%" class="user-image head_portrait" src="<?php echo \yii\helpers\Url::to('@web/resources/img/zhucedan_bg.jpg');?>"/>
        </a>

        <div id="form" class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> 填 入 信 息 赶 紧 来 领 取 吧！</h3>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'registerNK-form'
            ]); ?>
            <div class="box-body">
                <?= $form->field($model, 'realname')->textInput() ?>
                <?= $form->field($model, 'mobile')->textInput() ?>
                <?= $form->field($model, 'birthday')->widget('kartik\date\DatePicker', [
                    'language' => 'zh-CN',
                    'layout' => '{picker}{input}',
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,// 今日高亮
                        'autoclose' => true,// 选择后自动关闭
                        'todayBtn' => true,// 今日按钮显示
                    ],
                    'options' => [
                        'class' => 'form-control no_bor',
                    ]
                ]); ?>
            </div>
            <div class="box-footer text-center">
                <button class="btn btn-primary" type="submit">立即提交</button>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="lunbo">
            这里需要实时滚动领取情况和倒计时
        </div>
    </div>
</div>