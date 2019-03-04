<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreUpdateProductFormResquest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $product, $totalPage = 5, $path='products';

    public function __construct(Product $product){
        $this->product = $product;
    }

    public function index(Request $request){
        
        $product = $this->product->getResult($request->all(), $this->totalPage);                
        return response()->json($product, 200);
    }

    public function store(StoreUpdateProductFormResquest $request){
        
        $product = $request->all();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {            
            $name = Kebab_case($request->name).'.'. $request->image->extension();                                    
            $product['image'] = $name;            
            $update = $request->image->storeAs($this->path, $name);            
            if (!$update) {
                return response()->json(['erros'=> __('product.update_image')], 500);        
            }
        }
        $product = $this->product->create($product);
        return response()->json($product, 201);
    }

    public function show($id){
        $product = $this->product->with('category')->find($id);
        if (!$product) {
            return response()->json(['error'=>  __('product.not_found_product')], 404);
        }        
        return response()->json($product, 200);
    }

    public function update(StoreUpdateProductFormResquest $request, $id)
    {                
        $product = $this->product->find($id);
        if (!$product) {
            return response()->json(['error'=>  __('product.not_found_product')], 404);
        }
        $data = $request->all();        
        if ($data['name'] != $product['name'] && ! is_null($product['image'])) {            
            $extensao = explode('.', $product->image)[1];    
            if (Storage::exists("products/{$product->image}")) {                
                $name = Kebab_case($data['name']).".".$extensao;
                rename("storage/products/".$product->image , "storage/products/".$name);
                $data['image'] = $name;
            }
        }
        
        if ($request->hasFile('image') && $request->file('image')->isValid()) {    
            
            if ($product['image']) {
                if (Storage::exists("{$this->path}/{$product->image}")) {
                    Storage::delete("{$this->path}/{$product->image}");
                }
            }
            
            $name = Kebab_case($request->name).'.'. $request->image->extension();                                    
            $data['image'] = $name;

            $update = $request->image->storeAs($this->path, $name);
            if (!$update) {
                return response()->json(['erros'=> __('product.update_image')], 500);        
            }
        }      
        
        $product->update($data);
        return response()->json($product);
    }

    public function destroy($id){
        
        $product = $this->product->find($id);
        if (!$product) {
            return response()->json(['error'=>  __('product.not_found_product')], 404);
        }        
        if ($product['image']) {
            if (Storage::exists("{$this->path}/{$product->image}")) {
                Storage::delete("{$this->path}/{$product->image}");
            }
        }
        $product->delete();     
        return response()->json(['success'=> __('product.deleted_product')], 204);
    }
}
