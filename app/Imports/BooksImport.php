<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;

class BooksImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Book([
            'register' => trim($row[0]),
            'example' => intval(trim($row[1])),
            'type' => trim($row[2]),
            'name' => trim($row[3]),
            'author' => trim($row[4]),
            'editor' => trim($row[5]),
            'cdd' => str_replace('CDD-', '', trim($row[6])),
        ]);
    }
}
