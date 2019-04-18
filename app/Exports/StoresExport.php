<?php

namespace App\Exports;

use App\Store;
use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Auth;

class StoresExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $store_id = Auth::user()->store_id;
        return Product::where('store_id', $store_id)->get();
    }

    public function map($product): array
    {
        if ($product != null) {
            return [
                $product->id,
                $product->name,
                $product->number,
            ];
        } else {
            return [
            ];
        }
    }

    public function headings(): array
    {
        return [
            'ID',
            'Tên sản phẩm',
            'Số lượng',
        ];
    }
}
