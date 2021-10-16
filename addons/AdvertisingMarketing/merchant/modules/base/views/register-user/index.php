<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/9/11
 * Time: 9:46 AM
 */

use common\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\daterange\DateRangePicker;
use yii\helpers\ArrayHelper;
use addons\AdvertisingMarketing\common\models\activity\RegisterUser;
use common\helpers\Html;
use yii\widgets\LinkPager;

$addon = <<< HTML
<span class="input-group-addon">
    <i class="glyphicon glyphicon-calendar"></i>
</span>
HTML;

$this->title = '注册信息列表';
$this->params['breadcrumbs'][] = ['label' => $this->title];

?>


<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= '【注册信息列表】———' . $popularize_title; ?></h3>
                <div class="box-tools">
                    百度 <strong class="text-danger"><?= $baidu_count ?></strong> 条 ;
                    UC <strong class="text-danger"><?= $uc_count ?></strong> 条 ;
                    共 <strong class="text-danger"><?= $pages->totalCount ?></strong> 条 ;
                </div>
            </div>
            <div class="row farPaddingJustV">
                <div class="col-sm-9">
                    <?php $form = ActiveForm::begin([
                        'action' => Url::to(['index']),
                        'method' => 'get'
                    ]); ?>
                    <div class="col-sm-5">
                        <?= Html::hiddenInput('register_form_id', $register_form_id) ?>
                        <?= Html::hiddenInput('popularize_title', $popularize_title) ?>
                        <div class="input-group drp-container">
                            <?= DateRangePicker::widget([
                                'name' => 'queryDate',
                                'value' => $from_date . '-' . $to_date,
                                'readonly' => 'readonly',
                                'useWithAddon' => true,
                                'convertFormat' => true,
                                'startAttribute' => 'from_date',
                                'endAttribute' => 'to_date',
                                'startInputOptions' => ['value' => $from_date],
                                'endInputOptions' => ['value' => $to_date],
                                'pluginOptions' => [
                                    'timePicker'=>true,
                                    'timePickerIncrement'=>1,
                                    //'format'=>'yyyy-mm-dd hh:ii:ss',
                                    'timePicker24Hour'=>true,
                                    'locale'=>['format'=>'Y-m-d H:i:s']
                                ]
                            ]) . $addon;?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <?= Html::dropDownList('source', $source, ArrayHelper::merge(['' => '全部'], RegisterUser::$source), ['class'=>'form-control']);?>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group m-b">
                            <?= Html::textInput('keyword', $keyword, [
                                'placeholder' => '姓名/电话',
                                'class' => 'form-control'
                            ])?>
                            <?= Html::tag('span', '<button class="btn btn-white"><i class="fa fa-search"></i> 搜索</button>', ['class' => 'input-group-btn'])?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="col-sm-3">
                    <div class="pull-right">
                        <?= Html::a('导出信息', ['export','register_form_id'=> $register_form_id,'from_date' => $from_date,'to_date' => $to_date,'source' => $source,'keyword' => $keyword],['class' => 'btn btn-white btn-sm'])?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>姓名</th>
                        <th>电话</th>
                        <th>省</th>
                        <th>市</th>
                        <th>区</th>
                        <th>地址</th>
                        <th>来源</th>
                        <th>注册时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($models as $model){ ?>
                        <tr>
                            <td><?= $model->id ?></td>
                            <td><?= $model->name ?></td>
                            <td><?= \common\helpers\StringHelper::hideStr($model->mobile,3) ?></td>
                            <td><?= $model->province_id ?></td>
                            <td><?= $model->city_id ?></td>
                            <td><?= $model->area_id ?></td>
                            <td><?= $model->address ?></td>
                            <td><?= RegisterUser::$source[$model->source]; ?></td>
                            <td><?= Yii::$app->formatter->asDatetime($model->created_at) ?></td>
                            <td><?= Html::delete(['delete','id' => $model->id]); ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?= LinkPager::widget([
                        'pagination' => $pages,
                    ]);?>
                </div>
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
</div>
<script>


</script>

