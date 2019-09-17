@extends('./template/layout')

@section('addCSS')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
<link type="text/css" rel="stylesheet" href="css/overall.css">
<link type="text/css" rel="stylesheet" href="css/add_supplies.css">
@stop

@section('content')
<!-- メインコンテンツ -->
<div class="main">
    <div class="container">
        <!-- ページ名 -->
        <h4 class="page-title blue-text text-lighten-3">用品登録</h4>

        <form action="{{ action('AddSupplieController@store')}}" method="post">

            <!-- エラー回避 -->
            {{ csrf_field() }}

            <!--　商品名 -->
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">

                        <textarea id="syouhinn_name" name="syouhinn_name" class="materialize-textarea"></textarea>

                        <label for="name">商品名</label>
                        @if($errors->has('syouhinn_name'))
                          <?php $syouhinnName_errors = $errors->get('syouhinn_name');?>
                          @foreach ($syouhinnName_errors as $syouhinnName_error)
                            <tr>
                              <th>ERROR</th>
                              <td>{{$syouhinnName_error}}</td>
                            </tr>
                          @endforeach
                        @endif

                    </div>
                </div>
            </div>
            <!--　サイズ -->
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">

                        <textarea id="syouhinn_size" name="syouhinn_size" class="materialize-textarea"placeholder="複数ある場合はカンマ（,）区切りで入力してください"></textarea>
                        <label for="size">サイズ　*ないなら省略してください</label>
                    </div>
                </div>
            </div>
            <!--　カラー -->
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">

                        <textarea id="syouhinn_color" name="syouhinn_color" class="materialize-textarea"placeholder="複数ある場合はカンマ（,）区切りで入力してください"></textarea>
                        <label for="color">カラー　*ないなら省略してください</label>
                    </div>
                </div>
            </div>


            <!-- 区分セレクター -->
            <div class="input-field col s9">

                <select id="kubun_id" name="kubunn_id">
                    <option value="0" disabled selected></option>
                    @foreach($kubunn as $d)
                    <option value={{$d->id}}>{{$d->kubunn_name}}</option>
                    @endforeach
                </select>
                <label>区分</label>
                @if($errors->has('kubunn_id'))
                  <?php $kubunnId_errors = $errors->get('kubunn_id');?>
                  @foreach ($kubunnId_errors as $kubunnId_error)
                    <tr>
                      <th>ERROR</th>
                      <td>{{$kubunnId_error}}</td>
                    </tr>
                  @endforeach
                @endif
            </div>

            <!-- 商品単価 -->
            <div class="row">
                <div class="row">
                    <div class="input-field col s12">

                        <textarea id="tannka" name="tannka" class="materialize-textarea"></textarea>
                        <label for="price">単価</label>
                        @if($errors->has('tannka'))
                          <?php $tannka_errors = $errors->get('tannka');?>
                          @foreach ($tannka_errors as $tannka_error)
                            <tr>
                              <th>ERROR</th>
                              <td>{{$tannka_error}}</td>
                            </tr>
                          @endforeach
                        @endif
                    </div>
                </div>
            </div>


            <!-- 取り扱いサイズ -->
            <!--
            <div class="row">
                <div class="row">
                    <div class="input-field col s12" type="disabled">

                        <textarea id="size" class="materialize-textarea"></textarea>
                        <label for="size">サイズ（「,」区切りで入力）</label>

                        <input disabled value="サイズの入力は未実装です" id="disabled" type="text" class="validate">
                    </div>
                </div>
            </div>
            -->

            <!-- 業者セレクター -->
            <div class="input-field col s9">

                <select id="torihikisaki_id" name="torihikisaki_id">
                    <option value="" disabled selected></option>
                    @foreach($data as $d)
                        <option value="{{$d->id}}">{{$d->torihikisaki_name}}</option>
                    @endforeach
                </select>
                <label>取引先</label>
                @if($errors->has('torihikisaki_id'))
                  <?php $torihikisakiId_errors = $errors->get('torihikisaki_id');?>
                  @foreach ($torihikisakiId_errors as $torihikisakiId_error)
                    <tr>
                      <th>ERROR</th>
                      <td>{{$torihikisakiId_error}}</td>
                    </tr>
                  @endforeach
                @endif
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
<script type="text/javascript" src="js/materialize.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems);
    });
</script>

@stop
