<!doctype html>
<html lang="en">

<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	@include('part.part_back.loader')
	@include('part.part_back.css')
	<script src="/assets_back/vendor/jquery/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
		$(".preloader").fadeOut();
		})
		</script>
</head>

<body>
	@include('part.part_back.preloader')
	@include('sweetalert::alert')
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		@include('part.part_back.navbar')
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		@include('part.part_back.sidebar')
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					@yield('content')
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
	</div>
	<!-- END WRAPPER -->
	@include('part.part_back.js')
</body>

</html>
