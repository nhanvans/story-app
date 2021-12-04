
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
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" id="name" name="name" class="form-control"
                        value="{{ old('name', isset($category) ? $category->name : '') }}">
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

    </script>
@endsection
