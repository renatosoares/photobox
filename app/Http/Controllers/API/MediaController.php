<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreMediaRequest;
use App\Http\Resources\MediaCollection;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request): \Illuminate\Http\Resources\Json\ResourceCollection
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $media = $user->getMedia('images');

        return new MediaCollection($media);
    }

    public function store(StoreMediaRequest $request): \Illuminate\Http\Resources\Json\JsonResource
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        /** @var \Illuminate\Http\UploadedFile $file */
        foreach ($request->file('media_files') as $file) {
            $media = $user->addMedia($file)
                ->withCustomProperties($request->custom_properties)
                ->toMediaCollection('images');
        }

        return new MediaResource($media);
    }

    public function show(Media $media): MediaResource
    {
        return new MediaResource($media);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // TODO
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO
    }
}
