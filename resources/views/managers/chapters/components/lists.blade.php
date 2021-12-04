@if ($chapters)
    @foreach ($chapters as $chapter)  
        <!-- Post -->
        <div class="post">
            <a href="{{ route("manage-chapters.destroy", $chapter->id) }}" class="float-right btn-tool simpleConfirm"><i class="fas fa-trash"></i></a>
            <a href="{{ route("manage-chapters.show", $chapter->id) }}" target="_blank" class="float-right btn-tool"><i class="fas fa-eye"></i></a>
            <a href="{{ route('manage-chapters.edit', $chapter->id) }}" target="_blank" class="float-right btn-tool"><i class="fas fa-edit"></i></a>
            <p>
                {{ $chapter->name }} 
            </p>
        </div>
        <!-- /.post -->
    @endforeach
@endif