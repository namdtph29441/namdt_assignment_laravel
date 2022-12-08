<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Home extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $table1 = "categories";

    protected  $fillable = [
        'products.id',
        'products.name',
        'products.price',
        'products.main_image',
        'products.quantity',
        'products.detail',
        'products.status',
        'products.created_at',
        'categories.name as category_name'];
    public function loadList($param = [])
    {
        $query = DB::table($this->table)
            ->join('categories','categories.id', '=','products.category_id')
            ->where('status','=',1)
            ->orderBy('created_at','desc')
            ->select($this->fillable);
        $list = $query->paginate(8);
        return $list;
    }
    public function loadListCategory($id, $param = [])
    {
        $query = DB::table($this->table1)
            ->join('products','products.category_id', '=','categories.id')
            ->where('products.category_id','=',$id)
            ->select($this->fillable);
        $list = $query->paginate(8);
        //dd($list);
        return $list;
    }
    //load ra chi tiết
    public  function loadOne($id, $params = []){
        $query = DB::table($this->table)
            ->where('id','=',$id);
        $obj = $query->first();
        return $obj;
    }
    public  function loadOne2($id, $params = []){
        $query = DB::table($this->table1)
            ->where('id','=',$id);
        $obj = $query->first();
        return $obj;
    }
}
