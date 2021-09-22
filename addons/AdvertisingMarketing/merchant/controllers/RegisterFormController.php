<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/9/10
 * Time: 1:50 AM
 */
namespace addons\AdvertisingMarketing\merchant\controllers;

use addons\AdvertisingMarketing\common\models\activity\RegisterFormCofing;
use common\models\base\SearchModel;

class RegisterFormController extends BaseController{

    public function actionIndex(){
      //p( \Yii::$app->params['addon'])  ;exit;
        $search = new  RegisterFormCofing();
        $searchModel = new SearchModel([
            'model' => RegisterFormCofing::class,
            'scenario' => 'default',
            'partialMatchAttributes' => [], // 模糊查询
            'defaultOrder' => [
                'id' => SORT_DESC,
            ],
            'pageSize' => $this->pageSize,
        ]);
        $dataProvider = $searchModel;
        return $this->render($this->action->id,[
            'dataProvider' => $dataProvider,
        ]);
    }
}