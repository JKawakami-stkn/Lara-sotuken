<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\purchased_articl;

class PoCustomerListController extends Controller

{

  public function show(){
      return view('po_customer_list');
  }

}
