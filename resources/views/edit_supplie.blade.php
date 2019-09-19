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

            <input type="hidden" name="id" value="{{$syouhinn_info["syouhinn_id"]}}">
    

            <!--　商品名 -->
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="name" name="syouhinn_name" class="materialize-textarea">{{$syouhinn_info["syouhinn_name"]}}</textarea>
                        <label for="name">用品名</label>
                        
                    </div>
                </div>
            </div>
            <!--　サイズ -->
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="syouhinn_size" name="syouhinn_size" class="materialize-textarea"placeholder="複数ある場合はカンマ（,）区切りで入力してください">{{$syouhinn_info["saizu"]}}</textarea>
                        <label for="size">サイズ　*ないなら省略してください</label>
                    </div>
                </div>
            </div>
            <!--　カラー -->
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="syouhinn_color" name="syouhinn_color" class="materialize-textarea"placeholder="複数ある場合はカンマ（,）区切りで入力してください">{{$syouhinn_info["color"]}}</textarea>
                        <label for="color">カラー　*ないなら省略してください</label>
                    </div>
                </div>
            </div>

            <!-- 区分セレクター -->
            <div class="input-field col s9">
                <select name="kubunn_id">
                    <option value="{{$syouhinn_info['kubunn_id']}}">{{$syouhinn_info["kubunn_name"]}}</option>
                    @foreach($kubunn_all as $d)
                    <option value={{$d->id}}>{{$d->kubunn_name}}</option>
                    @endforeach
                </select>
                <label>区分</label>
            </div>
            <!-- 商品単価 -->
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="tannka" name="tannka" class="materialize-textarea">{{$syouhinn_info["tannka"]}}</textarea>
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
                    <option value="{{$syouhinn_info['torihikisaki_id']}}">{{$syouhinn_info["torihikisaki_name"]}}</option>
                    @foreach($torihikisaki_all as $d)
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
