<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/3/3
 * Time: 11:47 PM
 */
namespace common\enums;

class CustomerOrderStatusEnum extends BaseEnum {

    const TRANSPORT = '0';
    const DELIVERY = '1';
    const RECEIVE = '2';
    const REJECTED = '3';
    const RETRUN = '4';
    /**
     * @return array
     */
    public static function getMap(): array
    {
        return [
            self::TRANSPORT => '运送中',
            self::DELIVERY => '派件中',
            self::RECEIVE => '已签收',
            self::REJECTED => '拒收',
            self::RETRUN => '退回',
        ];
    }
}