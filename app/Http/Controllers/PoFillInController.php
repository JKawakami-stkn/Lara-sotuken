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
use App\Models\TyuumonnMeisai;
use App\Models\Hannbaikai;

use App\Http\Requests\PoFillInRequest;

class PoFillInController extends Controller{  

  public function show($hannbaikai_id, $kumi_id){
    $Hannbaisyouhinn = new Hannbaisyouhinn();
    $Syouhinn = new Syouhinn();
    $sku = new sku();
    $MWfGroup = new MWfGroup();
    $Mkids = new MKids();
    $TKidsGpPosi = new TKidsGpPosi();
    $Hannbaikai = new Hannbaikai();
    

    
    
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
    // ----------------------------------ここまでーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    // めも　商品名とその商品が持つサイズ、色、値段を格納したい
    $syouhinn_collection = collect([]);
    foreach($syouhinn_id as $d){
      $syouhinn_vector = [];
      $syouhinn = $Syouhinn::select('syouhinn_name','tannka')->where('id',$d->syouhinn_id)->get();
      // \Debugbar::info($syouhinn->toArray()[0]["syouhinn_name"]);
      $syouhinn_vector = array_merge($syouhinn_vector,array("syouhinn_ID"=>$d->syouhinn_id));
      $syouhinn_vector = array_merge($syouhinn_vector,array("syouhinn_name"=>$syouhinn->toArray()[0]["syouhinn_name"]));
      $syouhinn_vector = array_merge($syouhinn_vector,array("tannka"=>$syouhinn->toArray()[0]["tannka"]));

      $sku_info = $sku::where('syouhinn_id',$d->syouhinn_id)->get();
      $color_vector = [];
      $size_vector = [];
      for($i = 0; $i < count($sku_info->toArray()); $i++){
        if(!in_array($sku_info->toArray()[$i]["color"],$color_vector)){
          array_push($color_vector,$sku_info->toArray()[$i]["color"]);
        }
      }

      for($i = 0; $i < count($sku_info->toArray()); $i++){
        if(!in_array($sku_info->toArray()[$i]["saizu"],$size_vector)){
          array_push($size_vector,$sku_info->toArray()[$i]["saizu"]);
        }
      }
      // \Debugbar::info($d->syouhinn_id);
      // \Debugbar::info($color_vector);
      // \Debugbar::info($size_vector);
      // \Debugbar::info($sku_info->toArray());

      if(!empty($color_vector)){
        $syouhinn_vector = array_merge($syouhinn_vector,array("color"=>$color_vector));
      }
      if(!empty($size_vector)){
        $syouhinn_vector = array_merge($syouhinn_vector,array("saizu"=>$size_vector));
      }
      if(!empty($syouhinn_vector)){
        $syouhinn_collection->push($syouhinn_vector);
      }
      // $syouhinn_vector = array_merge($syouhinn_vector,array("syouhinn_name"=>$syouhinn->$items->$original->syouhinn_name));
    }

    // \Debugbar::info($syouhinn_collection);
    // \Debugbar::info($kids_collection);

    $hannbaikai = $Hannbaikai::select('sakuseibi','simekiri','hannbaikai_name')->where('id',$hannbaikai_id)->get();
    

    


    return view('po_fill_in',compact('syouhinn_collection','kids_collection','hannbaikai_id','hannbaikai'));
  }

  public function store(PoFillInRequest $request){
    $request->session()->regenerateToken(); //f5の更新対策
    $sku = new sku();
    $TyuumonnMeisai = new TyuumonnMeisai();
    $para = $request->all();
    $hannbaikai_id = $para["hannbaikai_id"];
    unset($para["hannbaikai_id"]);
    unset($para["_token"]);
    $kids_id = $para["KIDS_ID"];
    unset($para["KIDS_ID"]);
    
    $TyuumonnMeisai->store($para,$kids_id,$hannbaikai_id);
    $po_list = new PoListController();
    
    
    return $po_list->show();
  }

}