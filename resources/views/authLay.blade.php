<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/assets_auth/images/icons/favicon.ico"/>
	<link rel="stylesheet" href="/assets_back/css/main.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets_auth/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets_auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets_auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets_auth/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/assets_auth/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets_auth/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets_auth/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/assets_auth/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/assets_auth/css/util.css">
	<link rel="stylesheet" type="text/css" href="/assets_auth/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	@include('sweetalert::alert')
	@yield('auth')

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="/assets_auth/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/assets_auth/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/assets_auth/vendor/bootstrap/js/popper.js"></script>
	<script src="/assets_auth/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/assets_auth/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/assets_auth/vendor/daterangepicker/moment.min.js"></script>
	<script src="/assets_auth/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/assets_auth/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/assets_auth/js/main.js"></script>

</body>
</html>