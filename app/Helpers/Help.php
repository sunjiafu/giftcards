<?php
/**
 * The file was created by Assimon.
 *
 * @author    assimon<ashang@utf8.hk>
 * @copyright assimon<ashang@utf8.hk>
 * @link      http://utf8.hk/
 */


use App\Exceptions\AppException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;



if (! function_exists('giftcard_config_get')) {

    /**
     * 系统配置获取
     *
     * @param string $key 要获取的key
     * @param $default 默认
     * @return mixed|null
     *
     * @author    assimon<ashang@utf8.hk>
     * @copyright assimon<ashang@utf8.hk>
     * @link      http://utf8.hk/
     */
    function giftcard_config_get(string $key, $default = null)
    {
       $sysConfig = Cache::get('system-setting');
       return $sysConfig[$key] ?? $default;
    }

    
}

if (! function_exists('giftcard_telegram_get')) {

    /**
     * 系统配置获取
     *
     * @param string $key 要获取的key
     * @param $default 默认
     * @return mixed|null
     *
     * @author    assimon<ashang@utf8.hk>
     * @copyright assimon<ashang@utf8.hk>
     * @link      http://utf8.hk/
     */
    function giftcard_telegram_get(string $key, $default = null)
    {
       $tgConfig = Cache::get('forwardmessage');
       return   $tgConfig[$key] ?? $default;
    }

    
}