@extends('layouts.admin')
@section('title')
Dashboard
@endsection
@section('css')
@endsection
@section('content')      
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom justify-content-center pt-2" role="tablist">
                        <h2> welcome to {{ $data->coursename }}</h2>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content p-4">
                        <div class="tab-pane active" id="all-post" role="tabpanel">
                            <div>
                                <div class="row justify-content-center">
                                    <div class="col-xl-8">
                                        <div>
                                            <hr class="mb-4">
                                            <div>
                                                <h5><a href="blog-details.html"
                                                        class="text-dark">{{ $data->coursename }}</a></h5>
                                                <p class="text-muted">{{ $data->created_at }}</p>

                                                <p>{{ $data->description }}</p>
                                            </div>
                                            <hr class="my-5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-body p-4">
                        Enrolled Student
                        <hr class="my-4">
                        <div>
                            <!-- <p class="text-muted">Categories</p> -->
                            <ul class="list-unstyled fw-medium">
                                @foreach($enroll as $val)
                                <li><a href="javascript: void(0);" class="text-muted py-2 d-block"><i
                                            class="mdi mdi-chevron-right me-1"></i>{{ $val->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
    </div>
    @endsection
    @section('js')
    <!-- apexcharts -->
    <script src="{{URL::to('storage/app/public/Adminassets/libs/apexcharts/apexcharts.min.js')}}"></script>

    <script src="{{URL::to('storage/app/public/Adminassets/js/pages/dashboard.init.js')}}"></script>
    <script style="text/javascript">
    // Add category

    $('#addcourse_form').on('submit', function(e) {
        e.preventDefault();
        var fd = new FormData(this);
        $.ajax({
            url: '{{ URL::to("/admin/addcourse") }}',
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#addcourse').modal('hide');
                getcourselist();
            },
            error: function(response) {
                var msg = response.responseJSON.message;
                $('.loader').hide();
                alertshow("Alert", msg, "warning");
            }
        });
    });

    function getcourselist() {

        $.ajax({
            url: '{{ URL::to("/admin/courselist") }}',
            method: 'get',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#courselist').html(response);
            },
            error: function(response) {}
        });

    }

    $(document).on('click', '.delete', function() {
        var id = $(this).data('id');
        var ajaxurl = '{{URL::to("admin/deletecourse")}}';
        if (confirm('Are you sure you want to delete this?')) {
            $.ajax({
                url: ajaxurl,
                type: 'POST',
                data: {
                    "id": id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    getcourselist();
                }
            });
        }
    });

    $(document).on('click', '.editcourse', function() {
        var id = $(this).data('id');
        var ajaxurl = '{{URL::to("admin/editcoursedata")}}';
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                "id": id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $('#edit_coursename').val(data.coursename);
                $('#edit_corsecode').val(data.coursecode);
                $('#edit_coursedesc').text(data.description);
                $('#courseId').attr('value', data.id);
            }
        });
    });

    $('#editcourse_form').on('submit', function(e) {
        e.preventDefault();
        var fd = new FormData(this);
        $.ajax({
            url: '{{ URL::to("/admin/updatecourse") }}',
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#editcourse').modal('hide');
                getcourselist();
            },
            error: function(response) {
                var msg = response.responseJSON.message;
                $('.loader').hide();
                alertshow("Alert", msg, "warning");
            }
        });
    });

    $(document).on('click', '.reply', function() {
        var question_id = $(this).data('id');
        var studentname = $(this).data('student');
        var question = $(this).data('que');

        // $('#edit_coursename').val(question_id);
        $('#studentname').val(studentname);
        $('#question').val(question);
        $('#questionId').val(question_id);

    });

    $('#reply_course_form').on('submit', function(e) {
        e.preventDefault();
        var fd = new FormData(this);
        $.ajax({
            url: '{{ URL::to("/admin/replycourse") }}',
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#reply_course').modal('hide');
                // getcourselist();
            },
            error: function(response) {
                var msg = response.responseJSON.message;
                $('.loader').hide();
                alertshow("Alert", msg, "warning");
            }
        });
    });
    </script>
    @endsection