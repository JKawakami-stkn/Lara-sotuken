@extends('./template/layout')
<!-- css -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="css/po_fill_in.css">
<link type="text/css" rel="stylesheet" href="css/overall.css">
@stop

@section('content')
    <!-- メインコンテンツ -->
    <div class="main">
      <div class="container">
        <!-- ページ名 -->
        <h4 class="page-title blue-text text-lighten-3">保護者入力</h4>

        <!-- -->
        <table class="products-table">
            <tr>
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
            <li class="collection-header"><h4>2019年4月 物品購入</h4></li>

            <table class="products-table">
                <tr>
                    <th class="product yohin top">用品名</th>
                    <th class="product tanka top">単価</th>
                    <th class="product size top">ｻｲｽﾞ</th>
                    <th class="product suryo top">数量</th>
                </tr>
            </table>

            <table class="products-table hogosya-table">
                <tr>
                    <th class="product yohin">制服</th>
                    <th class="product tanka">〇〇〇〇円</th>
                    <th class="product size">
                        <div class="input-field col s12">
                           <select>
                             <option value="" disabled selected> - </option>
                             <option value="s">S</option>
                             <option value="m">M</option>
                             <option value="l">L</option>
                           </select>
                         </div>
                    </th>
                    <th class="product suryo">
                        <div class="row">
                          <div class="input-field col s6">
                            <input value="0" id="first_name2" type="text" class="validate">
                          </div>
                        </div>
                    </th>
                </tr>
            </table>
          </ul>

          <!-- 確定button -->
          <div class="right-button">
            <a class="waves-effect waves-light blue lighten-3 btn modal-trigger" href="#modal1">確定</a>
          </div>

      </div>
    </div>
  </div>
@stop

@section('addJS')
    <script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
       var elems = document.querySelectorAll('select');
       var instances = M.FormSelect.init(elems);
      });
    </script>
@stop
