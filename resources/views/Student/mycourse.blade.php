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
                    <h4 class="mb-0 font-size-18 m-2">Enrolled Course</h4>
                    <a href="#" class="btn btn-success btn-sm  mb-2" data-toggle="modal" data-target="#EnrollCourse"><i
                            class="fas fa-plus mr-1"></i> Enroll in Course</a>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row" id="courselist">
            @include('Student.enrolledcourselist')
        </div>


        <div class="modal fade text-left" id="EnrollCourse" tabindex="-1" role="dialog" aria-labelledby="RditProduct"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title text-text-bold-600" id="RditProduct">Enroll Course</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <table id="coursetable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($course as $enroll)
                            <tr>
                                <td>{{ $enroll->coursecode }}</td>
                                <td class="catname">{{ $enroll->coursename }}</td>
                                <td>
                                    <a class="btn btn-success btn-sm btn-add btn-edit-vendor enroll-btn"
                                        href="javascript:void(0);" data-id="{{ $enroll->id }}">Add Course</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- view answer -->
        <div class="modal fade text-left" id="Answer" tabindex="-1" role="dialog" aria-labelledby="RditProduct"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title text-text-bold-600" id="RditProduct">Answer</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="errors" style="color: red;"></div>
                    <form method="post">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <label>Question</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="viewquestion" id="viewquestion" disabled>
                            </div>
                            <label>Answer</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="viewanswer" id="viewanswer" disabled>
                            </div>
                        </div>
                </div>
                <div id="errors"></div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="close">
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
<script src="{{URL::to('storage/app/public/Adminassets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}">
</script>
<!-- Buttons examples -->
<script src="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}">
</script>
<script
    src="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}">
</script>
<script
    src="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}">
</script>

<!-- Datatable init js -->
<script src="{{URL::to('storage/app/public/Adminassets/js/pages/datatables.init.js')}}"></script>

<script style="text/javascript">
// Add category

function getenrollcourselist() {

    $.ajax({
        url: '{{ URL::to("/student/enrollcourselist") }}',
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
    var ajaxurl = '{{URL::to("student/deleteenrolledcourse")}}';
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
                getenrollcourselist();
            }
        });
    }
});

$(document).on('click', '.enroll-btn', function() {
    var id = $(this).data('id');
    $.ajax({
        url: '{{ URL::to("/admin/enrollcourse") }}',
        method: 'POST',
        data: {'id':id},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('#EnrollCourse').modal('hide');
            getenrollcourselist();
        },
        error: function(response) {
            var msg = response.responseJSON.message;
            $('.loader').hide();
            alertshow("Alert", msg, "warning");
        }
    });

});

$('#coursetable').DataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bInfo": false,
});
</script>
@endsection