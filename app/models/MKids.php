<?php

namespace App\models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MKids extends Model
{
    // テーブル名
    protected $table = 'M_KIDS';

    // 主キーのセット
    protected $guarded = ['KIDS_ID'];

    // タイムスタンプの自動挿入無効
    public $timestamps = false;

    //主キーが自動増分でない場合falseにして記述する
    public $incrementing = false;

    //主キーがintでない場合の記述
    protected $keyType = 'string';



    // DBからデータを取得し返すメソッド
    /*
    public function getData($hanbaikumi_id=null){

      $query = DB::table($this->table);

      if($hanbaikumi_id != null) $query->where('id', $hanbaikumi_id);

      $data = $query->get();

      return $data;
    }
    */
}
