@section('confirmation')

<?php
function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

$path = __FILE__;
console_log( $path );
?>

<script>console.log("確認読み込み完了");</script>

@stop
