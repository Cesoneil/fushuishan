<?php

//所有坐席默认进入的页面

use common\helpers\Url;

$this->title = '首页';
$this->params['breadcrumbs'][] = ['label' => $this->title];
?>

    <style>
        .info-box-number {
            font-size: 20px;
        }

        .info-box-content {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>

    <div class="row">
    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i class="icon ion-person-stalker blue"></i> 0</span>
                <span class="info-box-text">当月总数(单）</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i class="icon ion-card green"></i> 0</span>
                <span class="info-box-text">当月总金额(元)</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i class="icon ion-ios-pulse red"></i> 0</span>
                <span class="info-box-text">当月签收(单)</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i class="icon ion-arrow-graph-up-right yellow"></i> 0</span>
                <span class="info-box-text">当月签收金额(单)</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i class="icon ion-ios-lightbulb-outline magenta"></i> 0</span>
                <span class="info-box-text">今日单数(个)</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-2 col-sm-6 col-xs-12">
        <div class="info-box">
            <div class="info-box-content p-md">
                <span class="info-box-number"><i class="icon ion-ios-paper-outline cyan"></i> 0</span>
                <span class="info-box-text">今日金额(元)</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="box box-solid">
            <div class="box-header">
                <i class="fa fa-circle blue" style="font-size: 8px"></i>
                <h3 class="box-title">最近30天统计</h3>
                <!-- 通话时长 、 出单量统计  -->
            </div>
            <?= \common\widgets\echarts\Echarts::widget([
                'config' => [
                    'server' => Url::to(['member-credits-log-between-count']),
                    'height' => '315px'
                ]
            ]) ?>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="box box-solid">
            <div class="box-header">
                <i class="fa fa-circle blue" style="font-size: 8px"></i>
                <h3 class="box-title">当月发货、签收统计</h3>
<!--                发货单数、签收单数、 发货金额、签收金额-->
            </div>
            <?= \common\widgets\echarts\Echarts::widget([
                'config' => [
                    'server' => Url::to(['member-recharge-stat']),
                    'height' => '315px'
                ]
            ]) ?>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-12 col-xs-12">
        <div class="box box-solid">
            <div class="box-header">
                <i class="fa fa-circle blue" style="font-size: 8px"></i>
                <h3 class="box-title">每月状况统计</h3>
<!-- 发货单数、签收单数、发货金额、签收金额-->
            </div>
            <?= \common\widgets\echarts\Echarts::widget([
                'config' => [
                    'server' => Url::to(['member-between-count']),
                    'height' => '315px'
                ]
            ]) ?>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    </div><?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/3/23
 * Time: 1:06 PM
 */