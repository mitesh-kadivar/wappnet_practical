<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function showCustomerLoginForm()
    {
        return view('customer.login', ['url' => route('admin.login-view'), 'title'=>'Customer']);
    }

    public function customerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('web')->attempt($request->only(['email','password']), $request->get('remember'))){
            return redirect()->intended('/customer/dashboard');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public function showCustomerRegisterForm()
    {
        return view('customer.register', ['route' => route('customer.register'), 'title'=>'Customer']);
    }

    public function createCustomer(Request $request)
    {
        $this->validator($request->all())->validate();
        $customer = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->intended('home');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
}
