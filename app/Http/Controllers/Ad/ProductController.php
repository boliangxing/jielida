<?php namespace App\Http\Controllers\Ad;
use App\Http\Controllers\Controller;
 use App\Entity\Product;


use Illuminate\Http\Request;
use App\Models\M3Result;
class ProductController extends Controller
{

 public function toProduct_list(){

   $products=Product::all();

   return view('ad.product_list')->with('products',$products);



 }
}
