<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Http\Controllers\Administrator;
use App\Traits\imagesTrait;
use Storage;
use Illuminate\Support\Facades\DB;

class ProductsController extends Administrator
{
    use imagesTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->paginate(20);

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
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
            'des_ar' => 'string',
            'main_image'=> 'image|mimes:jpg,png,jpeg'
        ]);
        $data = $data = $request->except(['gallery']);
        if ($request -> has('main_image')) {
            $image = $this -> saveImages($request -> main_image, 'uploads/Products');
            $data['main_image'] = $image;
        }
        DB::beginTransaction();
      if($product= Product::create($data)){
    // start save room Gallery
            if ($request -> has('gallery')) {

                foreach($request->gallery as $i){

                    $image = $this -> saveImages($i, 'uploads/products');
                    $gallery = new ProductGallery();
                    $gallery->product_id = $product->id;
                    $gallery->image = $image;
                    $gallery->save();
                }
    // end of saving room gallery

            }

            DB::commit();

            session() -> flash('success', trans('Successfully'));
        }else{
                DB::rollback();

                session() -> flash('success', trans('Error'));
    }

        return redirect() -> route('Products.index');
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
        $product = Product ::find($id);
        return view('admin.product.edit', compact('product'));
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
        $product = Product ::findOrFail($id);
        $data = $request->except(['gallery']);

        if ($request -> has('main_image')) {
            Storage ::disk('public_uploads') -> delete($product -> main_image);
            $image = $this -> saveImages($request -> main_image, 'uploads/products');
            $data['main_image'] = $image;
        }

        DB::beginTransaction();
          if($product->update($data)){

            // start save  Gallery
            if ($request -> has('gallery')) {
                $product->gallery()->delete();
                foreach($request->gallery as $i){
                    $image = $this -> saveImages($i, 'uploads/products');
                    $gallery = new ProductGallery();
                    $gallery->product_id = $product->id;
                    $gallery->image = $image;
                    $gallery->save();
                }
            }
            // end of saving  gallery
            DB::commit();
            session() -> flash('success', trans('Successfully'));
         }else{
            DB::rollback();
            session() -> flash('success', trans('Error'));
         }
        return redirect() -> route('Products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product ::findOrFail($id);
        DB::beginTransaction();
        // dd($product);
        if(($product->gallery)!='[]'){
            $product->gallery->delete();
        }

        $product ->  delete();
        DB::commit();

        session() -> flash('success',__('deleted successfully'));
        return redirect() -> route('Products.index');
    }
}
