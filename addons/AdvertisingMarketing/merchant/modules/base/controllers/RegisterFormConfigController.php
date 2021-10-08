<?php
namespace addons\AdvertisingMarketing\merchant\modules\base\controllers;

use addons\AdvertisingMarketing\merchant\controllers\BaseController;
use common\enums\StatusEnum;
use Yii;
use addons\AdvertisingMarketing\common\models\activity\RegisterFormConfig;
use common\models\base\SearchModel;
use common\traits\MerchantCurd;

/**
 * Class RegisterFormConfigController
 * @package addons\AdvertisingMarketing\merchant\controllers
 */
class RegisterFormConfigController extends BaseController
{

    use MerchantCurd;

    /**
     * @var \yii\db\ActiveRecord
     */
    public $modelClass = RegisterFormConfig::class;


    /**
     * 首页
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionIndex()
    {
        $searchModel = new SearchModel([
            'model' => RegisterFormConfig::class,
            'scenario' => 'default',
            'partialMatchAttributes' => ['popularize_title', 'title'], // 模糊查询
            'defaultOrder' => [
                'created_at' => SORT_DESC,
            ],
            'pageSize' => $this->pageSize,
        ]);
        $dataProvider = $searchModel
            ->search(Yii::$app->request->queryParams);
        $dataProvider->query
            ->andWhere(['>=', 'status', StatusEnum::DISABLED])
            ->andFilterWhere(['merchant_id' => $this->getMerchantId()]);
        return $this->render($this->action->id, [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel
        ]);
    }

    /**
     * 编辑/创建
     *
     * @return mixed
     */
    public function actionEdit()
    {
        $request = Yii::$app->request;
        $id = $request->get('id', null);
        $model = $this->findModel($id);

        if(!empty($model->header_img)) $model->header_img = explode(',', $model->header_img);
        if(!empty($model->footer_img)) $model->footer_img = explode(',', $model->footer_img);
        if ($model->load($request->post())) {
            $model->merchant_id = $this->getMerchantId();
            $model->merchant_name = Yii::$app->services->merchant->findById($model->merchant_id)->title; //获取商户名称
            !empty($model->header_img) && $model->header_img = implode(',', $model->header_img);
            !empty($model->footer_img) && $model->footer_img = implode(',', $model->footer_img);
            if ($model->save()) {
                return $this->referrer();
            }
        }
        return $this->render($this->action->id, [
            'model' => $model,
        ]);
    }
}