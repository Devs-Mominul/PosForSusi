<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class XyzController extends Controller
{
    function xyz(){
        return view('XYZ.xyz');
    }
    function depo_xyz(){
        return view('XYZ.depo_xyz');
    }
    function stockiest_xyz(){
        return view('XYZ.xyz_stockiest');
    }
    function transaction_action(Request $request){
        // $transactions=DB::table('transactions')->where('invoice_no', $request->invoice_no)->first();
        $transactions=Transaction::where('invoice_no',$request->invoice_no)->first();
        if($transactions->transaction_type==0){
            echo 'thick asea';
        }
        else{
            return back()->with('transaction','This transaction alreay used');
        }


    }
}
