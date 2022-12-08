<?php

namespace App\Http\Controllers;

use App\Http\Requests\promotionRequest;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PromotionController extends Controller
{
    private $v;
    public function __construct()//ham khoi tao
    {
        $this->v = [];
    }
    public function index( Request $request){
        $role = new Promotion();
        $this->v['extParams'] = $request->all();
        $this->v['list'] = $role->loadList($this->v['extParams']);
        return view("promotions.list_promotion",$this->v);//test la ten thu muc- index la file view

    }
    public function add( promotionRequest $request){
        //tạo ra 1 file  request và viết validate mọi thứ
        // php artisan make:request nameRequest
        $this->v['_title'] = "Thêm khuyến mãi";
        $this->v['product'] = Product::all();
        $method_route = "route_BackEnd_promotion_add";
        if($request->isMethod('post')){
            //dd($request->post());// data post gửi sang
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            $modelTes = new Promotion();
            $res = $modelTes->saveNew($params);
            if($res == null){
                return redirect()->route($method_route);
            }elseif ($res > 0){
                Session::flash('success','Thêm mới  thành công');
            }else{
                Session::flash('error','Thêm mới  không thành công');
            }
        }
        return view('promotions.add',$this->v );
    }
    public function  detail($id, Request $request){
        $this->v['_title']= " chi tiết danh mục";
        $modelKhuyenMai = New Promotion();
        $this->v['product'] = Product::all();
        $objItem = $modelKhuyenMai->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('promotions.detail',$this->v);
    }
    public function update($id, promotionRequest $request){
        $method_route = 'route_BackEnd_promotion_list';
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;

        $modelKhuyenMai = new Promotion();
        $res =  $modelKhuyenMai->Saveupdate($params);
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
        $delete = Promotion::destroy($id);
        if(!$delete){
            return redirect()->back();
        }
        return redirect('promotion')->with('success', 'Xoá thành công ');;
    }
}
