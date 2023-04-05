@extends('layouts.admin')
@section('title')
    User
@endsection
@section('css')
    <!-- DataTables -->
    <link href="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}"
          rel="stylesheet" type="text/css"/>
    <link
        href="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css"/>

    <!-- Responsive datatable examples -->
    <link
        href="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Users List</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{URL::to('la-admin/')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('message'))
                        {!! Session::get('message') !!}
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">


                            <table id="datatable-buttons"
                                   class="table table-striped table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Profile Pic</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                @forelse($data as $row)
                                    <tr>
                                        <td>#{{$row->id}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->phone_no}}</td>
                                        <td>
                                            @if(file_exists(storage_path('app/public/user/'.$row->profile_pic)) && $row->profile_pic != '')
                                                <img src="{{URL::to('storage/app/public/user/'.$row->profile_pic)}}"
                                                     class="rounded avatar-sm"
                                                     alt="user">
                                            @else
                                                <img src="{{URL::to('storage/app/public/default/default_user.jpg')}}"
                                                     class="rounded avatar-sm"
                                                     alt="user">
                                            @endif
                                        </td>
                                        <td>{{@$row->roles->first()->display_name}} @if($row->roles->first()->display_name == 'Admin')
                                                <i class="bx bx-check-double text-success"></i>@endif </td>
                                        <td>
                                            <a href="{{URL::to('la-admin/user/'.$row->id.'/status')}}">
                                                <span
                                                    class="badge badge-pill  {{$row->status == 'active' ? 'badge-success' : 'badge-danger'}}">{{$row->status}}</span>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-success btn-sm btn-add btn-edit-vendor"
                                               href="{{URL::to('la-admin/user/'.$row->id.'/edit')}}"><i
                                                    class="bx bx-edit-alt"></i></a>
                                            @if(@$row->roles->first()->display_name != 'Admin')
                                                <a class="btn btn-danger btn-sm btn-add btn-edit-vendor"
                                                   href="{{URL::to('la-admin/user/'.$row->id.'/edit')}}"><i
                                                        class="bx bx-trash-alt"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
@section('js')
    <!-- Required datatable js -->
    <script
        src="{{URL::to('storage/app/public/Adminassets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script
        src="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script
        src="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script
        src="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::to('storage/app/public/Adminassets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{URL::to('storage/app/public/Adminassets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{URL::to('storage/app/public/Adminassets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <script
        src="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script
        src="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script
        src="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script
        src="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script
        src="{{URL::to('storage/app/public/Adminassets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{URL::to('storage/app/public/Adminassets/js/pages/datatables.init.js')}}"></script>
@endsection
