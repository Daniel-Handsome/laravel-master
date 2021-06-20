<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PostComment as comment;

class Commnet extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'created_at' => (string)$this->created_at,
            'updated_at' =>(string) $this->updated_at,
            'comment_id' =>comment::collection($this->whenLoaded('comments')),
        ];
    }
}
