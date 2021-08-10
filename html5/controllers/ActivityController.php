<?php
namespace html5\controllers;
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/8/11
 * Time: 12:39 AM
 */
class ActivityController extends BaseController{

    /**
     * @return array
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionRegisterForm()
    {
        // 个人信息
        // p(Yii::$app->wechat->user);
        // p(Yii::$app->params['wechatMember']);

        return $this->render($this->action->id, [
        ]);
    }

}