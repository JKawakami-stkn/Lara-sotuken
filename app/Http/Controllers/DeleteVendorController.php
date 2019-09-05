<?php

namespace App\Http\Controllers;

// インスタンス化するモデルを指定
use App\models\Torihikisaki;

use Illuminate\Http\Request;
use App\Models\purchased_articl;

class DeleteVendorController extends Controller

{

  public function show($torihikisaki_id){

    // Torihikisakiモデルのインスタンスを作成
    $md = new Torihikisaki();

    // データ取得
    $data = $md->getData($torihikisaki_id);

    return view('edit_vendor',['data'=>$data]);
  }


  public function edit(Request $request){

      // 新規インスタンス作成
      $torihikisaki = new Torihikisaki;

      // DB更新
      $torihikisaki->updateData($request);

      // 更新内容をviewに反映
      $data = $torihikisaki->getData();

      // データ取得
      $data =  $torihikisaki->getData();

      return view('show_vendor_list',['data'=>$data]);
  }

  //削除フラグを変更する。
  public function editFlag(Request $request){
    //取引先モデルをインスタンス化
    $torihikisaki = new Torihikisaki();
    //フラグ変更
    $request->delete = 0;
    //更新
    $torihikisaki->updateData($request);
    //取得
    $data = $torihikisaki->getData();
    
    return view('show_vendor_list',['data'=>$data]);
  }
}
