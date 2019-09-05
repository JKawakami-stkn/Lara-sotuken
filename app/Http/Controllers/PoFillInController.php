<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\purchased_articl;

class PoFillInController extends Controller

{

  public function show(){
      return view('po_fill_in');
  }

}
