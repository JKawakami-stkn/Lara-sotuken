<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\purchased_articl;

class PoCheckInspectionController extends Controller

{

  public function show(){
      return view('po_check_inspection');
  }

}
