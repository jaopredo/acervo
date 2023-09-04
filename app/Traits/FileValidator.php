<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


trait FileValidator {
    public function validateFile(Request $request) {
        return $request->file($this->file_field)->isValid() && $request->hasFile($this->file_field);
    }

    public function saveFile(Request $request) {
        $file = $request[$this->file_field];

        $fileName = md5($file->getClientOriginalName() . strtotime('now')) . "." . $file->extension();

        $this[$this->file_field] = $fileName;

        $file->storeAs(env("FILE_STORAGE"), $fileName);

        return $fileName;
    }

    public function storeFile(Request $request) {
        if ($this->validateFile($request)) {
            $this->saveFile($request);
        }
    }

    public function updateFile(Request $request, $data) {
        // return response($this[$this->file_field]);
        if ($this->validateFile($request)) {
            $this->deleteFile();

            $data[$this->file_field] = $this->saveFile($request);
            return $data;
        }
    }

    public function deleteFile() {
        Storage::delete(env('FILE_STORAGE') . $this[$this->file_field]);
    }
}
