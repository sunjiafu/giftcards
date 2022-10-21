<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Order;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use App\Models\Order as OrderModel;
use Dcat\Admin\Http\Controllers\AdminController;

class OrderController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Order(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('order_sn');
            $grid->column('product_id');
            $grid->column('title');
            $grid->column('price');
            $grid->column('buyeremail');
            $grid->column('pay_id');
            $grid->column('code');
            $grid->column('status')
            ->select(OrderModel::getStatusMap());
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
        return Show::make($id, new Order(), function (Show $show) {
            $show->field('id');
            $show->field('order_sn');
            $show->field('product_id');
            $show->field('title');
            $show->field('price');
            $show->field('buyeremail');
            $show->field('pay_id');
            $show->field('code');
            $show->field('status');
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
        return Form::make(new Order(), function (Form $form) {
            $form->display('id');
            $form->text('order_sn');
            $form->text('product_id');
            $form->text('title');
            $form->text('price');
            $form->text('buyeremail');
            $form->text('pay_id');
            $form->text('code');
            $form->select('status')->options(OrderModel::getStatusMap());
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
