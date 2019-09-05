<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class PoPrintController extends Controller

{
  # TODO : $hannbaikai_idを引数として受け取る
  public function show($hannbaikai_id){

    # 販売商品テーブルから指定の販売会で取り扱う、商品を商品テーブルから取得
    $syouhinn_data = DB::table('hannbaisyouhinn')
                              ->select('syouhinn.torihikisaki_id',
                                        'hannbaisyouhinn.syouhinn_id',
                                        'syouhinn.syouhinn_name'
                                      )
                              ->leftjoin('syouhinn','hannbaisyouhinn.syouhinn_id','=','syouhinn.id')
                              ->where('hannbaikai_id','=', $hannbaikai_id)
                              ->get();

    # FIXME : 二度手間感がすごい。
    # 販売会で取り扱われる、商品を取り扱う、取引先のidと名前を取得
    $torihikisaki_data = DB::table('hannbaisyouhinn')
                              ->select('torihikisaki_id',
                                        'torihikisaki_name'
                                      )
                              ->distinct()
                              ->leftjoin('syouhinn','hannbaisyouhinn.syouhinn_id','=','syouhinn.id')
                              ->leftjoin('torihikisaki','syouhinn.torihikisaki_id','=','torihikisaki.id')
                              ->where('hannbaikai_id','=', $hannbaikai_id)
                              ->get();

    return view('po_print' ,compact('syouhinn_data', 'torihikisaki_data', 'hannbaikai_id'));
    #return view('po_print' ,['syouhinn_data'=>$syouhinn_data], ['torihikisaki_data'=>$torihikisaki_data], ['hannbaikai_id'=>$hannbaikai_id]);
  }

}
