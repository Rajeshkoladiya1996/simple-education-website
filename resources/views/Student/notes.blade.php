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
                    <h4 class="mb-0 font-size-18 m-2">Notes</h4>
                    <a href="#" class="btn btn-success btn-sm  mb-2" data-toggle="modal" data-target="#notes"><i
                            class="fas fa-plus mr-1"></i> Add Note</a>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row" id="notelist">
            @include('Student.noteslist')
        </div>


       
        <div class="modal fade text-left" id="notes" tabindex="-1" role="dialog" aria-labelledby="RditProduct"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title text-text-bold-600" id="RditProduct">Notes</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="errors" style="color: red;"></div>
                    <form method="post" id="add_notes_form">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <label>Notes</label>
                            <div class="form-group">
                                <input type="text"  class="form-control"
                                    name="notes_title" id="notes_title" >
                            </div>
                            <label>Notes Content</label>
                            <div class="form-group">
                                <textarea type="text"  class="form-control" name="notescontent" id="notescontent" required></textarea>
                            </div>
                        </div>
                        <div id="errors"></div>
                        <div class="modal-footer">
                            <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                                value="close">
                            <input type="submit" class="btn btn-outline-primary btn-lg" value="Add Notes">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade text-left" id="viewnotes" tabindex="-1" role="dialog" aria-labelledby="RditProduct"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <label class="modal-title text-text-bold-600" id="RditProduct">View Notes</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="errors" style="color: red;"></div>
                    <form method="post">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <label>Notes</label>
                            <div class="form-group">
                                <input type="text"  class="form-control"
                                    name="view_title" id="view_title" disabled>
                            </div>
                            <label>Notes Content</label>
                            <div class="form-group">
                                <textarea type="text"  class="form-control" name="view_content" id="view_content" required disabled></textarea>
                            </div>
                        </div>
                        <div id="errors"></div>
                        <div class="modal-footer">
                            <!-- <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                                value="close">
                            <input type="submit" class="btn btn-outline-primary btn-lg" value="Add Notes"> -->
                        </div>
                    </form>
                </div>
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

$('#add_notes_form').on('submit', function(e) {
    e.preventDefault();
    var fd = new FormData(this);
    $.ajax({
        url: '{{ URL::to("/student/addnotes") }}',
        method: 'POST',
        data: fd,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('#notes').modal('hide');
            notelist();
        },
        error: function(response) {
            var msg = response.responseJSON.message;
            $('.loader').hide();
            alertshow("Alert", msg, "warning");
        }
    });
});

function notelist() {

    $.ajax({
        url: '{{ URL::to("/student/notelist") }}',
        method: 'get',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            $('#notelist').html(response);
            $('#add_notes_form')[0].reset();
        },
        error: function(response) {}
    });

}

$(document).on('click','.viewnotes',function(){

    var notes = $(this).data('notes');
    var title = $(this).data('title');

    $('#view_title').val(title);
    $('#view_content').text(title);

});

$(document).on('click', '.delete', function() {
    var id = $(this).data('id');
    var ajaxurl = '{{URL::to("student/deletenotes")}}';
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
                notelist();
            }
        });
    }
});

</script>
@endsection