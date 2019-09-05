@extends('./template/layout')
<!-- css -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{ asset('css/materialize.min.css') }}"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="{{ asset('css/overall.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/po_print_details.css') }}">
@stop

@section('content')
    <!-- メインコンテンツ -->
    <div class="main">
      <div class="container">
        <!-- ページ名 -->
        <h4 class="page-title blue-text text-lighten-3 noprint">発注書確認</h4>

        <!-- 印刷ボタン -->
        <div class="right-button">
          <input type="button" value="印刷" class="noprint waves-effect waves-light btn-large" onclick="window.print();"/>
        </div>

        <div id="layout">
          <div id="day">
          </div>

          <!--TODO : 取引先が先か販売会が先か-->
          <div class="number">注文番号：{{$torihikisaki_id.$hannbaikai_id}}</div>

          <div class="header">
            <div class="title">注　文　書</div>
            <div class="sub-title">PURCHASE ORDER</div>
          </div>

          <div class="vender">
            <div class="vendor-name"> {{$torihikisaki_name[0]->torihikisaki_name}} </div>
            <div class="vendor-rep">様</div>
          </div>

          <div class="office">
            <div class="office-name">イートンちどり保育園</div>
            <div class="postal-code">〒702-8024</div>
            <div class="street-address">岡山市南区浦安南町425-1</div>
            <div class="tel">TEL: 086-265-556</div>
            <div class="fax">FAX: 086-265-5562</div>
            <div class="rep">担当者：</div>
          </div>

          <table>
            <thead>
              <tr>
                <th class="no">No</th>
                <th class="supplie-name">品 番 • 品 名</th>
                <th class="num">数 量</th>
              </tr>
            </thead>
            <tbody>
              @foreach(range(0,14) as $i)
                <?php $num = 0 ?>
                <tr>
                  <td class="no">{{$i + 1}}</td>
                  @if ( isset($sku_id_list[$i]) )<!-- sku_id_listに値がある -->
                    @foreach($tyuumonn_data as $tyuumonn)
                      @if($sku_id_list[$i]->sku_id == $tyuumonn->sku_id)<!-- sku_idが等しい注文されたsku_idと等しい -->
                        @if($num == 0)<!-- 商品名が未出力 -->
                         <td class="supplie-name">{{ $tyuumonn->syouhinn_name."　".$tyuumonn->saizu."　".$tyuumonn->color }}</td>
                        @endif
                        <?php $num += $tyuumonn->suuryou ?><!-- 数量加算 -->
                      @endif
                    @endforeach
                  @else
                    <td class="supplie-name"></td>
                  @endif
                  @if($num != 0)
                    <td class="num">{{$num}}</td>
                  @else
                    <td class="num"></td>
                  @endif
                </tr>
              @endforeach

              </tbody>
            </table>

            <div class="remarks">
              備考：
            </div>

          </div>

      </div>
    </div>
@stop

@section('addJS')
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="../js/materialize.js"></script>
<script src="../js/print_details.js"></script>
@stop
