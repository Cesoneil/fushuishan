<?php
use yii\bootstrap\ActiveForm;
use common\helpers\Url;
use addons\AdvertisingMarketing\common\enums\RegisterFormDynamic;
use common\helpers\Html;

//* @var $form yii\bootstrap\ActiveForm */
$this->title = '下单成功';
?>

<div class="position-ref full-height">
    <div class="content" style="position: relative; border-bottom:1px dashed #f4f4f4" >
        <div style="z-index:1;background-image: linear-gradient(90deg, #ff9233, #fe5136 31%, #fd2245 64%, #fd227a);color: #fff;padding-top: 70px; font-size: 16px; padding-bottom: 80px;">
            <div  style="width: 80px;height: 80px;border-radius: 80px;
            background: #fff;color: red;margin: 0 auto;font-size: 42px; line-height: 90px; margin-bottom: 15px;">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
            </div>
            <p>订单提交成功</p>
        </div>
        <div style="height: 120px;width: 120px; position: absolute;
         left:50%; top: 42%;transform: translate(-50%, -50%); z-index: 3;background: #fff; -moz-box-shadow: 5px 5px 5px #888888; /* 老的 Firefox */
box-shadow: 5px 5px 5px #888888; ">
            <div style=""> <img class="user-image"
                       src="<?php echo \yii\helpers\Url::to('@web/resources/img/WeChat.png'); ?>"/></div>
        </div>

        <div style="position: relative; background: #fff; padding-bottom:100px;border-radius: 20px;margin-top: -20px; z-index: 2">
            <div style="font-size: 12px; margin:0 auto; width: 250px;position: relative;padding: 100px 20px 0 0;">
                <div>长按保存图片 -> 打开微信扫码 </div>或 搜索 '优瑞商城' 关注了解订单动态～～
            </div>
            <div style="margin-top: 30px;">
                <button class="btn" style="padding: 10px 40px; border: 1px solid #0f0f0f;">再来一单</button>
                <button class="btn" style="padding: 10px 40px; border: 1px solid #0f0f0f;margin-left: 20px;">我的订单</button>
            </div>
        </div>
    </div>
    <div style="padding-bottom: 100px;">
        <h5>关注即可</h5>
        <p>1、随时查询订单详情、物流信息</p>
        <p>2、订单动态消息及时通知</p>
        <p>3、在线咨询商家、客服人员</p>
    </div>
</div>