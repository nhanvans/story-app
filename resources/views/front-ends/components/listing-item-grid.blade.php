
 <a href="{{ route('story_detail', $data->id) }}" class="listing-item-container compact">
    <div class="listing-item">
        <img src="{{ $data->avatar ? config('app.url').'/'.$data->avatar : asset('fronts/images/listing-item-01.jpg')}}" alt="">

        <div class="listing-badge now-open">Now Open</div>

        <div class="listing-item-content">
            <div class="numerical-rating" data-rating="3.5"></div>
            <h3>{{ $data->name }} <i class="verified-icon"></i></h3>
            <span>{{ $data->author }}</span>
        </div>
        <span class="like-icon"></span>
    </div>
</a>

{{-- <div class="col-lg-4 col-md-6">
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
</div> --}}