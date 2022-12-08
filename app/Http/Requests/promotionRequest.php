<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class promotionRequest extends FormRequest
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
                            "start_time"=>"required",
                            "end_time"=>"required",
                            "product_id"=>"required",

                        ];
                        break;
                    case 'update':
                        $rules = [
                            "name"=>"required",
                            "start_time"=>"required",
                            "end_time"=>"required",
                            "product_id"=>"required",

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
            'start_time.required'=>'bắt buộc nhập thời gian bắt đầu',
            'end_time.required'=>'bắt buộc nhập thời gian kết thúc',
            'product_id.required'=>'bắt buộc nhập sản phẩm ',
        ];
    }
}
