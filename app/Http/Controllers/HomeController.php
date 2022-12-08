<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Home;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $v;
    public function __construct()//ham khoi tao
    {
        $this->v = [];
    }
   public  function index(Request $request){
       $test = new Home();
       $this->v['extParams'] = $request->all();
       $this->v['list'] = $test->loadList($this->v['extParams']);
       return view('client.home.index',$this->v);
   }
    public function  detail($id, Request $request){
        $this->v['_title']= " chi tiết sản phẩm";
        $modelSanPham = New Home();
        $objItem = $modelSanPham->loadOne($id);
        $this->v['objItem'] = $objItem;
        $this->v['category'] = Category::all();
        return view('client.product.detail',$this->v);
    }
    public function category($id, Request $request){
        $test = new Home();
        $this->v['extParams'] = $request->all();
        $this->v['objItem']= $test->loadOne2($id);
//        dd(  $this->v['objItem']);
        $this->v['list'] = $test->loadListCategory($id);
        return view('client.product.product_categories',$this->v);
    }
}
