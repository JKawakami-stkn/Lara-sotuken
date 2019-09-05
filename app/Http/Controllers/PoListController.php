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

    $id = \App\models\Hannbaikai::select('id')->get();
    $hannbaikai = Hannbaikai::find($id);
      return view('po_list',['hannbaikai'=>$hannbaikai]);
  }

}
