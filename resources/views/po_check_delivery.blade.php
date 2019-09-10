@extends('./template/layout')

<!-- CSRFトークン生成 -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- css -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/overall.css') }}">

@stop

@section('content')
    <!-- メインコンテンツ -->
    <div class="main">
      <div class="container">
        <!-- ページ名 -->
        <h4 class="page-title blue-text text-lighten-3">引き渡しチェック</h4>

        <table class="products-table">
            <tr>
                <th class="product name top">
                    <div class="input-field col s12">
                        <select id="name_selector">
                          <option value="" disabled selected>  </option>
                          @foreach($data as $d)
                            <option value="{{ $d->kids_id }}"> {{ $d->kids_nm_kj }} </option>
                          @endforeach
                        </select>
                    </div>
                </th>
            </tr>
        </table>

        <ul class="collection with-header">
          <li class="collection-header"><h4>岡山　太郎さんの注文</h4></li>

            <table class="products-table">
                <tr>
                    <th class="product yohin top">用品名</th>
                    <th class="product suryo top">数量</th>
                    <th class="product box top"><h6></h6></th>
                </tr>
            </table>

            <table class="products-table">
                <tr>
                    <th class="product yohin top">制服</th>
                    <th class="product suryo top">1　　</th>
                    <th class="product box top">
                      <label>
                        <input type="checkbox" class="filled-in" checked="checked" />
                        <span></span>
                      </label>
                    </th>
                </tr>
            </table>
          </ul>
      </div>
    </div>
@stop


@section('addJS')
  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script>

  <!-- セレクター -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems);
    });
  </script>

  <!-- Ajax -->
  <script>
  $(function(){ // 遅延処理
    $('#name_selector').change(
      function() {

          var $z_id = $('#name_selector').val();

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRFトークン
              }
          })
          $.ajax({
              type: 'POST',
              url: '{{route('po_check_delivery.load')}}' + '/' + $z_id,
              dataType: 'json', // 読み込むデータの種類
              data: {
                hannbaikai_id : {{$hannbaikai_id}},
              },
          }).done(function (results) {
              // 成功時の処理
              //$('#text').html(results);
              console.log(results)
          }).fail(function (err) {
              // 失敗時の処理
              alert('ファイルの取得に失敗しました。');
          });
      }
    );
  });
  </script>

@stop
