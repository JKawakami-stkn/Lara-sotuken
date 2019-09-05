<?php

namespace App\Http\Controllers;

use App\models\Hannbaikai;
use App\models\Hannbaikumi;
use App\models\Hannbaisyouhinn;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\purchased_articl;

class PoListController extends Controller

{

//TODO: リロード対策
  public function show(){

      // 販売会の全データを取得
      $hannbaikai = new Hannbaikai();
      $data = $hannbaikai->getData();


      return view('po_list' ,['data'=>$data]);
  }

}
