<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/9/11
 * Time: 9:46 AM
 */

use yii\grid\GridView;
use common\helpers\Html;
use yii\helpers\BaseHtml;
use common\helpers\ImageHelper;
use common\helpers\Url;
use common\helpers\ArrayHelper;
use addons\TinyShop\common\enums\ProductShippingTypeEnum;
use addons\TinyShop\common\enums\PointExchangeTypeEnum;

$this->title = '注册单推广';
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>

<div class="row">
    <div class="col-sm-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li>注册单推广列表</li>
                <li class="pull-right">
                    <?= Html::create(['edit']); ?>
                </li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane">
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
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'label' => '推广图',
                                'filter' => false, //不显示搜索框
                                'value' => function ($model) {
                                    if (!empty($model->popularize_img)) {
                                        //return ImageHelper::fancyBox($model->popularize_img);
                                    }
                                },
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'label' => '标题',
                                'attribute' => 'title',
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
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
                                'label' => '推广链接',
                                'filter' => false, //不显示搜索框
                                'attribute' => 'click_number',
                                'format' => 'raw',
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'label' => '创建时间',
                                'filter' => false, //不显示搜索框
                                'value' => function($model){
                                    return Yii::$app->formatter->asDatetime($model->created_at);
                                },
                                'format' => 'raw',
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'header' => "操作",
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update} {edit} {delete}',
                                'buttons' => [
                                    'update' => function ($url, $model, $key) {
                                        if ($model->status == \common\enums\StatusEnum::ENABLED) {
                                            return BaseHtml::a('获取注册用户信息', '#', [
                                                'class' => 'btn btn-white btn-sm sold-out',
                                                'data-id' => $model['id'],
                                            ]);
                                        }
                                        return BaseHtml::a('已下', '#', [
                                            'class' => 'btn btn-white btn-sm putaway',
                                            'data-id' => $model['id'],
                                        ]);
                                    },
                                    'edit' => function ($url, $model, $key) {
                                        return Html::edit(['edit', 'id' => $model->id]);
                                    },
                                    'delete' => function ($url, $model, $key) {
                                        return Html::delete(['delete', 'id' => $model->id]);
                                    },
                                ],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
</div>

