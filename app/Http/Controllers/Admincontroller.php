<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Categorie;
use App\Models\Sub_categorie;
use App\Models\Product;
use Illuminate\support\Facades\DB;

class Admincontroller extends Controller
{
    public function admin()
    {
        return view('admin.index');
    }
    public function add_category()
    {
        //$categorie = DB::table('categories')->get();
        $categorie = Categorie::all();
        return view('admin.add_categorie', ['data' => $categorie]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'categorie_name' => 'required',
        ]);
        //dd($request->name);
        $add_categorie = new Categorie();
        $add_categorie->categorie_name = $request->categorie_name;
        $add_categorie->active = ($request->active) ? $request->active:0;
       
        $data_save = $add_categorie->save();

        //return $data_save;

        if ($data_save) {
            //return ('success');
            return redirect()->route('admin.add_category');
        } else {
            return ('failed');
        }
    }

    public function show(string $id)
    {
        $categorie = DB::table('categories')->where('id', $id)->first();
        return view('admin.update_categorie', ['data' => $categorie]);
    }

    public function update(Request $request, string $id)
    {
        $postData = $request->all();
        unset($postData['_token']);
        unset($postData['submit']);
        
        
        // $postData['active'] = ($request->active) ? 1 : 0;
        $postData['active'] = (isset($request->active)) ? $request->active : 0;
        //return $postData; 
       // dd($postData);
        $categorie = DB::table('categories')
            ->where('id', $id)
            ->update($postData);

        if ($categorie) {
            //echo "Data Successfull Update";
            return redirect()->route('admin.add_category');
        } else {
            echo "Data not Successfull Update";
        }
    }


    public function delete(string $id)
    {
        $categorie = DB::table('categories')
            ->where('id', $id)
            ->delete();
        if ($categorie) {
            // echo "Data Successfull ";
            return redirect()->route('admin.add_category');
        } else {
            echo "Data not Successfull ";
        }
    }

    public function add_sub_category()
    {
        $categorie = Categorie::all();
        $sub_categorie = Sub_categorie::join('categories', 'sub_categories.categorie_id', '=', 'categories.id')
            ->get(['sub_categories.*', 'categories.categorie_name']);
        return view('admin.add_sub_categorie', ['data' => $categorie, 'sub_data' => $sub_categorie]);
    }
    public function sub_store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        //dd($request->name);
        $sub_categorie = new Sub_categorie();
        $sub_categorie->categorie_id = $request->categorie_id;
        $sub_categorie->name = $request->name;
        $sub_categorie->active = $request->active;
        $data_save = $sub_categorie->save();
        if ($data_save) {
            //return ('success');
            return redirect()->route('admin.add_sub_category');
        } else {
            return ('failed');
        }
    }
    public function editshow(string $id)
    {
        $categorie = Categorie::all();
        $sub_categorie = DB::table('sub_categories')->where('id', $id)->first();
        // return $sub_categorie;

        return view('admin.update_subcategorie', ['data'=> $categorie, 'sub_data' => $sub_categorie]);
    }

    public function edit(Request $request, string $id)
    {
        $postData = $request->all();
        // dd($postData);
        unset($postData['_token']);
        $postData['active'] = (isset($request->active)) ? $request->active : 0;

        $sub_categorie = DB::table('sub_categories')
            ->where('id', $id)
            ->update($postData);

        if ($sub_categorie) {
            //echo "Data Successfull Update";
            return redirect()->route('admin.add_sub_category');
        } else {
            echo "Data not Successfull Update";
        }
    }

    public function destory(string $id)
    {
        $sub_categorie = DB::table('sub_categories')
            ->where('id', $id)
            ->delete();
        if ($sub_categorie) {
            // echo "Data Successfull ";
            return redirect()->route('admin.add_sub_category');
        } else {
            echo "Data not Successfull ";
        }
    }

    public function add_product()
    {
        $catrgorie = Categorie::all();
        $sub_catrgorie = Sub_categorie::all();
        //$product = Product::all();
        //dd($sub_catrgorie);
        
        $product = DB::table('products')
            ->leftJoin('categories', 'products.categorie_id', '=', 'categories.id')
            ->leftJoin('sub_categories', 'products.sub_categorie_id', '=', 'sub_categories.id')
            ->get(['products.*', 'categories.categorie_name','sub_categories.name as sub_categorie_name']);
        // dd($product);
        return view('admin.add_product', ['data' => $product, 'subcat_data' => $sub_catrgorie, 'cat_data' => $catrgorie]);
    }

    public function post_product(Request $request)
    {
        $request->validate([
            ' name' => 'required',
        ]);
        // dd($request->all());
        $product = new Product();
        $product->categorie_id = $request->category_id;
        $product->sub_categorie_id = $request->sub_category;
        $product->name = $request->name;
        $file = Storage::putFile('photos', $request->file('image'));
        $product->image = $file;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->active = $request->active;
        $product->save();
        // dd($request->desc);
        foreach ($request->desc as $value) {
            // dd($value);
            DB::table('product_description')->insert([
                'product_id' => $product->id,
                'title' => $value['title'],
                'heading' => $value['heading'],
                'description' => $value['description'],
            ]);
        }
        foreach ($request->pdf as $value) {
            // upload file
            //$file = Storage::putFile('photos', $value->file('image'));
            $file_pdf = Storage::putFile('photos', $value['file']);
            //dd($file_pdf); 
            DB::table('product_pdf')->insert([
                'product_id' => $product->id,
                'heading' => $value['heading'],
                //'file' => $value['file']
                'file' => $file_pdf,
                
            ]);
            //return $file_pdf;   
        }
        if ($product->id) {
            //return ('success');
            return redirect()->route('admin.add_product');
        } else {
            return ('failed');
        }
    }
    public function pro_editshow(string $id)
    {
        $categorie = Categorie::all();
        $sub_categorie = Sub_categorie::all();
        $description = DB::table('product_description')->where('product_id', $id)->get();
        $product_pdf = DB::table('product_pdf')->where('product_id', $id)->get();
        $product = DB::table('products')->where('id', $id)->first();
        if($product_pdf->count()){
            //dd($product_pdf);
        }
        return view('admin.update_product', ['data' => $product,'cat_data' =>$categorie,'sub_catdata'=>$sub_categorie,'description_data' =>$description, 'product_pdf'=>$product_pdf]);
    }

    public function pro_edit(Request $request, string $id)
    {
        $postDataProduct['categorie_id'] = $request->categorie_id;
        $postDataProduct['sub_categorie_id'] = $request->sub_category;
        $postDataProduct['name'] = $request->name;
        if($request->file('image')){
            $file = Storage::putFile('photos', $request->file('image'));
            $postDataProduct['image'] = $file;
        }
        $postDataProduct['short_description'] = $request->short_description;
        $postDataProduct['description'] = $request->description;
        $postDataProduct['active'] = ($request->active)?$request->active:0;

        $product = DB::table('products')
            ->where('id', $id)
            ->update($postDataProduct);

            DB::table('product_description')->where('product_id', $id)->delete();
            foreach ($request->desc as $value) {
                DB::table('product_description')->insert([
                    'product_id' => $id,
                    'title' => $value['title'],
                    'heading' => $value['heading'],
                    'description' => $value['description'],
                ]);
            }
            DB::table('product_pdf')->where('product_id', $id)->delete();
            foreach ($request->pdf as $value) {
                $file_pdf = Storage::putFile('photos', $value['file']);
                DB::table('product_pdf')->insert([
                    'product_id' => $id,
                    'heading' => $value['heading'],
                    'file' => $file_pdf,
                    
                ]);  
            }    

        if ($product) {
             return redirect()->route('admin.add_product');
        } else {
            echo "Data not Successfull Update";
        }
    }

    public function pro_delete(string $id)
    {
        $product = DB::table('products')
            ->where('id', $id)
            ->delete();
        if ($product) {
            // echo "Data Successfull ";
            return redirect()->route('admin.add_product');
        } else {
            echo "Data not Successfull ";
        }
    }
}