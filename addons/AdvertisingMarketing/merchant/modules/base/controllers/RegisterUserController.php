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
use common\helpers\ExcelHelper;
use services\common\ProvincesService;
use Yii;
use yii\data\Pagination;
use common\traits\MerchantCurd;

/**
 * Class RegisterUserController
 * @package addons\AdvertisingMarketing\merchant\modules\base\controllers
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
        $from_date = $request->get('from_date', date('Y-m-d H:i', strtotime("-7 day")));
        $to_date = $request->get('to_date', date('Y-m-d H:i'));
        $popularize_title =$request->get('popularize_title');

        $data = RegisterUser::find()
            ->where(['merchant_id' => $this->getMerchantId(),'register_form_id' => $register_form_id])
            ->andFilterWhere(['like', 'name', $keyword])
            ->orFilterWhere(['like', 'mobile', $keyword])
            ->orFilterWhere(['like', 'address', $keyword])
            ->andFilterWhere(['source' => $type])
            ->andFilterWhere(['between', 'created_at', strtotime($from_date), strtotime($to_date)]);

        $baidu_data = clone $data;
        $uc_data = clone $data;


        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => $this->pageSize]);
        $models = $data->offset($pages->offset)
            ->orderBy('created_at desc')
            ->limit($pages->limit)
            ->all();

//        $province=new ProvincesService();
//        foreach($models as $model){
//            $model->province_id = $province->getName($model->province_id);
//            $model->city_id = $province->getName($model->city_id);
//            $model->area_id = $province->getName($model->area_id);
//        }

        // 百度推广
        $baidu_count = $baidu_data
            ->andWhere(['source' => RegisterUser::BAIDU])
            ->count();
        // UC推广
        $uc_count = $uc_data
            ->andWhere(['source' => RegisterUser::UC_AGENT])
            ->count();


        return $this->render('index', [
            'models' => $models,
            'pages' => $pages,
            'source' => $type,
            'register_form_id' =>$register_form_id,
            'baidu_count' => $baidu_count,
            'uc_count' => $uc_count,
            'popularize_title' => $popularize_title,
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
        $register_form_id = $request->get('register_form_id', 0);
        $from_date = $request->get('from_date');
        $to_date = $request->get('to_date');
        $keyword = $request->get('keyword');
        $dataList = RegisterUser::find()
            ->where(['between', 'created_at', strtotime($from_date), strtotime($to_date)])
            ->andWhere(['merchant_id' => $this->getMerchantId(),'register_form_id' => $register_form_id])
            ->andFilterWhere(['source' => $request->get('source')])
            ->andFilterWhere(['like', 'name', $keyword])
            ->orFilterWhere(['like', 'mobile', $keyword])
            ->orFilterWhere(['like', 'address', $keyword])
            ->orderBy('created_at desc')
            ->asArray()
            ->all();
        $province=new ProvincesService();
        foreach($dataList as $key => $model){
            $dataList[$key]['province_id'] = $province->getName($model['province_id']);
            $dataList[$key]['city_id'] = $province->getName($model['city_id']);
            $dataList[$key]['area_id'] = $province->getName($model['area_id']);
        }
        $header = [
            ['ID', 'id'],
            ['姓名', 'name'],
            ['电话', 'mobile'],
            ['省', 'province_id'],
            ['市', 'city_id'],
            ['区', 'area_id'],
            ['详细地址', 'address'],
            ['来源', 'source', 'selectd', ['' => '全部', '1' => '百度推广', '2' => 'UC浏览器']],
            ['创建时间', 'created_at', 'date', 'Y-m-d H:i:s'],
        ];

        // 导出Excel
        return ExcelHelper::exportData($dataList, $header, '扫描统计_' . time());
    }
}