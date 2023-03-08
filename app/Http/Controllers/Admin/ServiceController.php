<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Traits\imagesTrait;
class ServiceController extends Controller
{
    use imagesTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('id','DESC')->paginate(20);

        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
            'main_image'=> 'image|mimes:jpg,png,jpeg'
        ]);
        $data = $request->all();
        if ($request -> has('main_image')) {
            $image = $this -> saveImages($request -> main_image, 'uploads/services');
            $data['main_image'] = $image;
        }

      if(Service::create($data)){
        session() -> flash('success', __('Successfully'));
      }else{
        session() -> flash('Error', 'Error in create');
      }


        return redirect() -> route('Services.index');
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
        $service = Service ::find($id);
        return view('admin.service.edit', compact('service'));
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
            'main_image'=> 'image|mimes:jpg,png,jpeg'
        ]);
        $service = Service ::findOrFail($id);
        $data = $request->all();
        if ($request -> has('main_image')) {
            Storage ::disk('public_uploads') -> delete($service -> main_image);
            $image = $this -> saveImages($request -> main_image, 'uploads/services');
            $data['main_image'] = $image;
        }
            $service->update($data);
        session() -> flash('success', __('Updated Successfully'));
        return redirect() -> route('Services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service ::findOrFail($id);
        $service ->  delete();


        session() -> flash('success',__('deleted successfully'));
        return redirect() -> route('Services.index');
    }
}
