<div id="listing-reviews" class="listing-section">
    <h3 class="listing-desc-headline margin-top-75 margin-bottom-20">
        {{ Str::ucfirst(__('comment.comment')) }} (<span class="total-comment-number">{{ isset($story) ? $story->total_rating : 0 }}</span>)
    </h3>

    <div class="clearfix"></div>

    <!-- Reviews -->
    <section class="comments" id="list-comments">
        @include('front-ends.components.comments.list-comment')
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
    <div class="clearfix"></div>
    <!-- Pagination / End -->
</div>