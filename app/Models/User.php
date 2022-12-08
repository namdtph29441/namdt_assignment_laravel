<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table= "users";
    protected $fillable = [
        'users.id',
        'users.name',
        'users.email',
        'users.password',
        'users.address',
        'users.status',
        'roles.name as role_name'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function loadListWithPager($param = []){
        $query = DB::table($this->table)
           ->join('roles','roles.id','=','users.role_id')
            ->select($this->fillable);

        $lists = $query->paginate(15); //paginate() áp dụng phân trang
        return $lists;

    }
    //Tính năng thêm mới
    public function saveNew($param){
        $data = array_merge($param['cols'],[
                'password' => Hash::make($param['cols']['password'])]
        );
        //dd($data);
        $res = DB::table($this->table)->insertGetId($data);
        return $res;
    }
    //load ra chi tiết người dùng
    public  function loadOne($id, $params = []){
        $query = DB::table($this->table)
            ->where('id','=',$id);
        $obj = $query->first();
        return $obj;
    }
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
