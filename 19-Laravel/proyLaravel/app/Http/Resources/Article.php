<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
/**
* Transform the resource into an array.
*
* @param \Illuminate\Http\Request $request
* @return array
*/
public function toArray($request)
{
//return parent::toArray($request);
return [
    'id' => $this->id,
    'title' => $this->title,
    'editor' => $this->user->fullname,
    'category' => $this->category->name,
    'slider' => $this->slider,
    'price' => $this->price,
    'created_at' => $this->created_at->format('d/m/Y')
        ];
    }
}