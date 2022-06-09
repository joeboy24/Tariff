
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

            <li class="my_sidebar-item active">
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
        <h2>Slides</h2>
    </div>

    

    <div class="row">

        <div class="col-12 col-xl-10">
            @include('inc.messages')

            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">Upload lecture slides, diagrams, course materials etc.</h4>
                        <br><p class="small_p"></p>
                    </div> --}}
                    <p></p>
                    <div class="card-content">
                        <div class="card-body">

                            <!-- MyUploads View -->
                            {{-- <div class="row">
                                <div class="col-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-body"> --}}
                                            {{-- <p class="small_p">Download lecture slides from this section</p> --}}
                                            <div class="table-responsive">
                                                @if (count($myuploads) > 0)
                                                    <table class="table mb-0 table-lg">
                                                        {{-- <thead>
                                                            <tr>
                                                                <th>EXAM TITLE</th>
                                                                <th>SUBMITTED</th>
                                                                <th>ACTION</th>
                                                            </tr>
                                                        </thead>    --}}
                                                        <tbody>
                                                            @foreach ($myuploads as $myupload)
                                                                <tr>
                                                                    {{-- <td class="text-bold-500">{{ $myupload->course->course_code.' - '.$myupload->course->course_name }}</td> --}}
                                                                    <td class="text-bold-500">
                                                                        {{ $myupload->title }}
                                                                        <p class="small_p">{{ $myupload->course->course_code.' - '.$myupload->course->course_name }}</p>
                                                                    </td>

                                                                    <form action="{{ action('DashController@update', $myupload->id) }}" method="POST">
                                                                        <input type="hidden" name="_method" value="PUT">
                                                                        @csrf
                                                                        
                                                                        <td class="text-bold-500 action_size2">
                                                                            <a href="/storage/classified/lect_uploads/{{$myupload->photo}}"><button type="button" class="my_trash float_right2"><i class="fa fa-download"></i></button></a>
                                                                        </td>
                                                                    </form>
                                                                </tr>

                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                @else
                                                    <div class="alert alert-danger">
                                                        No Lecture Slides Found 
                                                    </div>
                                                @endif
                                            </div>
                                        {{-- </div>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

 