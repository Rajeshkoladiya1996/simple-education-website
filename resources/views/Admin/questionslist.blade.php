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
            <Button class="badge bg-success font-size-15 m-3 reply" style="text-align:center" data-toggle="modal" data-target="#reply_course" data-id="{{ $val->id }}" data-student="{{ $val->user->name }}" data-que="{{ $val->question}}" >Reply</Button>
            @else
            
            @endif
        </div>
        
    </div>
    <!-- end row -->
</div>
@endforeach