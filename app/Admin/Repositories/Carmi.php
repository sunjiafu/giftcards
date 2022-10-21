<?php

namespace App\Admin\Repositories;

use App\Models\Carmis as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Carmi extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
