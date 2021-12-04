@extends('managers.layouts.master')

@section("css")

@endsection

@section("content")
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">
                            <div class="row">
                                <div class="col-5">
                                    <input type="text" class="form-control" id="search" placeholder="Tên truyện">
                                </div>
                                <div class="col-4">
                                    <select class="form-control select2" id="status_search" style="width: 100%;">
                                        <option selected="selected">Trạng thái</option>
                                        <option value="1">Đã duyệt</option>
                                        <option value="0">Chưa duyệt</option>
                                        <option value="2">Chờ duyệt lại</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <button class="btn btn-block btn-outline-info" id="btnsearch"> search</button>
                                </div>
                            </div>
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route("manage-categories.create") }}" class="btn btn-info"> Thêm mới </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Tiêu đề</th>
                                <th style="width: 200px"></th>
                            </tr>
                            </thead>
                            <tbody id="pannel">
                                @include("managers.categories.table")
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix" id="pagination">
                        {!! isset($links) ? $links : ''!!}
                    </div>
                </div>
            </div>
            <!-- /.col-->
        </div>
    </section>

@endsection

@section("script")
    <script src="{{asset("assets/js/back.js")}}"></script>
    <script>
        let museum = (function () {

            let url = '{{ route('manage-categories.index') }}'
            let title = "{{trans('members.confirm_delete')}}"
            let cancelButtonText ="{{trans('public.cancel')}}"
            let confirmButtonText = "{{trans('public.yes')}}"
            let errorAjax = "{{trans('public.server_issue')}}"
            let errorDelete = "{{trans('members.error_delete')}}"

            let onReady = function () {
                $('#pagination').on('click', 'ul.pagination a', function (event) {
                    back.pagination(event, $(this), errorAjax)
                })
                $('#pannel').on('change', function () {
                })
                    .on('click','.simpleConfirm', function (event) {
                        back.destroy(event, $(this), url, title, confirmButtonText, cancelButtonText, errorDelete)
                    })
                $('th span').click(function () {
                    back.ordering(url, $(this), errorAjax)
                })
                $('#btnsearch').click(function () {
                    back.filters(url, errorAjax)
                })
                $('#search').keypress(function(event){
                    let keycode = (event.keyCode ? event.keyCode : event.which);
                    if(keycode == '13'){
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
