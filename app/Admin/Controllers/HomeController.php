<?php

namespace App\Admin\Controllers;

use App\Admin\Metrics\Examples;
use App\Http\Controllers\Controller;
use Dcat\Admin\Http\Controllers\Dashboard;
use Dcat\Admin\Layout\Column;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->header('Dashboard')
            ->description('Description...')
            ->body(function (Row $row) {
                $row->column(12, function (Column $column) {
                    $column->row(Dashboard::title());
              
                });

                $row->column(12, function (Column $column) {
                    $column->row(function (Row $row){

                        $row->column( 6, new Examples\Tickets());
                        $row->column( 6, new Examples\Sessions());
                       
                 
                    });
              
                });

                

         
            });
    }
}
