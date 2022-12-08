<?php

namespace App\Http\Controllers;

use App\Http\Requests\productRequest;
use App\Http\Requests\promotionRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    private $v;
    public function __construct()//ham khoi tao
    {
        $this->v = [];
    }

    public function index( Request $request){
        $test = new Product();
        $this->v['extParams'] = $request->all();
        $this->v['list'] = $test->loadList($this->v['extParams']);
        return view("product.list_product",$this->v);//test la ten thu muc- index la file view

    }
    public function add( productRequest $request){
        //tạo ra 1 file  request và viết validate mọi thứ
        // php artisan make:request nameRequest
        $this->v['_title'] = "Thêm sản phẩm";
        $this->v['category'] = Category::all();
        $method_route = "route_BackEnd_product_add";
        if($request->isMethod('post')){
            //dd($request->post());// data post gửi sang
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            if ($request->hasFile('main_image') && $request->file('main_image')->isValid())
            {
                $params['cols']['main_image'] = $this->uploadFile($request->file('main_image'));
            }
            $modelTes = new Product();
            $res = $modelTes->saveNew($params);
            if($res == null){
                return redirect()->route($method_route);
            }elseif ($res > 0){
                Session::flash('success','Thêm mới  thành công');
            }else{
                Session::flash('error','Thêm mới  không thành công');
            }
        }
        return view('product.add',$this->v );
    }
    public function  detail($id, Request $request){
        $this->v['_title']= " chi tiết sản phẩm";
        $modelSanPham = New Product();
        $this->v['category'] = Category::all();
        $objItem = $modelSanPham->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('product.detail',$this->v);
    }
    public function update($id, productRequest $request){
        $method_route = 'route_BackEnd_product_list';
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;
        if ($request->hasFile('main_image') && $request->file('main_image')->isValid())
        {
            $params['cols']['main_image'] = $this->uploadFile($request->file('main_image'));
        }
        $modelDanhMuc = new Product();
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
        $delete = Product::destroy($id);
        if(!$delete){
            return redirect()->back();
        }
        return redirect('product')->with('success', 'Xoá thành công ');;
    }
    public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('image',$fileName,'public');
    }
}
