<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\purchased_articl;

use App\Models\Hannbaisyouhinn;
use App\Models\Sku;
use App\Models\MWfGroup;
use App\Models\MKids;
use App\Models\TKidsGpPosi;


class PoFillInController extends Controller

{

  public function show($hannbaikai_id, $kumi_id){
      return view('po_fill_in');
  }

}
