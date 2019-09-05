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
        <h4 class="page-title blue-text text-lighten-3">検品チェック</h4>


        <ul class="collection with-header">
            <table class="products-table">
                <tr>
                    <th class="product gyousya top">業者名</th>
                    <th class="product syouhin top">商品名</th>
                    <th class="product hacchu top">発注数</th>
                    <th class="product nouhin top">納品数</th>
                    <th class="product box top"></th>
                </tr>
            </table>

            <table class="products-table hogosya-table">
                <tr>
                    <th class="product gyousya">株式会社ナッチーニ</th>
                    <th class="product shouhin">帽子(S)</th>
                    <th class="product hacchu">100個</th>
                    <th class="product nouhin">100個</th>
                    <th class="product box">
                      <label>
                        <input type="checkbox" class="filled-in" checked="checked" />
                        <span></span>
                    </label>
                    </th>
                </tr>

                <tr>
                    <th class="product gyousya">なちとこカンパニー</th>
                    <th class="product shouhin">名札</th>
                    <th class="product hacchu">100個</th>
                    <th class="product nouhin">90個</th>
                    <th class="product box top">
                      <label>
                        <input type="checkbox" class="filled-in" checked="checked" />
                        <span></span>
                    </label>
                    </th>
                </tr>
            </table>
      </div>
    </div>
@stop

@section('addJS')
    <script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script>
@stop
