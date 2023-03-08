<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProviderAd;
use Illuminate\Http\Request;
use App\Http\Controllers\Administrator;

class AdsController extends Administrator
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $ads = \App\Models\ProviderAd::paginate();
        return view('admin.ads.ads')->with('ads',$ads);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:25',
            'title_ar' => 'required|string|max:25',
            'description' => 'required|string|max:100',
            'description_ar' => 'required|string|max:100',
            'image' => 'required',
            'expiry_date' =>'required',

        ]);

        $request->merge(['is_active' => 1]);
        if ($row = \App\Models\ProviderAd::create($request->except(["image"]))) {

            if ($request->image) {
                $imageName = time() . '.' . $request->image->extension();

                $request->image->move(public_path('/storage/Ads_images'), $imageName);
                $row->image = $imageName;
                $row->save();

            }

            return redirect()->back()
                        ->with('success','Ad created successfully.');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit(Request $request,$id)
    {
        $ads = \App\Models\ProviderAd::where('id',$id)->first();
        return view('admin.ads.edit_ads')->with('ads',$ads);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request,$id)
    {

        $ads = \App\Models\ProviderAd::where('id',$id)->first();
        $ads->update($request->except(["image"]));
            if ($request->image) {
                $imageName = time() . '.' . $request->image->extension();

                $request->image->move(public_path('/storage/Ads_images'), $imageName);
                $ads->image = $imageName;
                // $row->published = 1;
                $ads->save();

            }
            return redirect()->back()
                        ->with('success','Ad updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
        \App\Models\ProviderAd::where('id',$id)->delete();
        return redirect()->back()
        ->with('success','Ad Deleted successfully.');
    }

    public function getActive(Request $request)

    {
        $is_active = $request->is_active;
        $id = $request->id;
        $ads = \App\Models\ProviderAd::where('id',$id)->first();
        $ads->update(['is_active'=>$is_active]);
    }
}
