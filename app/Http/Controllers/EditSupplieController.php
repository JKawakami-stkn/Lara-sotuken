<?php

namespace App\Http\Controllers;

// インスタンス化するモデルを指定
use App\models\Syouhinn;
use App\models\Torihikisaki;
use App\models\Kubunn;
use App\models\Sku;


use \App\User;
use DB;
use Illuminate\Http\Request;
use App\Models\purchased_articl;
use App\Http\Requests\AddSupplieRequest;

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


    public function edit(AddSupplieRequest $request){

        $request->session()->regenerateToken(); //F5での更新制御

        // 新規インスタンス作成
        $syouhinn = new Syouhinn;
        $Sku = new Sku();

        
        // ----------------------------------------------追加------------------------------------------------
        // 新規インスタンス作成
        // $syouhinn = new Syouhinn;
        $sku = new Sku;
        $size = null;
        $color = null;
        $sku::where("syouhinn_id",$request->id)->delete();
        if($request->syouhinn_size != null){
          $size = explode(",",$request->syouhinn_size);
        }
        if($request->syouhinn_color != null){
          $color = explode(",",$request->syouhinn_color);
        }
        //商品データを先に登録した後、登録した商品は一番最後の行に追加されるため、その行数を引っ張ってきたらそれが商品IDとなる想定をして書き進める


        //レコード数取得
        $num = $request->id;
        //Debugbar::addMessage($size);


        if(isset($size) or isset($color)){//isset()はnullならfalseを返す このifに入ったらどちらかに値が入っている
          if(!isset($size) and isset($color)){//色がnullでない
              $sku->storeData2($color, $num);
            
          }elseif(isset($size) and !isset($color)){//サイズがnullでない
              $sku->storeData1($size, $num);
            
          }else{//両方nullでない
              $sku->storeData3($size, $color, $num);
          }
        }else{
          $sku->storeData4($num);
        }

        // -------------------------------------------------------------------------------------------------
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
