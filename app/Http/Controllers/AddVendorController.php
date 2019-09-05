<?php

namespace App\Http\Controllers;

// インスタンス化するモデルを指定
use App\models\Torihikisaki;

use Illuminate\Http\Request;
use App\Models\purchased_articl;

class AddVendorController extends Controller

{

  public function show(){
    return view('add_vendor');
  }


  public function store(Request $request){

    // 新規インスタンス作成
    $torihikisaki = new Torihikisaki;

    // DB更新
    $torihikisaki->storeData($request);

    // 更新内容をviewに反映
    $data = $torihikisaki->getData();

    return view('show_vendor_list',['data'=>$data]);

  }

}
