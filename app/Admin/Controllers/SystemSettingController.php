<?php
/**
 * The file was created by Assimon.
 *
 * @author    assimon<ashang@utf8.hk>
 * @copyright assimon<ashang@utf8.hk>
 * @link      http://utf8.hk/
 */

namespace App\Admin\Controllers;


use App\Admin\Forms\SystemSetting;
use App\Admin\Forms\TgsendReviews;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Card;


class SystemSettingController extends AdminController
{

    /**
     * 系统设置
     *
     * @param Content $content
     * @return Content
     *
     * @author    assimon<ashang@utf8.hk>
     * @copyright assimon<ashang@utf8.hk>
     * @link      http://utf8.hk/
     */
    public function systemSetting(Content $content)
    {
        return $content
            ->title('系统设置')
            ->body(new Card(new SystemSetting()));
    }

    public function tgSendreviews(Content $content)
    {
        return $content
            ->title('评论内容')
            ->body(new Card(new TgsendReviews()));
    }

}
