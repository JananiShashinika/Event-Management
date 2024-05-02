<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--page title--}}
    <title>
        @yield('title')
    </title>
    {{--styles--}}
    @include('libraries.styles')
</head>
{{--  <body style="background-color: #e5e7f6">  --}}
   <body style="background-image: url('{{ asset('images/background.jpg') }}');">
    {{--page nav bar--}}
    @include('components.nav')
    {{--content of page--}}
    @yield('content')
    {{--page footer--}}
    @include('components.footer')
    {{--scripts--}}
    @include('libraries.scripts')
</body>
</html>
