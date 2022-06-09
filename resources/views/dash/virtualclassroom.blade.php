
@extends('layouts.dashlay')

@section('header_nav')
    @include('inc.header_nav')  
@endsection

@section('sidebar_menu')
    
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="my_sidebar-item">
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
        <h2>Virtual Classroom</h2>
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
                                <a class="panel_a col-md-6" href="/sslides">
                                    <div class="col-md-12 dash_panel myRed">
                                        <h3><i class="fa fa-book"></i> &nbsp; Slides</h3>
                                        <p>12</p>
                                    </div>
                                </a>
                                <a class="panel_a col-md-6" href="/sexam">
                                    <div class="col-md-12 dash_panel myVio">
                                        <h3><i class="fa fa-question"></i> &nbsp; Quizes</h3>
                                        <p>72</p>
                                    </div>
                                </a>
                            </div>

                                {{-- <form action="{{ action('StdDashController@store') }}" method="POST">
                                    @csrf
                                    <p></p>
                        
                                    <div class="col-md-8 offset-md-2">
                                        <div class="input-group mb-8">
                                            <label class="input-group-text" for="sel1">Select Year</label>
                                            <select name="year" class="form-select" id="sel1">
                                                @for ($i = 1; $i <= auth()->user()->student->class; $i++)
                                                    <option value="{{$i}}">Year {{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div><p></p>
                        
                                    <div class="col-md-8 offset-md-2">
                                        <div class="input-group mb-8">
                                            <label class="input-group-text" for="sel1">Semester</label>
                                            <select name="sem" class="form-select" id="sel1">
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                        </div><p></p>

                                        <button type="submit" name="store_action" value="std_reg_load" class="btn_red_inverse float_right2"><i class="fa fa-download"></i>&nbsp;&nbsp;DOWNLOAD</button>
                                    </div>

                                </form> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

 