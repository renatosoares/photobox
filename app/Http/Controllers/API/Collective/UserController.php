<?php

namespace App\Http\Controllers\API\Collective;

use App\Http\Controllers\Controller;
use App\Http\Resources\Collective\MediaCollection;
use App\Http\Resources\Collective\PublicationCollection;
use App\Http\Resources\Collective\UserCollection;
use App\Http\Resources\Collective\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\ResourceCollection
    {
        return new UserCollection(User::paginate());
    }

    public function show(User $user): \Illuminate\Http\Resources\Json\JsonResource
    {
        return new UserResource($user);
    }

    public function mediaIndex(Request $request, User $user): \Illuminate\Http\Resources\Json\ResourceCollection
    {
        $media = $user
            ->media()
            ->where('collection_name', 'images')
            ->paginate();

        return new MediaCollection($media);
    }

    public function publicationIndex(Request $request, User $user): \Illuminate\Http\Resources\Json\ResourceCollection
    {
        $publications = $user->publications()->paginate();

        return new PublicationCollection($publications);
    }
}
