<?php
use common\helpers\ImageHelper;
use common\widgets\menu\MenuLeftWidget;
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img class="img-circle head_portrait" src="<?= ImageHelper::defaultHeaderPortrait($manager->head_portrait); ?>"/>
            </div>
            <div class="pull-left info">
                <p><?= $manager->username; ?></p>
                <a href="#">
                    <i class="fa fa-circle text-success"></i>
                    <?php if (Yii::$app->services->auth->isSuperAdmin()){ ?>
                        超级管理员
                    <?php }else{ ?>
                        <?= Yii::$app->services->rbacAuthRole->getTitle() ?>
                    <?php } ?>
                </a>
            </div>
        </div>
        <!-- 侧边菜单 -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header" data-rel="external">系统菜单</li>
            <?= MenuLeftWidget::widget(); ?>
            <?php if (Yii::$app->debris->backendConfig('sys_related_links') == true){ ?>
                <li class="header" data-rel="external"> —————扩展链接—————</li>
                <li><a href="http://40675xg972.wicp.vip/" target="_blank"><i class="fa fa-bookmark text-red"></i> <span>优瑞YouR商城</span></a></li>
                <li><a href="hhttp://40675xg972.wicp.vip/backend/docs/guide-zh-CN/README.md" target="_blank"><i class="fa fa-list text-yellow"></i> <span>产品知识库</span></a></li>
<!--                <li><a href="https://jq.qq.com/?_wv=1027&k=5yvRLd7" target="_blank"><i class="fa fa-qq text-aqua"></i> <span>QQ交流群1</span></a></li>-->
<!--                <li><a href="https://jq.qq.com/?_wv=1027&k=Wk663e9N" target="_blank"><i class="fa fa-wechat text-aqua"></i> <span>QQ交流群2</span></a></li>-->
            <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>