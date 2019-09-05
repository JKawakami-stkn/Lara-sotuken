<?php

namespace App\models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kumi extends Model
{
    // テーブル名
    protected $table = 'kumi';

    // 主キーのセット
    protected $guarded = array('id');

    // タイムスタンプの自動挿入無効
    public $timestamps = false;


    // DBからデータを取得し返すメソッド
    public function getData($kumi_id=null){

      $query = DB::table($this->table);

      if($kimi_id != null) $query->where('id', $kumi_id);

      $data = $query->get();

      return $data;
    }
}
