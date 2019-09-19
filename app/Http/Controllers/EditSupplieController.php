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

class EditSupplieController extends Controller

{

    public function show($syouhinn_id){

      // Torihikisakiモデルのインスタンスを作成
      $Syouhinn = new Syouhinn();
      $Torihikisaki = new Torihikisaki();
      $Kubunn = new Kubunn();
      $Sku = new SKu();




      // データ取得
      $torihikisaki_all = $Torihikisaki->getData();
      $kubunn_all = $Kubunn->getData();
      $syouhinn = $Syouhinn::where("id",$syouhinn_id)->get();
      $torihikisaki = $Torihikisaki::where("id",$syouhinn->toArray()[0]["torihikisaki_id"])->select("torihikisaki_name")->get();
      $kubunn = $Kubunn::where("id",$syouhinn->toArray()[0]["kubunn_id"])->select("kubunn_name")->get();
      $sku = $Sku::where("syouhinn_id",$syouhinn_id)->select("saizu","color")->get();

      $color = [];
      $saizu = [];
      foreach($sku as $d){
        
        if(!in_array($d->color,$color)){
          array_push($color,$d->color);
        }
        if(!in_array($d->saizu,$saizu)){
          array_push($saizu,$d->saizu);
        }
      }

      
      $syouhinn_info = [];
      $syouhinn_info = array_merge($syouhinn_info,array("syouhinn_id"=>$syouhinn_id));
      $syouhinn_info = array_merge($syouhinn_info,array("syouhinn_name"=>$syouhinn->toArray()[0]["syouhinn_name"]));
      $syouhinn_info = array_merge($syouhinn_info,array("torihikisaki_name"=>$torihikisaki->toArray()[0]["torihikisaki_name"]));
      $syouhinn_info = array_merge($syouhinn_info,array("tannka"=>$syouhinn->toArray()[0]["tannka"]));
      $syouhinn_info = array_merge($syouhinn_info,array("kubunn_name"=>$kubunn->toArray()[0]["kubunn_name"]));
      
      
      
      $syouhinn_info = array_merge($syouhinn_info,array("color"=>implode(",",$color)));
      $syouhinn_info = array_merge($syouhinn_info,array("kubunn_id"=>$syouhinn->toArray()[0]["kubunn_id"]));
      
      $syouhinn_info = array_merge($syouhinn_info,array("torihikisaki_id"=>$syouhinn->toArray()[0]["torihikisaki_id"]));
      
      
      
      $syouhinn_info = array_merge($syouhinn_info,array("saizu"=>implode(",",$saizu)));
      
      

      

      



      return view('edit_supplie',compact('torihikisaki_all','kubunn_all','syouhinn_info'));
    }


    public function edit(Request $request){

        $request->session()->regenerateToken(); //F5での更新制御

        // 新規インスタンス作成
        $syouhinn = new Syouhinn;
        $Sku = new Sku();

        $show_contoroller = new ShowSupplieListController();
        
        
        
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

        return $show_contoroller->show();;
    }

}
