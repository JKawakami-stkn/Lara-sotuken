<?php

namespace App\models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kubunn extends Model
{
    // テーブル名
    protected $table = 'kubunn';

    // 主キーのセット
    protected $guarded = array('id');

    // タイムスタンプの自動挿入無効
    public $timestamps = false;


    // DBからデータを取得し返すメソッド
    public function getData($kubunn_id=null){

      $query = DB::table($this->table);

      if($kubunn_id != null) $query->where('id', $kubun_id);

      $data = $query->get();

      return $data;
    }
}
