<?php

namespace App\Http\Controllers\API;

use App\Events\PublicationStoredEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\StorePublicationRequest;
use App\Http\Resources\PublicationCollection;
use App\Http\Resources\PublicationResource;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicationController extends Controller
{
    public function index(Request $request): \Illuminate\Http\Resources\Json\ResourceCollection
    {
        $publications = Publication::paginate();

        return new PublicationCollection($publications);
    }

    public function store(StorePublicationRequest $request): \Illuminate\Http\Resources\Json\JsonResource
    {
        $validated = $request->safe()->only(['title', 'body', 'publish_at', 'active', 'media_id']);

        data_fill(
            $validated,
            'slug',
            Str::slug(data_get($validated, 'title'), '-')
        );

        data_fill(
            $validated,
            'user_id',
            auth()->user()->id
        );

        $publication = Publication::create($validated);

        event(new PublicationStoredEvent($publication));

        return new PublicationResource($publication);
    }

    public function show(Request $request, Publication $publication): \Illuminate\Http\Resources\Json\JsonResource
    {
        return new PublicationResource($publication);
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
