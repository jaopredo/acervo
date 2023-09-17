<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenericResource;

use App\Models\Group;

class GroupController extends Controller
{
    public $model = Group::class;
    public $page = 'groups';
    public $inputs = [
        'name',
        'image'
    ];
    public $resource = GenericResource::class;
    public $root_path = ['name' => 'Grupos', 'path' => '/groups'];
}
