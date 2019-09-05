<?php

namespace App\Http\Controllers;

// インスタンス化するモデルを指定
use App\models\Torihikisaki;

use Illuminate\Http\Request;
use App\Models\purchased_articl;

class ShowVendorListController extends Controller

{

  public function show(){

    // Torihikisakiモデルのインスタンスを作成
    $md = new Torihikisaki();

    // データ取得
    $data = $md->getData();

    return view('show_vendor_list',['data'=>$data]);
  }

}
