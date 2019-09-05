<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Hannbaisyouhinn extends Model
{
    // テーブル名
    protected $table = 'hannbaisyouhinn';

    // 主キーのセット
    protected $guarded = array('id');

    // タイムスタンプの自動挿入無効
    public $timestamps = false;


    // DBからデータを取得し返すメソッド
    public function getData($hannbaisyouhinn_id=null){

      $query = DB::table($this->table);

      if($hannbaisyouhinn_id != null) $query->where('id', $hannbaisyouhinn_id);

      $data = $query->get();

      return $data;
    }
}
