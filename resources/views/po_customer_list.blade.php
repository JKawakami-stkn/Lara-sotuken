@extends('./template/layout')
<!-- css -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/overall.css') }}">

@stop

@section('content')
  <div class="container">
    <!-- ページ名 -->
    <h4 class="page-title blue-text text-lighten-3">注文内容確認</h4>
    <!--基本的にここだけを書き換える-->
    <!--<tr>
      <th class="product_list name_list">真木よう子</th>
      <th class="product_list yohin_list">制服</th>
      <th class="product_list tanka_list">〇〇円</th>
      <th class="product_list size_list">S</th>
      <th class="product_list suryo_list">1</div>
      <th class="product_list sum_list">〇〇</th>
    </tr>-->
    <ul class="collapsible">
      <!-- 指定されたクラスの園児の一覧を表示する -->
      @foreach($kids_collection as $k)
      <?php //var_dump($k) ?>
        <li>
          <div class="collapsible-header"><i class="material-icons">chevron_right</i>{{$k['KIDS_NM_KJ']}}</div>
          <div class="collapsible-body">
            <ul class="collection with-header">
                <table class="products-table">
                    <tr>
                        <th class="product syouhin top">商品名</th>
                        <th class="product syouhin top">色</th>
                        <th class="product syouhin top">サイズ</th>
                        <th class="product syouhin top">個数</th>
                    </tr>
                </table>

                <table class="products-table hogosya-table">
                  <!-- ここに購入商品のループを記述する　-->
                  <?php 
                    foreach($tyuumonnmeisai as $t){
                      //児童特定と販売会特定
                      if($t->zidou_id == $k['KIDS_ID'] && $t->hannbaikai_id == $hannbaikai_id){
                          foreach($sku as $s){
                            //sku特定
                            if($s->id == $t->sku_id){
                              //商品特定
                              foreach($syouhinn as $sy){
                                if($sy->id == $s->syouhinn_id){                          
                          ?>
                          <tr>
                          <th class="product syouhin">{{$sy->syouhinn_name}}</th>
                          <th class="product syouhin">{{$s->color}}</th>
                          <th class="product syouhin">{{$s->saizu}}</th>
                          <th class="product syouhin">{{$t->suuryou}}</th>
                          </tr>
                          <?php
                                }
                             }
                            }
                          }
                      }
                    }
                  ?>
                </table>
              </ul>
          </div>
        </li>
      @endforeach
    </ul>
  </div>
@stop

  <!--  Scripts-->
@section('addJS')
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{asset('js/materialize.js')}}"></script>
  <script src="{{asset('js/init.js')}}"></script>
  <script src="{{asset('js/box.js')}}"></script>

  <script>
    // 折り畳み
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.collapsible');
      var instances = M.Collapsible.init(elems);
    });

  　// ポップアップ
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('.modal');
      var instances = M.Modal.init(elems);
    });

    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems);
    });
  </script>
@stop
