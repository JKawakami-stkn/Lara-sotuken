@extends('./template/layout')
<!-- css -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="{{asset('/css/materialize.min.css')}}" media="screen,projection" />
<link type="text/css" rel="stylesheet" href="{{asset('/css/overall.css')}}">
@stop

@section('content')
<!-- メインコンテンツ -->
<div class="main">

    <div class="container">
        <!-- ページ名 -->
        <h4 class="page-title blue-text text-lighten-3">取引先情報編集</h4>

        <form action="{{ action('EditVendorController@edit')}}" method="post">

            <!-- エラー回避 -->
            {{ csrf_field() }}


            <input type="hidden" name="id" value={{$data[0]->id}}>

            <!-- 会社名 -->
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <p>取引先名</p>
                        <textarea id="price"  name="torihikisaki_name" class="materialize-textarea">{{$data[0]->torihikisaki_name}}</textarea>
                    </div>
                </div>
            </div>

            <!-- 住所 -->
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <p>住所</p>
                        <textarea id="street_address" name="zyuusyo" class="materialize-textarea">{{$data[0]->zyuusyo}}</textarea>

                    </div>
                </div>
            </div>

            <!-- 電話番号 -->
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <p>電話番号</p>
                        <textarea id="phone_number" name="denwabanngou" class="materialize-textarea">{{$data[0]->denwabanngou}}</textarea>
                    </div>
                </div>
            </div>

            <!-- 登録ボタン -->
            <div class="right-button">
                <button class="btn waves-effect waves-light" type="submit" name="action">変更</button>
            </div>

        </form>

    </div>
</div>
@stop

@section('addJS')
<!-- <script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script> -->
<!--<script type="text/javascript" src="js/materialize.min.js"></script>-->
<script src="js/materialize.js"></script>
@stop
