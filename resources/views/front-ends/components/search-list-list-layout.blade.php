@if (isset($stories))
    @foreach ($stories as $story)
       <!-- Listing Item -->
        <div class="col-lg-12 col-md-12">
            @include('front-ends.components.listing-item', ['data' => $story])
        </div>
        <!-- Listing Item / End -->
    @endforeach
@endif