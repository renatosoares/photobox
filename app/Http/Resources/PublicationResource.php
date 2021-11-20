<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PublicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var \App\Models\Media $media */
        $media = $this->media;

        /** @var \App\Models\User $user */
        $user = $this->user;

        $attributes = $this->attributesToArray();

        unset($attributes['user_id']);
        unset($attributes['media_id']);

        return [
            'type' => $this->getTable(),
            'id' => (string) $this->id,
            'attributes' => $attributes,
            'relationships' => [
                $media->getTable() => [
                    'data' => new MediaResource($media),
                ],
                $user->getTable() => [
                    'data' => new UserResource($user),
                ],
            ],
        ];
    }
}
