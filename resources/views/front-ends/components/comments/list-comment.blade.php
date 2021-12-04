<ul>
    @if (isset($comments))
        @foreach ($comments as $comment)
            <li>
                <div class="avatar"><img
                        src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70"
                        alt="" /> </div>
                <div class="comment-content">
                    <div class="arrow-comment"></div>
                    <div class="comment-by">{{ $comment->user->name }}<span class="date">{{ Carbon\Carbon::create($comment->created_at)->toDayDateTimeString() }}</span>
                        <div class="star-rating" data-rating="{{ $comment->rating }}"></div>
                        <a href="" data-url="{{ route('reply',['commentId' => $comment->id ]) }}" class="reply reply-rating" style="top:29px"><i class="fa fa-reply"></i>
                            {{ Str::ucfirst(__('comment.reply')) }}</a>
                    </div>
                    <p>{!! $comment->content !!}</p>
                </div>
                @if ($comment->replies()->count()>0)
                    <ul class="show-more-replies">
                        @foreach ( $comment->replies()->orderBy('id', 'desc')->get() as $reply )
                            <li>
                                <div class="avatar"><img
                                        src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70"
                                        alt="" /></div>
                                <div class="comment-content">
                                    <div class="arrow-comment"></div>
                                    <div class="comment-by">{{ $reply->user->name }}
                                        <span class="date">{{ Carbon\Carbon::create($reply->created_at)->toDayDateTimeString() }}</span>                                        
                                    </div>
                                    <p>{!! $reply->content !!}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <a href="#" class="show-more-replies-button" data-more-title="{{ Str::ucfirst(__('public.Show More')) }}" data-less-title="{{ Str::ucfirst(__('public.Show Less')) }}"><i
                        class="fa fa-angle-down"></i></a>
                @endif
                
            </li>
        @endforeach
    @endif
    {{-- <li>
        <div class="avatar"><img
                src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70"
                alt="" /></div>
        <div class="comment-content">
            <div class="arrow-comment"></div>
            <div class="comment-by">Kathy Brown<span class="date">22 August
                    2019</span>
                <div class="star-rating" data-rating="5"></div>
                <a href="#" class="reply" style="top:29px"><i class="fa fa-reply"></i>
                    Reply</a>
            </div>
            <p>Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique
                sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus</p>
        </div>

        <ul>
            <li>
                <div class="avatar"><img
                        src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70"
                        alt="" /></div>
                <div class="comment-content">
                    <div class="arrow-comment"></div>
                    <div class="comment-by">Tom Smith<span class="date">22 August
                            2019</span>
                        <a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
                    </div>
                    <p>Rrhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet
                        vitae. Curabitur lacinia neque.</p>
                </div>
            </li>
            <li>
                <div class="avatar"><img
                        src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70"
                        alt="" /></div>
                <div class="comment-content">
                    <div class="arrow-comment"></div>
                    <div class="comment-by">Kathy Brown<span class="date">20 August
                            2019</span>
                        <a href="#" class="reply"><i class="fa fa-reply"></i> Reply</a>
                    </div>
                    <p>Nam posuere tristique sem, eu ultricies tortor.</p>
                </div>

                <ul>
                    <li>
                        <div class="avatar"><img
                                src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70"
                                alt="" /></div>
                        <div class="comment-content">
                            <div class="arrow-comment"></div>
                            <div class="comment-by">John Doe<span class="date">18
                                    August 2019</span>
                                <a href="#" class="reply"><i class="fa fa-reply"></i>
                                    Reply</a>
                            </div>
                            <p>Great template!</p>
                        </div>
                    </li>
                </ul>

            </li>
        </ul>

    </li>

    <li>
        <div class="avatar"><img
                src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70"
                alt="" /> </div>
        <div class="comment-content">
            <div class="arrow-comment"></div>
            <div class="comment-by">John Doe<span class="date">18 August 2019</span>
                <div class="star-rating" data-rating="5"></div>
                <a href="#" class="reply" style="top:29px"><i class="fa fa-reply"></i>
                    Reply</a>
            </div>
            <p>Commodo est luctus eget. Proin in nunc laoreet justo volutpat blandit enim. Sem
                felis, ullamcorper vel aliquam non, varius eget justo. Duis quis nunc tellus
                sollicitudin mauris.</p>
        </div>

    </li> --}}
</ul>