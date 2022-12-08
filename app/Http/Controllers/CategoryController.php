<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    private $v;
    public function __construct()//ham khoi tao
    {
        $this->v = [];
    }

    public function index( Request $request){
        $test = new Category();
        $this->v['extParams'] = $request->all();
        $this->v['list'] = $test->loadList($this->v['extParams']);
        return view("category.list_category",$this->v);//test la ten thu muc- index la file view

    }
    public function add( categoryRequest $request){
        //tạo ra 1 file  request và viết validate mọi thứ
        // php artisan make:request nameRequest
        $this->v['_title'] = "Thêm danh mục";
        $method_route = "route_BackEnd_category_add";
        if($request->isMethod('post')){
            //dd($request->post());// data post gửi sang
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            $modelTes = new Category();
            $res = $modelTes->saveNew($params);
            if($res == null){
                return redirect()->route($method_route);
            }elseif ($res > 0){
                Session::flash('success','Thêm mới  thành công');
            }else{
                Session::flash('error','Thêm mới  không thành công');
            }
        }
        return view('category.add',$this->v );
    }
    public function  detail($id, Request $request){
        $this->v['_title']= " chi tiết danh mục";
        $modelDanhMuc = New Category();
        $objItem = $modelDanhMuc->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('category.detail',$this->v);
    }
    public function update($id, categoryRequest $request){
        $method_route = 'route_BackEnd_category_list';
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelDanhMuc = new Category();
        $res =  $modelDanhMuc->Saveupdate($params);
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
        $delete = Category::destroy($id);
        if(!$delete){
            return redirect()->back();
        }
        return redirect('category')->with('success', 'Xoá thành công ');;
    }
}
