@extends('front-ends.layouts.master')

@section('content')

<style>
    .chapter-content{
		font-family: "Palatino Linotype","Arial","Times New Roman",sans-serif;
        font-size: 1.625em;
		line-height: 180%;
		color: #2B2B2B;
		text-align: left;
		word-wrap: break-word;
    }
</style>

<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2><a href="{{ route('story_detail',['storyId' => $story->id]) }}">{{ $story->name }}</a></h2><span>{{ $chapter->name }}</span>

				<!-- Breadcrumbs -->
				{{-- <nav id="breadcrumbs">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Blog</li>
					</ul>
				</nav> --}}

			</div>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">

	<!-- Blog Posts -->
	<div class="blog-page">
	<div class="row">


		<!-- Post Content -->
		<div class="col-lg-12 col-md-12 padding-right-30">


			<!-- Blog Post -->
			<div class="blog-post single-post">
				
				<!-- Img -->
				{{-- <img class="post-img" src="{{ config('app.url').'/'.$story->avatar }}" alt="images/blog-post-02.jpg"> --}}

				
				<!-- Content -->
				<div class="post-content">

					<div class="chapter-content">
                        {!! $chapter->content !!}
                    </div>

					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><a class="fb-share" href="#"><i class="fa fa-facebook"></i> Share</a></li>
						<li><a class="twitter-share" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
						<li><a class="gplus-share" href="#"><i class="fa fa-google-plus"></i> Share</a></li>
						<li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li>
					</ul>
					<div class="clearfix"></div>

				</div>
			</div>
			<!-- Blog Post / End -->


			<!-- Post Navigation -->
			<ul id="posts-nav" class="margin-top-0 margin-bottom-45">
				<li class="next-post">
					@if (isset($chapterNext))
						<a href="{{ route('story_detail_chapter', ['storyId' => $chapterNext->story_id, 'chapterId' => $chapterNext->id]) }}"><span>
							{{ __('public.next') }}
						</span>
						{{ $chapterNext->name }}</a>
					@endif
				</li>
				<li class="prev-post">
					@if (isset($chapterPrevious))
						<a href="{{ route('story_detail_chapter', ['storyId' => $chapterPrevious->story_id, 'chapterId' => $chapterPrevious->id]) }}"><span>
							{{ __('public.previous') }}</span>
						{{ $chapterPrevious->name }}</a>
					@endif
				</li>
			</ul>


			<!-- About Author -->
			{{-- <div class="about-author">
				<img src="images/user-avatar.jpg" alt="" />
				<div class="about-description">
					<h4>Tom Perrin</h4>
					<a href="#">tom@example.com</a>
					<p>Nullam ultricies, velit ut varius molestie, ante metus condimentum nisi, dignissim facilisis turpis ex in libero. Sed porta ante tortor, a pulvinar mi facilisis nec. Proin finibus dolor ac convallis congue.</p>
				</div>
			</div> --}}


			<!-- Related Posts -->
			<div class="clearfix"></div>
			<h4 class="headline margin-top-25">{{ Str::ucfirst(__('public.Related story')) }}</h4>
			<div class="row">
				@include('front-ends.components.search-list-grid-layout', ['stories' => $otherStories])
			</div>
			<!-- Related Posts / End -->


			<div class="margin-top-50"></div>

			<!-- Reviews -->
			<section class="comments">
				<h4 class="headline margin-bottom-35">{{ Str::ucfirst(__('comment.comment')) }} <span class="comments-amount">(<span class="total-comment-number">{{ isset($story) ? $story->total_rating : 0 }}</span>)</span></h4>
				<div id="list-comments">
					@include('front-ends.components.comments.list-comment')
				</div>
			</section>
			
			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-top-30">
						<nav class="pagination" id="pagination-comment-story">
							{!! isset($linkComments) ? $linkComments : '' !!}
						</nav>
					</div>
				</div>
			</div>
			<!-- Pagination / End -->
			<div class="clearfix"></div>


			<!-- Add Comment -->
			@include('front-ends.components.comments.add-review', ['story' => $story])
			{{-- <div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-35">Add Review</h3>
	
				<!-- Review Comment -->
				<form id="add-comment" class="add-comment">
					<fieldset>

						<div class="row">
							<div class="col-md-6">
								<label>Name:</label>
								<input type="text" value=""/>
							</div>
								
							<div class="col-md-6">
								<label>Email:</label>
								<input type="text" value=""/>
							</div>
						</div>

						<div>
							<label>Comment:</label>
							<textarea cols="40" rows="3"></textarea>
						</div>

					</fieldset>

					<button class="button">Submit Comment</button>
					<div class="clearfix"></div>
				</form>

			</div> --}}
			<!-- Add Review Box / End -->

	</div>
	<!-- Content / End -->


	</div>
	<!-- Sidebar / End -->


</div>
</div>
@endsection

@section('script')
	<script>
		let urlCommentIndex = "{{route('comment.list', $story->id)}}"
		let rq_rating = '{{ __("public.rules.required", ["name" => __("comment.rating")]) }}'
		let rq_content = '{{ __("public.rules.required", ["name" => __("comment.content")]) }}'
	</script>
	<script src="{{ asset('fronts/comment.js') }}"></script>
@endsection

