
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
                    <li class="submenu-item active">
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
        <h3>Programs & Course Overview</h3>
        <p class="small_p_black">Edit, Delete & Register Courses to Related Programs</p>
    </div>


    <div class="row">
        <div class="col-12 col-xl-10">
        @include('inc.messages')
            <div class="card">
                <div class="card-body">

                    <div class="col-12">

                        <!-- Program View -->
                        <div class="table-responsive">
                            @if (count($programs) > 0)
                                <table class="table mb-0 table-lg">
                                    <tbody>
                                        @foreach ($programs as $item)
                                            @if ($item->del == 'yes')
                                                <tr class="col-12 col-xl-6 del_danger">
                                            @else
                                                <tr class="col-12 col-xl-6">
                                            @endif
                                                <td class="text-bold-500"><h5>{{ $item->program_name }}</h5>
                                                    <p class="small_p">{{ $item->department->dept_name }}</p>
                                                </td>
                                                <form action="{{ action('DashController@update', $item->id) }}" method="POST">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    @csrf
                                                    @if ($item->del == 'yes')
                                                        <td class="text-bold-500 action_size_big float_right">
                                                            <button type="submit" name="update_action" value="restore_program" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                        </td>
                                                    @else
                                                        <td class="text-bold-500 action_size_big float_right">
                                                            <a href="/admincr/{{$item->id}}"><button type="button" name="showTry" value="regMe" class="my_trash_small">Register</button></a>
                                                            {{-- <p class="nullP"><a href="#"><button type="button" class="my_trash_small">Register</button></a></p> --}}
                                                            <button onclick="func_sub{{$item->id}}()" type="button" class="my_trash"><i class="fa fa-folder-open"></i></button>
                                                            <button type="button" data-bs-toggle="modal" data-bs-target="#mod{{$item->id}}" class="my_trash"><i class="fa fa-pencil"></i></button>
                                                            <button type="submit" name="update_action" value="del_program" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                    @endif
                                                    {{-- <button type="submit" name="store_action" value="del_item" rel="tooltip" title="Delete Item" class="close2" onclick="return confirm('Are you sure you want to delete selected item?');"><i class="fa fa-close"></i></button> --}}
                                                </form>
                                                <script>
                                                    function func_sub{{$item->id}}() {
                                                        // document.getElementById("reg").style.display = "block";
                                                        document.getElementById("sub").style.display = "none";
                                                    }
                                                </script>
                                            </tr>
                                                
                                            @foreach ($item->course as $sub_items)
                                            
                                                @if ($sub_items->del == 'yes')
                                                  <tr id="sub{{$item->course_code}}" class="del_danger cust_row subjects_min">
                                                @else
                                                  <tr id="sub{{$item->course_code}}" class="cust_row subjects_min">
                                                    <div>
                                                @endif
                                                    <td class="text-bold-500 space_left">{{ $sub_items->course_code.' - '.$sub_items->course_name }}<br>
                                                        {{-- <p class="small_p">{{ $sub_items->program->program_name }}</p> --}}
                                                    </td>
                                                    <form action="{{ action('DashController@update', $sub_items->id) }}" method="POST">
                                                        {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                                        <input type="hidden" name="_method" value="PUT">
                                                        @csrf


                                                        @if ($sub_items->del == 'yes')
                                                            <td class="text-bold-500 action_size float_right">
                                                                <button type="submit" name="update_action" value="restore_course" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                            </td>
                                                        @else
                                                            <td class="text-bold-500 action_size float_right">
                                                                <button type="button" data-bs-toggle="modal" data-bs-target="#mod3{{$sub_items->id}}" class="my_trash"><i class="fa fa-pencil"></i></button>
                                                                <button type="submit" name="update_action" value="del_course" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                                                            </td>
                                                        @endif
                                                        {{-- <button type="submit" name="store_action" value="del_item" rel="tooltip" title="Delete Item" class="close2" onclick="return confirm('Are you sure you want to delete selected item?');"><i class="fa fa-close"></i></button> --}}
                                                    </form>
                                                </tr>

                                                <div class="modal fade" id="mod3{{$sub_items->id}}" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                    Edit - {{$sub_items->course_name}}
                                                                </h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i class="fa fa-times"></i>
                                                                </button>
                                                            </div>
                                                            <form action="{{ action('DashController@update', $sub_items->id) }}" method="POST">
                                                                <input type="hidden" name="_method" value="PUT">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="">
                                                                        <label>Course Name</label>
                                                                        <div class="form-group has-icon-left">
                                                                            <div class="position-relative">
                                                                                <input type="text" name="course_name" value="{{$sub_items->course_name}}" class="form-control" placeholder="eg. Statistics 1" id="first-name-icon" autofocus required>
                                                                                <div class="form-control-icon"><i class="fa fa-building"></i></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="">
                                                                        <label>Course Code</label>
                                                                        <div class="form-group has-icon-left">
                                                                            <div class="position-relative">
                                                                                <input type="text" name="course_code" value="{{$sub_items->course_code}}" class="form-control" placeholder="eg. MIT201" id="first-name-icon" required>
                                                                                <div class="form-control-icon"><i class="fa fa-building"></i></div>
                                                                            </div>
                                                                        </div>
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

                                            <div class="modal fade" id="mod{{$item->id}}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                Edit - {{$item->program_name}}
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
                                {{ $programs->links() }}
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
            
        </div>
    </div>

@endsection

 