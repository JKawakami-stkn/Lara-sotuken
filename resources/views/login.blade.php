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
        <h4 class="page-title blue-text text-lighten-3">ログイン</h4>

        <!--　ID -->
        <div id="login_form">
         <div class="row box">
              <div class="input-field col s12">
                <input id="email" type="email" class="validate">
                <label for="email">ログインID</label>
              </div>
          </div>

          <!--　パスワード -->
          <div class="row box">
               <div class="input-field col s12">
                 <input id="password" type="password" class="validate">
                 <label for="password">パスワード</label>
               </div>
          </div>

          <!--　ログインボタン -->
          <div class="right-button">
              <a class="waves-effect waves-light btn" href="./top.html">ログイン</a>
          </div>
          </div>
      </div>
    </div>
@stop

@section('addJS')
    <script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script>
@stop
