@if(isset($categories))
    @foreach($categories as $category)
    <tr>
        <td>{!! $category->id !!}.</td>
        {{-- <td>{!! $story->avatar ? '<img src="'.config('app.url')."/".$story->avatar.'" alt="" width=100>' : "" !!}</td> --}}
        <td>{!! $category->name !!}</td>
        {{-- <td>
            <div class="btn-group">
                <button type="button" class="btn bg-gradient-danger"><i class="fas fa-ban"></i></button>
                <button type="button" class="btn bg-gradient-success"><i class="fas fa-check-circle"></i></button>
            </div>
        </td> --}}
        <td>
            <a href="{{ route("manage-categories.edit", $category->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
            <a href="{{ route("manage-categories.destroy", $category->id) }}" class="btn btn-danger simpleConfirm"><i class="fas fa-edit"></i> Delete</a>
        </td>
    </tr>
    @endforeach
@endif
