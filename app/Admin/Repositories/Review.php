<?php

namespace App\Admin\Repositories;

use App\Models\Reviews as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Review extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
