
  <div class="listing-item-container list-layout">
    <a href="{{ route('story_detail', $data->id) }}" class="listing-item">
        
        <!-- Image -->
        <div class="listing-item-image">
            <img src="{{ $data->avatar ? config('app.url').'/'.$data->avatar : asset('fronts/images/listing-item-01.jpg')}}" alt="">
            
            @foreach ($story->categories as $categoryStory)
                <span class="tag">{{ $categoryStory->name }}</span>
            @endforeach
        </div>
        
        <!-- Content -->
        <div class="listing-item-content">
            <div class="listing-badge now-open">Now Open</div>

            <div class="listing-item-inner">
                <h3>{{ $data->name }} <i class="verified-icon"></i></h3>
                <span>{{ $data->author }}</span>
                <div class="star-rating" data-rating="3.5">
                    <div class="rating-counter">(12 reviews)</div>
                </div>
            </div>

            <span class="like-icon"></span>
        </div>
    </a>
</div>