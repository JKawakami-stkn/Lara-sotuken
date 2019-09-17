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
                    @if($errors->has('torihikisaki_name'))
                        <?php $torihikisaki_name_errors = $errors->get('torihikisaki_name'); ?>
                        @foreach($torihikisaki_name_errors as $error)
                            <p style="color:red; margin-bottom:0; margin-top:20px;">{{ $error }}</p>
                        @endforeach
                    @endif
                    <div class="input-field col s12">
                        <p>取引先名</p>
                        <textarea id="price"  name="torihikisaki_name" class="materialize-textarea">@if(!$errors->all()){{$data[0]->torihikisaki_name}}@else{{old('torihikisaki_name')}}@endif</textarea>
                    </div>
                </div>
            </div>

            <!-- 住所 -->
            <div class="row">
                <div class="row">
                    @if($errors->has('zyuusyo'))
                        <?php $zyuusyo_errors = $errors->get('zyuusyo'); ?>
                        @foreach($zyuusyo_errors as $error)
                            <p style="color:red; margin-bottom:0; margin-top:20px;">{{ $error }}</p>
                        @endforeach
                    @endif
                    <div class="input-field col s12">
                        <p>住所</p>
                        <textarea id="street_address" name="zyuusyo" class="materialize-textarea">@if(!$errors->all()){{$data[0]->zyuusyo}}@else{{ old('zyuusyo')}}@endif</textarea>

                    </div>
                </div>
            </div>

            <!-- 電話番号 -->
            <div class="row">
                <div class="row">
                    @if($errors->has('denwabanngou'))
                        <?php $denwabanngou_errors = $errors->get('denwabanngou'); ?>
                        @foreach($denwabanngou_errors as $error)
                            <p style="color:red; margin-bottom:0; margin-top:20px;">{{ $error }}</p>
                        @endforeach
                    @endif
                    <div class="input-field col s12">
                        <p>電話番号</p>
                        <textarea id="phone_number" name="denwabanngou" class="materialize-textarea">@if(!$errors->all()){{$data[0]->denwabanngou}}@else{{old('denwabanngou')}}@endif</textarea>
                    </div>
                </div>
            </div>

            <!-- 登録ボタン -->
            <div class="right-button">
                <button class="btn waves-effect waves-light" type="submit" name="action">変更</button>
            </div>

            <!-- FIXME: 一時的な措置-->
            <input type="hidden" name="delete" value="0">

        </form>

    </div>
</div>
@stop

@section('addJS')
<!-- <script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script> -->
<!--<script type="text/javascript" src="js/materialize.min.js"></script>-->
<script src="js/materialize.js"></script>
@stop
