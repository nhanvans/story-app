<div id="footer">
	<!-- Main -->
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				{{-- fronts/images/logo.png --}}
				<img class="footer-logo" src="{{ asset('images/logov2.gif') }}" alt="">
				<br><br>
				<p>{!! __('footer.overview') !!}</p>
			</div>

			<div class="col-md-4 col-sm-6 ">
				<h4>{!! __('footer.helpful_links') !!}</h4>
				<ul class="footer-links">
					<li><a href="{{ route('login') }}">{{ __('auth.login') }}</a></li>
					<li><a href="{{ route('register') }}">{{ __('auth.register') }}</a></li>
					<li><a href="#">My Account</a></li>
					<li><a href="#">{{ __('public.add_story') }}</a></li>
					{{-- <li><a href="#">Pricing</a></li>
					<li><a href="#">Privacy Policy</a></li> --}}
				</ul>

				<ul class="footer-links">
					{{-- <li><a href="#">FAQ</a></li> --}}
					<li><a href="#">Blog</a></li>
					{{-- <li><a href="#">Our Partners</a></li> --}}
					<li><a href="#">How It Works</a></li>
					<li><a href="#">{{ __('public.contact') }}</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>		

			<div class="col-md-3  col-sm-12">
				<h4>{{ __('public.contact_us') }}</h4>
				<div class="text-widget">
					<span>44 Le Duan st, Da Nang</span> <br>
					{{ __('public.phone') }}: <span>(123) 123-456 </span><br>
					E-Mail:<span> <a href="#">office@example.com</a> </span><br>
				</div>

				<ul class="social-icons margin-top-20">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
					<li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
				</ul>

			</div>

		</div>
		
		<!-- Copyright -->
		<div class="row">
			<div class="col-md-12">
				<div class="copyrights">© 2019 Listeo. All Rights Reserved.</div>
			</div>
		</div>

	</div>

</div>