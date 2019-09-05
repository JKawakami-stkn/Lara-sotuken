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
        <h4 class="page-title blue-text text-lighten-3">〇〇株式会社の発注書</h4>
        <!-- レイアウトプレビュー -->
        <img style="width:80%; margin-left:10%" src="img/hattyusyo_test.png">
      </div>
    </div>
@stop

@section('addJS')
    <script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script>
@stop
