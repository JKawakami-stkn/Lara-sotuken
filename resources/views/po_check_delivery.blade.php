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

        <form method="POST" action="{{ route('po_check_delivery.store') }}" accept-charset="UTF-8">
          {{ csrf_field() }}

          <table class="products-table">
            <tr>
              <th class="product name top">
                <div class="input-field col s12">
                  <select id="name_selector" name="zidou_id">
                    <option value="" disabled selected>  </option>
                    @foreach($data as $d)
                    <option value="{{ $d->kids_id }}"> {{ $d->kids_nm_kj }} </option>
                    @endforeach
                  </select>
                </div>
              </th>
            </tr>
          </table>

          <h4 id="c-head"> </h4>

          <table>
            <thead>
              
            </thead>
            <tbody id="p-table">
              
            </tbody>
          </table>

          <div id="p-button" class="right-button">
                  
          </div>

        </form>
          
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
          var nameSelect = $("#name_selector");
          var $z_name = nameSelect.children("option:selected").text();

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
              $('#c-head').text($z_name + 'さんの注文');
              $('#p-table').text('');
              for(var d in results) {
                var syouhinn_name = results[d].syouhinn_name; // 商品名 + サイズ + 色
                if(results[d].saizu != null){
                  syouhinn_name += '　　' + results[d].saizu
                }
                if(results[d].color != null){
                  syouhinn_name += '　　' +results[d].color
                }

                $('#p-table').append(
                  '<tr>' +

                    '<td>'+ syouhinn_name +'</td>' +
                    '<td>'+ results[d].suuryou　+'個</td>' +
                    '<td>' +
                      '<label>'+
                        '<input type="checkbox" class="filled-in" name="tyuumonnmeisais_id[]" value="' + results[d].tyuumonn_meisai_id + '" />' +
                        '<span></span>' +
                      '</label>' +
                    '</td>' +
                  '</tr>'
                );
              }
              if(results.length != 0){
                $('#p-button').replaceWith('<button class="btn waves-effect waves-light" type="submit" name="action">確定</button>');
              }else{
                $('#p-button').replaceWith('');
              }
              
          }).fail(function (err) {
              // 失敗時の処理
              alert('データの取得に失敗しました。');
          });
      }
    );
  });
  </script>

@stop
