<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\MediaCollection;
use App\Http\Resources\PublicationCollection;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\ResourceCollection
    {
        return new UserCollection(User::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO
    }

    public function show(): \Illuminate\Http\Resources\Json\JsonResource
    {
        return new UserResource(auth('api')->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        logger(__METHOD__, [$request->all(), $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
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
