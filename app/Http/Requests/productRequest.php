<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        //nơi viết validate
        $rules = [];
        //lấy ra tên phương thức đang hoạt động
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($currentAction){
                    case 'add':
                        $rules = [
                            "name"=>"required",
                            "price"=>"required",
                            "main_image"=>"required",
                            "quantity"=>"required|min:0",
                            "detail"=>"required",
                            "category_id"=>"required",

                        ];
                        break;
                    case 'update':
                        $rules = [
                            "name"=>"required",
                            "price"=>"required",
                            "quantity"=>"required|min:0",
                            "detail"=>"required",
                            "category_id"=>"required",

                        ];
                        break;
                    default:
                        break;
                }
                break;
        endswitch;
        return $rules;
    }
    public  function messages(){
        return [
            'name.required'=>'bắt buộc nhập tên',
            'price.required'=>'bắt buộc nhập giá',
            'main_image.required'=>'bắt buộc nhập ảnh',
            'detail.required'=>'bắt buộc nhập chi tết sản phẩm',
            'quantity.required'=>'bắt buộc nhập số lượng',
            'quantity.min'=>'Số lượng phải lớn hơn 0',
            'category_id.required'=>'bắt buộc chọn danh mục',
        ];
    }
}
