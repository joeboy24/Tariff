
@extends('layouts.dashlay')

@section('header_nav')
    @include('inc.header_nav')  
@endsection



@section('content')

    <div class="page-heading">
        <h3>Confirm Credentials</h3>
    </div>


    <div class="row">
        <div class="col-12 col-xl-8">
            @include('inc.messages')
            <div class="card">
                <div class="card-body">

                    {{-- <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add User Here</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body"> --}}
                                    
                                    <form action="{{action('DashController@store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf 

                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <label>Staff ID</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" name="staff_id" class="form-control" placeholder="" id="first-name-icon" autofocus required>
                                                            <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label>Token</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" name="token" class="form-control" placeholder="" id="first-name-icon" autofocus required>
                                                            <div class="form-control-icon"><i class="bi bi-lock"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                               
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" name="store_action" value="staff_confirm" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    {{-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                {{-- </div>
                            </div>
                        </div>
                    </div> --}}

                </div>


            </div>
        </div>
    </div>

@endsection

 