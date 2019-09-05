<?php

namespace App\models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hannbaikumi extends Model
{
    // テーブル名
    protected $table = 'hannbaikumi';

    // 主キーのセット
    protected $guarded = array('id');

    // タイムスタンプの自動挿入無効
    public $timestamps = false;


    // DBからデータを取得し返すメソッド
    public function getData($hanbaikumi_id=null){

      $query = DB::table($this->table);

      if($hanbaikumi_id != null) $query->where('id', $hanbaikumi_id);

      $data = $query->get();

      return $data;
    }
}
