<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Packages;
use App\Models\Customers;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datauser = User::where('role', 'Sales')->get()->count();
        $datapackages = Packages::get()->count();
        $datacustomers = Customers::get()->count();
        return view('auth/dashboard', ['datauser' => $datauser, 'datapackages' => $datapackages, 'datacustomers' => $datacustomers]);
    }

    public function profile(){
        return view('auth/profile');
    }

    public function edit_profile(Request $request){
        $user = $request->user();
        return view('auth/edit-profile', ['user'=> $user]);
    }

    public function update_profile(Request $request){
        $user = $request->user();
        $name = $user['name'];

        $validateData = $request->except(['_token']);
        $validateData['avatar'] = $request->file('avatar')->getClientOriginalName();

        User::where('name', $name)
        ->update($validateData);


        if($request->hasFile('avatar')){
            $validateData['avatar'] = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->storePubliclyAs('image',$request->file('avatar')->getClientOriginalName(),'public');
            $request->file('avatar')-> move(public_path('public/avatar'), $request->file('avatar')->getClientOriginalName());
        }

        return Redirect::back()->with('success', 'Data has been Updated!');
    }

    public function edit_password(Request $request){
        $user = $request->user();
        return view('auth/edit-password', ['user'=> $user]);
    }

    public function update_password(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Does'nt Match");
        }

        $user = $request->user();
        $name = $user['name'];
        User::where('name', $name)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return Redirect::back()->with('success', 'Data has been Updated!');
    }
}
