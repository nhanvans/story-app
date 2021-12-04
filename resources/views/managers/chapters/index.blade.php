@extends('managers.layouts.master')

@section('css')
<style>
    .img-preview-container {
        width: 200px;
        height: 292px;
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
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                {{-- <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                    alt="User profile picture"> --}}
                                    <div class="img-preview-container">
                                        <label for="avatar">
                                            <img src="{{ isset($story) && !empty($story->avatar) ? config('app.url').'/'.$story->avatar : '/assets/dist/img/user4-128x128.jpg' }}" id="avatarPreview" alt="User profile picture">
                                        </label>
                                    </div>
                            </div>

                            <h3 class="profile-username text-center">{!! isset($story) ? $story->name : 'Nina Mcintire' !!}</h3>

                            <p class="text-muted text-center">
                                @foreach ($story->categories as $categoryStory)
                                    {{ $categoryStory->name }},
                                @endforeach
                            </p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Total chapter</b> <a class="float-right">{{ $story->total_chapter }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>comment</b> <a class="float-right">13,287</a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>writing</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Author</strong>

                            <p class="text-muted">
                                {{ $story->author }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Category</strong>

                            <p class="text-muted">
                                @foreach ($story->categories as $categoryStory)
                                    <span class="tag tag-danger">{{ $categoryStory->name }}</span>
                                @endforeach
                                {{-- <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span> --}}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Source</strong>

                            <p class="text-muted">{{ $story->source }}</p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Description</strong>

                            <p class="text-muted">{!! $story->description !!}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Chapters</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline"
                                        data-toggle="tab">Timeline</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings"
                                        data-toggle="tab">Settings</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="post">
                                        <div class="row">
                                            <div class="col-5">
                                                <input type="text" class="form-control" id="search" placeholder="Tên chapter">
                                            </div>
                                            <div class="col-2">
                                                <button class="btn btn-block btn-outline-info" id="btnsearch"> search</button>
                                            </div>
                                            <div class="col-5">
                                                <a href="{{ route('manage-chapters.create') }}" class="btn btn-outline-primary float-right" target="_blank">Create</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="pannel">
                                        @include('managers.chapters.components.lists')
                                    </div>

                                    <div class="" id="pagination">
                                        {!! isset($links) ? $links : ''!!}
                                    </div>
                                    <!-- Post -->
                                    <div class="clearfix">
                                    </div>
                                    <!-- /.post -->

                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                                10 Feb. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-envelope bg-primary"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email
                                                </h3>

                                                <div class="timeline-body">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                    quora plaxo ideeli hulu weebly balihoo...
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-user bg-info"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 5 mins
                                                    ago</span>

                                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted
                                                    your friend request
                                                </h3>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-comments bg-warning"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 27 mins
                                                    ago</span>

                                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your
                                                    post</h3>

                                                <div class="timeline-body">
                                                    Take me to your leader!
                                                    Switzerland is small and neutral!
                                                    We are more like Germany, ambitious and misunderstood!
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-success">
                                                3 Jan. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-camera bg-purple"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 2 days
                                                    ago</span>

                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos
                                                </h3>

                                                <div class="timeline-body">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience"
                                                    placeholder="Experience"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputSkills"
                                                    placeholder="Skills">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and
                                                            conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@section('script')
    <script src="{{ asset('assets/js/back.js') }}"></script>
    <script>
        let museum = (function() {

            let url = '{{ route('manage-chapters.index') }}'
            let title = "{{ trans('members.confirm_delete') }}"
            let cancelButtonText = "{{ trans('public.cancel') }}"
            let confirmButtonText = "{{ trans('public.yes') }}"
            let errorAjax = "{{ trans('public.server_issue') }}"
            let errorDelete = "{{ trans('members.error_delete') }}"

            let onReady = function() {
                $('#pagination').on('click', 'ul.pagination a', function(event) {
                    back.pagination(event, $(this), errorAjax)
                })
                $('#pannel').on('change', function() {})
                    .on('click', '.simpleConfirm', function(event) {
                        back.destroy(event, $(this), url, title, confirmButtonText, cancelButtonText,
                            errorDelete)
                    })
                $('th span').click(function() {
                    back.ordering(url, $(this), errorAjax)
                })
                $('#btnsearch').click(function() {
                    back.filters(url, errorAjax)
                })
                $('#search').keypress(function(event) {
                    let keycode = (event.keyCode ? event.keyCode : event.which);
                    if (keycode == '13') {
                        event.preventDefault();
                        $('#btnsearch').focus().click();
                    }
                })
            }

            return {
                onReady: onReady
            }

        })()

        $(document).ready(museum.onReady)
    </script>
@endsection
