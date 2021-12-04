<div class="fullwidth-slick-carousel category-carousel">

    @if (isset($datas))
            @foreach ($datas as $data)
               <!-- Item -->
                <div class="fw-carousel-item">
                    <div class="category-box-container">
                        <a href="{{ config('app.url').'/search?categories%5B%5D='.$data->id.'&listType=grid_layout' }}" class="category-box" data-background-image="{{ asset('fronts/images/category-box-01.jpg') }}">
                            <div class="category-box-content">
                                <h3>{{ $data->name }}</h3>
                                <span>64 listings</span>
                            </div>
                            <span class="category-box-btn">Browse</span>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif

</div>