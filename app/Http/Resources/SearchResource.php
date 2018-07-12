<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SearchResource extends Resource
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
            'address' => $this->address,
            'title' => $this->title,
            'starthour' => $this->starthour,
            'endhour' => $this->endhour,
            'images' => $this->images,
            'tags' => $this->tags,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'state' => $this->state,
            'location' => [
                'lat' => $this->lat,
                'lng' => $this->lng,
            ]
        ];
    }
}
