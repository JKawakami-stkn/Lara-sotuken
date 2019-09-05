@extends('./template/layout')
<!-- css -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="css/overall.css">
@stop

@section('content')
    <!-- メインコンテンツ -->
    <div class="main">
      <div class="container">
        <!-- ページ名 -->
        <h4 class="page-title blue-text text-lighten-3">用品一覧</h4>

        <!-- 新規作成ボタン -->
        <div class="add_button">
          <a class="btn-floating btn-large waves-effect waves-light blue" href="{{ action('AddSupplieController@show') }}"><i class="material-icons">add</i></a>
        </div>


        <!-- 折り畳み -->
        <ul class="collapsible">
            @foreach($data as $d)
              <li>
                <div class="collapsible-header"><i class="material-icons">chevron_right</i>{{$d->syouhinn_name}}</div>
                <div class="collapsible-body">
                  <span>価　格</span><span>　{{$d->tannka}}円</span><br><br>
                  <span>発注先</span><span>　{{$d->torihikisaki_name}}</span><br><br>
                  <span>商品区分</span><span>　No.{{$d->kubunn_id}}</span><br><br>
                  <span>
                    <div class="operation-buttons-box left-button">
                      <a class="waves-effect waves-light btn" href="{{ action('EditSupplieController@show',$d->syouhinn_id) }}">編集</a>
                    </div>
                  </span>
                </div>
              </li>
           @endforeach
        </ul>

      </div>
    </div>
@stop

@section('addJS')
<script src="js/materialize.js"></script>
<script>
  // 折り畳み
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
  });
</script>
@stop
