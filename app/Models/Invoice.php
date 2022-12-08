<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Invoice extends Model
{
    use HasFactory;
    protected $table = "invoices";
    protected  $fillable = [
        'invoices.id',
        'invoices.status'
        ,'invoices.order_date'
        ,'invoices.delivery_date_'
        ,'invoices.total_money'
        ,'users.name as user_name'
    ];
    public function loadList($param = [])
    {
        $query = DB::table($this->table)
            ->join('users','users.id','=','invoices.user_id')
            ->select($this->fillable);
        $list = $query->paginate(10);
        return $list;
    }
}
