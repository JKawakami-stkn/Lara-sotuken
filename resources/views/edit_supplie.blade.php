@extends('./template/layout')
<!-- css -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{asset('/css/materialize.min.css')}}" media="screen,projection" />
<link type="text/css" rel="stylesheet" href="{{asset('/css/overall.css')}}">
<link type="text/css" rel="stylesheet" href="{{asset('/css/add_supplies.css')}}">
@stop

@section('content')
<!-- メインコンテンツ -->
<div class="main">
    <div class="container">
        <!-- ページ名 -->
        <h4 class="page-title blue-text text-lighten-3">用品情報編集</h4>

        <form action="{{ action('EditSupplieController@edit')}}" method="post">

            <!-- エラー回避 -->
            {{ csrf_field() }}

            <input type="hidden" name="id" value="{{$data[0]->id}}">

            <!--　商品名 -->
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <p>商品名</p>
                        <textarea id="name" name="syouhinn_name" class="materialize-textarea">{{$data[0]->syouhinn_name}}</textarea>
                    </div>
                </div>
            </div>

            <!-- 区分セレクター -->
            <div class="input-field col s9">
                <select name="kubunn_id">
                    <option value="0" disabled selected></option>
                    <option value="1">文房具</option>
                    <option value="2">教材・教具</option>
                    <option value="3">出版物</option>
                    <option value="4">その他</option>
                </select>
                <label>区分</label>
            </div>

            <!-- 商品単価 -->
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="tannka" name="tannka" class="materialize-textarea">{{$data[0]->tannka}}</textarea>
                        <label for="price">単価</label>
                    </div>
                </div>
            </div>


            <!-- 取り扱いサイズ -->
            <!--
            <div class="row">
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="size" class="materialize-textarea"></textarea>
                            <label for="size">サイズ（「,」区切りで入力）</label>
                        </div>
                    </div>
            </div>
            -->

            <!-- 業者セレクター -->
            <div class="input-field col s9">
                <select name="torihikisaki_id">
                    <option value="" disabled selected></option>
                    @foreach($data_1 as $d)
                        <option value="{{$d->id}}">{{$d->torihikisaki_name}}</option>
                    @endforeach

                </select>
                <label>取引先</label>
            </div>

            <!-- 登録ボタン -->
            <div class="right-button">
                <button class="btn waves-effect waves-light" type="submit" name="action">登録</button>
            </div>

        </form>

    </div>
</div>
@stop

<!-- セレクターを表示するためのスクリプト -->
@section('addJS')
<script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
</script>
@stop
