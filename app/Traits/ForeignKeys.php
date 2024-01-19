<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ForeignKeys {
    public function saveForeign(Request $request) {
        $data = $request->all();

        // return response($data);
        foreach ($this->foreign_keys as $key) {
            if ($request->has($key)) {
                $this->$key()->sync($data[$key]);
            }
        }
    }
}
