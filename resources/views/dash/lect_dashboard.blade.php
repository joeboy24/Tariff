
@extends('layouts.dashlay')

@section('header_nav')
    @include('inc.header_nav')  
@endsection

@section('sidebar_menu')
    
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item active">
                <a href="/ldashboard" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
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
                <ul class="submenu">
                    <li class="submenu-item">
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
        <h2>Dashboard</h2>
    </div>

    <div id="panel_group" class="row">
        <a class="panel_a col-md-3" href="/lprofile">
            <div class="col-md-12 dash_panel myGreen">
                <h3><i class="fa fa-address-book"></i> &nbsp; Profile</h3>
                
            </div>
        </a>
        <a class="panel_a col-md-3" href="/luploads">
            <div class="col-md-12 dash_panel myRed">
                <h3><i class="fa fa-upload"></i> &nbsp; Uploads</h3>
                <p>{{$my_ups}}</p>
            </div>
        </a>
        <a class="panel_a col-md-3" href="/lexam">
            <div class="col-md-12 dash_panel myVio">
                <h3><i class="fa fa-question"></i> &nbsp; Quizes</h3>
                <p>{{$quizes}}</p>
            </div>
        </a>
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
                            {{-- <div class="row">
                                <div class="col-md-4 dash_panel myRed">
                                    <h3><i class="fa fa-book"></i> &nbsp; Slides</h3>
                                    <p>12</p>
                                </div>
                                <div class="col-md-4 dash_panel myVio">
                                    <h3><i class="fa fa-question"></i> &nbsp; Quizes</h3>
                                    <p>72</p>
                                </div>
                                <div class="col-md-4 dash_panel myGreen">
                                    <h3><i class="fa fa-question"></i> &nbsp; Quizes</h3>
                                    <p>72</p>
                                </div>
                                    Hello
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

 