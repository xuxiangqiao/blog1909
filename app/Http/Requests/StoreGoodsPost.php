<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGoodsPost extends FormRequest
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

        // 获取当前路由名称
        $name = \Route::currentRouteName();
        if($name=='goodsstore'){
            //添加
            return [
                 'goods_name' => 'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u|unique:goods',
                    'cate_id'=>'required',
                    'brand_id'=>'required',
                    'goods_price'=>'required|numeric',
                    'goods_number'=>'required|numeric|between:1,9999999',
            ];
        }
        if($name=='goodsupdate'){
            //修改
            return [
                   'goods_name' => [
                        'regex:/^[\x{4e00}-\x{9fa5}\w]{2,50}$/u',
                        Rule::unique('goods')->ignore(request()->id,'goods_id'),
                    ],
                    'cate_id'=>'required',
                    'brand_id'=>'required',
                    'goods_price'=>'required|numeric',
                    'goods_number'=>'required|numeric|between:1,9999999',
            ];

        }
    }


    public function messages(){

        return[
         'goods_name.regex'=>'商品名称可以包含中文、数字、字母、下划线长度范围为2-50位',
            'goods_name.unique'=>'商品名称已存在！',
            'cate_id.required'=>'请选择商品分类！',
            'brand_id.required'=>'请选择商品品牌！',
            'goods_price.required'=>'商品价格必填！',
            'goods_price.numeric'=>'商品价格必须是数字',
            'goods_number.required'=>'商品库存必填！',
            'goods_number.numeric'=>'商品库存必须是数字',
            'goods_number.between'=>'商品库存不超过8位',
        ];    

    }

}
