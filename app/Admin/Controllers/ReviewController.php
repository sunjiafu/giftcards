<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Review;
use App\Models\Product;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ReviewController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Review(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user_name');
            $grid->column('content');
            $grid->column('product_id');
            $grid->column('date');
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
        return Show::make($id, new Review(), function (Show $show) {
            $show->field('id');
            $show->field('user_name');
            $show->field('content');
            $show->field('product_id');
            $show->field('date');
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
        return Form::make(new Review(), function (Form $form) {
            $form->display('id');
            $form->select('product_id')->options(Product::query()->pluck('name','id'));
            $form->text('user_name');
            $form->text('content');
        
            $form->text('date');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
