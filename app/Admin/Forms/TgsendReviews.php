<?php

namespace App\Admin\Forms;

use Dcat\Admin\Widgets\Form;
use Illuminate\Support\Facades\Cache;

class TgsendReviews extends Form
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

        Cache::put('tgsend-reviews',$input);

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

        $this->tab('评论内容', function () {

   

            $this->markdown('countrt','内容')->required();


        });
  
    }
 

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default()
    {
        return Cache::get('tgsend-reviews');
    }
}
