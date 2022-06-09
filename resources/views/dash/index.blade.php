
@extends('layouts.dashlay')

@section('header_nav')
    @include('inc.header_nav')  
@endsection

@section('sidebar_menu')
    
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item active ">
                <a href="#" class='sidebar-link'>
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

            <li class="sidebar-item has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-cogs"></i>
                    <span>Settings</span>
                </a>
                <ul class="submenu">
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
        <h3>Statistics</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Staff</h6>
                                        <h6 class="font-extrabold mb-0">{{$staff}}</h6>
                                        <p></p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Students</h6>
                                        <h6 class="font-extrabold mb-0">{{$student}}</h6>
                                        <p></p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="fa fa-graduation-cap"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Examinations</h6>
                                        <h6 class="font-extrabold mb-0">{{$exam}}</h6>
                                        <p></p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="fa fa-graduation-cap"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
                <!-- Overview -->
                <div style="display: none" class="row my_row">

                    <h5>Overview</h5>
                    <!-- <div class="col-12"> -->
                        <div class="col-6 col-md-3 rooms_block" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                            <h6>G01</h6>
                            <p>Patric Ola Yawson</p>
                            <span class="room_date">{{ date('Y-m-d') }}</span>
                        </div>
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                            Reservation Details
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <p><span class="room_date">{{ date('Y-m-d') }}</span></p>
                                    </div>
                                    <div class="modal-body">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="tdl">Name</td>
                                                    <td><h6>Patric Ola Yawson</h6></td>
                                                </tr>
                                                <tr>
                                                    <td class="tdl">Contact</td>
                                                    <td><h6>00123889562377</h6></td>
                                                </tr>
                                                <tr>
                                                    {{-- <td><span class="room_date">{{ date('Y-m-d') }}</span></td> --}}
                                                </tr>
                                                <tr>
                                                    <td class="tdl">Room Type</td>
                                                    <td>
                                                        <select class="my_select">
                                                            <option>Executive</option>
                                                            <option>Classic</option>
                                                            <option>Normal</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tdl">Room Number</td>
                                                    <td>
                                                        <select class="my_select">
                                                            <option>G01</option>
                                                            <option selected>G02</option>
                                                            <option>G03</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tdl">Date</td>
                                                    <td>
                                                        <input type="date" class="my_input" value="{{ date('Y-m-d') }}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tdl">Checkin</td>
                                                    <td>
                                                        <select class="my_select">
                                                            <option>Yes</option>
                                                            <option>No</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tdl">Pmt. Status</td>
                                                    <td>
                                                        <button type="button" class="paid_btn"><i class="fa fa-check-square-o"></i>&nbsp; PAID</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="tdl">Pmt. Amount(¢)</td>
                                                    <td>
                                                        <input type="number" min="0" step="any" class="my_input" value="120.00">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary"
                                            data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="button" class="btn btn-primary ml-1"
                                            data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Save Changes</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3 rooms_block" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2">
                            <h6>G02</h6>
                            <p>Naa Kai</p>
                            <span class="room_date">{{ date('Y-m-d') }}</span>
                        </div>
                        <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                            Reservation Details 2
                                        </h5>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Croissant jelly-o halvah chocolate sesame snaps. Brownie
                                            caramels candy
                                            canes chocolate cake
                                            marshmallow icing lollipop I love. Gummies macaroon donut
                                            caramels
                                            biscuit topping danish.
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light-secondary"
                                            data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Close</span>
                                        </button>
                                        <button type="button" class="btn btn-primary ml-1"
                                            data-bs-dismiss="modal">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Accept</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-6 col-md-3 rooms_block">
                            <h6>G03</h6>
                            <p></p>
                            <span class="room_date"></span>
                        </div>
                        <div class="col-6 col-md-3 rooms_block">
                            <h6>G04</h6>
                            <p>John Doe</p>
                            <span class="room_date">{{ date('Y-m-d') }}</span>
                        </div>


                        <div class="col-6 col-md-3 rooms_block">
                            <h6>FF01</h6>
                            <p></p>
                            <span class="room_date"></span>
                        </div>
                        <div class="col-6 col-md-3 rooms_block">
                            <h6>FF02</h6>
                            <p></p>
                            <span class="room_date"></span>
                        </div>
                        <div class="col-6 col-md-3 rooms_block">
                            <h6>FF03</h6>
                            <p>Julia Blakes</p>
                            <span class="room_date">{{ date('Y-m-d') }}</span>
                        </div>
                        <div class="col-6 col-md-3 rooms_block">
                            <h6>FF04</h6>
                            <p></p>
                            <span class="room_date"></span>
                        </div>


                    <!-- Must be deleted -->
                    
                    <div class="col-6 col-md-3 rooms_block">
                        <h6>FF03</h6>
                        <p>Julia Blakes</p>
                        <span class="room_date">{{ date('Y-m-d') }}</span>
                    </div>
                    <div class="col-6 col-md-3 rooms_block">
                        <h6>FF01</h6>
                        <p></p>
                        <span class="room_date"></span>
                    </div>
                    <div class="col-6 col-md-3 rooms_block">
                        <h6>FF02</h6>
                        <p></p>
                        <span class="room_date"></span>
                    </div>
                    <div class="col-6 col-md-3 rooms_block">
                        <h6>FF04</h6>
                        <p></p>
                        <span class="room_date"></span>
                    </div>

                    <div class="col-6 col-md-3 rooms_block" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                        <h6>G01</h6>
                        <p>Patric Ola Yawson</p>
                        <span class="room_date">{{ date('Y-m-d') }}</span>
                    </div>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        Reservation Details
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <p><span class="room_date">{{ date('Y-m-d') }}</span></p>
                                </div>
                                <div class="modal-body">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="tdl">Name</td>
                                                <td><h6>Patric Ola Yawson</h6></td>
                                            </tr>
                                            <tr>
                                                <td class="tdl">Contact</td>
                                                <td><h6>00123889562377</h6></td>
                                            </tr>
                                            <tr>
                                                {{-- <td><span class="room_date">{{ date('Y-m-d') }}</span></td> --}}
                                            </tr>
                                            <tr>
                                                <td class="tdl">Room Type</td>
                                                <td>
                                                    <select class="my_select">
                                                        <option>Executive</option>
                                                        <option>Classic</option>
                                                        <option>Normal</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tdl">Room Number</td>
                                                <td>
                                                    <select class="my_select">
                                                        <option>G01</option>
                                                        <option selected>G02</option>
                                                        <option>G03</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tdl">Date</td>
                                                <td>
                                                    <input type="date" class="my_input" value="{{ date('Y-m-d') }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tdl">Checkin</td>
                                                <td>
                                                    <select class="my_select">
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tdl">Pmt. Status</td>
                                                <td>
                                                    <button type="button" class="paid_btn"><i class="fa fa-check-square-o"></i>&nbsp; PAID</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tdl">Pmt. Amount(¢)</td>
                                                <td>
                                                    <input type="number" min="0" step="any" class="my_input" value="120.00">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="button" class="btn btn-primary ml-1"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Save Changes</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 rooms_block" data-bs-toggle="modal" data-bs-target="#exampleModalCenter2">
                        <h6>G02</h6>
                        <p>Naa Kai</p>
                        <span class="room_date">{{ date('Y-m-d') }}</span>
                    </div>
                    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">
                                        Reservation Details 2
                                    </h5>
                                    <button type="button" class="close" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Croissant jelly-o halvah chocolate sesame snaps. Brownie
                                        caramels candy
                                        canes chocolate cake
                                        marshmallow icing lollipop I love. Gummies macaroon donut
                                        caramels
                                        biscuit topping danish.
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="button" class="btn btn-primary ml-1"
                                        data-bs-dismiss="modal">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Accept</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-6 col-md-3 rooms_block">
                        <h6>G03</h6>
                        <p></p>
                        <span class="room_date"></span>
                    </div>
                    <div class="col-6 col-md-3 rooms_block">
                        <h6>G04</h6>
                        <p>John Doe</p>
                        <span class="room_date">{{ date('Y-m-d') }}</span>
                    </div>
                    
                    <!-- Deletion ends here -->


                    <!-- </div> -->
                </div>


            </div>
            <!-- Chart Here -->
            {{-- <div class="col-12 col-lg-3">

                <div class="card">
                    <div class="card-header">
                        <h4>Chart Here</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-visitors-profile"></div>
                    </div>
                </div>
            </div> --}}
        </section>
    </div>

@endsection

 