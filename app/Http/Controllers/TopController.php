<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\purchased_articl;

class TopController extends Controller

{

  public function show(){
      return view('top');
  }

}
