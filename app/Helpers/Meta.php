<?php

namespace App\Helpers;

class Meta {
    public $get = [];
    public $post = [];
    public $put = [];
    
    public function __construct($get=[], $post=[], $put=[]) {
        $this->get = $get;
        $this->post = $post;
        $this->put = $put;
    }
}
