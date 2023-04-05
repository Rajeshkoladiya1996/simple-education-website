@foreach($enroll as $val)
<div class="col-md-6 col-xl-3">
    <!-- Simple card -->
    <div class="card">

        <div class="card-body">

            <h4 class="card-title">Course Name</h4>
            <p class="card-text">{{ $val->course->coursename}}</p>


            <h4 class="card-title">Course Code</h4>
            <p class="card-text">{{ $val->course->coursecode}}</p>

            <h4 class="card-title">Description</h4>
            <p class="card-text">
                {{ $val->course->description}}
            </p>
            <h4 class="card-title">Created At</h4>
            <p class="card-text">
                {{$val->created_at}}
            </p>
            <h4 class="card-title">Tutor Name</h4>
            <p class="card-text">
                {{$val->course->user->name}}
            </p>
        </div>
        <div class="row">
            <Button class="badge bg-danger font-size-12 ml-3 m-2 delete" data-id="{{ $val->id }}">Delete Course</Button>
            <a href="{{ URL::to('/student/viewcourse',$val->course->id)}}"
                class="badge bg-success font-size-12 m-2">View Course</a>
        </div><!-- end col -->
    </div>
    <!-- end row -->
</div>
@endforeach