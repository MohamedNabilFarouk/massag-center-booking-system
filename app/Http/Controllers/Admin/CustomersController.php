<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\Order;
use App\Models\User;
use App\Http\Controllers\Administrator;

class CustomersController extends Administrator
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $customers = \App\Models\User::paginate(10);
        return view('admin.customers.customers')->with(["customers" => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getView($id)
    {
        $customer = Customer::with([])->where('id',$id)->first();

         $country = Countries::where('iso3',$customer->country_iso)->first();

        return view('admin.customers.customer_details')->with(["customer" => $customer,"country"=>$country]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $customer = \App\Models\Customer::where('id',$id)->first();
        return view('admin.customers.customer_edit')->with('customer',$customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|unique:customers,mobile,' . $customer->id,
            'profile_img' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $customer->update($request->except(["profile_img"]));
            if ($request->profile_img) {
                $imageName = time() . '.' . $request->profile_img->extension();

                $request->profile_img->move(public_path('/storage/profile_images'), $imageName);
                $customer->profile_img = $imageName;
                // $row->published = 1;
                $customer->save();

            }
            return redirect()->back()
                        ->with('success','Customer updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
        $customer = \App\Models\User::where('id',$id)->delete();
        return redirect()->back()
        ->with('success','Customer Deleted successfully.');
    }

}
