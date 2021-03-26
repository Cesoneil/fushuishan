<?php

namespace services\common;

use Yii;
use common\enums\AppEnum;
use common\components\Service;

/**
 * Class AuthService
 * @package services\common
 * @author jianyan74 <751393839@qq.com>
 */
class AuthService extends Service
{
    /**
     * 是否顶级管理员
     *
     * @return bool
     */
    public function isSuperAdmin()
    {
        if (!in_array(Yii::$app->id, [AppEnum::BACKEND, AppEnum::MERCHANT])) {
            return false;
        }

        return Yii::$app->user->id == Yii::$app->params['adminAccount'];
    }

    /**
     * 是否为超级管理员、总经理
     * 总经理权限在超级管理员的下面
     *
     * @return bool
     */
    public function isAdmin()
    {
        if (!in_array(Yii::$app->id, [AppEnum::BACKEND, AppEnum::MERCHANT])) {
            return false;
        }
        $pid = Yii::$app->services->rbacAuthRole->getRole()['pid'];
        return in_array($pid , Yii::$app->params['administratorPid']);
    }

    /**
     * 是否为组长
     * 组长在权限在总经理下面
     *
     * @return bool
     */
    public function isCaptain()
    {
        if (!in_array(Yii::$app->id, [AppEnum::BACKEND, AppEnum::MERCHANT])) {
            return false;
        }
        $pid = Yii::$app->services->rbacAuthRole->getRole()['pid'];
        return ($pid == Yii::$app->params['captainPid']);
    }
}