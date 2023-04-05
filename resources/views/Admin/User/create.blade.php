@extends('layouts.admin')
@section('title')
    Create User
@endsection
@section('css')

@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Create User</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{URL::to('la-admin/user')}}">Users</a></li>
                                <li class="breadcrumb-item active">Create User</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            {{Form::open(array('url'=>'la-admin/user','method'=>'post','name'=>'create-user','class'=>'custom-validation','files'=>'true'))}}

                            <div class="form-group row ">
                                <div class="col-sm-6">
                                    <label>Name</label>
                                    {{Form::text('name','',array('class'=>$errors->has('name') ?'form-control is-invalid' : 'form-control','placeholder'=>'Enter Name','required'))}}
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label>E-Mail</label>
                                    {{Form::email('email','',array('class'=>$errors->has('email') ?'form-control is-invalid' : 'form-control','Placeholder'=>'Enter a valid e-mail','required','parsley-type'=>"email"))}}
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>Password</label>

                                    {{Form::password('password',array('class'=>$errors->has('password') ?'form-control is-invalid' : 'form-control','required','placeholder'=>'Password','id'=>'pass2'))}}
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="col-sm-6">
                                    <label>Confirm Password</label>

                                    {{Form::password('cnf_password',array('class'=>$errors->has('cnf_password') ?'form-control is-invalid' : 'form-control','required','placeholder'=>'Re-Type Password','data-parsley-equalto'=>'#pass2'))}}
                                    @error('cnf_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>Phone Number</label>
                                    {{Form::text('phone_no','',array('class'=>$errors->has('phone_no') ?'form-control is-invalid' : 'form-control','placeholder'=>'Enter Phone Number','required','data-parsley-type'=>'number'))}}
                                    @error('phone_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label>Profile Pic</label>
                                    <div class="custom-file">
                                        {{Form::file('profile_pic',array('class'=>$errors->has('profile_pic') ?'custom-file-input is-invalid' : 'custom-file-input','id'=>'customFile'))}}
                                        <label class="custom-file-label" for="customFile">Choose file</label>

                                    </div>
                                    @error('profile_pic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>


                            <div class="form-group mb-0">
                                <div>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                        Submit
                                    </button>
                                    <a href="{{URL::to('la-admin/user')}}" type="reset" class="btn btn-secondary waves-effect">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                            {{Form::close()}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{URL::to('storage/app/public/Adminassets/libs/parsleyjs/parsley.min.js')}}"></script>

    <script src="{{URL::to('storage/app/public/Adminassets/js/pages/form-validation.init.js')}}"></script>

@endsection
