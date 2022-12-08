<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private $v;
    public function __construct()//ham khoi tao
    {
        $this->v = [];
    }

    public function index( Request $request){
        $invoice = new Invoice();
        $this->v['extParams'] = $request->all();
        $this->v['list'] = $invoice->loadList($this->v['extParams']);
        return view("invoice.list_invoice",$this->v);//test la ten thu muc- index la file view

    }
    public function  delete($id){
        //dd($id);
        $delete = Invoice::destroy($id);
        if(!$delete){
            return redirect()->back();
        }
        return redirect('invoice')->with('success', 'Xoá thành công ');;
    }
}
