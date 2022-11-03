<?php

namespace App\Admin\Forms;

use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\Cache;

class TelegramForwardmessage extends Form
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
        // dump($input);

        // return $this->response()->error('Your error message.');

        Cache::put('forwardmessage', $input);

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
        $this->text('chat_id')->required();
        $this->text('messageid')->required();
    }

    protected function savedScript()

    {
        return <<<JS
       $.ajax({

        method:'get',
        url:'/forwardmessage',

      
     

       })
JS;
    }

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
        return  Cache::get('forwardmessage');
    }
}
