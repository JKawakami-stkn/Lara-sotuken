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

    return view('po_check_delivery', ['data'=>$data]);
    
  }

}
