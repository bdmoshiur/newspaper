<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class ProductController extends Controller
{
    
    public function index()
    {
        $products  = Product::orderBy('created_at','desc')->get();
        return view('product.index',compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            "product_name" => 'required|max:255',
            "product_code" =>'required',
            "details" => 'required',
             "logo"   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $fileName = "";
        if ($request->file('logo') != "") {
            $file = $request->file('logo');
            $fileName = md5($file->getClientOriginalName().time()).".".$file->getClientOriginalExtension();
            $file->move('public/uploads/logo/', $fileName);
            $fileName = 'public/uploads/logo/'.$fileName;
        }
        try{
            $product = New Product();           
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->details = $request->details;
            $product->logo = $fileName;
            $product->save();
            Toastr::success('Send successful', 'Success');
            return redirect()->back();
        }catch(Exception $e){
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
     
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product,$id)
    {
        $product = Product::find($id);
        return view('product.edit',compact('product'));
    }

    
    public function update(Request $request, Product $product,$id)
    {
        $this->validate($request,[
            "product_name" => 'required|max:255',
            "product_code" =>'required',
            "details" => 'required',
             "logo"   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $fileName = "";
        if ($request->file('logo') != "") {
            $file = $request->file('logo');
            $fileName = md5($file->getClientOriginalName().time()).".".$file->getClientOriginalExtension();
            $file->move('public/uploads/logo/',$fileName);
            $fileName = 'public/uploads/logo/'.$fileName;
        }
        try{
            $product = Product::find($id);           
            $product->product_name = $request->product_name;
            $product->product_code = $request->product_code;
            $product->details = $request->details;
            $product->logo = $fileName;
            $product->save();
            Toastr::success('Send successful', 'Success');
            return redirect()->back();
        }catch(Exception $e){
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
    }

   
    public function destroy(Product $product,$id)
    {
        try{
            $product = Product::find($id);
            if(file_exists('public/uploads/logo/'.$product->logo) AND ! empty($product->logo)){
                unlink('public/uploads/logo/'.$product->logo);
            }
            $product->delete();

            Toastr::success('Send successful', 'Success');
            return redirect()->back();
        }catch(Exception $e){
            Toastr::error('Operation Failed', 'Failed');
            return redirect()->back();
        }
       
    }
}
