<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportOrder;
class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id','DESC')->with('user','product')->paginate(20);

        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $order = Order ::find($id);
        return view('admin.orders.show', compact('order'));
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
// dd($request->is_canceled);
        $order = Order::findOrFail($id);

       $order-> is_paid = '1';


            $order->save();
        session() -> flash('success', __('Updated successfully'));
        return redirect() -> route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order ::findOrFail($id);
        $order ->  delete();


        session() -> flash('success',__('deleted successfully'));
        return redirect() -> route('orders.index');
    }
    public function exportOrders(Order $order){
        return Excel::download(new ExportOrder($order), 'orders.xlsx');
    }
}
