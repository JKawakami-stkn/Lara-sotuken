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
        <h4 class="page-title blue-text text-lighten-3">引き渡しチェック</h4>

        <table class="products-table">
            <tr>
                <th class="product kumi top">
                    <div class="input-field col s12">
                        <select>
                          <option value=""  disabled selected> 組 </option>
                          <option value="花組">花組</option>
                          <option value="宙組">宙組</option>
                          <option value="雪組">雪組</option>
                        </select>
                </th>

                <th class="product name top">
                    <div class="input-field col s12">
                        <select>
                          <option value="" disabled selected> 名前 </option>
                          <option value="真木よう子">真木よう子</option>
                          <option value="はいだしょうこ">はいだしょうこ</option>
                          <option value="黒木瞳">黒木瞳</option>
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
                    <th class="product size top">サイズ</th>
                    <th class="product box top"><h6>　　</h6></th>
                </tr>
            </table>

            <table class="products-table">
                <tr>
                    <th class="product yohin top">制服</th>
                    <th class="product suryo top">1　　</th>
                    <th class="product size top">S　　</th>
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
    <script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script>

    <!-- セレクター -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
       var elems = document.querySelectorAll('select');
       var instances = M.FormSelect.init(elems);
      });
    </script>
@stop
