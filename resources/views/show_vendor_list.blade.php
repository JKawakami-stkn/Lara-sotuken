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
        <h4 class="page-title blue-text text-lighten-3">取引先一覧</h4>

        <!-- 新規作成ボタン -->
        <div class="add_button">
            <a class="btn-floating btn-large waves-effect waves-light blue" href="{{ action('AddVendorController@show') }}"><i class="material-icons">add</i></a>
        </div>

        <!-- 折り畳み -->
        <ul class="collapsible">
            @foreach($data as $d)
            <li>
            <?php 
                //deleteフラグが１のもののみを表示する
                if($d->delete == 1){
            ?>
                <div class="collapsible-header"><i class="material-icons">chevron_right</i>{{$d->torihikisaki_name}}</div>
                <div class="collapsible-body">
                    <span>住　　所　：　</span><span>{{$d->zyuusyo}}</span><br><br>
                    <span>電話番号　：　</span><span>{{$d->denwabanngou}}</span><br><br>
                    <!--<span>F　A　X　：　</span><span>{{$d->torihikisaki_name}}</span>-->
                    <span>
                        <div class="operation-buttons-box left-button">
                            <a class="waves-effect waves-light btn" href="{{ action('EditVendorController@show',$d->id) }}">編集</a>
                            <!-- 削除ボタンの追加 -->
                            <form action="{{ action('DeleteVendorController@editFlag')}}" method="post">
                                @csrf
                                <!-- 削除フォームから削除フラグを立てる会社をeditFlagメソッドに渡す -->
                                <input type="hidden" name="torihikisaki_name" value={{$d ->torihikisaki_name}}>
                                <input type="hidden" name="zyuusyo" value={{$d ->zyuusyo}}>
                                <input type="hidden" name="denwabanngou" value={{$d ->denwabanngou}}>
                                <input type="hidden" name="delete" value={{$d ->delete}}>
                                <input type="hidden" name="id" value={{$d ->id}}>
                                <button class="btn waves-effect waves-light" type="submit" name="action">削除</button>
                            </form>
                        </div>
                    </span>
                </div>
            <?php
                //ここまで
                } 
            ?>
            </li>
            <li></li>
            @endforeach
        </ul>

    </div>
</div>

@stop

@section('addJS')
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
    // 折り畳み
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.collapsible');
        var instances = M.Collapsible.init(elems);
    });
</script>
@stop
