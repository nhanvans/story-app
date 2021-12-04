@extends("managers.layouts.master")

@section('content')
    <style>
        .chapter-content{
            font-size: 1.2em;
        }
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create story</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item"><a href="#">Stories</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    {!! isset($chapter) ? $chapter->name : '' !!}
                </h3>
                <div class="card-tools">
                    
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="chapter-content">
                    {!! isset($chapter) ? $chapter->content : '' !!}
                </div>
            </div>
            <div class="card-footer clearfix">

            </div>
        </div>
    </section>

@endsection
