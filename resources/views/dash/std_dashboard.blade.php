
@extends('layouts.dashlay')

@section('header_nav')
    @include('inc.header_nav')  
@endsection

@section('sidebar_menu')
    
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="my_sidebar-item active">
                <a href="/sdashboard" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="my_sidebar-item">
                <a href="/sprofile" class='sidebar-link'>
                    <i class="fa fa-address-book"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li class="my_sidebar-item">
                <a href="/sregister_course" class='sidebar-link'>
                    <i class="fa fa-book"></i>
                    <span>Course Registration</span>
                </a>
            </li>

            <li class="my_sidebar-item">
                <a href="/sreg_slip" class='sidebar-link'>
                    <i class="fa fa-download"></i>
                    <span>Registration Slip</span>
                </a>
            </li>

            <li class="my_sidebar-item">
                <a href="/sexam" class='sidebar-link'>
                    <i class="fa fa-edit"></i>
                    <span>Exams & Quizes</span>
                </a>
            </li>

            <li class="my_sidebar-item">
                <a href="/sslides" class='sidebar-link'>
                    <i class="fa fa-desktop"></i>
                    <span>Slides</span>
                </a>
            </li>

            {{-- <li class="my_sidebar-item has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-desktop"></i>
                    <span>Virtual Classroom</span>
                </a>
                <ul class="submenu">
                    <li class="submenu-item ">
                        <a href="/sslides">Slides</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/sexam">Exams & Quizes</a>
                    </li>
                </ul>
            </li> --}}

            <li class="my_sidebar-item">
                <a href="/suploads" class='sidebar-link'>
                    <i class="fa fa-upload"></i>
                    <span>Uploads</span>
                </a>
            </li>

            <li class="my_sidebar-item">
                <a href="/sgrades" class='sidebar-link'>
                    <i class="fa fa-graduation-cap"></i>
                    <span>My Grades</span>
                </a>
            </li>

        </ul>
    </div>

@endsection

@section('content')

    <div class="page-heading">
        <h2>Dashboard</h2>
    </div>

    

    <div class="row">

        <div class="col-12 col-xl-10">
            @include('inc.messages')

            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">Upload lecture slides, diagrams, course materials etc.</h4>
                    </div> --}}
                    <p></p>
                    <div class="card-content">
                        <div class="card-body">

                            <div id="panel_group" class="row">

                                <a class="std_icon_a col-md-4" href="/sprofile">
                                    <p><button class="mybtn"><i class="fa fa-address-book std_icon"></i></button></p>
                                    <h6>PROFILE</h6>
                                </a>
                        
                                <a class="std_icon_a col-md-4" href="sregister_course">
                                    <p><button class="mybtn"><i class="fa fa-book std_icon"></i></button></p>
                                    <h6>COURSE REGISTRATION</h6>
                                </a>
                        
                                <a class="std_icon_a col-md-4" href="/sreg_slip">
                                    <p><button class="mybtn"><i class="fa fa-download std_icon"></i></button></p>
                                    <h6>REGISTRATION SLIP</h6>
                                </a>
                        
                                <a class="std_icon_a col-md-4" href="/svclassroom">
                                    <p><button class="mybtn"><i class="fa fa-desktop std_icon"></i></button></p>
                                    <h6>VIRTUAL CLASSROOM</h6>
                                </a>

                                <a class="std_icon_a col-md-4" href="/suploads">
                                    <p><button class="mybtn"><i class="fa fa-upload std_icon"></i></button></p>
                                    <h6>UPLOADS</h6>
                                </a>
                        
                                <a class="std_icon_a col-md-4" href="/sgrades">
                                    <p><button class="mybtn"><i class="fa fa-graduation-cap std_icon"></i></button></p>
                                    <h6>MY GRADES</h6>
                                </a>
                        
                                {{-- <a class="std_icon_a col-md-4" href="/luploads">
                                    <p><button class="mybtn"><i class="fa fa-book std_icon"></i></button></p>
                                    <h6>SLIDES</h6>
                                </a> --}}
                        
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

 