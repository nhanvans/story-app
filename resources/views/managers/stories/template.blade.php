<style>
    .img-preview-container {
        width: 300px;
        height: 392px;
        margin: 0 auto;

    }

    .img-preview-container label {
        width: 100%;
        height: 100%;
    }

    .img-preview-container label img {
        max-width: 100%;
        width: 100% !important;
        height: 100% !important;
        border: 3px solid #adb5bd;
        margin: 0 auto;
        padding: 3px;
        object-fit: cover
    }

</style>

<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            {{-- <div class="card-header">
                <h3 class="card-title">
                    Create story
                </h3>
                <div class="card-tools">
                    
                </div>
            </div> --}}
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name', isset($story) ? $story->name : '') }}">
                        </div>
                        <div class="form-group">
                            <label for="categories">Category</label>
                            <select class="select2 categories" multiple="multiple" name="categories[]" id="categories" data-placeholder="Select a State" style="width: 100%;">
                                @if (isset($categories))
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"{!! isset($categoryChoosed) && in_array($category->id, $categoryChoosed) ? 'selected' : '' !!}>{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="author">author</label>
                            <input type="text" id="author" name="author" class="form-control"
                                value="{{ old('author', isset($story) ? $story->author : '') }}">
                        </div>
                        <div class="form-group">
                            <label for="source">source</label>
                            <input type="text" id="source" name="source" class="form-control"
                                value="{{ old('source', isset($story) ? $story->source : '') }}">
                        </div>
                        <div class="form-group">
                            <label for="total_chapter">total chapter</label>
                            <input type="number" id="total_chapter" name="total_chapter" class="form-control"
                                value="{{ old('total_chapter', isset($story) ? $story->total_chapter : '') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="img-preview-container">
                            <label for="avatar">
                                <img src="{{ isset($story) && !empty($story->avatar) ? config('app.url').'/'.$story->avatar : '/assets/dist/img/user4-128x128.jpg' }}" id="avatarPreview" alt="User profile picture">
                            </label>
                        </div>
                        <input type="file" name="avatar" id="avatar" style="display: none;" onchange="imagesPreview(this)">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">description</label>
                    <textarea name="description" class="form-control" id="description" cols="30"
                        rows="10">{{ old('description', isset($story) ? $story->description : '') }}</textarea>
                </div>
            </div>
            <div class="card-footer clearfix">

            </div>
        </div>
    </div>
    <!-- /.col-->
</div>

<div class="row">
    <div class="col-6">
        <a href="#" class="btn btn-secondary" style="width: 100%;">Cancel</a>
    </div>

    <div class="col-6">
        <input type="submit" value="Save Changes" class="btn btn-success float-right" style="width: 100%;">
    </div>
</div>

@section('script')
    <!-- jquery-validation -->
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <script src={{ asset('ckeditor/ckeditor.js') }}></script>
    <script>
        CKEDITOR.replace('description', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
            height: '20em'

        });
    </script>
    @include('ckfinder::setup')

    <script>
        $(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    alert("Form successful submitted!");
                }
            });
            $('#form-create').validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

        function imagesPreview(input, placeToInsertImagePreview) {
            var validExtensions = ['image/jpg', 'image/png', 'image/jpeg']; //array of valid extensions
            if (input.files) {
                var file = input.files[0];
                // var name = input.files[0].name;
                // var fileNameExt = name.substr(name.lastIndexOf('.') + 1);
                var fileNameExt = input.files[0].type;
                var FileSize = input.files[0].size / 1024 / 1024; // in MB
                if (FileSize > 10) {
                    Swal.fire(error_image);
                    return false;
                }
                if ($.inArray(fileNameExt, validExtensions) == -1) {
                    Swal.fire(image_ext + validExtensions.join(', '));
                    return false;
                }
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#avatarPreview").attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
                $("#error_avatar").attr('style', 'color: red;display:none;');
            }
        }
    </script>
@endsection
