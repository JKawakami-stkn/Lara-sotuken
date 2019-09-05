<?php

namespace App\Http\Controllers;

// インスタンス化するモデルを指定
use App\models\Torihikisaki;
use App\models\Syouhinn;
use App\models\Sku;

use \App\User;
use DB;
use Illuminate\Http\Request;

use App\Models\purchased_articl;

class AddSupplieController extends Controller

{


  public function show(){

      // 業者リストで表示するデータを取得
      $md = new Torihikisaki();
      $data = $md->getData();

      return view('add_supplie',['data'=>$data]);
  }


  public function store(Request $request){

    // 新規インスタンス作成
    $syouhinn = new Syouhinn;
    $sku = new Sku;
    $size = null;
    $color = null;
    if($request->syouhinn_size != null){
      $size = explode(",",$request->syouhinn_size);
    }
    if($request->syouhinn_color != null){
      $color = explode(",",$request->syouhinn_color);
    }
    //商品データを先に登録した後、登録した商品は一番最後の行に追加されるため、その行数を引っ張ってきたらそれが商品IDとなる想定をして書き進める

    // DB更新
    $syouhinn->storeData($request);

    //レコード数取得
    $num = $syouhinn->getNumberOfRecord();

    if(count($size) > 0 and $color == null){
      for($i = 0; $i < count($size); $i++){
        $sku->storeData1($size, $num);
      }
    }elseif(count($color) > 0 and $size == null){
      for($i = 0; $i < count($size); $i++){
        $sku->storeData2($color, $num);
      }
    }elseif(count($color) > 0 and count($size) > 0){
      for($i = 0; $i < count($size); $i++){
        $sku->storeData3($size, $color, $num);
      }
    }else{
      $sku->storeData4($num);
    }

    //TODO : モデルに処理をまとめる
    // 更新内容をviewに反映
    $data = DB::table('syouhinn')->
                select('syouhinn.id as syouhinn_id','syouhinn.syouhinn_name', 'syouhinn.tannka', 'syouhinn.kubunn_id','torihikisaki_name',
                        'torihikisaki.id as torihikisaki_id', 'torihikisaki.torihikisaki_name')->
                leftjoin('torihikisaki', 'syouhinn.torihikisaki_id', '=', 'torihikisaki.id') -> get();

    return view('show_supplie_list',['data'=>$data]);

  }

}
