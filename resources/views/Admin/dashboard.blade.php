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
            <div class="col-4">
                <div class="page-title-box d-flex align-items-center">
                    <h4 class="mb-0 font-size-18 m-2">Current Course</h4>
                    <a href="#" class="btn btn-success btn-sm  mb-2" data-toggle="modal" data-target="#addcourse"><i
                            class="fas fa-plus mr-1"></i> Create</a>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row" id="courselist">
            @include('Admin.courselist')
        </div>
        <div class="row">
            <div class="col-4">
                <div class="page-title-box d-flex align-items-center">
                    <h4 class="mb-0 font-size-18 m-2">Question</h4>
                </div>
            </div>
        </div>
        <div class="row" id="courselist">
            @include('Admin.questionslist')
        </div>
        <!-- add course model -->
        <div class="modal fade text-left" id="addcourse" tabindex="-1" role="dialog" aria-labelledby="RditProduct"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title text-text-bold-600" id="RditProduct">Add Course</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="errors" style="color: red;"></div>
                    <form method="post" id="addcourse_form">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <label>Course Name</label>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Course Name" class="form-control"
                                    name="coursename" id="coursename" required>
                            </div>
                            <label>Course Code</label>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Course Code" class="form-control" name="corsecode"
                                    id="corsecode" required>
                            </div>
                            <label>Tutor Name</label>
                            <div class="form-group">
                                <input type="text" value="{{ Auth::user()->name }}" class="form-control" disabled>
                                <input type="text" value="{{ Auth::user()->id }}" class="form-control" name="tutorId"
                                    id="tutorId" hidden>
                            </div>
                            <label>Description</label>
                            <div class="form-group">
                                <textarea type="text" placeholder="Enter Course Description" class="form-control"
                                    name="coursedesc" id="coursedesc" required>
                            </textarea>
                            </div>
                        </div>
                        <div id="errors"></div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                                value="close">
                            <input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end -->
        <!-- edit course model -->
        <div class="modal fade text-left" id="editcourse" tabindex="-1" role="dialog" aria-labelledby="RditProduct"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title text-text-bold-600" id="RditProduct">Edit Course</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="errors" style="color: red;"></div>
                    <form method="post" id="editcourse_form">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <label>Course Name</label>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Course Name" class="form-control"
                                    name="coursename" id="edit_coursename" required>
                            </div>
                            <label>Course Code</label>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Course Code" class="form-control"
                                    name="edit_corsecode" id="edit_corsecode" required>
                            </div>
                            <label>Tutor Name</label>
                            <div class="form-group">
                                <input type="text" value="{{ Auth::user()->name }}" class="form-control" disabled>
                                <input type="text" value="{{ Auth::user()->id }}" class="form-control" name="tutorId"
                                    id="tutorId" hidden>
                                 <input type="text" class="form-control" name="courseId"
                                  id="courseId" hidden>
                            </div>
                            <label>Description</label>
                            <div class="form-group">
                                <textarea type="text" placeholder="Enter Course Description" class="form-control"
                                    name="coursedesc" id="edit_coursedesc" required>
                            </textarea>
                            </div>
                        </div>
                        <div id="errors"></div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                                value="close">
                            <input type="submit" class="btn btn-outline-primary btn-lg" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <!-- edit course model -->
         <div class="modal fade text-left" id="reply_course" tabindex="-1" role="dialog" aria-labelledby="RditProduct"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title text-text-bold-600" id="RditProduct">Course</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="errors" style="color: red;"></div>
                    <form method="post" id="reply_course_form">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <label>Student Name</label>
                            <div class="form-group">
                                <input type="text"  class="form-control"
                                    name="studentname" id="studentname" disabled>
                            </div>
                            <label>Question</label>
                            <div class="form-group">
                                <input type="text"  class="form-control"
                                    name="question" id="question" disabled>
                            </div>
                            <label>Tutor Name</label>
                            <div class="form-group">
                                <input type="text" value="{{ Auth::user()->name }}" class="form-control" disabled>
                                <input type="text" value="" class="form-control" name="questionId"
                                    id="questionId" hidden>
                            </div>
                            <label>Reply</label>
                            <div class="form-group">
                                <textarea type="text"  class="form-control" name="replytext" id="replytext" required></textarea>
                            </div>
                        </div>
                        <div id="errors"></div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                                value="close">
                            <input type="submit" class="btn btn-outline-primary btn-lg" value="Add Reply">
                        </div>
                    </form>
                </div>
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
                    $('#courseId').attr('value',data.id);
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