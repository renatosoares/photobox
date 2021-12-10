<?php

namespace App\Http\Controllers\API\Collective;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collective\PublicationCollection;
use App\Http\Resources\Collective\PublicationResource;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index(Request $request): \Illuminate\Http\Resources\Json\ResourceCollection
    {
        $publications = Publication::paginate();

        return new PublicationCollection($publications);
    }

    public function show(Request $request, Publication $publication): \Illuminate\Http\Resources\Json\JsonResource
    {
        return new PublicationResource($publication);
    }
}
