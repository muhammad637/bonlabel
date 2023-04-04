<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;

class OrdersExport implements FromArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $orders;
    public function __construct(array $orders)
    {
        $this->orders = $orders;       
    }

    public function array() :array {
        return $this->orders;
    }
}
