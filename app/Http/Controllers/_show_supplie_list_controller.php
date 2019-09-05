<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\purchased_articl;

class FrontController extends Controller

{

  public function show(){
      return view('show_supplie_list');
  }

}
