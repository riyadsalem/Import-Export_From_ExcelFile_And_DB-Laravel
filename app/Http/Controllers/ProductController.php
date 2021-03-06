<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    } // End method

    public function export(Request $request)
    {
         //  return Excel::download(new ProductsExport(), 'products-'.date('Y-m-d').'.pdf', \Maatwebsite\Excel\Excel::MPDF); 
         return Excel::download(new ProductsExport(), 'products-'.date('Y-m-d').'.xlsx', \Maatwebsite\Excel\Excel::XLSX); // 
    } // end Method


} // End Class
