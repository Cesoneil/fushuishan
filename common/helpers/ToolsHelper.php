<?php
/**
 * Created by PhpStorm.
 * User: cesoneil
 * Date: 2021/10/18
 * Time: 2:21 AM
 */
namespace common\helpers;

use Yii;

/**
 * Class ToolsHelper
 * @package common\helpers
 */
class ToolsHelper
{
    /**
     * 获取浏览器名称
     * @return string
     * By Rocky 2015-10-9
     */
    public static function getBrowser()
    {
        $userAgent = strtolower($_SERVER["HTTP_USER_AGENT"]);
        $browser = "other";

        //判断是否是myie蚂蚁浏览器
        if (strpos($userAgent, "myie")) {
            $browser = "myie";
        }

        //判断是否是Netscape网景浏览器
        if (strpos($userAgent, "netscape")) {
            $browser = "netscape";
        }

        //判断是否是Opera欧朋浏览器
        if (strpos($userAgent, "opera")) {
            $browser = "opera";
        }

        //判断是否是netcaptor
        if (strpos($userAgent, "netcaptor")) {
            $browser = "netcaptor";
        }

        //判断是否是TencentTraveler腾讯TT浏览器
        if (strpos($userAgent, "tencenttraveler")) {
            $browser = "tt";
        }

        //判断是否是QQ浏览器
        if (strpos($userAgent, "mqqbrowser")) {
            $browser = "qq";
        }

        //判断是否是UC浏览器
        if (strpos($userAgent, "ucbrowser") || strpos($userAgent, "ucweb")) {
            $browser = "uc";
        }

        //判断是否是Firefox
        if (strpos($userAgent, "firefox")) {
            $browser = "firefox";
        }

        //判断是否是ie
        if (strpos($userAgent, "msie") || strpos($userAgent, "trident")) {
            $browser = "ie";
        }

        //判断是否是chrome内核浏览器
        if (strpos($userAgent, "chrome")) {
            $browser = "chrome";
        }

        //判断是否是微信浏览器
        if (strpos($userAgent, "micromessenger")) {
            $browser = "weixin";
        }
        return $browser;
    }

    /**
     * 获取客户端IP地址
     * @access public
     * @param  integer   $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
     * @param  boolean   $adv 是否进行高级模式获取（有可能被伪装）
     * @return mixed
     */
    public static function ip($type = 0, $adv = true)
    {
        $type      = $type ? 1 : 0;
        static $ip = null;

        if (null !== $ip) {
            return $ip[$type];
        }

        if ($adv) {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $pos = array_search('unknown', $arr);
                if (false !== $pos) {
                    unset($arr[$pos]);
                }
                $ip = trim(current($arr));
            } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // IP地址合法验证
        $long = sprintf("%u", ip2long($ip));
        $ip   = $long ? [$ip, $long] : ['0.0.0.0', 0];

        return $ip[$type];
    }

    /**
     * 检测是否使用手机访问
     * @access public
     * @return bool
     */
    public static function isMobile()
    {
        if (isset($_SERVER['HTTP_VIA']) && stristr($_SERVER['HTTP_VIA'], "wap")) {
            return true;
        } elseif (isset($_SERVER['HTTP_ACCEPT']) && strpos(strtoupper($_SERVER['HTTP_ACCEPT']), "VND.WAP.WML")) {
            return true;
        } elseif (isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE'])) {
            return true;
        } elseif (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/(blackberry|configuration\/cldc|hp |hp-|htc |htc_|htc-|iemobile|kindle|midp|mmp|motorola|mobile|nokia|opera mini|opera |Googlebot-Mobile|YahooSeeker\/M1A1-R2D2|android|iphone|ipod|mobi|palm|palmos|pocket|portalmmm|ppc;|smartphone|sonyericsson|sqh|spv|symbian|treo|up.browser|up.link|vodafone|windows ce|xda |xda_)/i', $_SERVER['HTTP_USER_AGENT'])) {
            return true;
        } else {
            return false;
        }
    }

}