<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Pay;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class PayController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Pay(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('pay_name');
            $grid->column('pay_slug');
            $grid->column('apikey');
            $grid->column('merchant_key');
            $grid->column('store_id');
            $grid->column('webhook_key');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new Pay(), function (Show $show) {
            $show->field('id');
            $show->field('pay_name');
            $show->field('pay_slug');
            $show->field('apikey');
            $show->field('merchant_key');
            $show->field('store_id');
            $show->field('webhook_key');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Pay(), function (Form $form) {
            $form->display('id');
            $form->text('pay_name');
            $form->text('pay_slug');
            $form->text('apikey');
            $form->text('merchant_key');
            $form->text('store_id');
            $form->text('webhook_key');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
