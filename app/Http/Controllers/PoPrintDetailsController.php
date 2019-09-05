<?php

namespace App\Http\Controllers;

use App\models\Hannbaikai;
use App\models\Syouhinn;
use App\models\Hannbaisyouhinn;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\purchased_articl;

class PoPrintDetailsController extends Controller

{

  public function show($hannbaikai_id, $torihikisaki_id){

    # 販売商品テーブルから指定の販売会で取り扱う、商品を商品テーブルから取得
    $torihikisaki_name = DB::table('torihikisaki')
                              ->select('torihikisaki_name')
                              ->where('id','=', $torihikisaki_id)
                              ->get();

    $tyuumonn_data = DB::table('tyuumonnmeisai')
                              ->select( 'syouhinn_name',
                                        'saizu',
                                        'color',
                                        'suuryou',
                                        'sku_id'
                                      )
                              ->leftjoin('sku','tyuumonnmeisai.sku_id','=','sku.id')
                              ->leftjoin('syouhinn','sku.syouhinn_id','=','syouhinn.id')
                              ->leftjoin('torihikisaki','syouhinn.torihikisaki_id','=','torihikisaki.id')
                              ->where('hannbaikai_id','=', $hannbaikai_id)
                              ->where('torihikisaki_id','=', $torihikisaki_id)
                              ->get();

    $sku_id_list = DB::table('tyuumonnmeisai')
                              ->select('sku_id')
                              ->distinct()
                              ->leftjoin('sku','tyuumonnmeisai.sku_id','=','sku.id')
                              ->leftjoin('syouhinn','sku.syouhinn_id','=','syouhinn.id')
                              ->leftjoin('torihikisaki','syouhinn.torihikisaki_id','=','torihikisaki.id')
                              ->where('hannbaikai_id','=', $hannbaikai_id)
                              ->where('torihikisaki_id','=', $torihikisaki_id)
                              ->get();




    return view('po_print_details', compact('torihikisaki_name', 'tyuumonn_data', 'sku_id_list','torihikisaki_id', 'hannbaikai_id'));
  }

}
