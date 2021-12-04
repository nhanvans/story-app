<div class="listing-slider-small mfp-gallery-container margin-bottom-0">
    @if (isset($images))
        @foreach ($images as $image)    
            <a href="{{ config('app.url').'/'.$image }}" data-background-image="{{ config('app.url').'/'.$image }}" class="item mfp-gallery" title="Title 2"></a>
        @endforeach
    @endif
    <a href="images/single-listing-01a.jpg" data-background-image="images/single-listing-01a.jpg" class="item mfp-gallery" title="Title 1"></a>
    <a href="images/single-listing-03a.jpg" data-background-image="images/single-listing-03a.jpg" class="item mfp-gallery" title="Title 3"></a>
    <a href="images/single-listing-04a.jpg" data-background-image="images/single-listing-04a.jpg" class="item mfp-gallery" title="Title 3"></a>
</div>