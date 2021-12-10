<?php

namespace App\Http\Resources\Collective;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $attributes = $this->attributesToArray();

        unset($attributes['email_verified_at']);
        unset($attributes['deleted_at']);

        return [
            'type' => $this->getTable(),
            'id' => (string) $this->id,
            'attributes' => $attributes,
        ];
    }
}
