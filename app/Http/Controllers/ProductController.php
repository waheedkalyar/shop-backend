<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{

    /**
     * Return a listing of the products with images.
     *
     * @return \Illuminate\Http\Response (json)
     */
    public function index(){
        $products = json_decode(Http::get("https://assignment.dwbt.tech/products")->body())->products;
        $images = (array) json_decode(Http::get("https://assignment.dwbt.tech/images")->body())->images;


        foreach($products as $product)
           $product->images = $images[$product->sku];

        return response()->json($products);
    }
}
