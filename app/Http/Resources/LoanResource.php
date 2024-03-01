<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'loan_date' => $this->loan_date,
            'expire_date' => $this->expire_date,
            'student' => $this->student,
            'student_name' => $this->student_name,
            'book' => $this->book,
            'book_name' => $this->book_name,
            'classroom_name' => $this->classroom_name ?? $this->student->classroom->name ?? 'Não Registrada'
        ];
    }
}
