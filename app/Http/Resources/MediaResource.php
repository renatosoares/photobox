<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    public static $wrap = 'data';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $attributes = $this->attributesToArray();

        unset($attributes['model_type']);
        unset($attributes['model_id']);

        return [
            'type' => $this->getTable(),
            'id' => (string) $this->id,
            'attributes' => $attributes,
        ];
    }


    public function with($request)
    {
        return [
            'meta' => [
                'media' => 'media',
            ],
        ];
    }
}
