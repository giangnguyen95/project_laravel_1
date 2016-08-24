<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Http\Requests;
use Request;
use App\Product;
use App\Cate;
use App\ProductImage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    // 
    public function index(){
    	$products = Product::all();
    	return view('admin.product.list', compact('products'));
    }

    public function create(){
        $cate = Cate::select('id', 'name', 'parent_id')->get()->toArray();
    	return view('admin.product.add',compact('cate'));
    }

    public function store(Request $request){
        /*$this->validate($request, [
            'parent'=>'required',
            'name'=>'required|unique:products',
            'image'=>'required|image'
        ],
        ["name"=>"Please enter name category 1"]);*/
        $image = $request->file('fImages');
        $file_name = $image->getClientOriginalName();//lam viec voi image
        $product = new Product();
        $product->name = $request->txtName;
        $product->alias = changeTitle($request->txtName);
        $product->price = $request->txtPrice;
        $product->intro = $request->txtIntro;
        $product->content = $request->txtContent;
        $product->image = $file_name;
        $product->keywords = $request->txtKeywords;
        $product->description = $request->txtDescription;
        $product->user_id = 1;
        $product->cate_id = $request->parent;
        $image->move('resources/upload', $file_name);
        $product->save();
        $product_id = $product->id;
        if(Input::hasFile('fProductDetail')){
            foreach (Input::file('fProductDetail') as $val){
                $product_img = new ProductImage();
                if(isset($val)){
                    $product_img->image = $val->getClientOriginalName();;
                    $product_img->product_id = $product_id;
                    $val->move('resources/upload/detail', $val->getClientOriginalName());
                    $product_img->save();
                }
                # code...
            }
        }
        return redirect('/products')->with(['flash_level'=>'success', 'flash_message'=>'Add Product Success!']);
    }

    public function edit($id){
        $product = Product::find($id);
        $cate = Cate::select('id', 'name','parent_id')->get()->toArray();
        $product_image = Product::find($id)->product_images;//phuong thuc trong Product
        return view('admin.product.edit',compact('product','cate','product_image'));
    }

    public function update(Request $request, $id){

        $product = Product::find($id);
        
        $product->name = Request::input('txtName');
        $product->alias = Request::input('txtName');
        $product->price = Request::input('txtPrice');
        $product->intro = Request::input('txtIntro');
        $product->content = Request::input('txtContent');
        //$product->image = 
        $product->keywords = Request::input('txtKeywords');
        $product->description = Request::input('txtDescription');
        $product->user_id = 1;
        $product->cate_id = Request::input('parent');
        //3 buoc: anh phai duc day len co trong db, duoc di chuyen vao trong folder, anh cu bi xoa di.
        $img_current = 'resources/upload/'.Request::input('img_current');
        if(!empty(Request::file('fImages'))){
            $file_name = Request::file('fImages')->getClientOriginalName();
            $product->image = $file_name;
            Request::file('fImages')->move('resources/upload', $file_name);
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        }else{
            echo 'Khong co file';
        }
        $product->save();

        return redirect('/products')->with(['flash_level'=>'success', 'flash_message'=>'Update Product Success!']);
    }

    public function destroy($id){
        $product_detail = Product::find($id)->product_images->toArray();
        foreach ($product_detail as $value) {
            # code...
            File::delete('resources/upload/detail'.$value["image"]);
        }
        $product = Product::find($id);
        File::delete('resources/upload/'.$product->image);
        $product->delete($id);
        return redirect('/products')->with(['flash_level'=>'success', 'flash_message'=>'Delete product success']);
    }

    public function delImg($id){
        if(Request::ajax()){
            $idImg = Request::get('idImage');
            $image_detail = ProductImage::find($idImg);
            if(!empty($image_detail)){
                $img = 'resources/upload/detail/'.$image_detail->image;
                if(File::exists($img)){
                    File::delete($img);
                }
                $image_detail->delete();
            }
            return "Oke";
        }
    }

}