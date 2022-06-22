<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // I can make filter from Controller and send hear 
        $products = Product::orderBy('id', 'desc')->get(); // All Data in Products
        return $products;
    } // End method



    public function map($products): array // filter data inside EXCEL file
    {
        return [
            $products->name,
            $products->type_code,
            $products->description,
            $products->quantity,
            $products->price,
            $products->created_at->toDateString(),
        ];
    } // End Method


    public function headings(): array // <th> inside excel file 
    {
        return [
            'Name',
            'Type Code',
            'Description',
            'Quantity',
            'Price',
            'Date'
        ];
    } // End Method

}
