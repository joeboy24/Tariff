
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
                    <li class="submenu-item active">
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
        <div class="col-12 col-xl-10">
            @include('inc.messages')
            <div class="card">
                {{-- <div class="card-header">
                    <h4>Add Room Type</h4>
                </div> --}}
                <div class="card-body">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Departments Here</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form action="{{action('DashController@store')}}" method="POST">
                                        @csrf 

                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label>Faculty/Department Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" name="dept_name" class="form-control" placeholder="eg. Administration / Math Department" id="first-name-icon" autofocus required>
                                                            <div class="form-control-icon"><i class="fa fa-building"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" name="store_action" value="add_faculty" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User View -->
                    <div class="table-responsive">
                        @if (count($dept) > 0)
                            <table class="table mb-0 table-lg">
                                <thead>
                                    <tr>
                                        <th>DEPARTMENTS</th>
                                        <th class="float_right">ACTION</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach ($dept as $item)
                                        @if ($item->del == 'yes')
                                            <tr class="del_danger">
                                        @else
                                            <tr>
                                        @endif
                                                <td class="text-bold-500">{{ $item->dept_name }}</td>
                                                <form action="{{ action('DashController@update', $item->id) }}" method="POST">
                                                    {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                                    <input type="hidden" name="_method" value="PUT">
                                                    @csrf


                                                    @if ($item->del == 'yes')
                                                        <td class="text-bold-500 float_right">
                                                            <button type="submit" name="update_action" value="restore_dept" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                        </td>
                                                    @else
                                                        <td class="text-bold-500 float_right">
                                                            <button type="button" data-bs-toggle="modal" data-bs-target="#mod{{$item->id}}" class="my_trash"><i class="fa fa-pencil"></i></button>
                                                            <button type="submit" name="update_action" value="del_dept" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
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
                                                                Edit {{$item->dept_name}} Here
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
                                                                            <input type="text" name="dept_name" value="{{$item->dept_name}}" class="form-control" placeholder="eg. Administration / Math Department" id="first-name-icon" autofocus required>
                                                                            <div class="form-control-icon"><i class="fa fa-building"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="submit" name="update_action" value="faculty_update" class="btn btn-primary me-1 mb-1">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $dept->links() }}
                        @else
                            <div class="alert alert-danger">
                                No Records Found on Departments
                            </div>
                        @endif
                    </div>

                </div>


            </div>
        </div>
    </div>

@endsection

 