<?php

namespace App\Http\Controllers;
use App\Http\Requests\userRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $v;
    public function __construct()//ham khoi tao
    {
    $this->v = [];
    }

    public function index( Request $request){
        $test = new User();
        $this->v['extParams'] = $request->all();
        $this->v['list'] = $test->loadListWithPager($this->v['extParams']);
        return view("user.index",$this->v);//test la ten thu muc- index la file view

    }
    public function add( userRequest $request){
        //tạo ra 1 file  request và viết validate mọi thứ
        // php artisan make:request nameRequest
        $this->v['_title'] = "Thêm người dùng";
        $this->v['roles']  = Role::all();
        $method_route = "route_BackEnd_user_add";
        if($request->isMethod('post')){
            //dd($request->post());// data post gửi sang
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            $modelTes = new User();
            $res = $modelTes->saveNew($params);
            if($res == null){
                return redirect()->route($method_route);
            }elseif ($res > 0){
                Session::flash('success','Thêm mới người dùng thành công');
            }else{
                Session::flash('error','Thêm mới người dùng không thành công');
            }
        }
        return view('user.add',$this->v );
    }
    public function  detail($id, Request $request){
        $this->v['_title']= " chi tiết người dùng";
        $this->v['roles'] = Role::all();
        $modelNguoiDung = New User();
        $objItem = $modelNguoiDung->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('user.detail',$this->v);
    }
    public function update($id, userRequest $request){
        $method_route = 'route_BackEnd_user_list';
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;
        if(!is_null($params['cols']['password'])){
            $params['cols']['password'] = Hash::make($params['cols']['password']);
        } else {
            unset($params['cols']['password']);
        }

        $modelNguoiDung = new User();
        $res =  $modelNguoiDung->Saveupdate($params);
        if($res == null){
            return redirect()->route($method_route,['id'=>$id]);
        }elseif ($res ==1){
            Session::flash('success','Cập nhập bản ghi '.$id.' thành công');
            return redirect()->route($method_route,['id'=>$id]);
        }else{
            Session::flash('errors','lỗi Cập nhập bản ghi '.$id);
            return redirect()->route($method_route,['id'=>$id]);
        }
    }
    public function  delete($id){
        //dd($id);
        $delete = User::destroy($id);
        if(!$delete){
            return redirect()->back();
        }
        return redirect('user')->with('success', 'Xoá thành công ');;
    }
}
