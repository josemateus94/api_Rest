<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $fillable = ['category_id', 'name', 'price', 'description', 'image'];
    
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function getResult($data=null, $totalPage){           
        return $this->where(function($query) use ($data, $totalPage){
            if (isset($data['name'])) {                
                $query->where('name', $data['name']);                
            }
            if (isset($data['filter'])) {                
                $query->where('name', $data['filter'])->orWhere('description', 'like', "%". $data['filter']."%");
            }
            if (isset($data['description'])) {                
                $query->where('description', 'like', "%". $data['description']."%");
            }            
        })->with('category')->paginate($totalPage); // toSql;
    }

    public function category(){

        return $this->belongsTo(Category::class);
    }
}
