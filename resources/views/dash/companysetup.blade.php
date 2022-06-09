
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

        <li class="sidebar-item">
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
                <li class="submenu-item active">
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
                <li class="submenu-item">
                    <a href="/add_staff">Add Staff</a>
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
        <h3>Company Setup</h3>
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
                                <h4 class="card-title">Provide Company Details</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal" action="{{action('DashController@store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            @if (count($company) < 1)
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <label>Company Name</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input name="name" type="text" class="form-control" placeholder="Name" id="first-name-icon" required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Location</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input name="loc" type="text" class="form-control" placeholder="City" id="first-name-icon" required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <label>Address</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <div class="form-group with-title mb-3">
                                                                    <textarea name="company_add" class="form-control" rows="3" required></textarea>
                                                                    {{-- <textarea name="company_add" class="form-control" rows="3" placeholder="Address" required></textarea> --}}
                                                                    <label>Provide Address in Full</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Contact</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input name="contact" type="number" class="form-control" placeholder="Mobile" required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-phone"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input name="email" type="email" class="form-control" placeholder="Email" id="first-name-icon" required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-envelope"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Logo</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group mb-3">
                                                                <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                                                <input name="company_logo" type="file" class="form-control" id="inputGroupFile01" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Website</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input name="company_web" type="text" class="form-control" placeholder="Website" id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1" name="store_action" value="admi_config">Submit</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            @else
                                                @foreach ($company as $comp)
                                                <div class="row">

                                                    <div class="col-md-4">
                                                        <label>Company Name</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input name="name" type="text" class="form-control" placeholder="Name" id="first-name-icon" value="{{$comp->name}}" required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Location</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input name="loc" type="text" class="form-control" placeholder="City" id="first-name-icon" value="{{$comp->location}}" required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        <label>Address</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <div class="form-group with-title mb-3">
                                                                    <textarea name="company_add" class="form-control" rows="3" required>{{$comp->comp_add}}</textarea>
                                                                    {{-- <textarea name="company_add" class="form-control" rows="3" placeholder="Address" required></textarea> --}}
                                                                    <label>Provide Address in Full</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Contact</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input name="contact" type="text" class="form-control" placeholder="Mobile" value="{{$comp->contact}}" required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-phone"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input name="email" type="email" class="form-control" placeholder="Email" id="first-name-icon" value="{{$comp->email}}" required>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-envelope"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Logo</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group mb-3">
                                                                <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                                                <input name="company_logo" type="file" class="form-control" id="inputGroupFile01" value="{{$comp->logo}}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label>Website</label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input name="company_web" type="text" class="form-control" placeholder="Website" id="first-name-icon" value="{{$comp->website}}">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" class="btn btn-primary me-1 mb-1" name="store_action" value="admi_config">Update</button>
                                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Company View -->
                    {{-- <div class="table-responsive">
                        <table class="table mb-0 table-lg">
                            <thead>
                                <tr>
                                    <th>NAME</th>
                                    <th>EMAIL</th>
                                    <th>MOBILE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-bold-500"><i class="fa fa-user"></i>&nbsp; Kwaku Frimpong</td>
                                    <td>ajkfimps@pivoapps.net</td>
                                    <td>00172936756780</td>
                                    <td class="text-bold-500"><button class="my_trash"><i class="fa fa-trash"></i></button></td>

                                </tr>
                                <tr>
                                    <td class="text-bold-500"><i class="fa fa-user"></i>&nbsp; Bawus</td>
                                    <td>bawus72@pivoapps.net</td>
                                    <td>00175677293680</td>
                                    <td class="text-bold-500"><button class="my_trash"><i class="fa fa-trash"></i></button></td>

                                </tr>
                            </tbody>
                        </table>
                    </div> --}}

                </div>


            </div>
        </div>
    </div>

@endsection

 