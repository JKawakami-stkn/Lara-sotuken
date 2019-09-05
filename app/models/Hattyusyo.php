<?php

namespace App\models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hattyusyo extends Model {
    // テーブル名
    protected $table = 'hattyusyo';

    // 主キーのセット
    protected $guarded = array('id');

    // タイムスタンプの自動挿入無効
    public $timestamps = false;


    // DBからデータを取得し返すメソッド
    public function getData($hattyusyo_id=null){

      $query = DB::table($this->table);

      if($hattyusyo_id != null) $query->where('id', $hattyusyo_id);

      $data = $query->get();

      return $data;
    }

}
