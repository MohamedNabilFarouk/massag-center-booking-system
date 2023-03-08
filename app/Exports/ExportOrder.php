<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportOrder implements   WithMapping,FromCollection,WithHeadings
{
    // use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    private $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function collection()
    {
        // return Order::all();
        return $this->order;

    }


    public function map($order): array
    {
        // dd($order->product->title);
        return [
            $order->id,
            $order->product->title,
            $order->user->name,
            $order->address,
            $order->user->phone,
            $order->phone,
            $order->user->email,
            $order->created_at,

        ];
    }

    public function headings():array{
        return[
            'Id',
            'product',
            'User Name',
            'User Address',
            'User phone 1',
            'User phone 2',
            'User email',
            'Created_at',

        ];
    }
}
