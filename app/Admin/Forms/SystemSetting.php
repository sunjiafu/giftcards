<?php

namespace App\Admin\Forms;

use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\Cache;

class SystemSetting extends Form
{
    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {
        Cache::put('system-setting',$input);

        return $this
				->response()
				->success('Processed successfully.')
				->refresh();
    }

    /**
     * Build a form here.
     */
    public function form()
    {
        $this->tab('系统设置', function () {

            $this->text('title','网站名称')->required();

        });
    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
        return Cache::get('system-setting');

    }
}
