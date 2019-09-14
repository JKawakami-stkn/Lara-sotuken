<?php

namespace App\Http\Controllers;

// インスタンス化するモデルを指定
use App\models\Syouhinn;
use App\models\Torihikisaki;
use App\models\Kubunn;

use \App\User;
use DB;
use Illuminate\Http\Request;
use App\Models\purchased_articl;

class EditSupplieController extends Controller

{

    public function show($syouhinn_id){

      // Torihikisakiモデルのインスタンスを作成
      $md = new Syouhinn();
      $md_1 = new Torihikisaki();
      $Kubunn = new Kubunn();

      // データ取得
      $data = $md->getData($syouhinn_id);
      $data_1 = $md_1->getData();
      $kubunn = $Kubunn->get();

      return view('edit_supplie',compact('data','data_1','kubunn'));
    }


    public function edit(Request $request){

        $request->session()->regenerateToken(); //F5での更新制御

        // 新規インスタンス作成
        $syouhinn = new Syouhinn;

        // DB更新
        $syouhinn->updateData($request);

        //TODO : モデルに処理をまとめる
        $data = DB::table('syouhinn')->
                    select('syouhinn.id as syouhinn_id','syouhinn.syouhinn_name', 'syouhinn.tannka', 'syouhinn.kubunn_id','torihikisaki_name',
                            'torihikisaki.id as torihikisaki_id', 'torihikisaki.torihikisaki_name')->
                    leftjoin('torihikisaki', 'syouhinn.torihikisaki_id', '=', 'torihikisaki.id') -> get();

        return view('show_supplie_list',['data'=>$data]);
    }

}
