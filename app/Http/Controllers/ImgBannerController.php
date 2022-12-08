<?php

namespace App\Http\Controllers;

use App\Http\Requests\imgbannerRequest;
use App\Models\Imgbanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ImgBannerController extends Controller
{
    private $v;
    public function __construct()//ham khoi tao
    {
        $this->v = [];
    }

    public function index( Request $request){
        $test = new Imgbanner();
        $this->v['extParams'] = $request->all();
        $this->v['list'] = $test->loadList($this->v['extParams']);
        return view("imgbanner.list_imgbanner",$this->v);//test la ten thu muc- index la file view

    }
    public function add( imgbannerRequest $request){
        //tạo ra 1 file  request và viết validate mọi thứ
        // php artisan make:request nameRequest
        $this->v['_title'] = "Thêm ảnh banner";
        $method_route = "route_BackEnd_imgbanner_add";
        if($request->isMethod('post')){
            //dd($request->post());// data post gửi sang
            $params = [];
            $params['cols'] = $request->post();
            unset($params['cols']['_token']);
            if ($request->hasFile('url') && $request->file('url')->isValid())
            {
                $params['cols']['url'] = $this->uploadFile($request->file('url'));
            }
            $modelTes = new Imgbanner();
            $res = $modelTes->saveNew($params);
            if($res == null){
                return redirect()->route($method_route);
            }elseif ($res > 0){
                Session::flash('success','Thêm mới  thành công');
            }else{
                Session::flash('error','Thêm mới  không thành công');
            }
        }
        return view('imgbanner.add',$this->v );
    }
    public function  detail($id, Request $request){
        $this->v['_title']= " chi tiết danh mục";
        $modelImgBanner = New Imgbanner();
        $objItem = $modelImgBanner->loadOne($id);
        $this->v['objItem'] = $objItem;
        return view('imgbanner.detail',$this->v);
    }
    public function update($id, imgbannerRequest $request){
        $method_route = 'route_BackEnd_imgbanner_list';
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $params['cols']['id'] = $id;
        if ($request->hasFile('url') && $request->file('url')->isValid())
        {
            $params['cols']['url'] = $this->uploadFile($request->file('url'));
        }
        $modelImgBanner = new Imgbanner();
        $res =  $modelImgBanner->Saveupdate($params);
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
        $delete = Imgbanner::destroy($id);
        if(!$delete){
            return redirect()->back();
        }
        return redirect('imgbanner')->with('success', 'Xoá thành công ');;
    }
    public function uploadFile($file) {
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('image',$fileName,'public');
    }
}
