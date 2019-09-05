.........................<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\purchased_articl;

class FrontController extends Controller

{
/*
  public function show_sample(){
      return view('top');
  }
 */

  public function show_add_supplie(){
      return view('add_supplie');
  }

  public function show_add_vendor(){
      return view('add_vendor');
  }

  public function show_edit_supplie(){
      return view('edit_supplie');
  }

  public function show_edit_vendor(){
      return view('edit_vendor');
  }

  public function show_login(){
      return view('login');
  }

  public function show_po_by_vendor(){
      return view('po_by_vendor');
  }

  public function show_po_check_delivery(){
      return view('po_check_delivery');
  }

  public function show_po_check_inspection(){
      return view('po_check_inspection');
  }

  public function show_po_create(){
      return view('po_create');
  }

  public function show_po_customer_list(){
      return view('po_customer_list');
  }

  public function show_po_details(){
      return view('po_details');
  }

  public function show_po_fill_in(){
      return view('po_fill_in');
  }

  public function show_po_list(){
  	  return view('po_list');
  }
/*
  public function show_po_list($name=null){
    // モデルのインスタンス化
    $md = new purchased_articl();
    // データ取得
    $data = $md->getData($name);
    // ビューを返す
    return view('po_list', ['data' => $data]);
  }
*/

  public function show_po_print(){
      return view('po_print');
  }

  public function show_show_supplie_list(){
      return view('show_supplie_list');
  }

  public function show_show_vendor_list(){
      return view('show_vendor_list');
  }

  public function show_top(){
      return view('top');
  }

}
