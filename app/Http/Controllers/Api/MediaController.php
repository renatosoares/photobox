<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MediaCollection;
use App\Http\Resources\MediaResource;
use App\Models\Customer;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request, ?Customer $customer = null): \Illuminate\Http\Resources\Json\JsonResource
    {
        $media = Media::paginate();

        if ($customer) {
            $media = $customer
                ->media()
                ->where('collection_name', 'images')
                ->paginate();
        }

        return new MediaCollection($media);
    }

    public function store(
        Request $request,
        Customer $customer
    ): \Illuminate\Http\Resources\Json\JsonResource {
        $media = $customer->addMedia($request->media_file)
            ->withCustomProperties(json_decode($request->custom_properties, true))
            ->toMediaCollection('images');

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
