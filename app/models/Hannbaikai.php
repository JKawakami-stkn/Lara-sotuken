<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hannbaikai extends Model
{
    // テーブル名
    protected $table = 'hannbaikai';

    // 主キーのセット
    protected $guarded = array('id');

    // タイムスタンプの自動挿入無効
    public $timestamps = false;


    // DBからデータを取得し返すメソッド
    public function getData($hanbaikai_id=null){

      $query = DB::table($this->table);

      if($hanbaikai_id != null) $query->where('id', $hanbaikai_id);

      $data = $query->get();

      return $data;
    }

}
