<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
                            "email"=>"required|unique:users|email",
                            "name"=>"required",
                            "password"=>"required|min:6",
                            "phone"=>"required|max:10|unique:users",

                        ];
                        break;
                    case 'update':
                        $rules = [
                            "email"=>"required",
                            "name"=>"required",
                            "phone"=>"required|max:10",

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
            'email.required'=>'bắt buộc nhập email',
            'email.unique'=>'email đã tồn tại',
            'email.email'=>'email phải đúng định dạng',
            'name.required'=>'bắt buộc nhập  tên',
            'password.required'=>'bắt buộc nhập mật khẩu',
            'password.min'=>'Mật khẩu tối thiểu phải 6 kí tự',
            'phone.required'=>'bắt buộc nhập số điện thoại',
            'phone.max'=>'Mật khẩu tối đa là 10 kí tự',
            'phone.unique'=>'Số điện thoại đã tồn tại'
        ];
    }
}
