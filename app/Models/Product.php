<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected  $fillable = [
        'products.id',
        'products.name',
        'products.price',
        'products.main_image',
        'products.quantity',
        'products.detail',
        'products.status',
        'categories.name as category_name'];
    public function loadList($param = [])
    {
        $query = DB::table($this->table)
            ->join('categories','categories.id', '=','products.category_id')
            ->select($this->fillable);
        $list = $query->paginate(8);
        return $list;
    }
    //Tính năng thêm mới
    public function saveNew($param){
        $data = array_merge($param['cols'],[
                "created_at"=>date('Y-m-d H-i-s'),
                "updated_at"=>date('Y-m-d H-i-s'),
            ]
        );
        //dd($data);
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
    //load ra chi tiết
    public  function loadOne($id, $params = []){
        $query = DB::table($this->table)
            ->where('id','=',$id);
        $obj = $query->first();
        return $obj;
    }
    //update
    public  function saveUpdate($params){
        if(empty($params['cols']['id'])){
            Session::push('errors','Không xác định bản ghi cần cập nhập');
        }
        $dateUpdate = [];
        foreach ($params['cols'] as $colName => $val){
            if($colName == 'id') continue;
            $dateUpdate[$colName] = (strlen($val) == 0) ? null:$val;
        }
        // dd($dateUpdate);
        $res = DB::table($this->table)->where('id',$params['cols']['id'])->update($dateUpdate);
        return $res;

    }
}
