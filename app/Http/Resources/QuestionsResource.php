<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        // membuat data apa saja yang hanya bisa ditampilkan 
        return [
            'title' => $this->title,
            'path' => $this->path,
            'body' => $this->body, 
            'created_at' => $this->created_at->diffForHumans(),
            'user' => $this->user->name,
        ];
    }
}
