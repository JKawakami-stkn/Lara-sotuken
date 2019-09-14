<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PoCheckDeliveryController extends Controller

{

  public function show($hannbaikai_id, $kumi_id){

    $data = DB::table('m_kids')
      ->select('m_kids.kids_id', 'm_kids.kids_nm_kj')
      ->leftjoin('t_kids_gp_posi', 'm_kids.kids_id', '=', 't_kids_gp_posi.kids_id')
      ->where('t_kids_gp_posi.gp_cd', '=', $kumi_id)
      ->get();

      //var_dump($data);

    return view('po_check_delivery', ['data'=>$data, 'hannbaikai_id'=>$hannbaikai_id]);

  }

  // ajax
  public function load(Request $request, $zidou_id){

    $data = DB::table('tyuumonnmeisai')
      ->select('tyuumonnmeisai.id as tyuumonn_meisai_id', 'syouhinn.syouhinn_name', 'sku.saizu', 'sku.color', 'tyuumonnmeisai.suuryou', 'h_flg')
      ->leftjoin('sku', 'tyuumonnmeisai.sku_id', '=', 'sku.id')
      ->leftjoin('syouhinn', 'sku.syouhinn_id', '=', 'syouhinn.id')
      ->where('tyuumonnmeisai.zidou_id', '=', $zidou_id)
      ->where('tyuumonnmeisai.hannbaikai_id', '=', $request->hannbaikai_id)
      ->get()
      ->toArray();
      //

    // jsonを返す
    return response()->json(
      $data,
      200, [],
      JSON_UNESCAPED_UNICODE
    );

  }



  public function store(Request $request){

    $request->session()->regenerateToken(); //F5での更新制御
    
    // var_dump($request->input('zidou_id'));
    $tyuumonnmeisais_id = $request->input('tyuumonnmeisais_id');

    foreach($tyuumonnmeisais_id as $tyuumonnmeisai_id){
      DB::table('tyuumonnmeisai')
        ->where('id', $tyuumonnmeisai_id)
        ->update(['h_flg' => 1]);
    }

    $posliscon = new PoListController();
    return  $posliscon->show();

  }

}
