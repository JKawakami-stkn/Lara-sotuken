@extends('./template/layout')
<!-- css -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<link type="text/css" rel="stylesheet" href="css/detail.css">
<link type="text/css" rel="stylesheet" href="css/overall.css">
@stop

@section('content')
    <!-- メインコンテンツ -->
    <div class="main">
      <div class="container">

        <!-- ページ名 -->
        <h4 class="page-title blue-text text-lighten-3">注文書〇の詳細</h4>

        <!-- 詳細 -->
        <div class="detail">
          <table>
            <tbody>
              <tr>
                <td>期　日</td>
                <td>〇〇年　〇月　〇日</td>
                <td></td>
              </tr>
              <tr>
                <td>対　象</td>
                <td>〇〇組　〇〇組　〇〇組</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- 折り畳み -->
        <ul class="collapsible">
          <li>
            <div class="collapsible-header"><i class="material-icons">chevron_right</i>商品１</div>
            <div class="collapsible-body"><span>価　格</span><span>1000円</span><br><br><span>発注先</span><span>〇〇会社</span></div>
          </li>

          <li>
            <div class="collapsible-header"><i class="material-icons">chevron_right</i>商品２</div>
            <div class="collapsible-body"><span>価　格</span><span>2200円</span><br><br><span>発注先</span><span>〇〇会社</span></div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons">chevron_right</i>商品３</div>
            <div class="collapsible-body"><span>価　格</span><span>330円</span><br><br><span>発注先</span><span>〇〇会社</span></div>
          </li>
        </ul>

        <div class="right-button">
          <a class="waves-effect waves-light blue lighten-3 btn modal-trigger" href="#modal1">編集</a>
        </div>

      </div>
    </div>
@stop

@section('addJS')
    <script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script>

    <script>
      // 折り畳み
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.collapsible');
        var instances = M.Collapsible.init(elems);
      });

    　// ポップアップ
      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
      });

    </script>
@stop
