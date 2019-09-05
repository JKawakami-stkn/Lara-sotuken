<?php

namespace App\Http\Controllers;

use App\models\Hannbaikai;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon; //日付関連操作

use App\Models\purchased_articl;

class PoCreateController extends Controller

{

  public function show(){
    $kumis = \DB::table('組マスタ')->where('園年度', '2019')->get();
    $syouhinns =\DB::table('syouhinn')->get();
      return view('po_create',['kumis'=>$kumis,'syouhinns'=>$syouhinns]);
  }

  public function store(Request $request){

    $request->session()->regenerateToken();
    
    $now = Carbon::now();// データの例：2019-07-26 02:11:22 作成時の時間を取得

    $kumis = $request->kumi;
    
    $hannbaikai_data =[
      'hannbaikai_name' => $request->tyumonsyo,
      'sakuseibi' => $now,
      'simekiri'  => $request->deadline,
      'delete' => 0,
    ];

    DB::table('hannbaikai')->insert($hannbaikai_data);

    $hannbaikai_id = DB::table('hannbaikai')->select('id')->max('id');
    $hannbaikai = Hannbaikai::find($hannbaikai_id);

    $hannbaikai->kumis()->sync($kumis);

    $posliscon = new PoListController();
    return  $posliscon->show();
  }

}
