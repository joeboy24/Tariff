
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

            {{-- <li class="my_sidebar-item has-sub active">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-desktop"></i>
                    <span>Virtual Classroom</span>
                </a>
                <ul class="submenu active">
                    <li class="submenu-item ">
                        <a href="/sslides">Slides</a>
                    </li>
                    <li class="submenu-item active">
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
        <form action="{{ action('StdDashController@update', auth()->user()->student_id) }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <button onclick="get_gen_ans()" type="submit" name="update_action" value="submit_exam" class="btn_red_inverse"><i class="fa fa-save"></i>&nbsp;&nbsp;Submit Exam</button>&nbsp;&nbsp;
            <span class="small_p"><i class="fa fa-warning"></i>&nbsp;&nbsp;Note: Refusal to submit exam after 5 minutes may attract a score of 0.</span>
            
            <h2 id="countdown_text"></h2>
            <input type="hidden" name="gen_ans_val" id="gen_ans{{$exam->id}}"> 
        </form>
    </div>

@endsection

<script>
    // if (sessionStorage.getItem('ex_complete') == 'yes') {
    //     // sessionStorage.setItem('ex_complete', 'no');
    //     window.location.replace("/sexamview");
    // }
    function get_gen_ans() {
        // sessionStorage.setItem('ex_complete', 'yes');
        document.getElementById('gen_ans{{$exam->id}}').value = sessionStorage.getItem("final_ans1{{$exam->id}}");
    }
</script>

 