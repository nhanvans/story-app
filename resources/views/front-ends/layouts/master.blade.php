<!DOCTYPE html>
<head>

<!-- Basic Page Needs
================================================== -->
<title>Listeo</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"/>

<!-- CSS
================================================== -->
<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{ asset('fronts/plugins/sweetalert2/sweetalert2.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('fronts/css/bootstrap.min.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('fronts/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('fronts/css/main-color.css') }}" id="colors">
<link rel="stylesheet" href="{{ asset('fronts/my-css.css') }}">

@yield('css')

</head>

<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->

@include('front-ends.layouts.header')

<div class="clearfix"></div>
<!-- Header Container / End -->

@yield('content')
<!-- Fullwidth Section -->

<!-- Fullwidth Section / End -->


<!-- Footer
================================================== -->

@include('front-ends.layouts.footer')

<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->



<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{ asset('fronts/scripts/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fronts/scripts/jquery-migrate-3.1.0.min.js') }}"></script>
<!-- SweetAlert2 -->
<script type="text/javascript" src="{{ asset('fronts/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<!-- jquery-validation -->
<script type="text/javascript" src="{{ asset('fronts/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fronts/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fronts/scripts/mmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fronts/scripts/chosen.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fronts/scripts/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fronts/scripts/rangeslider.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fronts/scripts/magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fronts/scripts/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fronts/scripts/counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fronts/scripts/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fronts/scripts/tooltips.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('fronts/scripts/custom.js') }}"></script>

<script>
	let yes = '{{ __("public.yes") }}'
	let cancel = '{{ __("public.cancel") }}'
	let server_error = '{{ __("public.server_error") }}'
	let save_error = '{{ __("public.save_error") }}'
	let rq_login = '{{ __("public.rq_login") }}'
	let save_sucess = '{{ __("public.save_sucess") }}'
</script>

@yield('script')

<!-- MY-JS -->
<script type="text/javascript" src="{{ asset('fronts/my-js.js') }}"></script>

<!-- Google Autocomplete -->
<script>
  function initAutocomplete() {
    var input = document.getElementById('autocomplete-input');
    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        return;
      }
    });

	if ($('.main-search-input-item')[0]) {
	    setTimeout(function(){ 
	        $(".pac-container").prependTo("#autocomplete-container");
	    }, 300);
	}
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initAutocomplete"></script>


<!-- Style Switcher
================================================== -->
<script src="{{ asset('fronts/scripts/switcher.js') }}"></script>

<div id="style-switcher">
	<h2>Color Switcher <a href="#"><i class="sl sl-icon-settings"></i></a></h2>
	
	<div>
		<ul class="colors" id="color1">
			<li><a href="#" class="main" title="Main"></a></li>
			<li><a href="#" class="blue" title="Blue"></a></li>
			<li><a href="#" class="green" title="Green"></a></li>
			<li><a href="#" class="orange" title="Orange"></a></li>
			<li><a href="#" class="navy" title="Navy"></a></li>
			<li><a href="#" class="yellow" title="Yellow"></a></li>
			<li><a href="#" class="peach" title="Peach"></a></li>
			<li><a href="#" class="beige" title="Beige"></a></li>
			<li><a href="#" class="purple" title="Purple"></a></li>
			<li><a href="#" class="celadon" title="Celadon"></a></li>
			<li><a href="#" class="red" title="Red"></a></li>
			<li><a href="#" class="brown" title="Brown"></a></li>
			<li><a href="#" class="cherry" title="Cherry"></a></li>
			<li><a href="#" class="cyan" title="Cyan"></a></li>
			<li><a href="#" class="gray" title="Gray"></a></li>
			<li><a href="#" class="olive" title="Olive"></a></li>
		</ul>
	</div>
		
</div>
<!-- Style Switcher / End -->


</body>
</html>