<?php

namespace App\models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sku extends Model
{
    // テーブル名
    protected $table = 'sku';

    // 主キーのセット
    protected $guarded = array('id');

    // タイムスタンプの自動挿入無効
    public $timestamps = false;



    // DBからデータを取得し返すメソッド
    public function getData($sku_id=null){

      $query = DB::table($this->table);

      if($sku_id != null) $query->where('id', $sku_id);

      $data = $query->get();

      return $data;
    }

    public function storeData1($size, $num) {
      for($i = 0;$i < count($size); $i++){
        // 新規インスタンス作成
        $sku = new sku;
        // インスタンスに受け取った値を格納
        $sku->syouhinn_id = $num;
        $sku->saizu = $size[$i];
        $sku->color = null;
        // データベースにデータを追加
        $sku->save();
      }
    }

    
    //DBにデータを保存するメソッド
    public function storeData2($color, $num) {
      for($i = 0;$i < count($color); $i++){
        // 新規インスタンス作成
        $sku = new sku;
        // インスタンスに受け取った値を格納
        $sku->syouhinn_id = $num;
        $sku->saizu = null;
        $sku->color = $color[$i];
        // データベースにデータを追加
        $sku->save();
      }
    }

    //DBにデータを保存するメソッド
    public function storeData3($size, $color, $num) {
      for($i = 0;$i < count($size); $i++){
        for($j = 0; $j < count($color); $j++){
          // 新規インスタンス作成
          $sku = new sku;
          // インスタンスに受け取った値を格納
          $sku->syouhinn_id = $num;
          $sku->saizu = $size[$i];
          $sku->color = $color[$j];
          // データベースにデータを追加
          $sku->save();
        }
      }
    }


    //DBにデータを保存するメソッド
    public function storeData4($num) {
      // 新規インスタンス作成
      $sku = new sku;
      // インスタンスに受け取った値を格納
      $sku->syouhinn_id = $num;
      $sku->saizu = null;
      $sku->color = null;
      // データベースにデータを追加
      $sku->save();
    }



    // データを編集する
    public function updateData(Request $request) {

      // 指定のデータを更新
      $sku = sku::where('id', $request->id)->first();

      // インスタンスに受け取った値を格納
      $sku->sku_name = $request->sku_name;
      $sku->tannka = $request->tannka;
      // TODO:区分名、取引先名の取得
      $sku->kubunn_id = $request->kubunn_id;
      $sku->torihikisaki_id = $request->torihikisaki_id;

      // データベースのデータを更新
      $sku->save();
    }


}
