<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Student;
use App\Models\Book;
use App\Models\Classroom;

use App\Http\Resources\LoanResource;

class LoansController extends Controller
{
    public $model = Loan::class;
    public $page = 'loans';
    public $inputs = [
        'student_id',
        'book_id',
        'student_name',
        'loan_date',
        'expire_date',
        'book_name',
        'classroom_name',
        'classroom_id'
    ];
    public $validator = [
        'book_id' => 'required',
        'loan_date' => 'required|date',
        'expire_date' => 'required|date',
        'student_id' => 'exists:students,id|nullable',
        'classroom_id' => 'exists:classrooms,id|nullable',
        'student_name' => 'required',
        'book_name' => 'required',
    ];
    public $filters = [
        [ 'name' => 'student_name', 'label' => 'Aluno', 'operator' => 'like' ],
        [ 'name' => 'book_name', 'label' => 'Livro', 'operator' => 'like' ],
        [ 'name' => 'loan_date', 'label' => 'Data', 'operator' => 'like', 'type' => 'date' ],
        [ 'name' => 'expire_date', 'label' => 'Vencimento', 'operator' => 'like', 'type' => 'date' ],
    ];
    public $resource = LoanResource::class;
    public $root_path = ['name' => 'Empréstimos', 'path' => '/loans'];

    public function relationships() {
        return [
            'students' => Student::all(),
            'books' => Book::all(),
            'classrooms' => Classroom::all(),
        ];
    }
}
