<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/10/10
 * Time: 4:12 PM
 */
namespace addons\AdvertisingMarketing\merchant\modules\base\controllers;

use addons\AdvertisingMarketing\common\models\activity\RegisterUser;
use addons\AdvertisingMarketing\merchant\controllers\BaseController;
use common\enums\StatusEnum;
use Yii;
use yii\data\Pagination;
use addons\AdvertisingMarketing\common\models\activity\RegisterFormConfig;
use common\models\base\SearchModel;
use common\traits\MerchantCurd;

/**
 * Class RegisterFormConfigController
 * @package addons\AdvertisingMarketing\merchant\controllers
 */
class RegisterUserController extends BaseController
{

    use MerchantCurd;

    /**
     * @var \yii\db\ActiveRecord
     */
    public $modelClass = RegisterUser::class;



    /**
     * 首页
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $type = $request->get('source', '');
        $keyword = $request->get('keyword', '');
        $register_form_id = $request->get('register_form_id', '');
        $from_date = $request->get('from_date', date('Y-m-d', strtotime("-60 day")));
        $to_date = $request->get('to_date', date('Y-m-d', strtotime("+1 day")));

        $data = RegisterUser::find()
            ->where(['merchant_id' => $this->getMerchantId(),'register_form_id' => $register_form_id])
            ->andFilterWhere(['like', 'name', $keyword])//姓名/电话/地址
            ->andFilterWhere(['source' => $type])
            ->andFilterWhere(['between', 'created_at', strtotime($from_date), strtotime($to_date)]);

        $attention_data = clone $data;
        $scan_data = clone $data;

        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => $this->pageSize]);
        $models = $data->offset($pages->offset)
            ->orderBy('id desc')
            ->limit($pages->limit)
            ->all();

        // 百度推广
        $attention_count = $attention_data
            ->andWhere(['source' => RegisterUser::BAIDU])
            ->count();
        // UC推广
        $scan_count = $scan_data
            ->andWhere(['source' => RegisterUser::UC_AGENT])
            ->count();

        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
            'type' => $type,
            'attention_count' => $attention_count,
            'scan_count' => $scan_count,
            'keyword' => $keyword,
            'from_date' => $from_date,
            'to_date' => $to_date,
        ]);
    }

    /**
     * 导出
     *
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function actionExport()
    {
        $request = Yii::$app->request;
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');

        $dataList = QrcodeStat::find()
            ->where(['between', 'created_at', strtotime($from_date), strtotime($to_date)])
            ->andWhere(['merchant_id' => $this->getMerchantId()])
            ->andFilterWhere(['type' => $request->get('type')])
            ->andFilterWhere(['like', 'name', $request->get('keyword')])
            ->orderBy('created_at desc')
            ->with('fans')
            ->asArray()
            ->all();

        $header = [
            ['ID', 'id'],
            ['场景名称', 'name'],
            ['openid', 'fans.openid'],
            ['昵称', 'fans.nickname'],
            ['场景值', 'scene_str'],
            ['场景ID', 'scene_id'],
            ['关注/扫描', 'type', 'selectd', ['' => '全部', '1' => '关注', '2' => '扫描']],
            ['创建时间', 'created_at', 'date', 'Y-m-d H:i:s'],
        ];

        // 导出Excel
        return ExcelHelper::exportData($dataList, $header, '扫描统计_' . time());
    }
}