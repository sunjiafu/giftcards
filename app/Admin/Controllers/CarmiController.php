<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Carmi;
use App\Models\Product;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Widgets\Card;
use App\Admin\Forms\ImportCarmis;

class CarmiController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Carmi(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('product_id');
            $grid->column('status');
            $grid->column('carmi');
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
        return Show::make($id, new Carmi(), function (Show $show) {
            $show->field('id');
            $show->field('product_id');
            $show->field('status');
            $show->field('carmi');
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
        return Form::make(new Carmi(), function (Form $form) {
            $form->display('id');
            $form->select('product_id')->options(Product::query()->pluck('name','id'));
       
            $form->text('status');
            $form->textarea('carmi')->required();
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }

    public function importCarmis(Content $content)
    {
        return $content
        ->title(admin_trans('carmi.fields.import_carmis'))
            ->body(new Card(new ImportCarmis()));
    }
}
