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

    $request->session()->regenerateToken(); //F5での更新制御

    
    $kumis = $request->kumi; //組み情報を取得

    $syouhinns = $request->syouhinn; //商品情報を取得

    /////////////////////// hannbaikaiのDB処理 //////////////////////////////////////

    $now = Carbon::now();// データの例：2019-07-26 02:11:22 作成時の時間を取得

    $hannbaikai_data =[
      'hannbaikai_name' => $request->tyumonsyo,
      'sakuseibi' => $now,
      'simekiri'  => $request->deadline,
      'delete' => 0,
    ];

    DB::table('hannbaikai')->insert($hannbaikai_data);

    ///////////////////////////////////////////////////////////////////////////////////
    
    $hannbaikai_id = DB::table('hannbaikai')->select('id')->max('id'); //hannbaikaiの一番新しいテーブルのIDを取得
    $hannbaikai = Hannbaikai::find($hannbaikai_id); //上記のhannbaikai_idを使い新しいテーブルの情報を取得

    //hannbaikaiとhannbaikumiを紐づけてDBに追加する処理//
    $hannbaikai->kumis()->sync($kumis);

    //hannbaikaiとsyouhinを紐づけてDBに追加する処理//
    $hannbaikai->syouhins()->sync($syouhinns);

    //発注書一覧画面の遷移処理
    $posliscon = new PoListController(); //PoListControllerのインスタンスを生成
    return  $posliscon->show(); //上記のインスタンスを使用してshow()メソッドを呼び出す
  }

}
