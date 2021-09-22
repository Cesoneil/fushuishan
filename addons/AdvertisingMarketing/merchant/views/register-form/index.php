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

$this->title = '注册单管理';
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>

<div class="row">
    <div class="col-sm-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li><a href="<?= Url::to(['recycle']) ?>">注册单活动列表</a></li>
                <li class="pull-right">
                    <?= Html::create(['edit']); ?>
                </li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
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
                                'label' => '推广图片',
                                'value' => function ($model) {
                                    if (!empty($model->popularize_img)) {
                                        return ImageHelper::fancyBox($model->popularize_img);
                                    }
                                },
                                'format' => 'raw',
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'label' => '标题',
                                'attribute' => 'title',
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'label' => '头部图片',
                                'filter' => false, //不显示搜索框
                                'value' => function ($model) {
                                    if (!empty($model->header_img)) {
                                        return ImageHelper::fancyBox($model->header_img);
                                    }
                                },
                                'format' => 'raw',
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'label' => '头部图片展示方式',
                                'attribute' => 'header_img_show_mode',     // [1:排列展示;2:轮播展示]
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'attribute' => 'header_dynamic',    //[0:不展示；1:只展示领取动态;2:只展示领取人数;3:全部展示]
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'label' => '是否默认协议',
                                'attribute' => 'agreement',
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'attribute' => 'cate.title',
                                'label' => '产品分类',
                                'format' => 'raw',
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'label' => '尾部图片',
                                'attribute' => 'footer_img',
                                'filter' => false, //不显示搜索框
                                'value' => function ($model) {
                                    return Html::sort($model->sort);
                                },
                                'format' => 'raw',
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'label' => '咨询电话',
                                'attribute' => 'support_phone',
                                'format' => 'raw',
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'label' => '注册数量',
                                'attribute' => 'register_number',
                                'format' => 'raw',
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'label' => '点击数量',
                                'attribute' => 'click_number',
                                'format' => 'raw',
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'label' => '推广链接',
                                'attribute' => 'click_number',
                                'format' => 'raw',
                                'headerOptions' => ['class' => 'col-md-1'],
                            ],
                            [
                                'header' => "操作",
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{update} {edit} {delete}',
                                'buttons' => [
                                    'update' => function ($url, $model, $key) {
                                        if ($model->product_status == \common\enums\StatusEnum::ENABLED) {
                                            return BaseHtml::a('查看注册用户信息', '#', [
                                                'class' => 'btn btn-white btn-sm sold-out',
                                                'data-id' => $model['id'],
                                            ]);
                                        }
                                        return BaseHtml::a('上架', '#', [
                                            'class' => 'btn btn-white btn-sm putaway',
                                            'data-id' => $model['id'],
                                        ]);
                                    },
                                    'edit' => function ($url, $model, $key) {
                                        return Html::edit(['edit', 'id' => $model['id']]);
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

<script>
    var h5Url = "<?= $h5Url ?>";
    var product_id;
    $(document).on("click",".view",function(){
        var product_id = $(this).data('id');
        if (h5Url.length > 0){
            layer.open({
                type: 2,
                title: '页面预览',
                area: ['375px', '90%'],
                content: h5Url + '/pages/product/product?id=' + product_id
            });
        } else {
            rfMsg('请先去 基础配置->页面设置 配置预览地址')
        }
    })

    $(document).on("click",".ion-compose",function(){
        product_id = $(this).prev().data('id');
        product_name = $(this).prev().data('name');
        $('#productName').val(product_name);
    });

    // 标题编辑
    $(document).on("click",".submit-name",function(){
        var name = $('#productName').val();
        if (name.length === 0) {
            rfMsg('请填写标题')
        }

        url = "<?= Url::to(['update-name'])?>" + '?id=' + product_id + '&name=' + name;
        sendData(url);
    });

    // 标题编辑
    $(document).on("click",".submit-info",function(){
        var data = $('#infoForm').serializeArray();
        data.push({
            'name' : 'ids',
            'value' : $("#grid").yiiGridView("getSelectedRows")
        })

        $.ajax({
            type: "post",
            url: '<?= Url::to(['update-info'])?>',
            dataType: "json",
            data: data,
            success: function (data) {
                if (parseInt(data.code) === 200) {
                    swal('小手一抖打开一个窗', {
                        buttons: {
                            defeat: '确定',
                        },
                        title: '操作成功',
                    }).then(function (value) {
                        switch (value) {
                            case "defeat":
                                location.reload();
                                break;
                            default:
                        }
                    });
                } else {
                    rfWarning(data.message);
                }
            }
        });
    });

    let url = '';
    // 删除全部
    $(".delete-all").on("click", function () {
        url = "<?= Url::to(['delete-all'])?>";
        sendData(url);
    });

    // 上架
    $(document).on("click",".putaway-all",function(){
        url = "<?= Url::to(['state-all', 'state' => true])?>";
        sendData(url);
    });

    // 下架
    $(document).on("click",".sold-out-all",function(){
        url = "<?= Url::to(['state-all', 'state' => false])?>";
        sendData(url);
    });

    // 上架
    $(document).on("click",".putaway",function(){
        url = "<?= Url::to(['state-all', 'state' => true])?>";
        var id = $(this).data('id');
        sendData(url, [id]);
    });

    // 下架
    $(document).on("click",".sold-out",function(){
        url = "<?= Url::to(['state-all', 'state' => false])?>";
        var id = $(this).data('id');
        sendData(url, [id]);
    });

    // 推荐
    $(".recommend").on("click", function () {
        var is_hot = $('#is_hot').is(':checked') ? 1 : 0;
        var is_recommend = $('#is_recommend').is(':checked') ? 1 : 0;
        var is_new = $('#is_new').is(':checked') ? 1 : 0;
        url = "<?= Url::to(['recommend'])?>" + '?is_hot=' + is_hot + '&is_recommend='+ is_recommend + '&is_new=' + is_new;

        sendData(url);
    });

    function sendData(url, ids = []) {
        if (ids.length === 0) {
            ids = $("#grid").yiiGridView("getSelectedRows");
        }

        $.ajax({
            type: "post",
            url: url,
            dataType: "json",
            data: {ids: ids},
            success: function (data) {
                if (parseInt(data.code) === 200) {
                    swal('小手一抖打开一个窗', {
                        buttons: {
                            defeat: '确定',
                        },
                        title: '操作成功',
                    }).then(function (value) {
                        switch (value) {
                            case "defeat":
                                location.reload();
                                break;
                            default:
                        }
                    });
                } else {
                    rfWarning(data.message);
                }
            }
        });
    }
</script>