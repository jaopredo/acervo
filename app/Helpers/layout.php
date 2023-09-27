<?php

if (!function_exists('side_menu')) {
    function side_menu() {
        return [
            'ACERVO' => [
                [
                    'path' => '/books',
                    'name' => 'LIVROS',
                    'icon' => 'bi-book-fill'
                ],
                [
                    'path' => '/groups',
                    'name' => 'AGRUPAMENTOS',
                    'icon' => 'bi-boxes'
                ],
                [
                    'path' => '/categories',
                    'name' => 'CATEGORIAS',
                    'icon' => 'bi-bookmark-fill'
                ],
            ]
        ];
    }
}
