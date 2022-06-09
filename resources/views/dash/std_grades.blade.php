
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

            <li class="my_sidebar-item active">
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
        <h2>Exams & Quizes</h2>
    </div>

    

    <div class="row">

        <div class="col-12 col-xl-10">
            @include('inc.messages')

            <div class="col-12">
                <div class="card">
                    <p></p>
                    <div class="card-content">

                        <div class="col-12 col-xl-12">
                            <div class="card-body">
                                <div class="table-responsive">
                                    @if (count($exams) > 0)
                                        <table class="table mb-0 table-lg">
                                            <tbody>
                                                @foreach ($exams as $exam)
                                                    @if ($exam->course->program->id == auth()->user()->student->program->id)
                                                        <tr> 
                                                            <td class="text-bold-500">
                                                                <p class="small_p_green"><i class="fa fa-clock-o"></i>&nbsp; {{ $exam->duration }} mins</p>
                                                                {{ $exam->exam_title }}
                                                                <p class="small_p">{{ $exam->course->course_code.' - '.$exam->course->course_name }}</p>
                                                            </td>

                                                            <form action="{{ action('StdDashController@update', $exam->id) }}" method="POST">
                                                                <input type="hidden" name="_method" value="PUT">
                                                                @csrf
                                                                
                                                                <td class="text-bold-500 action_size2">
                                                                    @foreach ($eSub as $item)
                                                                        @if ($item->exam_id == $exam->id)
                                                                            <button type="button" class="btn_green float_right2"><i class="fa fa-check"></i>&nbsp; Score - {{ $item->score.'/'.$exam->no_of_qs }}</button>
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                            </form>
                                                        </tr>
                                                    @endif

                                                @endforeach
                                            </tbody>
                                        </table>
                                    @else
                                        <div class="alert alert-danger">
                                            No Exam/Quizes Found 
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

 