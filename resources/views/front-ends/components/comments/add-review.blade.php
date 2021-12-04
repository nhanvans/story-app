<div id="add-review" class="add-review-box">

    <!-- Add Review -->
    <h3 class="listing-desc-headline margin-bottom-10">{{ __('comment.add_review') }}</h3>

    <!-- Subratings Container -->
    <div class="sub-ratings-container">

        <!-- Subrating #1 -->
        <div class="add-sub-rating">
            <div class="sub-rating-title">{{ Str::ucfirst(__('comment.rating')) }} <i class="tip"
                    data-tip-content="Quality of customer service and attitude to work with you"></i></div>
            <div class="sub-rating-stars">
                <!-- Leave Rating -->
                <div class="clearfix"></div>
                <form class="leave-rating">
                    <input type="radio" name="rating" class="rating" id="rating-1" value="5" />
                    <label for="rating-1" class="fa fa-star"></label>
                    <input type="radio" name="rating" class="rating" id="rating-2" value="4" />
                    <label for="rating-2" class="fa fa-star"></label>
                    <input type="radio" name="rating" class="rating" id="rating-3" value="3" />
                    <label for="rating-3" class="fa fa-star"></label>
                    <input type="radio" name="rating" class="rating" id="rating-4" value="2" />
                    <label for="rating-4" class="fa fa-star"></label>
                    <input type="radio" name="rating" class="rating" id="rating-5" value="1" />
                    <label for="rating-5" class="fa fa-star"></label>
                </form>
                
                <div class="clearfix"></div>
                <p class="error-rating" style="display: block;"></p>
            </div>
        </div>

    </div>
    <!-- Subratings Container / End -->

    <!-- Review Comment -->
    <form action="{{ route('comment', ['storyId' => $story->id]) }}" method="POST" id="add-comment" class="add-comment">
        @csrf
        <fieldset>

            <div>
                <label>{{ Str::ucfirst(__('comment.content')) }}:</label>
                <textarea name="content" cols="40" rows="3"></textarea>
            </div>

        </fieldset>
        <input type="hidden" name="username" value="{{ auth()->check() ? auth()->user()->name : "" }}">

        <button type="submit" class="button">{{ Str::ucfirst(__('comment.btn.comment')) }}</button>
        <div class="clearfix"></div>
    </form>

</div>
<script>
    var lb_contents = '{{ __("comment.content") }}'
    var btn_reply = '{{ __("comment.btn.reply") }}'
</script>