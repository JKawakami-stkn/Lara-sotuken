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

      var_dump($data);

    return view('po_check_delivery', ['data'=>$data, 'hannbaikai_id'=>$hannbaikai_id]);

  }

  // TODO:取引先編集画面のエラーを修正, hattyuumeisaiテーブルのtyuumonn_idを削除, hattyuumeisaiテーブルのzidou_idの型を修正

  // ajax
  public function load(Request $request, $zidou_id){

    $data = DB::table('tyuumonnmeisai')
      ->select('syouhinn.syouhinn_name', 'sku.saizu', 'sku.color')
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

    //return response()->json(['result' => true]);

  }

}
