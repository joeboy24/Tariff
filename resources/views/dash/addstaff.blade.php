
@extends('layouts.dashlay')

@section('header_nav')
    @include('inc.header_nav')  
@endsection

@section('sidebar_menu')
    
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item">
                <a href="/dashboard" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="/admin_homepage" class='sidebar-link'>
                    <i class="fa fa-home"></i>
                    <span>Homepage</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="/admin_about" class='sidebar-link'>
                    <i class="fa fa-edit"></i>
                    <span>About</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="/admin_news" class='sidebar-link'>
                    <i class="bi bi-pen-fill"></i>
                    <span>News Blog</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="/admin_events" class='sidebar-link'>
                    <i class="fa fa-calendar"></i>
                    <span>Events</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="/admin_contacts" class='sidebar-link'>
                    <i class="fa fa-envelope-square"></i>
                    <span>Inbox</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="/admin_newsletter" class='sidebar-link'>
                    <i class="fa fa-share-alt"></i>
                    <span>Newsletter</span>
                </a>
            </li>

            <li class="sidebar-item active has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-cogs"></i>
                    <span>Settings</span>
                </a>
                <ul class="submenu active">
                    <li class="submenu-item">
                        <a href="/companysetup">Company Setup</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/adduser">Add User</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/programs">Add Programs/Courses</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/programs_outline">Course Registration</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/departments">Register Faculty/Dept.</a>
                    </li>
                    <li class="submenu-item active">
                        <a href="/add_staff">Add Staff</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/addstudent">Add Student</a>
                    </li>
                    {{-- <li class="submenu-item ">
                        <a href="#">Accounts</a>
                    </li> --}}
                </ul>
            </li>

        </ul>
    </div>

@endsection

@section('content')

    <div class="page-heading">
        <h3>Manage Settings</h3>
    </div>


    <div class="row">
        <div class="col-12 col-xl-10">
            @include('inc.messages')
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Staff Here</h4>
                </div>
                <div class="card-body">

                    {{-- <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Staff Here</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body"> --}}
                                    
                                    <form action="{{action('DashController@store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf 

                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label>Title</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group mb-8">
                                                        <label class="input-group-text" for="inputGroupSelect01">Select</label>
                                                        <select name="title" class="form-select" id="inputGroupSelect01">
                                                            <option selected>Mr.</option>
                                                            <option>Mrs.</option>
                                                            <option>Miss</option>
                                                            <option>Dr.</option>
                                                            <option>Ing.</option>
                                                            <option>Prof.</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <p></p>

                                                <div class="col-md-4">
                                                    <label>Firstname</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" name="fname" class="form-control" placeholder="eg. John" id="first-name-icon" autofocus required>
                                                            <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Other Names</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" name="sname" class="form-control" placeholder="eg. Doe" id="first-name-icon" autofocus required>
                                                            <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Date of Birth</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" name="dob" class="form-control" placeholder="dd/mm/yyyy" id="first-name-icon" required>
                                                            <div class="form-control-icon"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="email" class="form-control" name="email" placeholder="Email" id="first-name-icon">
                                                            <div class="form-control-icon"><i class="bi bi-envelope"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Mobile</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="number" class="form-control" name="contact" placeholder="Mobile" required>
                                                            <div class="form-control-icon"><i class="bi bi-phone"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Role</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group mb-8">
                                                        <label class="input-group-text" for="inputGroupSelect01">Select</label>
                                                        <select name="role" class="form-select" id="inputGroupSelect01">
                                                            <option selected>Lecturer</option>
                                                            <option>Staff</option>
                                                            <option>Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <p></p>

                                                <div class="col-md-4">
                                                    <label>Faculty/Department</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group mb-8">
                                                        <label class="input-group-text"for="inputGroupSelect01">Select</label>
                                                        <select name="dept" class="form-select" id="basicSelect">
                                                            @foreach ($departments as $item)
                                                                @if($item->del == 'no')
                                                                    <option value="{{$item->id}}">{{$item->dept_name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <p></p>

                                                <div class="col-md-4">
                                                    <label>Choose Passport Photo</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group mb-3">
                                                            <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                                            <input name="pass_photo" type="file" class="form-control" id="inputGroupFile01" required>
                                                            {{-- <input name="pass_photo" type="file" class="form-control" id="inputGroupFile01" value="{{$comp->logo}}"> --}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" name="store_action" value="add_staff" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                {{-- </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Staff View -->
                    <div class="table-responsive">
                        @if (count($staff) > 0)
                            <table class="table mb-0 table-lg">
                                <thead>
                                    <tr>
                                        <th><img src="/storage/classified/noimage.jpg" width="30px" style="border-radius: 50%"></th>
                                        <th>NAME</th>
                                        <th>CONTACT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach ($staff as $item)
                                        @if ($item->del == 'yes')
                                            <tr class="del_danger">
                                        @else
                                            <tr>
                                        @endif
                                            <td><img src="/storage/classified/staff/{{$item->pass_photo}}" width="30px" style="border-radius: 50%"></td>
                                            <td class="text-bold-500">{{ $item->title.' '.$item->fname.' '.$item->sname }}
                                                <br><p class="small_p">{{ $item->department->dept_name }}</p>
                                                {{ $item->token }}
                                            </td>
                                            <td>{{ $item->contact }}<br><p class="small_p">{{ $item->email }}</p></td>
                                            <form action="{{ action('DashController@update', $item->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf
                                                
                                                <td class="text-bold-500 action_size">
                                                    @if ($item->del == 'yes')
                                                        <button type="submit" name="update_action" value="restore_staff" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                    @else
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#editstaff{{$item->id}}" class="my_trash"><i class="fa fa-pencil"></i></button>
                                                        <button type="submit" name="update_action" value="del_staff" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                                                    @endif 
                                                </td>
                                                {{-- <button type="submit" name="store_action" value="del_item" rel="tooltip" title="Delete Item" class="close2" onclick="return confirm('Are you sure you want to delete selected item?');"><i class="fa fa-close"></i></button> --}}
                                            </form>
                                        </tr>

                                        <div class="modal fade" id="editstaff{{$item->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                                            Edit Staff Here
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <form action="{{ action('DashController@update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        @csrf
                                                        
                                                        <div class="col-md-10 offset-md-1 modal-body">

                                                            <div class="col-md-12">
                                                                <label>Title</label>
                                                                <div class="input-group mb-8">
                                                                    <label class="input-group-text" for="inputGroupSelect01">Select</label>
                                                                    <select name="title" class="form-select" id="inputGroupSelect01">
                                                                        @if ($item->title == 'Mr.')
                                                                            <option selected>Mr.</option>
                                                                            <option>Mrs.</option>
                                                                            <option>Miss</option>
                                                                            <option>Dr.</option>
                                                                            <option>Ing.</option>
                                                                            <option>Prof.</option>
                                                                        @elseif ($item->title == 'Mrs.')
                                                                            <option>Mr.</option>
                                                                            <option selected>Mrs.</option>
                                                                            <option>Miss</option>
                                                                            <option>Dr.</option>
                                                                            <option>Ing.</option>
                                                                            <option>Prof.</option>
                                                                        @elseif ($item->title == 'Miss.')
                                                                            <option>Mr.</option>
                                                                            <option>Mrs.</option>
                                                                            <option selected>Miss</option>
                                                                            <option>Dr.</option>
                                                                            <option>Ing.</option>
                                                                            <option>Prof.</option>
                                                                        @elseif ($item->title == 'Dr.')
                                                                            <option>Mr.</option>
                                                                            <option>Mrs.</option>
                                                                            <option>Miss</option>
                                                                            <option selected>Dr.</option>
                                                                            <option>Ing.</option>
                                                                            <option>Prof.</option>
                                                                        @elseif ($item->title == 'Ing.')
                                                                            <option>Mr.</option>
                                                                            <option>Mrs.</option>
                                                                            <option>Miss</option>
                                                                            <option>Dr.</option>
                                                                            <option selected>Ing.</option>
                                                                            <option>Prof.</option>
                                                                        @elseif ($item->title == 'Prof.')
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
                                                            <p></p>

                                                            <div class="col-md-12">
                                                                <label>Firstname</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="text" name="fname" value="{{$item->fname}}" class="form-control" placeholder="eg. John" id="first-name-icon" autofocus required>
                                                                        <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
            
                                                            <div class="col-md-12">
                                                                <label>Other Names</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="text" name="sname" value="{{$item->sname}}" class="form-control" placeholder="eg. Doe" id="first-name-icon" required>
                                                                        <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
            
                                                            <div class="col-md-12">
                                                                <label>Date of Birth</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="date" name="dob" value="{{$item->dob}}" class="form-control" placeholder="dd/mm/yyyy" id="first-name-icon" required>
                                                                        <input type="hidden" name="dob_hidden" value="{{$item->dob}}">
                                                                        <div class="form-control-icon"><i class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
            
                                                            <div class="col-md-12">
                                                                <label>Email</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="email" class="form-control" value="{{$item->email}}" name="email" placeholder="Email" id="first-name-icon">
                                                                        <div class="form-control-icon"><i class="bi bi-envelope"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
            
                                                            <div class="col-md-12">
                                                                <label>Mobile</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="number" class="form-control" value="{{$item->contact}}" name="contact" placeholder="Mobile" required>
                                                                        <div class="form-control-icon"><i class="bi bi-phone"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
            
                                                            <div class="col-md-12">
                                                                <label>Role</label>
                                                                <div class="input-group mb-8">
                                                                    <label class="input-group-text" for="inputGroupSelect01">Select</label>
                                                                    <select name="role" class="form-select" id="inputGroupSelect01">
                                                                        @if ($item->role == 'Lecturer')
                                                                            <option selected>Lecturer</option>
                                                                            <option>Staff</option>
                                                                            <option>Other</option>
                                                                        @elseif ($item->role == 'Staff')
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
                                                                    <label class="input-group-text"for="inputGroupSelect01">Select</label>
                                                                    <select name="dept" class="form-select" id="basicSelect">
                                                                        @foreach ($departments as $dept)
                                                                            @if($dept->del == 'no')
                                                                                @if ($dept->id == $item->department_id)    
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
            
                                                            <!--div class="col-md-12">
                                                                <label>Choose Passport Photo</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group mb-3">
                                                                        <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                                                        <input name="pass_photo2" type="file" class="form-control" id="inputGroupFile01">
                                                                        <input type="hidden" name="pass_photo2_name" value="{{$item->pass_photo}}">
                                                                    </div>
                                                                </div>
                                                            </div-->
            
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                            </button>
                                                            <button type="submit" name="update_action" value="staff_update" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </tbody>
                            </table>
                            {{ $staff->links() }}
                        @else
                            <div class="alert alert-danger">
                                No Staff Records Found 
                            </div>
                        @endif
                    </div>

                </div>


            </div>
        </div>
    </div>

@endsection

 