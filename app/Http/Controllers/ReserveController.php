<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Notification;

use App\Models\Reserve;
use App\Models\User;
use App\Models\Student;

use App\Http\Resources\ReserveResource;

use App\Notifications\ReserveCreated;
use Carbon\Carbon;

class ReserveController extends Controller
{
    public $model = Reserve::class;
    public $resource = ReserveResource::class;
    public $inputs = [
        'student_id',
        'book_id',
    ];
    public $validator = [
        'student_id'=> 'required|exists:students,id',
        'book_id'=> 'required|exists:books,id',
    ];

    public $page = 'reserves';
    public $root_path = ['name' => 'Reservas', 'path' => '/reserves'];

    public $filters = [];


    public function create_and_notify(Request $request) {
        $request->request->add(['student_id' => auth()->user()->id, 'expire_date'=>Carbon::tomorrow()->toDateString()]);
        // return response()->json([
        //     'date' => Carbon::tomorrow(),
        // ]);
        $student = Student::findOrFail($request->student_id);

        if (!$student->isBanned()) {
            $reserve = $this->store($request);

            Notification::sendNow(User::all(), new ReserveCreated($reserve->getOriginalContent()['entry']));
            return $reserve;
        } else {
            return response([
                'message' => 'Você não pode reservar um livro, você está banido. Se acha que isso é um erro, entre em contato com a biblioteca'
            ], 401);
        }
    }
}
