@foreach($que as $val)

<div class="col-md-6 col-xl-3">
    <!-- Simple card -->
    <div class="card">

        <div class="card-body">

            <h4 class="card-title">Student Name</h4>
            <p class="card-text">{{ $val->user->name}}</p>

            <h4 class="card-title">Course Name</h4>
            <p class="card-text">{{ $val->course->coursename}}</p>

            <h4 class="card-title">Question</h4>
            <p class="card-text">
            {{ $val->question}}
            </p>
            <h4 class="card-title">Submit Date</h4>
            <p class="card-text">
               {{$val->created_at}}
            </p>
            @if($val->reply =='')
            <span class="label label-warning" style="color:blue">Awaiting Reply</span>
            @else
            <Button class="badge bg-success font-size-15 m-3 viewanswer" style="text-align:center" data-answer="{{ $val->reply }}" data-que="{{ $val->question }}" data-toggle="modal" data-target="#Answer" >View Answer</Button>
            @endif
        </div>
        
    </div>
    <!-- end row -->
</div>
@endforeach