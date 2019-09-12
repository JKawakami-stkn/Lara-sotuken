<?php

namespace App\models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Models\Sku;
class TyuumonnMeisai extends Model
{
    // テーブル名
    protected $table = 'tyuumonnmeisai';

    // 主キーのセット
    protected $guarded = ['id'];

    // タイムスタンプの自動挿入無効
    public $timestamps = false;

    //主キーが自動増分でない場合falseにして記述する
    // public $incrementing = false;

    //主キーがintでない場合の記述
    // protected $keyType = 'string';



    // DBからデータを取得し返すメソッド
    
    public function store($para,$kids_id,$hannbaikai_id){
        
        \Debugbar::info($para);

        foreach($para as $key => $value){
            $sku = new sku();
            $tyuumonnmeisai = new TyuumonnMeisai();
            if($value["suuryou"] != 0){
                if(array_key_exists("size",$para) and array_key_exists("color",$para)){//array_key_existsはないならfalse
                    //両方ある
                    $sku_id = $sku::select("id")->where("syouhinn_id",$key)->where("saizu",$value["size"])->where("color",$value["color"])->get();
                    \Debugbar::info("両方ある");
                }elseif(array_key_exists("size",$para) and !array_key_exists("color",$para)){
                    //色がない
                    $sku_id = $sku::select("id")->where("syouhinn_id",$key)->where("saizu",$value["size"])->get();
                    \Debugbar::info("サイズある");
                }elseif(!array_key_exists("size",$para) and array_key_exists("color",$para)){
                    //サイズがない
                    $sku_id = $sku::select("id")->where("syouhinn_id",$key)->where("color",$value["color"])->get();
                    \Debugbar::info("色ある");
                }else{
                    //両方ない
                    $sku_id = $sku::select("id")->where("syouhinn_id",$key)->get();
                    \Debugbar::info("両方ない");
                }

                
                $tyuumonnmeisai->sku_id = (integer)$sku_id->toArray()[0]["id"];
                $tyuumonnmeisai->suuryou = (integer)$value["suuryou"];
                $tyuumonnmeisai->hannbaikai_id = (integer)$hannbaikai_id;
                $tyuumonnmeisai->zidou_id = $kids_id;
                $tyuumonnmeisai->h_flg = 0;
                $tyuumonnmeisai->save();
                
            }
            
        }

    }
    
}
