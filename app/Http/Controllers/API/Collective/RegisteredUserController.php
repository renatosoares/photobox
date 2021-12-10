<?php

namespace App\Http\Controllers\API\Collective;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreRegisteredUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreRegisteredUserRequest $request)
    {
        $validated = collect($request->safe()->only(['name', 'email', 'password']))
            ->map(function ($item, $key) {
                if ($key === 'password') {
                    $item = Hash::make($item);
                }

                return $item;
            })
            ->toArray();

        $user = User::create($validated);

        event(new Registered($user));

        return new UserResource($user);
    }
}
