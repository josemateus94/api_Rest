<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductFormResquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {        
        // dd($this->segment(3));
        return [
            'name'          => "required|min:2|max:10|unique:products,name,{$this->product},id",
            'category_id'   => 'required|exists:categories,id',
            'price'         => 'required|numeric',
            'description'   => 'max:1000',
            'image'         => 'image',
        ];
    }

    public function messages(){
        return [
            'name.required'         => __('product.name_requered'),
            'name.min'              => __('product.name_min'),
            'name.max'              => __('product.name_max'),
            'name.unique'           => __('product.name_unique'),
            'category_id.required'  => __('product.category_id_required'),
            'category_id.exists'    => __('product.category_id_exists'),
            'price.required'        => __('product.price_requered'),
            'price.numeric'         => __('product.price_numeric'),
            'description.max'       => __('product.description_max'),
            'image.image'           => __('product.image_image'),
        ];
    }
}
