<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Support\Facades\DB;

class MtgController extends Controller
{
    public function cardsSession(Request $request)
    {
        $id = $request->input('id');
        $res = [];
        
        $res['cardsGot'] = DB::table('cardsgot')->where('session_id','=',$id)->get();
        $res['cardsSearch'] = DB::table('cardssearch')->where('session_id','=',$id)->get();
        //Aggiungere cardTradeIn
        //Aggiungere cardTradeOut
        
        return $res;

    }
    public function deleteSession(Request $request)
    {
        $id = $request->input('id');
        DB::table('sessions')->where('id','=',$id)->delete();
        return DB::table('sessions')->get();
    }

    public function saveSession(Request $request)
    {
        $input = $request->all();
        dd($input);
    }
    
    public function sessions()
    {
        return Session::get();
    }
}
