<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $products = Product::take(100)->orderBy('id', 'desc')->get();
        return $products;
    } // End method

    public function map($products): array
    {
        return [ // data form $proucts
            $products->name,
            $products->type_code,
            $products->description,
            $products->quantity,
            $products->price,
            $products->created_at->toDateString(),
        ];
    } // End mehtod

    public function headings(): array // header for file 
    {
        return [
            'Name',
            'Type Code',
            'Description',
            'Quantity',
            'Price',
            'Data',
        ];
    } // End method

} // End class
