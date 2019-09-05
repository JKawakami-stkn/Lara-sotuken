<!DOCTYPE html>
<html lang="ja">
<head>
   @yield('addCSS')
</head>
<body>
    @component('components.header')
    @slot('light-blue')
    @endslot
    @endcomponent

    @yield('content')

    @component('components.footer')
    @slot('page-footer light-blue')
    @endslot
    @endcomponent
</body>
@yield('addJS')
</html>
