<?php

namespace App\Http\Controllers;
use App\Http\Requests\roleRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    private $v;
    public function __construct()//ham khoi tao
    {
    $this->v = [];
    }
    public function index( Request $request){
        $role = new Role();
        $this->v['extParams'] = $request->all();
        $this->v['list'] = $role->loadList($this->v['extParams']);
        return view("role.list_role",$this->v);//test la ten thu muc- index la file view

    }
    public function add( roleRequest $request){
        //tạo ra 1 file  request và viết validate mọi thứ
        // php artisan make:request nameRequest
        $this->v['_title'] = "Thêm chức vụ";
        $method_route = "route_BackEnd_role_add";
        if($request->isMethod('post')){
            //dd($request->post());// data post gửi sang
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            $modelTes = new Role();
            $res = $modelTes->saveNew($params);
            if($res == null){
                return redirect()->route($method_route);
            }elseif ($res > 0){
                Session::flash('success','Thêm mới  thành công');
            }else{
                Session::flash('error','Thêm mới  không thành công');
            }
        }
        return view('role.add',$this->v );
    }
    public function  detail($id, Request $request){
        $this->v['_title']= " chi tiết chức vụ";
        $modelChucVu = New Role();
        $objItem = $modelChucVu->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('role.detail',$this->v);
    }
    public function update($id, roleRequest $request){
        $method_route = 'route_BackEnd_role_list';
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelChucVu = new Role();
        $res =  $modelChucVu->Saveupdate($params);
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
        $delete = Role::destroy($id);
        if(!$delete){
            return redirect()->back();
        }
        return redirect('role')->with('success', 'Xoá thành công ');;
    }
}
