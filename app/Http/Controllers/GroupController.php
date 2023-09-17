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
    public $validator = [
        'name' => 'required',
        'image'=> 'required|file'
    ];
    public $resource = GenericResource::class;
    public $root_path = ['name' => 'Grupos', 'path' => '/groups'];
}
