
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
        <h2 id="countdown_text">
            {{ $exam->duration }}
        </h2>
    </div>

    {{-- <div class="row">

        <div class="col-12 col-xl-10">
            @include('inc.messages')

            <div class="col-12">
                <div class="card">
                    <!--div class="card-header">
                        <h4 class="card-title">Upload lecture slides, diagrams, course materials etc.</h4>
                    </div-->
                    <p></p>
                    <div class="card-content">
                        <div class="card-body">

                            <div id="panel_group" class="row">

                                <a class="std_icon_a col-md-4" href="/luploads">
                                    <p><button class="mybtn"><i class="fa fa-address-book std_icon"></i></button></p>
                                    <h6>PROFILE</h6>
                                </a>
                        
                                <a class="std_icon_a col-md-4" href="/luploads">
                                    <p><button class="mybtn"><i class="fa fa-book std_icon"></i></button></p>
                                    <h6>COURSE REGISTRATION</h6>
                                </a>
                        
                                <a class="std_icon_a col-md-4" href="/luploads">
                                    <p><button class="mybtn"><i class="fa fa-download std_icon"></i></button></p>
                                    <h6>REGISTRATION SLIP</h6>
                                </a>
                        
                                <a class="std_icon_a col-md-4" href="/luploads">
                                    <p><button class="mybtn"><i class="fa fa-desktop std_icon"></i></button></p>
                                    <h6>VIRTUAL CLASSROOM</h6>
                                </a>

                                <a class="std_icon_a col-md-4" href="/luploads">
                                    <p><button class="mybtn"><i class="fa fa-upload std_icon"></i></button></p>
                                    <h6>UPLOADS</h6>
                                </a>
                        
                                <a class="std_icon_a col-md-4" href="/luploads">
                                    <p><button class="mybtn"><i class="fa fa-graduation-cap std_icon"></i></button></p>
                                    <h6>MY GRADES</h6>
                                </a>
                        
                                <!--a class="std_icon_a col-md-4" href="/luploads">
                                    <p><button class="mybtn"><i class="fa fa-book std_icon"></i></button></p>
                                    <h6>SLIDES</h6>
                                </a-->
                        
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}

    <div class="row">

        <div class="col-12 col-xl-10">
            @include('inc.messages')

            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        {{-- @if (count($questions) > 0) --}}
                            {{-- @foreach ($questions as $que) --}}

                                <div class="col-12 exam_view lineBr">
                                    <p>Question {{$eSub->que_count + 1}}</p>

                                    @if ($que->que_inst != "")
                                        <p class="small_p">{{$que->que_inst}}</p>
                                    @endif
                                    
                                    <h6>{{$que->question}}</h6>

                                    @if ($que->dia_inst != "")
                                        <p class="small_p">{{$que->dia_inst}}</p>
                                    @endif
                                    @if ($que->diagram != '')
                                        <button class="btn_red" data-bs-toggle="modal" data-bs-target="#diagram{{$que->id}}"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;View Diagram</button>
                                    @endif
                                    
                                </div>
                                {{-- <p class="lineBr"></p> --}}

                                <form action="{{ action('StdDashController@update', $que->id) }}" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    @csrf
                                    <div class="col-12 exam_view">
                                        @if ($que->a != '')
                                            <p class="optP"><label onclick="ans_a()">
                                                @if ($que->a == 1 && $que->b == 0)
                                                    True
                                                @else
                                                    {{ $que->a }}
                                                @endif
                                                <input class="form-check-input float_right2" type="radio" name="myradio" id="myradio1"></label>
                                            </p>
                                            <p class="optP"><label onclick="ans_b()">
                                                @if ($que->a == 1 && $que->b == 0)
                                                    True
                                                @else
                                                    {{ $que->b }}
                                                @endif
                                                <input class="form-check-input float_right2" type="radio" name="myradio" id="myradio2"></label>
                                            </p>
                                            <p class="optP"><label onclick="ans_c()">{{ $que->c }}<input class="form-check-input float_right2" type="radio" name="myradio" id="myradio3"></label></p>
                                            @if ($que->d != '')
                                                <p class="optP"><label onclick="ans_d()">{{ $que->d }}<input class="form-check-input float_right2" type="radio" name="myradio" id="myradio4"></label></p>
                                            @endif
                                            @else
                                            <p class="optP"><label onclick="ans_T()">True<input class="form-check-input float_right2" type="radio" name="myradio" id="myradio5"></label></p>
                                            <p class="optP"><label onclick="ans_F()">False<input class="form-check-input float_right2" type="radio" name="myradio" id="myradio6"></label></p>
                                        @endif
                                    </div>

                                    <div class="modal fade" id="diagram{{$que->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <img width="100%" src="/storage/classified/lect_uploads/{{$que->diagram}}">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="ans_val" id="ans">
                                    <button type="submit" name="update_action" value="update_ExSub" class="btn_red_inverse float_right2"><i class="fa fa-arrow-right"></i>&nbsp;&nbsp;NEXT</button>
                                </form>
                                                                
                            {{-- @endforeach --}}
                            {{-- {{ $questions->links() }} --}}
                        {{-- @endif --}}
                        
                    </div>
                </div>
            </div>

        </div>

    </div>



    <script>

        function ans_a() {
            document.getElementById('ans').value = 'A';
        }
        function ans_b() {
            document.getElementById('ans').value = 'B';
        }
        function ans_c() {
            document.getElementById('ans').value = 'C';
        }
        function ans_d() {
            document.getElementById('ans').value = 'D';
        }
        function ans_T() {
            document.getElementById('ans').value = 'True';
        }
        function ans_F() {
            document.getElementById('ans').value = 'False';
        }



        // if ({{session('tot_seconds_rem')}} == 'time_up') {
        //     alert('True');
        // }
        // stop_countdown
        // const startingHours = 0;
        // const startingMinutes = 5;
        // const startingSeconds = 0;

        // const startingHours = 0;
        // const startingMinutes = "{{session('tot_minutes_left')}}";
        // const startingSeconds = "{{session('tot_seconds_left')}}";
        // let time = 7 - ((startingHours * 60) * 60) + (startingMinutes * 60) + startingSeconds;
        let time = "{{session('tot_seconds_rem')}}";

        const timeDisplay = document.getElementById('countdown_text');

        setInterval(function countdownFunc() {
            const mins = Math.floor(time / 60);
            let secs = time % 60;
            let hrs = mins % 60;

            // timeDisplay.innerHTML = `${mins}:${secs}`;
            timeDisplay.innerHTML = '0:'+mins+':'+secs;

            if (time <= 0 || (mins == 0 && secs == 0)) {
                window.location.replace("/sdash/{{$exam->id}}");
                // window.location.replace("/sexam");
                clearInterval(myInterval);
            }

            time--;
        }, 1000);


    </script>

@endsection

 