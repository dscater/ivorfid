<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Iniciar sessión | Ivorfid</title>

    <!-- Google Fonts -->
    <link rel="stylesheet" href="{{ asset('google-fonts/roboto.css') }}">
    <link rel="stylesheet" href="{{ asset('google-fonts/material-icons.css') }}">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('AdminBSBMaterialDesign-master/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('AdminBSBMaterialDesign-master/plugins/node-waves/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('AdminBSBMaterialDesign-master/plugins/animate-css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('AdminBSBMaterialDesign-master/css/style.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body class="login-page" style="background:url('{{asset('imgs/empresa/fondo_azul.jpg')}}');background-repeat: no-repeat; background-size: 100%;">

    @yield('content')
    <!-- Jquery Core Js -->
    <script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('AdminBSBMaterialDesign-master/plugins/bootstrap/js/bootstrap.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('AdminBSBMaterialDesign-master/plugins/node-waves/waves.js') }}"></script>

    <!-- Validation Plugin Js -->
    <script src="{{ asset('AdminBSBMaterialDesign-master/plugins/jquery-validation/jquery.validate.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('AdminBSBMaterialDesign-master/js/admin.js') }}"></script>
    <script src="{{ asset('AdminBSBMaterialDesign-master/js/pages/examples/sign-in.js') }}"></script>
</body>

</html>