<?php

namespace App\Admin\Repositories;

use App\Models\Amount as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Amount extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
