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
        <h4>2019年4月 物品購入</h4>

        <form action="{{ action('PoFillInController@store')}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="hannbaikai_id" value={{$hannbaikai_id}}>

            <table class="centered">
              <tr>
                <th class="product name top">
                  <div class="input-field col s12">
                    <select name="KIDS_ID">
                      <option value="" disabled selected> 名前 </option>
                      @foreach($kids_collection as $kids)
                      <option  value={{$kids["KIDS_ID"]}}>{{$kids["KIDS_NM_KJ"]}}</option>
                      @endforeach
                    </select>
                  </div>
                </th>
              </tr>
            </table>

            <table>
              <thead>
                <tr>
                  <div class="row">
                    <th>用品名</th>
                    <th>サイズ</th>
                    <th>色</th>
                    <th>単価</th>
                    <th>数量</th>
                  </div>
                </tr>
              </thead>

              <tbody>
                @foreach($syouhinn_collection as $syouhinn)
                <tr>  
                  <div class="row">
                    <td class="col s4" name="{{$syouhinn['syouhinn_ID']}}[syouhinn_id]" value={{$syouhinn["syouhinn_ID"]}}>{{$syouhinn["syouhinn_name"]}}</td>
                    @if($syouhinn["saizu"][0] != null)
                    <td class="col s2">
                      <div class="input-field col s12">
                        <select name="{{$syouhinn['syouhinn_ID']}}[saizu]">
                          <option value="_" disabled selected> - </option>
                          @foreach($syouhinn["saizu"] as $key => $member)
                          <option value="{{$member}}">{{$member}}</option>
                          @endforeach
                        </select>
                      </div>
                    </td>
                    @else
                    <td class="col s2">　　　</td>
                    @endif
                    @if($syouhinn["color"][0] != null)
                    <td class="col s2">
                      <div class="input-field col s12">
                        <select name="{{$syouhinn['syouhinn_ID']}}[color]">
                          <option value="_" disabled selected> - </option>
                          @foreach($syouhinn["color"] as $key => $member)
                          <option value="{{$member}}">{{$member}}</option>
                          @endforeach
                        </select>
                      </div>
                    </td>
                    @else
                    <td class="col s2">　　　</td>
                    @endif
                    <td class="col s2 " name="syouhinn_tanka[]" value={{$syouhinn["tannka"]}} class="product tanka">{{$syouhinn["tannka"]}}円</td>
                    <td class="col s2" style="width:5rem;">
                      <div class="input-field">
                        <input name="{{$syouhinn['syouhinn_ID']}}[suuryou]" value="0" id="first_name2" type="text" class="validate">
                      </div>
                    </td>
                  </div>
                </tr>
                @endforeach
              </tbody>
            </table>

          <div class="right-button">
            <input class="waves-effect waves-light blue lighten-3 btn modal-trigger" type="submit" value="確定"/>
          </div>
        </form>

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
