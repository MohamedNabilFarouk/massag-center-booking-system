<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prices;
use Illuminate\Http\Request;

class PricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Prices ::paginate(10);
        return view('admin.prices.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Prices::count() < 3){
            return view('admin.prices.create');
        }else{
            session() -> flash('success', 'You can Edit In one of Exsiting Prices');
            return redirect() -> back();
        }

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
            'des_ar' => 'required|string',
            'price' => 'required',

        ]);

        $data['status'] = $request -> status ? $request -> status : '0' ;

        Prices ::create($data);
        session() -> flash('success', 'added successfully');
        return redirect() -> route('Bestprices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = Prices ::find($id);
        return view('admin.prices.edit', compact('price'));
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
            'price' => 'required',

        ]);
        $price = Prices ::findOrFail($id);

        $data['status'] = $request -> status;

            $price->update($data);
        session() -> flash('success', 'Updated successfully');
        return redirect() -> route('Bestprices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = Prices ::findOrFail($id);
        $price ->  delete();


        session() -> flash('success','deleted successfully');
        return redirect() -> route('Bestprices.index');
    }
}
