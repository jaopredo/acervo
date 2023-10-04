<?php

if (!function_exists('side_menu')) {
    function side_menu() {
        return [
            'Acervo' => [
                [
                    'path' => '/books',
                    'name' => 'Livros',
                    'icon' => 'bi-book'
                ],
                [
                    'path' => '/groups',
                    'name' => 'Agrupamentos',
                    'icon' => 'bi-boxes'
                ],
                [
                    'path' => '/categories',
                    'name' => 'Categorias',
                    'icon' => 'bi-bookmark'
                ],
            ],
        ];
    }
}
