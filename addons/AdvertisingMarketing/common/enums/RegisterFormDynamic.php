<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/10/7
 * Time: 3:16 PM
 */
namespace addons\AdvertisingMarketing\common\enums;

use common\enums\BaseEnum;

/**
 * Class RangeTypeEnum
 * @package addons\AdvertisingMarketing\common\enums
 */
class RegisterFormDynamic extends BaseEnum
{
    const CLOSE = 0;
    const DYNAMIC = 1;
    const NUMBERS = 2;
    const ALL = 3;

    /**
     * @return array
     */
    public static function getMap(): array
    {
        return [
            self::CLOSE => '全不展示',
            self::DYNAMIC => '只展示领取动态',
            self::NUMBERS => '只展示领取人数',
            self::ALL => '全部展示',
        ];
    }
}