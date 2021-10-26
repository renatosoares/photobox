<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreRegisteredCustomerRequest;
use App\Models\Customer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class RegisteredCustomerController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreRegisteredCustomerRequest $request)
    {
        $validated = collect($request->safe()->only(['name', 'email', 'password']))
            ->map(function ($item, $key) {
                if ($key === 'password') {
                    $item = Hash::make($item);
                }

                return $item;
            })
            ->toArray();

        $customer = Customer::create($validated);

        event(new Registered($customer));

        return $customer;
    }
}
