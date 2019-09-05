@extends('./template/layout')

<!-- css追加 (header.blade.phpで呼び出される) -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{ asset('/css/materialize.min.css') }}"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="{{ asset('/css/overall.css') }}">
@stop

<!-- コンテンツ -->
@section('content')
    <!-- メインコンテンツ -->
    <div class="main">
      <div class="container">
        <!-- ページ名 -->
        <h4 class="page-title blue-text text-lighten-3">メニュー</h4>

        <!-- 発注書一覧 -->
        <a href="{{ action('PoListController@show') }}">
            <div class="card blue lighten-4">
                <div class="card-content gray-text">
                    <span class="card-title">発注書一覧</span>
                    <p>発注書の作成・編集ができます。</p>
                </div>
            </div>
        </a>

         <!-- 用品登録 -->
         <a href="{{ action('ShowSupplieListController@show') }}">
             <div class="card pink lighten-4">
                 <div class="card-content gray-text">
                     <span class="card-title">用品一覧</span>
                     <p>用品の登録・編集ができます。    ※事前に取引先の登録が必要です</p>
                 </div>
             </div>
        </a>

         <!-- 取引先登録 -->
         <a href="{{ action('ShowVendorListController@show') }}">
             <div class="card green lighten-4">
                 <div class="card-content gray-text">
                     <span class="card-title">取引先一覧</span>
                     <p>取引先の登録・編集ができます。</p>
                 </div>
             </div>
         </a>
      </div>
    </div>
@stop


<!-- スクリプト追加 (footer.blade.phpで呼び出される) -->
@section('addJS')
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="{{{asset('/assets/js/sample.js')}}}"></script>
@stop
