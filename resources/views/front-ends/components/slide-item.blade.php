<!-- Fullwidth Section -->
{{-- <section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8"> --}}

    <div class="container">
        <div class="row">

            <div class="col-md-12">
				{{-- centered --}}
                <h3 class="headline margin-bottom-45">
                    {{ $title ? $title : 'No title' }}
                    {{-- <span>Discover top-rated local businesses</span> --}}
                </h3>
            </div>
        </div>
    </div>

    <!-- Carousel / Start -->
	{{-- simple-fw-slick-carousel dots-nav --}}
    <div class="simple-fw-slick-carousel simple-fw-slick-carousel-custom1 dots-nav">

        @if (isset($datas))
            @foreach ($datas as $data)
                <!-- Listing Item -->
                <div class="fw-carousel-item">
                    <a href="{{ route('story_detail', $data->id) }}" class="listing-item-container compact">
                        <div class="listing-item">
                            <img src="{{ $data->avatar ? config('app.url').'/'.$data->avatar : asset('fronts/images/listing-item-01.jpg')}}" alt="">

                            <div class="listing-badge now-open">FULL</div>

                            <div class="listing-item-content">
                                <div class="numerical-rating" data-rating="3.5"></div>
                                <h3>{{ $data->name }}</h3>
                                <span>{{ $data->author }}</span>
                            </div>
                            <span class="like-icon"></span>
                        </div>
                    </a>
                </div>
                <!-- Listing Item / End -->
            @endforeach
        @endif

        {{-- <!-- Listing Item -->
		<div class="fw-carousel-item">
			<a href="listings-single-page.html" class="listing-item-container compact">
				<div class="listing-item">
					<img src="images/listing-item-01.jpg" alt="">

					<div class="listing-badge now-open">Now Open</div>

					<div class="listing-item-content">
						<div class="numerical-rating" data-rating="3.5"></div>
						<h3>Tom's Restaurant</h3>
						<span>964 School Street, New York</span>
					</div>
					<span class="like-icon"></span>
				</div>
			</a>
		</div>
		<!-- Listing Item / End --> --}}

        {{-- <!-- Listing Item -->
		<div class="fw-carousel-item">
			<a href="listings-single-page.html" class="listing-item-container compact">
				<div class="listing-item">
					<img src="images/listing-item-02.jpg" alt="">
					<div class="listing-item-details">
						<ul>
							<li>Friday, August 10</li>
						</ul>
					</div>
					<div class="listing-item-content">
						<div class="numerical-rating" data-rating="5.0"></div>
						<h3>Sticky Band</h3>
						<span>Bishop Avenue, New York</span>
					</div>
					<span class="like-icon"></span>
				</div>
			</a>
		</div>
		<!-- Listing Item / End -->		

		<!-- Listing Item -->
		<div class="fw-carousel-item">
			<a href="listings-single-page.html" class="listing-item-container compact">
				<div class="listing-item">
					<img src="images/listing-item-03.jpg" alt="">
					<div class="listing-item-details">
						<ul>
							<li>Starting from $59 per night</li>
						</ul>
					</div>
					<div class="listing-item-content">
						<div class="numerical-rating" data-rating="2.0"></div>
						<h3>Hotel Govendor</h3>
						<span>778 Country Street, New York</span>
					</div>
					<span class="like-icon"></span>
				</div>

			</a>
		</div>
		<!-- Listing Item / End -->

		<!-- Listing Item -->
		<div class="fw-carousel-item">
			<a href="listings-single-page.html" class="listing-item-container compact">
				<div class="listing-item">
					<img src="images/listing-item-04.jpg" alt="">

					<div class="listing-badge now-open">Now Open</div>

					<div class="listing-item-content">
						<div class="numerical-rating" data-rating="5.0"></div>
						<h3>Burger House</h3>
						<span>2726 Shinn Street, New York</span>
					</div>
					<span class="like-icon"></span>
				</div>
			</a>
		</div>
		<!-- Listing Item / End -->

		<!-- Listing Item -->
		<div class="fw-carousel-item">
			<a href="listings-single-page.html" class="listing-item-container compact">
				<div class="listing-item">
					<img src="images/listing-item-05.jpg" alt="">
					<div class="listing-item-content">
						<div class="numerical-rating" data-rating="3.5"></div>
						<h3>Airport</h3>
						<span>1512 Duncan Avenue, New York</span>
					</div>
					<span class="like-icon"></span>
				</div>
			</a>
		</div>
		<!-- Listing Item / End -->

		<!-- Listing Item -->
		<div class="fw-carousel-item">
			<a href="listings-single-page.html" class="listing-item-container compact">
				<div class="listing-item">
					<img src="images/listing-item-06.jpg" alt="">

					<div class="listing-badge now-closed">Now Closed</div>

					<div class="listing-item-content">
						<div class="numerical-rating" data-rating="4.5"></div>
						<h3>Think Coffee</h3>
						<span>215 Terry Lane, New York</span>
					</div>
					<span class="like-icon"></span>
				</div>
			</a>
		</div>
		<!-- Listing Item / End --> --}}

    </div>
    <!-- Carousel / End -->


{{-- </section> --}}
<!-- Fullwidth Section / End -->
