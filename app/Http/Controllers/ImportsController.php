<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportsController extends Controller
{
    public $root_path = ['name' => 'Importar Livros', 'path' => '/import'];

    public function imports() {
        return view('services.imports', [
            'path' => [
                $this->root_path
            ]
        ]);
    }

    public function generate_import(Request $request) {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
            'import_select' => 'required'
        ]);

        // Get the uploaded file
        $file = $request->file('file');

        $correct_import = config('excel.tables.' . $request->import_select);

        // Process the Excel file
        Excel::import(new $correct_import, $file);

        return redirect()->back()->with('success', 'Excel file imported successfully!');
    }
}
