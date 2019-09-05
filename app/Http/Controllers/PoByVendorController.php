<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\purchased_articl;

class PoByVendorController extends Controller

{

  public function show(){
      return view('po_by_vendor');
  }

}
