
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
                    <li class="submenu-item active">
                        <a href="/programs">Add Programs/Courses</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/programs_outline">Course Registration</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/departments">Register Faculty/Dept.</a>
                    </li>
                    <li class="submenu-item">
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
        @include('inc.messages')
        <div class="col-12 col-xl-6">
            <div class="card">
                {{-- <div class="card-header">
                    <h4>Add Room Type</h4>
                </div> --}}
                <div class="card-body">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Programs Here</h4>
                                    <p class="small_p">Click <a href="/programs_outline"><button type="button" style="font-size: 0.9em!important" class="my_trash">
                                        <i class="fa fa-th-large"></i> &nbsp;Here
                                    </button></a> to Open Programs & Course Overview</p>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form action="{{action('DashController@store')}}" method="POST">
                                        @csrf 

                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label>Program Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" name="program_name" class="form-control" placeholder="eg. Dondology" id="first-name-icon" autofocus required>
                                                            <div class="form-control-icon"><i class="fa fa-building"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Department</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <fieldset class="form-group">
                                                        <select name="dept" class="form-select" id="basicSelect">
                                                            @foreach ($departments as $item)
                                                                @if($item->del == 'no')
                                                                    <option value="{{$item->id}}">{{$item->dept_name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </fieldset>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" name="store_action" value="add_program" class="btn btn-primary me-1 mb-1">
                                                        <i class="fa fa-save"></i>&nbsp;&nbsp; Save Program
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Program View -->
                        <div class="table-responsive">
                            @if (count($programs) > 0)
                                <table class="table mb-0 table-lg">
                                    <thead>
                                        <tr>
                                            <th>PROGRAM</th>
                                            {{-- <th>DEPARTMENT</th> --}}
                                            <th class="float_right action_size">ACTION</th>
                                        </tr>
                                    </thead>   
                                    <tbody>
                                        @foreach ($programs as $item)
                                            @if ($item->del == 'yes')
                                                <tr class="del_danger">
                                            @else
                                                <tr>
                                            @endif
                                                    <td class="text-bold-500">{{ $item->program_name }}<br><p class="small_p">{{ $item->department->dept_name }}</p></td>
                                                    <form action="{{ action('DashController@update', $item->id) }}" method="POST">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        @csrf


                                                        @if ($item->del == 'yes')
                                                            <td class="text-bold-500 float_right">
                                                                <button type="submit" name="update_action" value="restore_program" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                            </td>
                                                        @else
                                                            <td class="text-bold-500 float_right">
                                                                <button type="button" data-bs-toggle="modal" data-bs-target="#mod{{$item->id}}" class="my_trash"><i class="fa fa-pencil"></i></button>
                                                                <button type="submit" name="update_action" value="del_program" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                                                            </td>
                                                        @endif
                                                        {{-- <button type="submit" name="store_action" value="del_item" rel="tooltip" title="Delete Item" class="close2" onclick="return confirm('Are you sure you want to delete selected item?');"><i class="fa fa-close"></i></button> --}}
                                                    </form>
                                                </tr>

                                                <div class="modal fade" id="mod{{$item->id}}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                    Edit {{$item->program_name}} Here
                                                                </h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                            <form action="{{ action('DashController@update', $item->id) }}" method="POST">
                                                                <input type="hidden" name="_method" value="PUT">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="">
                                                                        <label>Faculty/Department Name</label>
                                                                        <div class="form-group has-icon-left">
                                                                            <div class="position-relative">
                                                                                <input type="text" name="program_name" value="{{$item->program_name}}" class="form-control" placeholder="eg. Administration / Math Department" id="first-name-icon" autofocus required>
                                                                                <div class="form-control-icon"><i class="fa fa-building"></i></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="">
                                                                        <label>Department</label>
                                                                        <fieldset class="form-group">
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
                                                                        </fieldset>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                                    </button>
                                                                    <button type="submit" name="update_action" value="program_update" class="btn btn-primary me-1 mb-1">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-danger">
                                    No Registered Programs Found
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6">
            <div class="card">
                {{-- <div class="card-header">
                    <h4>Add Room Type</h4>
                </div> --}}
                <div class="card-body">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Courses Here</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form action="{{action('DashController@store')}}" method="POST">
                                        @csrf 

                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label>Course Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" name="course_name" class="form-control" placeholder="eg. Research Methods 1" id="first-name-icon" required>
                                                            <div class="form-control-icon"><i class="fa fa-building"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Course Code</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" name="course_code" class="form-control" placeholder="eg. MIT201" id="first-name-icon"  required>
                                                            <div class="form-control-icon"><i class="fa fa-building"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- <div class="">
                                                    <label>Program</label>
                                                    <fieldset class="form-group">
                                                        <select name="dept" class="form-select" id="basicSelect">
                                                            @foreach ($programs as $prog)
                                                                @if($prog->del == 'no')
                                                                    @if ($prog->id == $item->department_id)
                                                                        <option value="{{$prog->id}}" selected>{{$prog->dept_name}}</option>
                                                                    @else
                                                                        <option value="{{$prog->id}}">{{$prog->program_name}}</option>
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </fieldset>
                                                </div> --}}

                                                <div class="col-md-4">
                                                    <label>Program</label>
                                                </div>

                                                <div class="col-md-8">
                                                    <fieldset class="form-group">
                                                        <select name="program_id" class="form-select" id="basicSelect">
                                                            @foreach ($programs as $prog)
                                                                @if($prog->del == 'no')
                                                                    <option value="{{$prog->id}}">{{$prog->program_name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Assign Lecturer</label>
                                                </div>

                                                <div class="col-md-8">
                                                    <fieldset class="form-group">
                                                        <select name="lect_id" class="form-select" id="basicSelect">
                                                            @foreach ($lecturer as $lect)
                                                                @if($lect->del == 'no')
                                                                    <option value="{{$lect->id}}">{{$lect->fname.' '.$lect->sname}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </fieldset>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" name="store_action" value="add_course" class="btn btn-primary me-1 mb-1">
                                                        <i class="fa fa-save"></i>&nbsp;&nbsp; Save course
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- User View -->
                        <div class="table-responsive">
                            @if (count($courses) > 0)
                                <table class="table mb-0 table-lg">
                                    <thead>
                                        <tr>
                                            <th>COURSE</th>
                                            <th class="float_right action_size">ACTION</th>
                                        </tr>
                                    </thead>   
                                    <tbody>
                                        @foreach ($courses as $item)
                                            @if ($item->del == 'yes')
                                                <tr class="del_danger">
                                            @else
                                                <tr>
                                            @endif
                                                    <td class="text-bold-500">{{ $item->course_code.' - '.$item->course_name }}<br><p class="small_p">{{ $item->program->program_name }}</p></td>
                                                    <form action="{{ action('DashController@update', $item->id) }}" method="POST">
                                                        {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                                        <input type="hidden" name="_method" value="PUT">
                                                        @csrf


                                                        @if ($item->del == 'yes')
                                                            <td class="text-bold-500 float_right">
                                                                <button type="submit" name="update_action" value="restore_course" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                            </td>
                                                        @else
                                                            <td class="text-bold-500 float_right">
                                                                <button type="button" data-bs-toggle="modal" data-bs-target="#mod2{{$item->id}}" class="my_trash"><i class="fa fa-pencil"></i></button>
                                                                <button type="submit" name="update_action" value="del_course" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                                                            </td>
                                                        @endif
                                                        {{-- <button type="submit" name="store_action" value="del_item" rel="tooltip" title="Delete Item" class="close2" onclick="return confirm('Are you sure you want to delete selected item?');"><i class="fa fa-close"></i></button> --}}
                                                    </form>
                                                </tr>


                                                <div class="modal fade" id="mod2{{$item->id}}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                    Edit {{$item->course_name}} Here
                                                                </h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                            <form action="{{ action('DashController@update', $item->id) }}" method="POST">
                                                                <input type="hidden" name="_method" value="PUT">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="">
                                                                        <label>Course Name</label>
                                                                        <div class="form-group has-icon-left">
                                                                            <div class="position-relative">
                                                                                <input type="text" name="course_name" value="{{$item->course_name}}" class="form-control" placeholder="eg. Statistics 1" id="first-name-icon" autofocus required>
                                                                                <div class="form-control-icon"><i class="fa fa-building"></i></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <label>Course Code</label>
                                                                        <div class="form-group has-icon-left">
                                                                            <div class="position-relative">
                                                                                <input type="text" name="course_code" value="{{$item->course_code}}" class="form-control" placeholder="eg. MIT201" id="first-name-icon" required>
                                                                                <div class="form-control-icon"><i class="fa fa-building"></i></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="">
                                                                        <label>Program</label>
                                                                        <fieldset class="form-group">
                                                                            <select name="program_id" class="form-select" id="basicSelect">
                                                                                @foreach ($programs as $prog)
                                                                                    @if($prog->del == 'no')
                                                                                        @if ($prog->id == $item->program_id)
                                                                                            <option value="{{$prog->id}}" selected>{{$prog->program_name}}</option>
                                                                                        @else
                                                                                            <option value="{{$prog->id}}">{{$prog->program_name}}</option>
                                                                                        @endif
                                                                                    @endif
                                                                                @endforeach
                                                                            </select>
                                                                        </fieldset>
                                                                    </div>

                                                                    <div class="">
                                                                        <label>Assign Lecturer</label>
                                                                        <fieldset class="form-group">
                                                                            <select name="lect_id" class="form-select" id="basicSelect">
                                                                                @foreach ($lecturer as $lect)
                                                                                    @if($lect->del == 'no')
                                                                                        @if ($lect->id == $item->staff_id)
                                                                                            <option value="{{$lect->id}}" selected>{{$lect->fname.' '.$lect->sname}}</option>
                                                                                        @else
                                                                                            <option value="{{$lect->id}}">{{$lect->fname.' '.$lect->sname}}</option>
                                                                                        @endif
                                                                                    @endif
                                                                                @endforeach
                                                                            </select>
                                                                        </fieldset>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                                    </button>
                                                                    <button type="submit" name="update_action" value="course_update" class="btn btn-primary me-1 mb-1">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-danger">
                                    No Registered Courses Found
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

 