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
<form action="{{ action('PoCreateController@store')}}" method="post">
{{ csrf_field() }}
<ul class="collection">
<li class="collection-item">注文書の名前　：
<div class="input-field col s10">
<input id="tyumonsyo_name"  name="tyumonsyo" type="text" class="validate">
<label for="tyumonsyo_name"></label>
</div>
</li>
<li class="collection-item">　期　日　：　<input type="text" name="deadline" class="datepicker" value="" placeholder="20◯◯-0◯-◯◯[半角]" ></li>
<li class="collection-item">　対　象　：
<div class="class-checkbox">
<p>
<label>
<p>
@foreach ($kumis as $kumi)
<label>
<input type="checkbox" class="filled-in" name="kumi[]" value="{{$kumi->組コード}}" />
<span>{{$kumi->組名称}}</span>
</label>
@endforeach
</p>
</label>
</p>
</div>
</li>
<li class="collection-item">　用  品　：
<div class="yohin-checkbox">

<select>
<option value="" disabled selected >絞り込み</option>
<option value="1">Option 1</option>
<option value="2">Option 2</option>
<option value="3">Option 3</option>
</select>
<label>Materialize Select</label>
<p>
@foreach ($syouhinns as $syouhin)
<label><input type="checkbox" class="filled-in" name="syouhinn[]" value="{{$syouhin->id}}" /> <span>{{$syouhin->syouhinn_name}}</span></label>
@endforeach
</p>

</div>
</li>
</ul>

<!--　注文書作成ボタン -->
<div class="right-button">
<button class="btn waves-effect waves-light" type="submit" name="action">登録</button>
</div>
</form>
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
