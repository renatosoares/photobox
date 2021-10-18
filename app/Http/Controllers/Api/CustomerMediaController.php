<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerMediaController extends Controller
{
    public function index(Request $request, Customer $customer): \Illuminate\Http\Response
    {
        return response($customer->getMedia('images')->all());
    }

    public function store(
        Request $request,
        Customer $customer
    ): \Illuminate\Http\Response {
        $media = $customer->addMedia($request->media_file)
            ->withCustomProperties(json_decode($request->custom_properties, true))
            ->toMediaCollection('images');

        return response($media);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO
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
