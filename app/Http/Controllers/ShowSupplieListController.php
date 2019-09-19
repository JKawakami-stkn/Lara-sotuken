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





class ShowSupplieListController extends Controller

{

  public function show(){
      $Syouhinn = new Syouhinn();
      $Torihikisaki = new Torihikisaki();
      $Kubunn = new Kubunn();
      $Sku = new SKu();
      $syouhinn_all_info = [];

    for($syouhinn_id = 1; $syouhinn_id <=$Syouhinn->getNumberOfRecord(); $syouhinn_id++){
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
      
      $syouhinn_all_info = array_merge($syouhinn_all_info,array($syouhinn_info));

      
    }
    \Debugbar::info($syouhinn_all_info);

      
      
      

        
    
    
    
    
    
        //TODO : モデルに処理をまとめる
        // 取引先テーブルと商品テーブルを取引先IDで結合して取得
        $data = DB::table('syouhinn')->
                    select('syouhinn.id as syouhinn_id','syouhinn.syouhinn_name', 'syouhinn.tannka', 'syouhinn.kubunn_id',
                            'torihikisaki.id as torihikisaki_id', 'torihikisaki.torihikisaki_name')->
                        leftjoin('torihikisaki', 'syouhinn.torihikisaki_id', '=', 'torihikisaki.id') -> get();
      return view('show_supplie_list',compact("syouhinn_all_info"));
  }

}
