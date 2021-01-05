<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->redirectTo = route('home');
        $this->middleware('auth');
    }

    public function registerForm()
    {
        return view('auth.register_address_soupculture', ['oldAddress' => old('your-address') ?? '']);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $addressConfirmed = $request->get('address-confirmed');
        $yourAddress = $request->get('your-address');
        $address = Address::firstOrCreate(['description' => $yourAddress ?? $addressConfirmed, 'confirmed' => false]);
        $user = $request->user();
        $address->users()->save($user);
        return redirect()->route('home');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'your-address' => ['required_without:address-confirmed', 'nullable', 'string', 'min:3'],
            'address-confirmed' => ['required_without:your-address', 'nullable', 'string', 'min:3'],
        ]);
    }
}
