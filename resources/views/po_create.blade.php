@extends('./template/layout')

@section('addCSS')
    <!-- css -->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/overall.css">
    <link type="text/css" rel="stylesheet" href="css/po_create.css">
@stop

@section('content')
    <!-- メインコンテンツ -->
    <div class="main">
      <div class="container">
        <!-- ページ名 -->
        <h4 class="page-title blue-text text-lighten-3">発注書新規作成</h4>

        <!-- 入力フォーム -->
        <ul class="collection">
            <li class="collection-item">注文書の名前　：　
                <div class="input-field col s10">
                  <input id="tyumonsyo_name" type="text" class="validate">
                  <label for="tyumonsyo_name"></label>
                </div>
            </li>
            <li class="collection-item">　期　日　：　<input type="text" class="datepicker"></li>
            <li class="collection-item">　対　象　：　
              <div class="class-checkbox">
                <p>
                  <label>
                      <p>
                          <label>
                          <input type="checkbox" class="filled-in" />
                          <span>ちゅうりっぷ組</span>
                          </label>

                          <label>
                          <input type="checkbox" class="filled-in" />
                          <span>ばら組</span>
                          </label>

                          <label>
                          <input type="checkbox" class="filled-in" />
                          <span>さくら組</span>
                          </label>

                          <label>
                          <input type="checkbox" class="filled-in" />
                          <span>たんぽぽ組</span>
                          </label>

                          <label>
                          <input type="checkbox" class="filled-in" />
                          <span>すみれ組</span>
                          </label>

                          <label>
                          <input type="checkbox" class="filled-in" />
                          <span>あじさい組</span>
                          </label>
                      </p>
                  </label>
                </p>
            </div>
            </li>
            <li class="collection-item">　用  品　：　
                <div class="yohin-checkbox">
                  <form>
                      <select>
                        <option value="" disabled selected >絞り込み</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                      </select>
                      <label>Materialize Select</label>
                    <p>
                      <label><input type="checkbox" class="filled-in" /> <span>名札</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>出席ブック</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>氏名印</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>おたよりケース</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>通園リュック</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>通園手下げバック</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>組帽子</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>ベッド用シーツ</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>諸費袋</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>ネームプレート</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>上靴</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>お誕生日絵本</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>連絡帳</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>自由画張</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>クレヨン12色</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>スポーツウェア（半袖）</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>スポーツウェア（長袖）</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>紺半ズボン</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>セーラ制服</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>制作スモック</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>お道具箱</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>はさみ</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>のり</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>クレヨン16色</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>自由画張</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>粘土</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>チェック半ズボン</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>粘土ケース</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>粘土板</span></label>
                      <label><input type="checkbox" class="filled-in"/> <span>マーカー10色</span></label>
                    </p>
                  </form>
                </div>
            </li>
        </ul>

        <!--　注文書作成ボタン -->
        <div class="right-button">
          <a class="waves-effect waves-light btn-large">作 成</a>
        </div>

      </div>
    </div>
@stop

@section('addJS')
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
    <script src="js/box.js"></script>
    <script src="js/date.js"></script>
    <!-- セレクター -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
       var elems = document.querySelectorAll('select');
       var instances = M.FormSelect.init(elems);
      });
    </script>
@stop
