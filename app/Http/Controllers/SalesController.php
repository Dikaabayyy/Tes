<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Customers;
use Illuminate\Support\Facades\Redirect;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('sales');
     }

    public function index()
    {
        $data = Customers::get();
        return view('sales/customer', ['data' => $data]);
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

        $validateData['id_image'] = $request->file('id_image')->getClientOriginalName();

        if ($request->hasFile('id_image')) {
            $validate['id_image'] = $request->file('id_image')->getClientOriginalName();
            $request->file('id_image')->storePubliclyAs('image',$request->file('id_image')->getClientOriginalName(),'public');
            $request->file('id_image')-> move(public_path('public/ID'), $request->file('id_image')->getClientOriginalName());
        }
        $validateData['slug'] = Str::slug(request('name'));
        Customers::create($validateData);

        return Redirect::back()->with('success', 'Data has been Added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $data = Customers::where('slug', $slug)->get();
        return view('sales/detail-customers', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {
        $data = Customers::where('slug', $slug)->get();
        return view('sales/edit-customers', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $dataupdate = request()->except(['_token']);
        $slug = $dataupdate['slug'];

        Customers::where('slug', $slug)
                ->update($dataupdate);

        if($request->hasFile('id_image')){
            $validateData['id_image'] = $request->file('id_image')->getClientOriginalName();
            $request->file('id_image')->storePubliclyAs('image',$request->file('id_image')->getClientOriginalName(),'public');
            $request->file('id_image')-> move(public_path('public/ID'), $request->file('id_image')->getClientOriginalName());
        }

        return Redirect::to('/customers')->with('success', 'Data has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $data = Customers::where('slug', $slug)->delete();
        return Redirect::back()->with('success', 'Data has been Deleted!');
    }
}
