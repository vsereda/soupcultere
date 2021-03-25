<?php

namespace App\Http\Controllers\Auth;

use App\Models\Address;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdditionalDataController extends Controller
{
    public function __construct()
    {
        $this->redirectTo = route('home');
        $this->middleware('auth');
    }

    public function registerForm()
    {
        $user = auth()->user();
        $confirmedAddresses = Address::where('confirmed', 1)->get()
            ->map(function ($item, $key) {
                return ['id' => $item->getAttribute('id'), 'name' => $item->getAttribute('description')];
            })
            ->toArray();
        $oldAddress = old('your-address') ?? '';
        $phone_exists = (boolean)$user->getAttribute('phone');
        $address_exists = $user->address instanceof Address;

        if ($phone_exists && $address_exists) {
            return redirect()->route('home');
        }

        return view('auth.register_additional_data_soupculture',
            compact('oldAddress', 'confirmedAddresses', 'phone_exists', 'address_exists')
        );
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $user = $request->user();
        $userPhone = $user->getAttribute('phone');
        $userAddress = $user->address;

        $this->validator($request->all(), $userAddress, $userPhone)->validate();

        $yourAddress = $request->get('your-address');
        $addressConfirmed = $request->get('address-confirmed');
        $phone = (int) $request->get('phone');

        if($phone && (null === $user->getAttribute('phone'))) {
            $user->phone = $phone;
            $user->save();
        }
        if(($addressConfirmed ?? $yourAddress) && !$user->address) {
            $address = Address::firstOrCreate(['description' => $addressConfirmed ?? $yourAddress]);
            $address->users()->save($user);
        }
        return redirect()->route('home');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $userAddress, $userPhone)
    {
        $rules = [
            'phone' => ($userPhone ? '' : 'required|') . 'regex:/^0(\d){9}$/i|unique:users',
            'your-address' => ($userAddress ? '' : 'required_without:address-confirmed|') . 'nullable|string|min:3',
            'address-confirmed' => ($userAddress ? '' : 'required_without:your-address|') . 'nullable|string|min:3',
        ];
        return Validator::make($data, $rules);
    }
}
