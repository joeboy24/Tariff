
@extends('layouts.dashlay')

@section('header_nav')
    @include('inc.header_nav')  
@endsection

@section('sidebar_menu')
    
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>


            <li class="sidebar-item">
                <a href="/ldashboard" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item active">
                <a href="/lprofile" class='sidebar-link'>
                    <i class="fa fa-address-book"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="/lslides" class='sidebar-link'>
                    <i class="fa fa-book"></i>
                    <span>Slides</span>
                </a>
            </li>

            <li class="sidebar-item has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-edit"></i>
                    <span>Exam</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="/lexam">Exams & Quizes</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="/lscore">Score Sheet</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a href="/luploads" class='sidebar-link'>
                    <i class="fa fa-upload"></i>
                    <span>Uploads</span>
                </a>
            </li>

        </ul>
    </div>

@endsection

@section('content')

    <div class="page-heading">
        <h3>My Profile</h3>
    </div>


    <div class="row">
        <div class="col-12 col-xl-6">
            @include('inc.messages')
            <div class="card">
                <div class="card-body">

                    <div class="profile_img">
                        <img src="/storage/classified/staff/{{$staff->pass_photo}}" width="100%" style="border-radius: 50%">
                    </div>

                    <!-- User View -->
                    <div class="table-responsive profile_table_container">
                        <table class="profile_table">  
                            <tbody>
                                <tr>
                                    <td class="profile_lable">Name</td>
                                    <td class="text-bold-500">{{ $staff->title.' '.$staff->fname.' '.$staff->sname }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500 profile_lable">ID</td>
                                    <td class="text-bold-500">{{ $staff->staff_id }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500 profile_lable">Contact</td>
                                    <td class="text-bold-500">{{ $staff->contact }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500 profile_lable">Email</td>
                                    <td class="text-bold-500">{{ $staff->email }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500 profile_lable">School Email</td>
                                    <td class="text-bold-500">{{ $staff->sch_email }}</td>
                                </tr>
                                <tr>
                                    <td class="text-bold-500 profile_lable">Department<br><p></p></td>
                                    <td class="text-bold-500">{{ $staff->department->dept_name }}<br><p></p></td>
                                </tr>
                            </tbody>
                        </table>
                    <p class="profile_edit center_text">Click <a href="#"  data-bs-toggle="modal" data-bs-target="#editprofile">HERE</a> to edit profile</p>
                    </div>

                </div>


            </div>
        </div>

        <div class="col-12 col-xl-4">
            <div class="card">
                <div class="card-body">

                    <div class="col-12">
                        <a href="/ldashboard">
                            <div class="row lect_options">
                                <div class="col-md-12">
                                    <h4>Dashboard</h4>
                                </div>
                                <div class="col-md-12">
                                    <p class="center_text">Portal Overview<p>
                                </div>
                            </div>
                        </a>
                    
                        <a href="/lprofile">
                            <div class="row lect_options">
                                <div class="col-md-12">
                                    <h4>Profile</h4>
                                </div>
                                <div class="col-md-12">
                                    <p class="center_text">Edit Profile Here<p>
                                </div>
                            </div>
                        </a>
                    
                        <a href="/lexam">
                            <div class="row lect_options">
                                <div class="col-md-12">
                                    <h4>Exam</h4>
                                </div>
                                <div class="col-md-12">
                                    <p class="center_text">Manage Exams & Quizes<p>
                                </div>
                            </div>
                        </a>
                    
                        <a href="/lscore">
                            <div class="row lect_options">
                                <div class="col-md-12">
                                    <h4>Score Sheet</h4>
                                </div>
                                <div class="col-md-12">
                                    <p class="center_text">Scores Overview<p>
                                </div>
                            </div>
                        </a>
                    
                        <a href="/luploads">
                            <div class="row lect_options">
                                <div class="col-md-12">
                                    <h4>Uploads</h4>
                                </div>
                                <div class="col-md-12">
                                    <p class="center_text">Upload & Manage Files<p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>


    <div class="modal fade" id="editprofile" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        Edit Profile
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <form action="{{ action('DashController@update', $staff->id) }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    
                    <div class="col-md-12 modal-body">

                        <div class="col-md-12">
                            <label>Title</label>
                            <div class="form-group has-icon-left">
                                <select name="title"  class="form-control" id="inputGroupSelect01">
                                    @if ($staff->title == 'Mr.')
                                        <option selected>Mr.</option>
                                        <option>Mrs.</option>
                                        <option>Miss</option>
                                        <option>Dr.</option>
                                        <option>Ing.</option>
                                        <option>Prof.</option>
                                    @elseif ($staff->title == 'Mrs.')
                                        <option>Mr.</option>
                                        <option selected>Mrs.</option>
                                        <option>Miss</option>
                                        <option>Dr.</option>
                                        <option>Ing.</option>
                                        <option>Prof.</option>
                                    @elseif ($staff->title == 'Miss')
                                        <option>Mr.</option>
                                        <option>Mrs.</option>
                                        <option selected>Miss</option>
                                        <option>Dr.</option>
                                        <option>Ing.</option>
                                        <option>Prof.</option>
                                    @elseif ($staff->title == 'Dr.')
                                        <option>Mr.</option>
                                        <option>Mrs.</option>
                                        <option>Miss</option>
                                        <option selected>Dr.</option>
                                        <option>Ing.</option>
                                        <option>Prof.</option>
                                    @elseif ($staff->title == 'Ing.')
                                        <option>Mr.</option>
                                        <option>Mrs.</option>
                                        <option>Miss</option>
                                        <option>Dr.</option>
                                        <option selected>Ing.</option>
                                        <option>Prof.</option>
                                    @elseif ($staff->title == 'Prof.')
                                        <option>Mr.</option>
                                        <option>Mrs.</option>
                                        <option>Miss</option>
                                        <option>Dr.</option>
                                        <option>Ing.</option>
                                        <option selected>Prof.</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Firstname</label>
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="fname" value="{{$staff->fname}}" class="form-control" placeholder="eg. John" id="first-name-icon" autofocus required>
                                    <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Other Names</label>
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="text" name="sname" value="{{$staff->sname}}" class="form-control" placeholder="eg. Doe" id="first-name-icon" required>
                                    <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Date of Birth</label>
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="date" name="dob" class="form-control" value="{{$staff->dob}}" placeholder="dd/mm/yyyy" required>
                                    <div class="form-control-icon"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Email</label>
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="email" class="form-control" value="{{$staff->email}}" name="email" placeholder="Email" id="first-name-icon">
                                    <div class="form-control-icon"><i class="bi bi-envelope"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>School Email</label>
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="email" class="form-control" value="{{$staff->sch_email}}" name="email" placeholder="School Email" id="first-name-icon" readonly>
                                    <div class="form-control-icon"><i class="bi bi-envelope"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Mobile</label>
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="number" class="form-control" value="{{$staff->contact}}" name="contact" placeholder="Mobile" required>
                                    <div class="form-control-icon"><i class="bi bi-phone"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Change Password</label>
                            <div class="form-group has-icon-left">
                                <div class="position-relative">
                                    <input type="password" class="form-control" name="password" placeholder="Type new password here">
                                    <div class="form-control-icon"><i class="bi bi-phone"></i></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Role</label>
                            <div class="input-group mb-8">
                                <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                <select name="role" class="form-select" id="inputGroupSelect01">
                                    @if ($staff->role == 'Lecturer')
                                        <option selected>Lecturer</option>
                                        <option>Staff</option>
                                        <option>Other</option>
                                    @elseif ($staff->role == 'Staff')
                                        <option>Lecturer</option>
                                        <option selected>Staff</option>
                                        <option>Other</option>
                                    @else
                                        <option>Lecturer</option>
                                        <option>Staff</option>
                                        <option selected>Other</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <p></p>

                        <div class="col-md-12">
                            <label>Faculty/Department</label>
                            <div class="input-group mb-8">
                                <label class="input-group-text"for="inputGroupSelect01">Options</label>
                                <select name="dept" class="form-select" id="basicSelect">
                                    @foreach ($departments as $dept)
                                        @if($dept->del == 'no')
                                            @if ($dept->id == $staff->department_id)    
                                                <option value="{{$dept->id}}" selected>{{$dept->dept_name}}</option>
                                            @else
                                                <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <p></p>

                        <div class="col-md-12">
                            <label>Choose Passport Photo</label>
                            <div class="input-group mb-3">
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                    <input name="pass_photo" type="file" class="form-control" id="inputGroupFile01">
                                    <input name="pass_photo_hold" type="hidden" value="{{$staff->pass_photo}}">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            Close
                            {{-- <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span> --}}
                        </button>
                        <button type="submit" name="update_action" value="staff_update" class="btn btn-primary me-1 mb-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

 