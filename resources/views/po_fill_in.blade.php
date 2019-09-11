@extends('./template/layout')
<!-- css -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/po_fill_in.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/overall.css') }}">

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
                          @foreach($kids_collection as $kids)
                          <option value={{$kids["KIDS_ID"]}}>{{$kids["KIDS_NM_KJ"]}}</option>
                          @endforeach
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
                    <th class="product color top">色</th>
                    <th class="product suryo top">数量</th>
                </tr>
            </table>
           <form action="{{ action('PoFillinController@store')}}" method="post">
            @foreach($syouhinn_collection as $syouhinn)
            
            <table class="products-table hogosya-table">
                <tr>
                    <?php
                      $syouhinn_info = [];
                    ?>
                    <th class="product yohin" value={{$syouhinn["syouhinn_ID"]}}>{{$syouhinn["syouhinn_name"]}}</th>
                    
                    <th class="product tanka">{{$syouhinn["tannka"]}}円</th>
                    @if($syouhinn["saizu"][0] != null)
                    <th class="product size">
                        <div class="input-field col s12">
                           <select>
                             <option value="" disabled selected> - </option>
                             @foreach($syouhinn["saizu"] as $key => $member)
                             <!-- {{\Debugbar::info($key)}} -->
                             <!-- {{\Debugbar::info($member)}} -->
                             <option value={{$member}}>{{$member}}</option>
                             @endforeach
                           </select>
                         </div>
                    </th>
                    @endif
                    @if($syouhinn["color"][0] != null)
                    <th class="product size">
                        <div class="input-field col s12">
                           <select>
                             <option value="" disabled selected> - </option>
                             @foreach($syouhinn["color"] as $key => $member)
                             <!-- {{\Debugbar::info($key)}} -->
                             <!-- {{\Debugbar::info($member)}} -->
                             <option value={{$member}}>{{$member}}</option>
                             @endforeach
                           </select>
                         </div>
                    </th>
                    @endif
                    <th class="product suryo">
                        <div class="row">
                          <div class="input-field col s6">
                            <input value="0" id="first_name2" type="text" class="validate">
                          </div>
                        </div>
                    </th>
                </tr>
            </table>
            @endforeach
          </form>

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
