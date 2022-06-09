
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
                    <li class="submenu-item ">
                        <a href="/companysetup">Company Setup</a>
                    </li>
                    <li class="submenu-item active">
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
                                <h4 class="card-title">Add User Here</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form action="{{action('DashController@store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf 

                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label>Username</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" name="name" class="form-control" placeholder="Name" id="first-name-icon" autofocus required>
                                                            <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="email" class="form-control" name="email" placeholder="Email" id="first-name-icon" required>
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
                                                    <label>Password</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                                                            <div class="form-control-icon"><i class="bi bi-lock"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <label>Confirm Password</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                                            <div class="form-control-icon"><i class="bi bi-lock"></i></div>
                                                        </div>
                                                    </div>
                                                </div>

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

                                                {{-- <div class="form-group col-md-8 offset-md-4">
                                                    <div class='form-check'>
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox2"
                                                                class='form-check-input' checked>
                                                            <label for="checkbox2">Remember Me</label>
                                                        </div>
                                                    </div>
                                                </div> --}}

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" name="store_action" value="create_user" class="btn btn-primary me-1 mb-1">Submit</button>
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
                        @if (count($users) > 0)
                            <table class="table mb-0 table-lg">
                                <thead>
                                    <tr>
                                        <th>NAME</th>
                                        <th>CONTACT</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach ($users as $user)
                                        @if ($user->del == 'no')
                                            <tr>
                                                @if ($user->status == 'Administrator' or $user->status == 'user')
                                                    <td class="text-bold-500"><img src="/storage/classified/users/{{$user->pass_photo}}" width="30px" style="border-radius: 50%">&nbsp; {{ $user->name }}</td>
                                                @elseif ($user->status == 'Lecturer')
                                                    <td class="text-bold-500"><img src="/storage/classified/staff/{{$user->staff->pass_photo}}" width="30px" style="border-radius: 50%">&nbsp; {{ $user->name }}</td>
                                                @else
                                                    <td class="text-bold-500"><img src="/storage/classified/users/{{$user->pass_photo}}" width="30px" style="border-radius: 50%">&nbsp; {{ $user->name }}</td>
                                                @endif
                                                <td>{{ $user->contact }}<br><p class="small_p">{{ $user->email }}</p></td>
                                                <form action="{{ action('DashController@destroy', $user->id) }}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                                                    @csrf

                                                    <td class="text-bold-500"><button type="submit" name="del_action" value="del_user" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button></td>
                                                    {{-- <button type="submit" name="store_action" value="del_item" rel="tooltip" title="Delete Item" class="close2" onclick="return confirm('Are you sure you want to delete selected item?');"><i class="fa fa-close"></i></button> --}}
                                                </form>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <tr><td>No User Found</td></tr>
                        @endif
                    </div>

                </div>


            </div>
        </div>
    </div>

@endsection

 