@extends('./template/layout')
<!-- css -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="css/overall.css">
<link type="text/css" rel="stylesheet" href="css/po_list.css">
@stop

@section('content')
    <!-- メインコンテンツ -->
    <div class="main">
      <div class="container">
        <!-- ページ名 -->
        <h4 class="page-title blue-text text-lighten-3">発注書一覧</h4>

        <!-- 新規作成ボタン -->
        <div class="add_button">
          <a class="btn-floating btn-large waves-effect waves-light blue" href="{{ action('PoCreateController@show') }}"><i class="material-icons">add</i></a>
        </div>
        @foreach($data as $d)
        <!-- 発注ごと -->
        <div class="z-depth-1 blue-text order">

            <div class="row">
              <p class="col s8 order_title">{{$d->hannbaikai_name}}</p>

              <div class="col s4 order_button">
                    <a class="btn-floating btn-large waves-effect waves-light green"
                        href="{{ action('PoCheckInspectionController@show') }}"><i class="material-icons">content_paste</i></a>
                    <a class="btn-floating btn-large waves-effect waves-light red"
                        href="{{ action('PoPrintController@show') }}"><i class="material-icons">local_printshop</i></a>
                </div>
          </div>


          <!-- クラスごと -->
          <span>
              <a class="modal-trigger" href="#{{$d->hannbaikai_name}}">
               <div class="card horizontal">
                 <div class="card-stacked">
                   <div class="card-content">
                     <h5>〇〇組</h5>
                   </div>
                   <!--
                   <div class="card-action">
                       <p>対象　:　〇〇組</p>
                   </div>
                    -->
                 </div>
               </div>
              </a>
          </span>

          <span>
              <a class="modal-trigger" href="#{{$d->hannbaikai_name}}">
               <div class="card horizontal">
                 <div class="card-stacked">
                   <div class="card-content">
                     <h5>〇〇組</h5>
                   </div>
                   <!--
                   <div class="card-action">
                       <p>対象　:　〇〇組</p>
                   </div>
                    -->
                 </div>
               </div>
              </a>
          </span>

          <span>
              <a class="modal-trigger" href="#{{$d->hannbaikai_name}}">
               <div class="card horizontal">
                 <div class="card-stacked">
                   <div class="card-content">
                     <h5>〇〇組</h5>
                   </div>
                   <!--
                   <div class="card-action">
                       <p>対象　:　〇〇組</p>
                   </div>
                    -->
                 </div>
               </div>
              </a>
          </span>

        <!-- ポップアップウィンドウ -->
        <div id="{{$d->hannbaikai_name}}" class="modal">
          <div class="modal-content">
            <div class="modal-header center-align">
              <h5>発注書〇</h5>
            </div>
            <!-- 選択肢のカード -->
            <!-- 選択肢１ -->
            <a href=" {{ action('PoFillInController@show') }}">
              <div class="row">
                  <div class="card">
                    <div class="card-content center-align">
                      <p>保護者入力</p>
                    </div>
                  </div>
              </div>
            </a>
            <!-- 選択肢２ -->
            <a href="{{ action('PoCustomerListController@show') }}">
              <div class="row">
                  <div class="card">
                    <div class="card-content center-align">
                      <p>注文内容確認</p>
                    </div>
                  </div>
              </div>
            </a>
            <!-- 選択肢５ -->
            <a href="{{ action('PoCheckDeliveryController@show') }}">
              <div class="row">
                  <div class="card">
                    <div class="card-content center-align">
                      <p>引き渡しチェック</p>
                    </div>
                  </div>
              </div>
            </a>
            <!-- 削除、詳細-->
            <!--
              <div class="row">
                <div class="col s6">
                  <a href="./po_details.html">
                    <div class="card half">
                      <div class="card-content center-align">
                        <p>詳細</p>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col s6">
                    <a href="">
                      <div class="card half">
                        <div class="card-content center-align">
                          <p>削除</p>
                        </div>
                    </div>
                  </a>
                </div>
            -->
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
@stop

@section('addJS')
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>

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
</script>
@stop
