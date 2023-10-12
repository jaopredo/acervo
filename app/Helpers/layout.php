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
            ],
        ];
    }
}
