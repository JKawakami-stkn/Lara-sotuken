@extends('./template/layout')
<?php
use Illuminate\Database\Eloquent\Model;
?>

<!-- css -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{asset('/css/materialize.min.css')}}" media="screen,projection" />
<link type="text/css" rel="stylesheet" href="{{asset('/css/overall.css')}}">
<link type="text/css" rel="stylesheet" href="{{asset('/css/po_list.css')}}">
@stop

@section('content')
  <!-- メインコンテンツ -->
  <div class="main">
    <div class="container">
      <!-- ページ名 -->
      <h4 class="page-title blue-text text-lighten-3">販売会一覧</h4>

      <!-- 新規作成ボタン -->
      <div class="add_button">
        <a class="btn-floating btn-large waves-effect waves-light blue" href="{{ action('PoCreateController@show') }}"><i class="material-icons">add</i></a>
      </div>
      <p></p>


      @foreach($hannbaikai as $hannbaikaidata)

        <!-- 販売会と組を紐づけ -->
        <?php $hannbaikumi = $hannbaikaidata->kumis; ?>

        <!-- 発注ごと -->
          <div class="z-depth-1 blue-text order">

            <div class="row">
              <p class="col s10 order_title">{{$hannbaikaidata->hannbaikai_name}}</p>
        
              <div class="right-align order_button">
                <!-- Dropdown Trigger -->
                <a class='dropdown-trigger btn-floating btn-large waves-effect waves-light grey' href='' data-target='dropdown' data-hannbaikai_id="{{$hannbaikaidata->id}}"><i class="material-icons">dehaze</i></a>

              </div>

            </div>

            <!-- クラスごと -->
            @foreach($hannbaikumi as $kumidata)
              <span>
                <a class="modal-trigger" href="#modal" data-hannbaikai_id="{{$hannbaikaidata->id}}" data-kumi_id="{{$kumidata->id}}" data-kumi_name="{{$kumidata->GP_NM}}">
                <div class="card horizontal">
                  <div class="card-stacked">
                    <div class="card-content">
                      <h5>{{$kumidata->GP_NM}}</h5>
                    </div>
                  </div>
                </div>
                </a>
              </span>
            @endforeach

          </div>
      @endforeach

      <!-- ドロップダウン -->
      <ul id='dropdown' class='dropdown-content'>
        <!-- <li><a id="check" href=""><i class="material-icons">content_paste</i>check</a></li> -->
        <li><a id="print" href=""><i class="material-icons">local_printshop</i>print</a></li>
        <li><a id="edit" href=""><i class="material-icons">edit</i>edit</a></li>
      </ul>

      <!-- モーダル -->
      <div id="modal" class="modal">
        <div class="modal-content">
          <div class="modal-header center-align">
            <h5 id="kumi_name"></h5>
          </div>

          <a id="fill_in" href="">
            <div class="row">
              <div class="card">
                <div class="card-content center-align">
                  <p>保護者入力</p>
                </div>
              </div>
            </div>
          </a>

          <a id="customer_list" href="">
            <div class="row">
              <div class="card">
               <div class="card-content center-align">
                  <p>注文内容確認</p>
                </div>
              </div>
            </div>
          </a>

          <a id="check_delivery" href="">
            <div class="row">
              <div class="card">
                <div class="card-content center-align">
                  <p>引き渡しチェック</p>
                </div>
              </div>
            </div>
          </a>

        </div>
      </div>
    </div>
  </div>

@stop

@section('addJS')
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="{{asset('js/materialize.js')}}"></script>

<script>

  // 折り畳み
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
  });

  // モーダル初期化
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });

  // モーダル生成
  $('.modal-trigger').on('click', function(){

    var target =  $(this);
    var hannbaikai_id = target.attr('data-hannbaikai_id');
    var kumi_id = target.attr('data-kumi_id');
    var kumi_name = target.attr('data-kumi_name');

    $('#kumi_name').text(kumi_name);
    $("#fill_in").attr("href", "{{ action('PoFillInController@show') }}" + "/" + hannbaikai_id + "/" + kumi_id);
    $("#customer_list").attr("href", "{{ action('PoCustomerListController@show') }}" + "/" + hannbaikai_id + "/" + kumi_id);
    $("#check_delivery").attr("href", "{{ action('PoCheckDeliveryController@show') }}" + "/" + hannbaikai_id + "/" + kumi_id);

  });


  // ドロップダウン初期化
  $('.dropdown-trigger').dropdown();
  
  // ドロップダウン生成
  $('.dropdown-trigger').on('click', function(){

    var target =  $(this);
    var hannbaikai_id = target.attr('data-hannbaikai_id');
    // console.log(target);

    $("#check").attr("href", "{{ action('PoCheckInspectionController@show') }}" + "/" + hannbaikai_id );
    $("#print").attr("href", "{{ action('PoPrintController@show') }}" + "/" + hannbaikai_id );
    $("#edit").attr("href", "{{ action('EditPoCreateController@show') }}" + "/" + hannbaikai_id );
  });


</script>
@stop
