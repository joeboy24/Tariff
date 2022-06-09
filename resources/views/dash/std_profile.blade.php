
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

            <li class="my_sidebar-item active">
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
        <h2>Profile</h2>
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

                            <div class="profile_img">
                                <img src="/storage/classified/student/{{$student->photo}}" width="100%" style="border-radius: 50%">
                            </div>
                            <p><h5 class="center_text">{{ $student->fname.' '.$student->sname }}</h5>
                                <p class="small_p center_text" style="margin-top: -10px">{{ $student->program->program_name }}</p>
                            </p>

                            <div class="">
                              <form action="{{ action('StdDashController@update', $student->id) }}" method="POST">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                                <table class="my_table">  
                                    <tbody>
                                        <tr>
                                            <td class="gray_p">Student ID</td>
                                            <td class="text-bold-500"><input type="text" name="std_id" value="{{ $student->std_id }}" disabled></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="gray_p">Index Number</td>
                                            <td class="text-bold-500"><input type="text" name="index_no" value="{{ $student->index_no }}" disabled></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="gray_p">Program</td>
                                            <td class="text-bold-500"><input type="text" name="program" value="{{ $student->program->program_name }}" disabled></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="gray_p">Level</td>
                                            <td class="text-bold-500"><input type="text" name="class" value="Year {{ $student->class }}" disabled></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="gray_p">Contact</td>
                                            <td class="text-bold-500"><input type="text" name="contact" value="{{ $student->contact }}"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="gray_p">Email</td>
                                            <td class="text-bold-500"><input type="text" name="email" value="{{ $student->email }}"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="gray_p">School's Contact</td>
                                            <td class="text-bold-500"><input type="text" name="sch_contact" value="{{ $student->sch_contact }}" disabled></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="gray_p">School's Email</td>
                                            <td class="text-bold-500"><input type="text" name="sch_email" value="{{ $student->sch_email }}" disabled></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="gray_p">City</td>
                                            <td class="text-bold-500"><input type="text" name="residence" value="{{ $student->residence }}"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="gray_p">Residencial Address</td>
                                            <td class="text-bold-500"><textarea rows="2" name="res_address">{{ $student->res_address }}</textarea></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="gray_p">Guardian</td>
                                            <td class="text-bold-500"><input type="text" name="guardian" value="{{ $student->guardian }}" disabled></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="gray_p">Relation</td>
                                            <td class="text-bold-500"><input type="text" name="guard_rel" value="{{ $student->guard_rel }}" disabled></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="gray_p">Guardian's Contact</td>
                                            <td class="text-bold-500"><input type="text" name="guardian_cont" value="{{ $student->guardian_cont }}" disabled></td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="gray_p">Change Password</td>
                                            <td class="text-bold-500"><input type="password" name="password" placeholder="Type new password here"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" name="update_action" value="update_std_student" class="btn_red_inverse float_right2"><i class="fa fa-save"></i>&nbsp;&nbsp;UPDATE PROFILE</button>
                              </form>
                            </div>

                            {{-- <div class="alert alert-danger">
                                No Staff Records Found 
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

 