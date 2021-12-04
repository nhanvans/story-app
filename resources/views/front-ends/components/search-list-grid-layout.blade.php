@if (isset($stories))
    @foreach ($stories as $story)
        <!-- Listing Item -->
        {{-- col-lg-4 col-md-6 --}}
        <div class="col-lg-3 col-md-4 col-sm-4">
            @include('front-ends.components.listing-item-grid', ['data' => $story])
        </div>
        <!-- Listing Item / End -->
    @endforeach
@endif