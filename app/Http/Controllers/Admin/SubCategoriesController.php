<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Administrator;

class SubCategoriesController extends Administrator
{
    public function getIndex($id)
    {
        $sub_categories = \App\Models\SubCategory::with(['category'])->where('published',1)->where('category_id',$id)->get();
        return view('admin.sub_categories.sub_categories')->with(["sub_categories" => $sub_categories,'category_id' => $id]);
    }

    public function postCreate(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|unique:categories,title',
            'title_ar' => 'required|unique:categories,title_ar',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);


        if ($row = \App\Models\SubCategory::create($request->except(["logo"]))) {
            if ($request->logo) {
                $imageName = time() . '.' . $request->logo->extension();

                $request->logo->move(public_path('/storage/Sub_categories_images'), $imageName);
                $row->logo = $imageName;
                $row->published = 1;
                $row->save();
            }

            return redirect()->back()
                        ->with('success','SubCategory created successfully.'); }


    }

    public function getView($id)
    {
       $category = \App\Models\SubCategory::where('id',$id)->first();
         $count = \App\Models\Product::where('sub_category_id', $category->id)->count();
        $category->products = $count;
    // dd($category);
       $products = \App\Models\Product::with(['images','category','sub_category','review','offers'])->where('sub_category_id',$id)->paginate();
       $products->each(function ($row) use($category) {
        $order_count = \App\Models\OrderProduct::whereHas('product', function ($query) use ($row,$category) {
            $query->where('sub_category_id', $category->id);

        })->count();
        $row->orders = $order_count;
    });
       return view('admin.categories.categories-products')->with(["category" => $category,"products"=>$products]);

    }

    public function getEdit($id)
    {
        $category = \App\Models\Category::where('id',$id)->first();
        return view('admin.sub_categories.sub-categories-edit')->with('category',$category);
    }

    public function postEdit(Request $request, SubCategory $category)
    {
        $request->validate([
            'title' => 'unique:categories,title,'.$category->id,
            'title_ar' => 'unique:categories,title_ar,'.$category->id,
            'logo' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $category->update($request->except(["logo"]));
            if ($request->logo) {
                $imageName = time() . '.' . $request->logo->extension();

                $request->logo->move(public_path('/storage/categories_images'), $imageName);
                $category->logo = $imageName;
                // $row->published = 1;
                $category->save();

            }
            return redirect()->back()
                        ->with('success','Category updated successfully.');


    }
    public function getDelete($id)
    {
        $category = \App\Models\SubCategory::where('id',$id)->delete();
        return redirect()->back()
        ->with('success','Category Deleted successfully.');
    }
}
