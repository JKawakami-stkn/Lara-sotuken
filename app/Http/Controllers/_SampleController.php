<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\purchased_articl;

class SampleController extends Controller
{

  public function model($name=null){
    // モデルのインスタンス化
    $md = new purchased_articl();
    
    // データ取得
    $data = $md->getData($name);

    // ビューを返す
    return view('sample.model', ['data' => $data]);
 }

}
