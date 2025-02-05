<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return([
            'title' => $this->title,
            'writer' => $this->writer,
            'user_id' => $this->user_id,
            'category_id' => $this->category_id,
            'publisher' => $this->publisher,
            'year' => $this->year,
        ]);
    }
}
