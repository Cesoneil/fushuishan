<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/10/7
 * Time: 3:09 PM
 */
namespace addons\AdvertisingMarketing\common\enums;

use common\enums\BaseEnum;

/**
 * Class RangeTypeEnum
 * @package addons\AdvertisingMarketing\common\enums
 */
class RegisterFormModeEnum extends BaseEnum
{
    const RANGE = 1;
    const CAROUSEL = 2;

    /**
     * @return array
     */
    public static function getMap(): array
    {
        return [
            self::RANGE => '排列展示',
            self::CAROUSEL => '轮播展示',
        ];
    }
}
