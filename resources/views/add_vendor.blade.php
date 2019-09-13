@extends('./template/layout')
<!-- css -->
@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
<link type="text/css" rel="stylesheet" href="css/overall.css">
@stop

@section('content')
<!-- メインコンテンツ -->
<div class="main">
    <div class="container">
        <!-- ページ名 -->
        <h4 class="page-title blue-text text-lighten-3">取引先登録</h4>

        <form action="{{ action('AddVendorController@store')}}" method="post">

            <!-- エラー回避 -->
            {{ csrf_field() }}

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
                        <textarea id="torihikisaki_name" name="torihikisaki_name" class="materialize-textarea">{{ old('torihikisaki_name')}}</textarea>
                        <label for="torihikisaki_name">取引先名</label>
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
                        <textarea id="zyuusyo" name="zyuusyo" class="materialize-textarea">{{ old('zyuusyo')}}</textarea>
                        <label for="zyuusyo">住所</label>
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
                        <textarea id="denwabanngou" name="denwabanngou" class="materialize-textarea" >{{ old('denwabanngou')}}</textarea>
                        <label for="phone_number">電話番号</label>
                    </div>
                </div>
            </div>

            <!-- 登録ボタン -->
            <div class="right-button">
                <button class="btn waves-effect waves-light" type="submit" name="action">登録</button>
            </div>

        </form>

    </div>
</div>
@stop

@section('addJS')
<script type="text/javascript" src="{{ asset('/js/materialize.min.js') }}"></script>
@stop
