<?php

namespace App\Http\Controllers;

// インスタンス化するモデルを指定
use App\models\Syouhinn;

use \App\User;
use DB;
use Illuminate\Http\Request;
use App\Models\purchased_articl;

class ShowSupplieListController extends Controller

{

  public function show(){

        //TODO : モデルに処理をまとめる
        // 取引先テーブルと商品テーブルを取引先IDで結合して取得
        $data = DB::table('syouhinn')->
                    select('syouhinn.id as syouhinn_id','syouhinn.syouhinn_name', 'syouhinn.tannka', 'syouhinn.kubunn_id',
                            'torihikisaki.id as torihikisaki_id', 'torihikisaki.torihikisaki_name')->
                        leftjoin('torihikisaki', 'syouhinn.torihikisaki_id', '=', 'torihikisaki.id') -> get();

      return view('show_supplie_list',['data'=>$data]);
  }

}
