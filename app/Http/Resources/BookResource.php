<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Group;
use App\Models\BookCategory;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
			"register"=> $this->register,
			"cdd"=> $this->cdd,
			"isbn"=> $this->isbn,
			"name"=> $this->name,
			"author"=> $this->author,
			"publication"=> $this->publication,
			"description"=> $this->description,
			"editor"=> $this->editor,
			"pages"=> $this->pages,
			"volume"=> $this->volume,
			"example"=> $this->example,
			"aquisition_year"=> $this->aquisition_year,
			"aquisition"=> $this->aquisition,
			"local"=> $this->local,
			"available"=> $this->available,
			"created_at"=> $this->created_at,
			"updated_at"=> $this->updated_at,
			"image"=> $this->image,
        ];
    }
}
