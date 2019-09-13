@extends('./template/layout')

<!-- css -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{asset('/css/materialize.min.css')}}" media="screen,projection" />
<link type="text/css" rel="stylesheet" href="{{asset('/css/overall.css')}}">
<link type="text/css" rel="stylesheet" href="{{asset('css/po_create.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
@stop

@section('content')
<!-- メインコンテンツ -->
<div class="main">
<div class="container">
<!-- ページ名 -->
<h4 class="page-title blue-text text-lighten-3">販売会情報編集</h4>


<!-- 入力フォーム -->
<form action="{{ action('EditPoCreateController@store',$id)}}" method="post">
{{ csrf_field() }}
<ul class="collection">
<li class="collection-item">販売会の名前　：
<div class="input-field col s10">
@if(!($errors->all()))

        <input id="tyumonsyo_name"  name="tyumonsyo" type="text" class="validate" value="{{$hannbaikai->	
        hannbaikai_name}}">

    @else
    <div style="color:red;">
    @if($errors->has('tyumonsyo'))
            <?php $tyumonsyo_errors = $errors->get('tyumonsyo');?>
                @foreach ($tyumonsyo_errors as $tyumonsyo_error)
                    <tr><th>ERROR </th><td>{{$tyumonsyo_error}}</td></tr>
                @endforeach
    @endif
    </div>
        <input id="tyumonsyo_name"  name="tyumonsyo" type="text" class="validate" value="{{old('tyumonsyo')}}">
 @endif


<label for="tyumonsyo_name"></label>
</div>
</li>
<li class="collection-item">　期　日　：　
    @if(!($errors->all()))
        <input type="text" id="datepicker" name="deadline" class="datepicker" value="{{$hannbaikai->simekiri}}" placeholder="20◯◯-0◯-◯◯[半角]" ></li>
    @else
        <div style="color:red;">
        @if($errors->has('deadline'))
                <?php $deadline_errors = $errors->get('deadline')?>
                    @foreach ($deadline_errors as $deadline_error)
                        <tr><th>ERROR </th><td>{{$deadline_error}}</td></tr>
                    @endforeach
        @endif
        </div>
         <input type="text" id="datepicker" name="deadline" class="datepicker" value="{{old('deadline')}}" placeholder="20◯◯-0◯-◯◯[半角]" ></li>
    @endif
<li class="collection-item">　対　象　：
<div class="class-checkbox">
<div style="color:red;">
@if($errors->has('kumi'))
            <?php $kumi_errors = $errors->get('kumi')?>
                @foreach ($kumi_errors as $kumi_error)
                    <tr><th>ERROR </th><td>{{$kumi_error}}</td></tr>
                @endforeach
 @endif
 </div>
<p>
<label>
<p>

@foreach ($kumis as $kumi)
    <?php $checkflg = false;?>
    @foreach($hannbaikumi as $hannbaikumidata)
        @if($kumi->id == $hannbaikumidata->id)
            <?php $checkflg = true;?>
            <label>
            <input type="checkbox" class="filled-in" name="kumi[]" checked="checked" value="{{$kumi->id}}" />
            <span>{{$kumi->GP_NM}}</span>
            </label>
        @endif
    @endforeach
    @if($checkflg == false)
        <label>
            <input type="checkbox" class="filled-in" name="kumi[]" value="{{$kumi->id}}" />
            <span>{{$kumi->GP_NM}}</span> 
        </label>
    @endif
   
@endforeach
</p>
</label>
</p>
</div>
</li>
<li class="collection-item">　用  品　：
<div class="yohin-checkbox">
<div style="color:red;">
@if($errors->has('syouhinn'))
            <?php $syouhinn_errors = $errors->get('syouhinn')?>
                @foreach ($syouhinn_errors as $syouhinn_error)
                    <tr><th>ERROR </th><td>{{$syouhinn_error}}</td></tr>
                @endforeach
@endif
</div>
<!--
<select>
<option value="" disabled selected >絞り込み</option>
<option value="1">Option 1</option>
<option value="2">Option 2</option>
<option value="3">Option 3</option>
</select>
-->

<p>
@foreach ($syouhinns as $syouhin)
<?php $checkflg = false;?>
    @foreach($hannbaisyouhinn as $hannbaisyouhinndata)
        @if($syouhin->id == $hannbaisyouhinndata->id)
        <?php $checkflg = true;?>
            <label>
                    <input type="checkbox" class="filled-in" name="syouhinn[]" checked="checked" value="{{$syouhin->id}}" /> <span>{{$syouhin->syouhinn_name}}</span>
            </label>
         @endif
     @endforeach
        @if($checkflg == false)
            <label>
                <input type="checkbox" class="filled-in" name="syouhinn[]" value="{{$syouhin->id}}" /> <span>{{$syouhin->syouhinn_name}}</span>
            </label>
        @endif

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
<script type="text/javascript" src="{{asset('js/materialize.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
$('#datepicker').datepicker({
    dateFormat: 'yy-mm-dd',
});
</script>
@stop
