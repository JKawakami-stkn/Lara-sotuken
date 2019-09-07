<?php

namespace App\Http\Controllers;

use App\models\Hannbaikai;
use App\models\Hannbaikumi;
use App\models\Hannbaisyouhinn;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\purchased_articl;


class EditPoCreateController extends Controller
{
    public function show(Request $request, $id){

        $kumis = \DB::table('組マスタ')->where('園年度', '2019')->get(); //組み情報を取得
        $syouhinns =\DB::table('syouhinn')->get(); //商品情報を取得
        $hannbaikai = Hannbaikai::find($id); //パラメータ情報から販売情報取得
        $hannbaikumi = $hannbaikai->kumis; //hannbaikaiのidと紐づいているkumi情報を取得
        $hannbaisyouhinn = $hannbaikai->syouhins; //hannbaikaiのidと紐づいているsyouhin情報を取得

        return view('edit_po_create',['hannbaikai'=>$hannbaikai,'kumis'=>$kumis,'syouhinns'=>$syouhinns,'hannbaikumi'=>$hannbaikumi,'hannbaisyouhinn'=>$hannbaisyouhinn,'id'=>$id]);
      }
    
    
      public function store(Request $request){
        
        $request->session()->regenerateToken(); //F5での更新制御
        
        $id = $request->id; //販売商品のidを取得

        $hannbaikai = Hannbaikai::find($id); //上記のidを使いテーブルの情報を取得

        $kumis = $request->kumi; //組み情報を取得

        $syouhinns = $request->syouhinn;

         //hannbaikaiとhannbaikumiを紐づけてDBの値を更新する処理//
        $hannbaikai->kumis()->sync($kumis);

        //hannbaikaiとsyouhinを紐づけてDBの値を更新する処理//
        $hannbaikai->syouhins()->sync($syouhinns);

        //注文商品の締め切りの更新
       $hannbaikai->simekiri = $request->deadline;
       $hannbaikai->save();

       //注文商品の名前の更新
       $hannbaikai->hannbaikai_name = $request->tyumonsyo;
       $hannbaikai->save();
        
        $posliscon = new PoListController();
        return  $posliscon->show();
      }
}
