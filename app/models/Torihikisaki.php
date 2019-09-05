<?php
// modelを置いている場所を指定
namespace App\models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Torihikisaki extends Model
{
  // テーブル名
  protected $table = 'torihikisaki';

  // 主キーのセット
  protected $guarded = array('id');

  // タイムスタンプの自動挿入無効
  public $timestamps = false;



  // DBからデータを取得し返すメソッド
  public function getData($torihikisaki_id=null){

    $query = DB::table($this->table);
    //非デフォルト
    if($torihikisaki_id != null) $query->where('id', $torihikisaki_id);

    $data = $query->get();

    return $data;
  }



  //DBにデータを保存するメソッド
  public function storeData(Request $request) {
    // 新規インスタンス作成
    $torihikisaki = new Torihikisaki;

    // インスタンスに受け取った値を格納
    $torihikisaki->torihikisaki_name = $request->torihikisaki_name;
    $torihikisaki->denwabanngou = $request->denwabanngou;
    $torihikisaki->zyuusyo = $request->zyuusyo;
    $torihikisaki->delete = 1;
    // データベースにデータを追加
    $torihikisaki->save();
  }


  // データを編集する
  public function updateData(Request $request) {

    // 指定のデータを更新
    $torihikisaki = Torihikisaki::where('id', $request->id)->first();

    // インスタンスに受け取った値を格納
    $torihikisaki->torihikisaki_name = $request->torihikisaki_name;
    $torihikisaki->denwabanngou = $request->denwabanngou;
    $torihikisaki->zyuusyo = $request->zyuusyo;
    //deleteフラグを格納
    $torihikisaki->delete = $request->delete;

    $torihikisaki->save();
  }

}
