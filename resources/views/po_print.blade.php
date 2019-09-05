@extends('./template/layout')
<!-- css -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="{{ asset('css/overall.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/po_print.css') }}">
@stop

@section('content')
    <!-- メインコンテンツ -->
    <div class="main">
      <div class="container">
        <!-- ページ名 -->
        <h4 class="page-title blue-text text-lighten-3">発注書印刷</h4>

        <!-- 業者一覧 -->
        <ul class="collection with-header">
          <table class="products-table">
            <tr>
              <th class="product gyousya top">取引先</th>
              <th class="product gyousya top">受注品</th>
            </tr>
          </table>

          <table class="products-table hogosya-table">

            @foreach($torihikisaki_data as $torihikisaki)

              <tr>
                <th class="product gyousya"><a href="{{ action('PoPrintDetailsController@show',[$hannbaikai_id, $torihikisaki->torihikisaki_id]) }}">{{ $torihikisaki->torihikisaki_name }}</a></th>
                <th class="product shouhin">
                  @foreach($syouhinn_data as $syouhinn)
                    @if ($torihikisaki->torihikisaki_id == $syouhinn->torihikisaki_id)
                       {{$syouhinn->syouhinn_name}}&ensp;
                    @endif
                  @endforeach
                </th>

                <th class="product box">
                <!-- 発注書詳細確認画面で印刷するのでコメントアウト -->
                <!--
                <label>
                  <input type="checkbox" class="filled-in" checked="checked" />
                  <span></span>
                </label>
                -->
                </th>

              </tr>
            @endforeach

            </table>
          </ul>

          <!-- 印刷ボタン -->
          <!-- 発注書詳細確認画面で印刷するのでコメントアウト -->
          <!--
          <div class="right-button">
            <a class="waves-effect waves-light btn-large" href="">印刷</a>
          </div>
        -->

      </div>
    </div>
@stop

@section('addJS')
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
@stop
