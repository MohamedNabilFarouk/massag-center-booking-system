<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Service;
use App\Traits\imagesTrait;
use DB;
class PackageController extends Controller
{
    use imagesTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Packages = Package::orderBy('id','DESC')->paginate(20);

        return view('admin.Package.index', compact('Packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        // dd($services);
        return view('admin.Package.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'des_en' => 'required|string',
            'price' => 'required|string',
        ]);
        $data = $request->except('services');
        $data['home_page'] = $request->home_page;



 // dd($data);
 DB::beginTransaction();
            if($package = Package::create($data)){
// start save package service many to many relations
            $package->package_service()->sync($request->services);
// end saving


   DB::commit();

   session() -> flash('success', trans('Successfully'));
}else{
   DB::rollback();

   session() -> flash('success', trans('Error'));
}



        return redirect() -> route('Packages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Package = Package ::find($id);
        $services = Service::all();
        // dd($services);
        return view('admin.Package.edit', compact('Package','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request -> validate([
            'title_en' => 'required|string',
            'title_ar' => 'required|string',
            'des_en' => 'required|string',
            'des_ar' => 'required|string',
            'price' => 'required|string',

        ]);
        $Package = Package ::findOrFail($id);
        // $data = $request->all(($request->except('services')));
        $data = $request->except('services');

        if(! $request->has('is_special')){
            $data['is_special'] = 0;
        }
        if(! $request->has('with_special')){
            $data['with_special'] = 0;
        }
        DB::beginTransaction();
        if($Package->update($data))   {

                   $Package->package_service()->sync($request->services);

          DB::commit();

          session() -> flash('success', trans('Updated Successfully'));
       }else{
          DB::rollback();
          session() -> flash('success', trans('Error'));
       }

        return redirect() -> route('Packages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Package = Package ::findOrFail($id);
        $Package ->  delete();
        $Package->package_service()->detach();

        session() -> flash('success',__('deleted successfully'));
        return redirect() -> route('Packages.index');
    }
}
