<?php

namespace App\Admin\Controllers;


use App\Models\Amount;
use App\Models\Category;
use App\Admin\Repositories\Product;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Support\Helper;


class ProductController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(Product::with('Category'), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('picture')->image('',100,100);
            $grid->column('url');
            $grid->column('category.name');
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
        return Show::make($id, new Product(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('picture')->image();
            $show->field('url');
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
        return Form::make( Product::with('amount'), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('country');
            $form->image('picture');
            $form->image('de_pic');
            $form->text('url');
            $form->textarea('detail');
            $form->select('category_id')->options(Category::query()->pluck('name','id'));
            $form
            ->multipleSelect('amount','面额')
            ->options(Amount::all()
            ->pluck('amount','id'))
            ->customFormat(function ($v) {
                if (! $v) {
                    return [];
                }
    
                // 从数据库中查出的二维数组中转化成ID
                return array_column($v, 'id');
            });
    

    
           
  
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
