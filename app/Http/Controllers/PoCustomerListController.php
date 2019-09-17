<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\purchased_articl;
use App\Models\Hannbaisyouhinn;
use App\Models\Syouhinn;
use App\Models\Sku;
use App\Models\MWfGroup;
use App\Models\MKids;
use App\Models\TKidsGpPosi;
use App\Models\tyuumonnmeisai;

class PoCustomerListController extends Controller

{

  public function show($hannbaikai_id, $kumi_id){
      $Hannbaisyouhinn = new Hannbaisyouhinn();
      $Syouhinn = new Syouhinn();
      $sku = new sku();
      $tyuumonnmeisai = new Tyuumonnmeisai();
      $MWfGroup = new MWfGroup();
      $Mkids = new MKids();
      $TKidsGpPosi = new TKidsGpPosi();
      $syouhinn_id = $Hannbaisyouhinn::select('syouhinn_id')->where('hannbaikai_id',$hannbaikai_id)->get();
      $group_info = $MWfGroup::select('GP_NM')->where('id',$kumi_id)->get();
      $kids_name = $Mkids::select('KIDS_ID','KIDS_NM_KJ')->get();
      $kids_posi = $TKidsGpPosi::where('GP_CD',$kumi_id)->get();
      // \Debugbar::addMessage($kids_name);
      // ----------------------------------組に所属する園児の情報を持ってくるーーーーーーーーーーーーーーーーー
      $kids_collection =  collect([]);//kidsidと名前を格納するためのコレクションを作成
      foreach($kids_name as $d){
        $kids_vector = [];
        foreach($kids_posi as $posi){
          if($posi->KIDS_ID == $d->KIDS_ID){
            $kids_vector = array_merge($kids_vector,array("KIDS_ID"=>$d->KIDS_ID));
            $kids_vector = array_merge($kids_vector,array("KIDS_NM_KJ"=>$d->KIDS_NM_KJ));
          }
        }
        if(!empty($kids_vector)){
          $kids_collection->push($kids_vector);
        }
      }

      $skuAll = $sku->getData();
      $tyuumonnmeisaiAll = $tyuumonnmeisai->getData();
      $syouhinnAll = $Syouhinn->getData();
      
      return view('po_customer_list',['kids_collection'=>$kids_collection,'hannbaikai_id'=>$hannbaikai_id,'sku'=>$skuAll,'tyuumonnmeisai'=>$tyuumonnmeisaiAll,'syouhinn'=>$syouhinnAll]);
  }
}
