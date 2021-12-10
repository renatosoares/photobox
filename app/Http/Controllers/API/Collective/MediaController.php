<?php

namespace App\Http\Controllers\API\Collective;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreMediaRequest;
use App\Http\Resources\Collective\MediaCollection;
use App\Http\Resources\Collective\MediaResource;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index(Request $request): \Illuminate\Http\Resources\Json\ResourceCollection
    {
        $media = Media::paginate();

        return new MediaCollection($media);
    }

    public function show(Media $media): MediaResource
    {
        return new MediaResource($media);
    }
}
