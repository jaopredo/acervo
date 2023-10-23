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
            'Alunos' => [
                [
                    'path' => '/students',
                    'name' => 'Alunos',
                    'icon' => 'bi-people-fill'
                ],
                [
                    'path' => '/classrooms',
                    'name' => 'Salas de Aula',
                    'icon' => 'bi-window'
                ],
                [
                    'path' => '/loans',
                    'name' => 'Empréstimos',
                    'icon' => 'bi-file-earmark-lock2-fill'
                ],
                [
                    'path' => '/banneds',
                    'name' => 'Banidos',
                    'icon' => 'bi-x-octagon'
                ],
                [
                    'path' => '/reserves',
                    'name' => 'Reservados',
                    'icon' => 'bi-lock'
                ],
            ],
            'Informações' => [
                [
                    'path' => '/reads',
                    'name' => 'Lidos',
                    'icon' => 'bi-journal-check'
                ],
                [
                    'path' => '/favorites',
                    'name' => 'Favoritos',
                    'icon' => 'bi-star'
                ],
                [
                    'path' => '/wishes',
                    'name' => 'Desejos',
                    'icon' => 'bi-clipboard2-heart'
                ],
            ]
        ];
    }
}
