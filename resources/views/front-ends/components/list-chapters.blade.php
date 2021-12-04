<div class="col-lg-6 col-md-6 padding-right-30">
    @php
        $i = 0;
    @endphp
    @foreach ($chapters as $chapter)
        @php
            $i++
        @endphp
        @if ($i<=25)
            <p><a href="{{ route('story_detail_chapter', ['storyId' => $story->id, 'chapterId' => $chapter->id]) }}">{{ $chapter->name }}</a> </p>
        @endif
    @endforeach
</div>
<div class="col-lg-6 col-md-6 padding-right-30">
    @php
        $y = 0;
    @endphp
    @foreach ($chapters as $chapter)
        @php
            $y++
        @endphp
        @if ($y>25)
            <p><a href="{{ route('story_detail_chapter', ['storyId' => $story->id, 'chapterId' => $chapter->id]) }}">{{ $chapter->name }}</a> </p>
        @endif
    @endforeach
</div>