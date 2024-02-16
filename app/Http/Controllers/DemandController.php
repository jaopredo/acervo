<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemandController extends Controller
{
    public $root_path = [ 'name' => 'Cobrar Pendentes', 'path' => '/demand' ];

    public function demand() {
        return view('services.demands', [
            'path' => [ $this->root_path ]
        ]);
    }
}
