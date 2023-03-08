<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Administrator;
use App\Traits\imagesTrait;
class CategoriesController extends Administrator
{

    use imagesTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $categories = \App\Models\Category::all();
        return view('admin.categories.index')->with(["categories" => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title_en' => 'required|unique:categories,title',
            'title_ar' => 'required|unique:categories,title_ar',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

$data =$request->all();
if ($request -> has('logo')) {
    $image = $this -> saveImages($request -> main_image, 'uploads/categories');
    $data['logo'] = $image;
}
if(Category::create($data)){
    session() -> flash('success', 'added successfully');
    return redirect()->back();
  }else{
    session() -> flash('Error', 'Error in create');
    return redirect()->back();
  }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category ::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
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
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        $category = Caetgory ::findOrFail($id);
        $data = $request->all();
        if ($request -> has('logo')) {
            Storage ::disk('public_uploads') -> delete($category -> logo);
            $image = $this -> saveImages($request -> main_image, 'uploads/categories');
            $data['logo'] = $image;
        }
            $category->update($data);
        session() -> flash('success', 'Updated successfully');
        return redirect() -> route('categories.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Models\Category::where('id',$id)->delete();
        return redirect()->back()
        ->with('success','Category Deleted successfully.');
    }
}
