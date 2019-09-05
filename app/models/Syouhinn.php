<?php

namespace App\models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Syouhinn extends Model
{
    // テーブル名
    protected $table = 'syouhinn';

    // 主キーのセット
    protected $guarded = array('id');

    // タイムスタンプの自動挿入無効
    public $timestamps = false;



    // DBからデータを取得し返すメソッド
    public function getData($syouhinn_id=null){

      $query = DB::table($this->table);

      if($syouhinn_id != null) $query->where('id', $syouhinn_id);

      $data = $query->get();

      return $data;
    }



    //DBにデータを保存するメソッド
    public function storeData(Request $request) {
      // 新規インスタンス作成
      $syouhinn = new Syouhinn;

      // インスタンスに受け取った値を格納
      $syouhinn->syouhinn_name = $request->syouhinn_name;
      $syouhinn->tannka = $request->tannka;
      $syouhinn->kubunn_id = $request->kubunn_id;
      $syouhinn->torihikisaki_id = $request->torihikisaki_id;
      $syouhinn->delete = 1;
      // データベースにデータを追加
      $syouhinn->save();
    }



    // データを編集する
    public function updateData(Request $request) {

      // 指定のデータを更新
      $syouhinn = Syouhinn::where('id', $request->id)->first();

      // インスタンスに受け取った値を格納
      $syouhinn->syouhinn_name = $request->syouhinn_name;
      $syouhinn->tannka = $request->tannka;
      // TODO:区分名、取引先名の取得
      $syouhinn->kubunn_id = $request->kubunn_id;
      $syouhinn->torihikisaki_id = $request->torihikisaki_id;

      // データベースのデータを更新
      $syouhinn->save();
    }

    public function  getNumberOfRecord(){
      return Syouhinn::all()->count();
    }

}
