@if(isset($stories))
    @foreach($stories as $story)
    <tr>
        <td>{!! $story->id !!}.</td>
        {{-- <td>{!! $story->avatar ? '<img src="'.config('app.url')."/".$story->avatar.'" alt="" width=100>' : "" !!}</td> --}}
        <td>{!! $story->name !!}</td>
        {{-- <td>
            <div class="btn-group">
                <button type="button" class="btn bg-gradient-danger"><i class="fas fa-ban"></i></button>
                <button type="button" class="btn bg-gradient-success"><i class="fas fa-check-circle"></i></button>
            </div>
        </td> --}}
        <td>
            <a href="{{ route("manage-stories.show", $story->id) }}" target="_blank" class="btn btn-outline-info"><i class="fas fa-eye"></i> </a>
            <a href="{{ route("manage-stories.edit", $story->id) }}" class="btn btn-outline-primary"><i class="fas fa-edit"></i> </a>
            <a href="{{ route("manage-stories.destroy", $story->id) }}" class="btn btn-outline-danger simpleConfirm"><i class="fas fa-trash"></i> </a>
        </td>
    </tr>
    @endforeach
@endif
