@extends('front-ends.layouts.master')

@section('css')
    <style>
        #header.cloned {
            position: absolute;
            top: 0px;
            width: 100%;
            z-index: 999;
        }

    </style>
@endsection

@section('content')
    <!-- Slider
                                    ================================================== -->
    <div class="listing-slider mfp-gallery-container margin-bottom-0">
        <a href="{{ $story->avatar ? config('app.url') . '/' . $story->avatar : asset('fronts/images/single-listing-01.jpg') }}"
            data-background-image="{{ $story->avatar ? config('app.url') . '/' . $story->avatar : asset('fronts/images/single-listing-01.jpg') }}"
            class="item mfp-gallery" title="Title 1"></a>
        {{-- <a href="images/single-listing-01.jpg" data-background-image="images/single-listing-01.jpg" class="item mfp-gallery" title="Title 1"></a>
	<a href="images/single-listing-02.jpg" data-background-image="images/single-listing-02.jpg" class="item mfp-gallery" title="Title 3"></a>
	<a href="images/single-listing-03.jpg" data-background-image="images/single-listing-03.jpg" class="item mfp-gallery" title="Title 2"></a>
	<a href="images/single-listing-04.jpg" data-background-image="images/single-listing-04.jpg" class="item mfp-gallery" title="Title 4"></a> --}}
    </div>

    <!-- Content
                                    ================================================== -->
    <div class="container">
        <div class="row sticky-wrapper">
            <div class="col-lg-8 col-md-8 padding-right-30">

                <!-- Titlebar -->
                <div id="titlebar" class="listing-titlebar">
                    <div class="listing-titlebar-title">
                        <h2>{{ $story->name }}
                            @foreach ($story->categories as $categoryStory)
                                <span class="listing-tag">{{ $categoryStory->name }}</span>
                            @endforeach
                        </h2>
                        <span>
                            <a href="javascript:void(0);" class="listing-address">
                                <i class="fa fa-user"></i>
                                {{ $story->author }}
                            </a>
                        </span>
                        <br>
                        <span>
                            <a href="javascript:void(0);" class="listing-address">
                                <i class="fa fa-search"></i>
                                {{ $story->source }}
                            </a>
                        </span>
                        <br>
                        <span>
                            <a href="#listing-chapters" class="listing-chapters">
                                <i class="fa fa-list"></i>
                                {{ $story->total_chapter }} {{ __('public.chapter') }}
                            </a>
                        </span>
                        <div class="star-rating" data-rating="{{ $story->average_rating }}">
                            <div class="rating-counter"><a href="#listing-reviews"> ( <p
                                        class="total-comment-number d-inline">{{ $story->total_rating }} </p> {{ __('comment.comment') }})</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Listing Nav -->
                <div id="listing-nav" class="listing-nav-container">
                    <ul class="listing-nav">
                        <li><a href="#listing-overview" class="active">{{ __('public.overview') }}</a></li>
                        {{-- <li><a href="#listing-gallery">Gallery</a></li> --}}
                        <li><a href="#listing-chapters">{{ __('public.list_chapters') }}</a></li>
                        <li><a href="#listing-other-story">{{ __('public.Related story') }}</a></li>
                        <li><a href="#listing-reviews">{{ __('comment.comment') }}</a></li>
                        <li><a href="#add-review">{{ __('comment.add_review') }}</a></li>
                    </ul>
                </div>

                <!-- Overview -->
                <div id="listing-overview" class="listing-section">

                    <!-- Description -->
                    {!! $story->description !!}

                </div>

                <!-- gallery -->
                {{-- <div id="listing-gallery" class="listing-section">
					<h3 class="listing-desc-headline margin-top-70">Gallery</h3>
					@include('front-ends.components.slide-images', ['images' => [$story->avatar]])
				</div> --}}

                <!-- Overview -->
                <div id="listing-chapters" class="listing-section">
                    <h3 class="listing-desc-headline">{{ __('public.list_chapters') }}</h3>
                    <div class="row sticky-wrapper list-chapters">
                        @include('front-ends.components.list-chapters', ['chapters' => $chapters, 'story' => $story])
                    </div>
                    <!-- Pagination -->
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Pagination -->
                            <div class="pagination-container margin-top-30">
                                <nav class="pagination" id="pagination-chapters">
                                    {!! isset($links) ? $links : '' !!}
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- Pagination / End -->

                </div>

                <!-- Related Posts -->
                <div id="listing-other-story" class="listing-section">
                    <h3 class="listing-desc-headline">{{ __('public.Related story') }}</h3>
                    <div class="row">
                        @include('front-ends.components.related-story', ['stories' => $otherStories])
                    </div>
                </div>
                <!-- Related Posts / End -->


                <!-- Reviews -->
                @include('front-ends.components.comments.list-review', ['story' => $story])


                <!-- Add Review Box -->
                @include('front-ends.components.comments.add-review', ['story' => $story])
                <!-- Add Review Box / End -->


            </div>


            <!-- Sidebar
     ================================================== -->
            <div class="col-lg-4 col-md-4 margin-top-75 sticky">


                <!-- Verified Badge -->
                <div class="verified-badge with-tip"
                    data-tip-content="Listing has been verified and belongs the business owner or manager.">
                    <i class="sl sl-icon-check"></i> FULL
                </div>

                <!-- Contact -->
                <div class="boxed-widget margin-top-35">
                    <div class="hosted-by-title">
                        <h4><span>Hosted by</span> <a href="pages-user-profile.html">Tom Perrin</a></h4>
                        <a href="pages-user-profile.html" class="hosted-by-avatar"><img
                                src="{{ asset('fronts/images/dashboard-avatar.jpg') }}" alt=""></a>
                    </div>
                    <ul class="listing-details-sidebar">
                        <li><i class="sl sl-icon-phone"></i> (123) 123-456</li>
                        <!-- <li><i class="sl sl-icon-globe"></i> <a href="#">http://example.com</a></li> -->
                        <li><i class="fa fa-envelope-o"></i> <a href="#">tom@example.com</a></li>
                    </ul>

                    <ul class="listing-details-sidebar social-profiles">
                        <li><a href="#" class="facebook-profile"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                        <li><a href="#" class="twitter-profile"><i class="fa fa-twitter"></i> Twitter</a></li>
                        <!-- <li><a href="#" class="gplus-profile"><i class="fa fa-google-plus"></i> Google Plus</a></li> -->
                    </ul>

                    <!-- Reply to review popup -->
                    <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                        <div class="small-dialog-header">
                            <h3>Send Message</h3>
                        </div>
                        <div class="message-reply margin-top-0">
                            <textarea cols="40" rows="3" placeholder="Your message to Tom"></textarea>
                            <button class="button">Send Message</button>
                        </div>
                    </div>

                    <a href="#small-dialog" class="send-message-to-owner button popup-with-zoom-anim"><i
                            class="sl sl-icon-envelope-open"></i> Send Message</a>
                </div>
                <!-- Contact / End-->


                <!-- Share / Like -->
                @include('front-ends.components.share-like')

            </div>
            <!-- Sidebar / End -->

        </div>
    </div>
@endsection
@section('script')

    <script>
        let urlCommentIndex = "{{ route('comment.list', $story->id) }}"
	    let rq_rating = '{{ __("public.rules.required", ["name" => __("comment.rating")]) }}'
	    let rq_content = '{{ __("public.rules.required", ["name" => __("comment.content")]) }}'

        $('#pagination-chapters').on('click', 'ul a', function(event) {
            event.preventDefault()
            let href = $(this).attr('href')
            if (href !== '#') {
                $.ajax({
                        url: href,
                        type: 'get',
                        data: {
                            'type': 'list-chapters'
                        }
                    })
                    .done(function(data) {
                        $('.list-chapters').html(data.table)
                        $('#pagination-chapters').html(data.pagination)
                    })
                    .fail(function() {
                        Swal.fire({
                            icon: 'error',
                            title: server_error,
                            timer: 1500
                        })
                    })
            }
        })
    </script>
    <script src="{{ asset('fronts/comment.js') }}"></script>

@endsection
