@extends('front-ends.layouts.master')

@section('content')
    <!-- Titlebar
        ================================================== -->
    <div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h2>Listings</h2><span>Grid Layout With Sidebar</span>

                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Listings</li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>


    <!-- Content
        ================================================== -->
    <div class="container">
        <div class="row">

            <!-- Search -->
            <div class="col-md-12">
                <div class="main-search-input gray-style margin-top-0 margin-bottom-10">

                    <div class="main-search-input-item">
                        <input type="text" name="search" id="search" placeholder="What are you looking for?" value="" />
                    </div>

                    {{-- <div class="main-search-input-item location">
                        <div id="autocomplete-container">
                            <input id="autocomplete-input" type="text" placeholder="Location">
                        </div>
                        <a href="#"><i class="fa fa-map-marker"></i></a>
                    </div> --}}

                    <div class="main-search-input-item">
                        <select name="categories" multiple id="categories" data-placeholder="All Categories" class="chosen-select">
                            <option>All Categories</option>
                            @if (isset($categories))
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            @endif
                            {{-- <option>Shops</option>
                            <option>Hotels</option>
                            <option>Restaurants</option>
                            <option>Fitness</option>
                            <option>Events</option> --}}
                        </select>
                    </div>

                    <button class="button" id="btnsearch">Search</button>
                </div>
            </div>
            <!-- Search Section / End -->


            <div class="col-md-12">

                <!-- Sorting - Filtering Section -->
                <div class="row margin-bottom-25 margin-top-30">

                    <div class="col-md-6">
                        <!-- Layout Switcher -->
                        <div class="layout-switcher" id="btnlist">
                            <a href="" class="grid active" style="pointer-events: none;" data-type-list="grid_layout"><i class="fa fa-th"></i></a>
                            <a href="" class="list" data-type-list="list_layout"><i class="fa fa-align-justify"></i></a>
                            <input type="hidden" id="list-type" name="list-type" value="grid_layout">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="fullwidth-filters">

                            <!-- Panel Dropdown -->
                            <div class="panel-dropdown wide float-right">
                                <a href="#">More Filters</a>
                                <div class="panel-dropdown-content checkboxes">

                                    <!-- Checkboxes -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input id="check-a" type="checkbox" name="check">
                                            <label for="check-a">Elevator in building</label>

                                            <input id="check-b" type="checkbox" name="check">
                                            <label for="check-b">Friendly workspace</label>

                                            <input id="check-c" type="checkbox" name="check">
                                            <label for="check-c">Instant Book</label>

                                            <input id="check-d" type="checkbox" name="check">
                                            <label for="check-d">Wireless Internet</label>
                                        </div>

                                        <div class="col-md-6">
                                            <input id="check-e" type="checkbox" name="check">
                                            <label for="check-e">Free parking on premises</label>

                                            <input id="check-f" type="checkbox" name="check">
                                            <label for="check-f">Free parking on street</label>

                                            <input id="check-g" type="checkbox" name="check">
                                            <label for="check-g">Smoking allowed</label>

                                            <input id="check-h" type="checkbox" name="check">
                                            <label for="check-h">Events</label>
                                        </div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="panel-buttons">
                                        <button class="panel-cancel">Cancel</button>
                                        <button class="panel-apply">Apply</button>
                                    </div>

                                </div>
                            </div>
                            <!-- Panel Dropdown / End -->

                            <!-- Panel Dropdown-->
                            <div class="panel-dropdown float-right">
                                <a href="#">Distance Radius</a>
                                <div class="panel-dropdown-content">
                                    <input class="distance-radius" type="range" min="1" max="100" step="1" value="50"
                                        data-title="Radius around selected destination">
                                    <div class="panel-buttons">
                                        <button class="panel-cancel">Disable</button>
                                        <button class="panel-apply">Apply</button>
                                    </div>
                                </div>
                            </div>
                            <!-- Panel Dropdown / End -->

                            <!-- Sort by -->
                            <div class="sort-by">
                                <div class="sort-by-select">
                                    <select data-placeholder="Default order" class="chosen-select-no-single">
                                        <option>Default Order</option>
                                        <option>Highest Rated</option>
                                        <option>Most Reviewed</option>
                                        <option>Newest Listings</option>
                                        <option>Oldest Listings</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Sort by / End -->

                        </div>
                    </div>

                </div>
                <!-- Sorting - Filtering Section / End -->


                <div class="row" id="pannel">

                    @include('front-ends.components.search-list-grid-layout')

                </div>

                <!-- Pagination -->
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Pagination -->
                        <div class="pagination-container margin-top-30">
                            <nav class="pagination" id="pagination">
                                {!! isset($links) ? $links : '' !!}
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Pagination / End -->

            </div>

        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('fronts/search.js') }}"></script>
    <script>
        let searchStories = (function () {

            let url = '{{ route('search_stories') }}'
            let title = "{{trans('members.confirm_delete')}}"
            let errorAjax = "{{trans('public.server_issue')}}"
            let errorDelete = "{{trans('members.error_delete')}}"

            let onReady = function () {
                $('#pagination').on('click', 'ul a', function (event) {
                    back.pagination(event, $(this), errorAjax)
                })
                $('th span').click(function () {
                    back.ordering(url, $(this), errorAjax)
                })
                $('#btnsearch').click(function () {
                    back.filters(url, errorAjax)
                })
                $('#search').keypress(function(event){
                    let keycode = (event.keyCode ? event.keyCode : event.which);
                    if(keycode == '13'){
                        event.preventDefault();
                        $('#btnsearch').focus().click();
                    }
                })
                $('#btnlist').on('click', 'a', function(event){
                    event.preventDefault();
                    let type = $(this).data('type-list')
                    $('#list-type').val(type)
                    back.filters(url, errorAjax)
                    $(this).addClass('active')
                    $(this).css('pointer-events', 'none')
                    $('#btnlist').find('a').not($(this)).removeClass('active')
                    $('#btnlist').find('a').not($(this)).css('pointer-events', 'all')
                })
            }

            return {
                onReady: onReady
            }

        })()

        $(document).ready(searchStories.onReady)

    </script>

@endsection
