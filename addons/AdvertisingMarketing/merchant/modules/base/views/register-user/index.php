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
use yii\grid\GridView;
use yii\helpers\BaseHtml;
use common\helpers\ImageHelper;

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
                <h3 class="box-title"><?= '【注册信息列表】———' . Yii::$app->request->get('popularize_title'); ?></h3>
                <div class="box-tools">
                    <?= Html::create(['edit']); ?>
                </div>
            </div>
            <div class="row farPaddingJustV">
                <div class="col-sm-8">
                    <?php $form = ActiveForm::begin([
                        'action' => Url::to(['index']),
                        'method' => 'get'
                    ]); ?>
                    <div class="col-sm-4">
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
                                    'locale' => ['format' => 'Y-m-d'],
                                ]
                            ]) . $addon;?>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <?= Html::dropDownList('type', $type, ArrayHelper::merge(['' => '全部'], RegisterUser::$source), ['class'=>'form-control']);?>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group m-b">
                            <?= Html::textInput('keyword', $keyword, [
                                'placeholder' => '姓名/电话/地址',
                                'class' => 'form-control'
                            ])?>
                            <?= Html::tag('span', '<button class="btn btn-white"><i class="fa fa-search"></i> 搜索</button>', ['class' => 'input-group-btn'])?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="col-sm-4">
                    <div class="pull-right">
                        关注扫描 <strong class="text-danger"><?= $attention_count ?></strong> 次 ;
                        已关注扫描 <strong class="text-danger"><?= $scan_count ?></strong> 次 ;
                        总计 <strong class="text-danger"><?= $pages->totalCount ?></strong> 次 ;
                        <?= Html::a('导出Excel', ['export','from_date' => $from_date,'to_date' => $to_date,'type' => $type,'keyword' => $keyword])?>
                    </div>
                </div>
            </div>
            <div class="box-body table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    //重新定义分页样式
                    'tableOptions' => [
                        'class' => 'table table-hover rf-table',
                        'fixedNumber' => 3,
                        'fixedRightNumber' => 1,
                    ],
                    'options' => [
                        'id' => 'grid',
                    ],
                    'columns' => [
                        [
                            'class' => 'yii\grid\CheckboxColumn',
                            'checkboxOptions' => function ($model, $key, $index, $column) {
                                return ['value' => $model->id];
                            },
                        ],
                        [
                            'class' => 'yii\grid\SerialColumn',
                            'visible' => false, // 不显示#
                        ],
                        [
                            'label' => '推广标题',
                            'attribute' => 'popularize_title',
                            'headerOptions' => ['class' => 'col-md-1', 'overflow' => 'hidden'],
                        ],
                        [
                            'label' => '推广图',
                            'filter' => false, //不显示搜索框
                            'value' => function ($model) {
                                if (!empty($model->popularize_img)) {
                                    return ImageHelper::fancyBox($model->popularize_img);
                                }
                            },
                            'format' => 'raw',
                            'headerOptions' => ['class' => 'col-md-1'],
                        ],
//                            [
//                                'label' => '标题',
//                                'attribute' => 'title',
//                                'format' => 'raw',
//                                'headerOptions' => ['class' => 'col-md-1', 'white-space'=>'nowrap','text-overflow'=> 'ellipsis','overflow'=>' hidden'],
//                            ],    //长度过长
                        [
                            'label' => '注册数量',
                            'filter' => false, //不显示搜索框
                            'attribute' => 'register_number',
                            'format' => 'raw',
                            'headerOptions' => ['class' => 'col-md-1'],
                        ],
                        [
                            'label' => '点击数量',
                            'filter' => false, //不显示搜索框
                            'attribute' => 'click_number',
                            'format' => 'raw',
                            'headerOptions' => ['class' => 'col-md-1'],
                        ],
                        [
                            'label' => '创建时间',
                            'filter' => false, //不显示搜索框
                            'value' => function ($model) {
                                return Yii::$app->formatter->asDatetime($model->created_at);
                            },
                            'format' => 'raw',
                            'headerOptions' => ['class' => 'col-md-1'],
                        ],
                        [
                            'header' => '推广链接',
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{copy}',
                            'buttons' => [
                                'copy' => function ($url, $model, $key) {
                                    return BaseHtml::a('点击复制链接', '#',
                                        ['class' => 'btn btn-white btn-sm copy',
                                            'data-url' => '/html5/advertising-marketing/activity/register-form' . '?register_config_id=' . $model->id . '&merchant_id=' . $model->merchant_id,
                                            //'onclick' => 'copy(this,'. $model->id .','.$model->merchant_id.')'
                                        ]);
                                },
                            ]
                        ],
                        [
                            'header' => "操作",
                            'class' => 'yii\grid\ActionColumn',
                            'template' => ' {edit} {status} {delete}',
                            'buttons' => [
                                'edit' => function ($url, $model, $key) {
                                    return Html::edit(['edit', 'id' => $model->id]);
                                },
                                'status' => function ($url, $model, $key) {
                                    return Html::status($model->status);
                                },
                                'delete' => function ($url, $model, $key) {
                                    return Html::delete(['delete', 'id' => $model->id]);
                                },

                            ],
                        ],
                        [
                            'header' => '注册用户',
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{update}',
                            'buttons' => [
                                'update' => function ($url, $model, $key) {
                                    return Html::a('点击查看', [Url::to(['register-user/index']), 'popularize_title' => $model->popularize_title], [
                                        'class' => 'purple btn btn-white btn-sm',
                                    ]);
                                },
                            ]
                        ],
                    ],
                ]); ?>
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
</div>
<script>

    $(document).on("click", ".copy", function () {
        var text = document.domain + $(this).attr('data-url');
        var input = document.createElement('input');
        input.setAttribute('readonly', 'readonly'); // 防止手机上弹出软键盘
        input.setAttribute('value', text);
        document.body.appendChild(input);
        // input.setSelectionRange(0, 9999);
        input.select();
        if (document.execCommand('copy')) {
            document.body.removeChild(input);
            rfMsg('已成功到剪切板');
        }
    });
    //    function copy(_this,id,merchant_id) {  //配合onclick属性使用
    //        alert(document.domain+
    //        '/html5/advertising-marketing/activity/register-form?register_config_id=' +id + '&merchant_id='+merchant_id)
    //   }
</script>

