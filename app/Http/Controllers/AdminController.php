<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Packages;
use App\Models\Customers;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('admin');
     }

    public function index()
    {
        $data = Packages::get();
        return view('admin/package', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = request()->all();

        $validateData['slug'] = Str::slug(request('name'));
        Packages::create($validateData);

        return Redirect::back()->with('success', 'Data has been Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $data = Packages::where('slug', $slug)->get();
        return view('admin/detail-package', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $data = Packages::where('slug', $slug)->get();
        return view('admin/edit-package', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $dataupdate = request()->except(['_token']);
        $slug = $dataupdate['slug'];

        Packages::where('slug', $slug)
                ->update($dataupdate);

        return Redirect::to('/packages')->with('success', 'Data has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $data = Packages::where('slug', $slug)->delete();
        return Redirect::back()->with('success', 'Data has been Deleted!');
    }

    public function sales_data(){
        $data = User::where('role', 'Sales')->take(4)->get();
        return view('admin/sales-data', ['data' => $data]);
    }

    public function add_sales(Request $request){
        $validateData = request()->all();

        $validateData['username'] = Str::slug(request('name'));
        $validateData['password'] = Hash::make(123);
        $validateData['role'] = 'Sales';
        $validateData['avatar'] = 'profile.jpg';

        User::create($validateData);

        return Redirect::back()->with('success', 'Data has been Added!');
    }

    public function report(){
        $datauser = User::where('role', 'Sales')->get();
        $datapackages = Packages::get();
        $datacustomers = Customers::get();

        return view('admin/report', ['datauser' => $datauser, 'datapackages' => $datapackages, 'datacustomers' => $datacustomers]);
    }

}
