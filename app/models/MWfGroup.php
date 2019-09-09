<?php

namespace App\models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MWfGroup extends Model
{ 
    // テーブル名
    protected $table = 'm_wf_group';

    // 主キーのセット
    protected $guarded = array('GP_CD');
    
    // タイムスタンプの自動挿入無効
    public $timestamps = false;
}
