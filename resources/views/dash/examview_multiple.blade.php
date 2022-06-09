
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
        <span class="small_p"><i class="fa fa-clock-o"></i>&nbsp;&nbsp;Time Remaining</span>
        <h2 id="countdown_text">
            &nbsp;{{ $exam->duration }}
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

                        {{-- @for ($i = 0; $i < count($ques); $i++)
                            <div id="div{{$ques[$i]->que_no}}" class="col-12 exam_view2 lineBr2">

                                @if ($exam->randomize == 'yes')
                                    <p>Question {{ $ques[$i]->que_no }}</p>
                                    <p>page {{ $_GET['page'] * $exam->que_per_page }}</p>
                                @else
                                    <p>Question {{ $ques[$i]->que_no }}</p>
                                @endif

                                @if ($ques[$i]->que_inst != "")
                                    <span class="small_p">{{$ques[$i]->que_inst}}</span>
                                @endif
                                <h6>{{$ques[$i]->question}}</h6>
                                
                                @if ($ques[$i]->dia_inst != "")
                                    <p class="small_p">{{$ques[$i]->dia_inst}}</p>
                                @endif
                                @if ($ques[$i]->diagram != '')
                                    <button class="my_trash_small" data-bs-toggle="modal" data-bs-target="#diagram{{$ques[$i]->id}}"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;View Diagram</button>
                                @endif
                                

                                @if ($ques[$i]->a != '')
                                    <p class="optP2"></p>
                                    <p class="optP2"><label onclick="ans_a{{$ques[$i]->id}}({{$ques[$i]->id}})"><input class="form-check-input" type="radio" name="myradio{{$ques[$i]->id}}" id="myradioa{{$ques[$i]->id}}">&nbsp;&nbsp;&nbsp;{{ $ques[$i]->a }}</label></p>
                                    <p class="optP2"><label onclick="ans_b{{$ques[$i]->id}}({{$ques[$i]->id}})"><input class="form-check-input" type="radio" name="myradio{{$ques[$i]->id}}" id="myradiob{{$ques[$i]->id}}">&nbsp;&nbsp;&nbsp;{{ $ques[$i]->b }}</label></p>
                                    <p class="optP2"><label onclick="ans_c{{$ques[$i]->id}}({{$ques[$i]->id}})"><input class="form-check-input" type="radio" name="myradio{{$ques[$i]->id}}" id="myradioc{{$ques[$i]->id}}">&nbsp;&nbsp;&nbsp;{{ $ques[$i]->c }}</label></p>
                                    @if ($ques[$i]->d != '')
                                        <p class="optP2"><label onclick="ans_d{{$ques[$i]->id}}({{$ques[$i]->id}})"><input class="form-check-input" type="radio" name="myradio{{$ques[$i]->id}}" id="myradiod{{$ques[$i]->id}}">&nbsp;&nbsp;&nbsp;{{ $ques[$i]->d }}</label></p>
                                    @endif
                                @else
                                    <p class="optP2"><label onclick="ans_T{{$ques[$i]->id}}({{$ques[$i]->id}})"><input class="form-check-input" type="radio" name="myradio{{$ques[$i]->id}}" id="myradio1t{{$ques[$i]->id}}">&nbsp;&nbsp;&nbsp;True</label></p>
                                    <p class="optP2"><label onclick="ans_F{{$ques[$i]->id}}({{$ques[$i]->id}})"><input class="form-check-input" type="radio" name="myradio{{$ques[$i]->id}}" id="myradio2t{{$ques[$i]->id}}">&nbsp;&nbsp;&nbsp;False</label></p>
                                @endif

                                <div class="modal fade" id="diagram{{$ques[$i]->id}}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <img width="100%" src="/storage/classified/lect_uploads/{{$ques[$i]->diagram}}">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="ex_id{{$ques[$i]->id}}" value="{{$ques[$i]->exam_id}}">
                                <input type="hidden" name="ans_val" id="ans{{$ques[$i]->id}}">
                                <button type="submit" name="update_action" value="update_ExSub" class="btn_red"><i class="fa fa-flag"></i>&nbsp;&nbsp;flag question</button>
                                
                            </div>
                            
                            <script>

                                // function excheck(id) {
                                    // sessionStorage.setItem("final_ans1{{$exam->id}}", '');
                                    gen_ans = document.getElementById('gen_ans{{$exam->id}}');
                                    if (sessionStorage.getItem("exx1{{$exam->id}}") === null) {
                                        sessionStorage.setItem("exx1{{$exam->id}}", 'started');
                                        gen_ans.value = sessionStorage.getItem('exx1{{$exam->id}}');
                                        // } else {
                                            alert(sessionStorage.getItem('exx1{{$exam->id}}'));
                                    }
                                    // gen_ans = document.getElementById('gen_ans{{$exam->id}}');
                                    // if (typeof sessionStorage.getItem('ex7') == 'undefined') {
                                    //     alert(0);
                                    //     ex7 = 'set'
                                    //     sessionStorage.setItem("ex7", ex7);
                                    //     gen_ans.value = sessionStorage.getItem('ex7');
                                    // } else {
                                    //     alert('Already Set');
                                    // }
                                // }

                                // $(document).ready(function() {
                                //     // $("#myradz").attr("checked","checked");
                                //     xcont = '(9=A)';
                                //     // xcont = '('+x+'=A)';
                                //     fin = sessionStorage.getItem("final_ans1{{$exam->id}}")
                                //     if (fin.includes(xcont)) {
                                //         // $("#myradz").attr("checked","checked");
                                //         document.getElementById('myradz').checked = true;
                                //     }
                                // })

                                // function anscheck{{$exam->id}}() {
                                //     qans_a = document.getElementById('myradio1{{$ques[$i]->id}}');
                                    
                                //     xcont = '(9=A)';
                                //     // xcont = '('+x+'=A)';
                                //     fin = sessionStorage.getItem("final_ans1{{$exam->id}}")
                                //     if (fin.includes(xcont)) {
                                //         // alert('A Checked');
                                //         document.getElementById('myradz').checked = true;
                                //     }
                                // }

                                
                                function checkduplicates(final_ans) {
                                    gen_ans = document.getElementById('gen_ans{{$exam->id}}');
                                    if (final_ans.includes('(A)')) {
                                        final_ans = final_ans.replace('(A)', '');
                                    }else if (final_ans.includes('(B)')) {
                                        final_ans = final_ans.replace('(B)', '');
                                    }else if (final_ans.includes('(C)')) {
                                        final_ans = final_ans.replace('(C)', '');
                                    }else if (final_ans.includes('(D)')) {
                                        final_ans = final_ans.replace('(D)', '');
                                    }else if (final_ans.includes('(True)')) {
                                        final_ans = final_ans.replace('(True)', '');
                                    } else if (final_ans.includes('(False)')) {
                                        final_ans = final_ans.replace('(False)', '');
                                    }
                                    sessionStorage.setItem("final_ans1{{$exam->id}}", final_ans);
                                    // alert(sessionStorage.getItem("final_ans1{{$exam->id}}"));
                                    // gen_ans.value = final_ans;
                                    gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                }
                                function ans_a{{$ques[$i]->id}}(x) {
                                    document.getElementById('ans{{$ques[$i]->id}}').value = 'A';
                                    gen_ans = document.getElementById('gen_ans{{$exam->id}}');

                                    if (sessionStorage.getItem("exx1{{$exam->id}}") == 'started') {
                                        gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                    }

                                    xcont = '('+x+'=';
                                    xreplace = '('+x+'=A)(';
                                    if (gen_ans.value.includes(xcont)) {
                                        final_ans = gen_ans.value.replace(xcont, xreplace);
                                        checkduplicates(final_ans);
                                        // gen_ans.value = final_ans;
                                    } else {
                                        sessionStorage.setItem("final_ans1{{$exam->id}}", gen_ans.value + '('+x+'=A)');
                                        gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                        // gen_ans.value = gen_ans.value + '('+x+'=A)';
                                    }
                                }
                                function ans_b{{$ques[$i]->id}}(x) {
                                    document.getElementById('ans{{$ques[$i]->id}}').value = 'B';
                                    gen_ans = document.getElementById('gen_ans{{$exam->id}}');
                                    
                                    if (sessionStorage.getItem("exx1{{$exam->id}}") == 'started') {
                                        gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                    }

                                    xcont = '('+x+'=';
                                    xreplace = '('+x+'=B)(';
                                    if (gen_ans.value.includes(xcont)) {
                                        final_ans = gen_ans.value.replace(xcont, xreplace);
                                        checkduplicates(final_ans);
                                        // gen_ans.value = final_ans;
                                    } else {
                                        sessionStorage.setItem("final_ans1{{$exam->id}}", gen_ans.value + '('+x+'=B)');
                                        gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                        // gen_ans.value = gen_ans.value + '('+x+'=B)';
                                    }
                                }
                                function ans_c{{$ques[$i]->id}}(x) {
                                    document.getElementById('ans{{$ques[$i]->id}}').value = 'C';
                                    gen_ans = document.getElementById('gen_ans{{$exam->id}}');

                                    if (sessionStorage.getItem("exx1{{$exam->id}}") == 'started') {
                                        gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                    }
                                    
                                    xcont = '('+x+'=';
                                    xreplace = '('+x+'=C)(';
                                    if (gen_ans.value.includes(xcont)) {
                                        final_ans = gen_ans.value.replace(xcont, xreplace);
                                        checkduplicates(final_ans);
                                        // gen_ans.value = final_ans;
                                    } else {
                                        sessionStorage.setItem("final_ans1{{$exam->id}}", gen_ans.value + '('+x+'=C)');
                                        gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                        // gen_ans.value = gen_ans.value + '('+x+'=C)';
                                    }
                                }
                                function ans_d{{$ques[$i]->id}}(x) {
                                    document.getElementById('ans{{$ques[$i]->id}}').value = 'D';
                                    gen_ans = document.getElementById('gen_ans{{$exam->id}}');
                                    
                                    if (sessionStorage.getItem("exx1{{$exam->id}}") == 'started') {
                                        gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                    }
                                    
                                    xcont = '('+x+'=';
                                    xreplace = '('+x+'=D)(';
                                    if (gen_ans.value.includes(xcont)) {
                                        final_ans = gen_ans.value.replace(xcont, xreplace);
                                        checkduplicates(final_ans);
                                        // gen_ans.value = final_ans;
                                    } else {
                                        sessionStorage.setItem("final_ans1{{$exam->id}}", gen_ans.value + '('+x+'=D)');
                                        gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                        // gen_ans.value = gen_ans.value + '('+x+'=D)';
                                    }
                                }
                                function ans_T{{$ques[$i]->id}}(x) {
                                    document.getElementById('ans{{$ques[$i]->id}}').value = 'True';
                                    gen_ans = document.getElementById('gen_ans{{$exam->id}}');
                                    
                                    if (sessionStorage.getItem("exx1{{$exam->id}}") == 'started') {
                                        gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                    }
                                    
                                    xcont = '('+x+'=';
                                    xreplace = '('+x+'=True)(';
                                    if (gen_ans.value.includes(xcont)) {
                                        final_ans = gen_ans.value.replace(xcont, xreplace);
                                        checkduplicates(final_ans);
                                        // gen_ans.value = final_ans;
                                    } else {
                                        sessionStorage.setItem("final_ans1{{$exam->id}}", gen_ans.value + '('+x+'=True)');
                                        gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                        // gen_ans.value = gen_ans.value + '('+x+'=True)';
                                    }
                                }
                                function ans_F{{$ques[$i]->id}}(x) {
                                    document.getElementById('ans{{$ques[$i]->id}}').value = 'False';
                                    gen_ans = document.getElementById('gen_ans{{$exam->id}}');
                                    
                                    if (sessionStorage.getItem("exx1{{$exam->id}}") == 'started') {
                                        gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                    }
                                    
                                    xcont = '('+x+'=';
                                    xreplace = '('+x+'=False)(';
                                    if (gen_ans.value.includes(xcont)) {
                                        final_ans = gen_ans.value.replace(xcont, xreplace);
                                        checkduplicates(final_ans);
                                        // gen_ans.value = final_ans;
                                    } else {
                                        sessionStorage.setItem("final_ans1{{$exam->id}}", gen_ans.value + '('+x+'=False)');
                                        gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                        // gen_ans.value = gen_ans.value + '('+x+'=False)';
                                    }
                                }
                            </script>
                                
                        @endfor    --}}

                        @for ($y = 0; $y < $exam->no_of_qs; $y++)
                            @foreach ($ques as $item)
                                @if ($item->id == $que_split_id[$y])
                                    {{-- <p>Question - {{ $item->question }}</p> --}}
                                    <div id="Q{{$exam->id.$y+1}}" class="col-12 exam_view2 lineBr2">

                                        @if ($exam->randomize == 'yes')
                                            <p>Question {{ $y + 1 }}</p>
                                            {{-- <p>page {{ $_GET['page'] * $exam->que_per_page }}</p> --}}
                                        @else
                                            <p>Question {{ $item->que_no }}</p>
                                        @endif

                                        @if ($item->que_inst != "")
                                            <span class="small_p">{{$item->que_inst}}</span>
                                        @endif
                                        <h6>{{$item->question}}</h6>
                                        
                                        @if ($item->dia_inst != "")
                                            <p class="small_p">{{$item->dia_inst}}</p>
                                        @endif
                                        @if ($item->diagram != '')
                                            <button class="my_trash_small" data-bs-toggle="modal" data-bs-target="#diagram{{$item->id}}"><i class="fa fa-folder-open"></i>&nbsp;&nbsp;View Diagram</button>
                                        @endif
                                        

                                        @if ($item->a != '')
                                            <p class="optP2"></p>
                                            <p class="optP2"><label onclick="ans_a{{$item->id}}({{$item->id}})"><input class="form-check-input" type="radio" name="myradio{{$item->id}}" id="myradioa{{$item->id}}">&nbsp;&nbsp;&nbsp;{{ $item->a }}</label></p>
                                            <p class="optP2"><label onclick="ans_b{{$item->id}}({{$item->id}})"><input class="form-check-input" type="radio" name="myradio{{$item->id}}" id="myradiob{{$item->id}}">&nbsp;&nbsp;&nbsp;{{ $item->b }}</label></p>
                                            <p class="optP2"><label onclick="ans_c{{$item->id}}({{$item->id}})"><input class="form-check-input" type="radio" name="myradio{{$item->id}}" id="myradioc{{$item->id}}">&nbsp;&nbsp;&nbsp;{{ $item->c }}</label></p>
                                            @if ($item->d != '')
                                                <p class="optP2"><label onclick="ans_d{{$item->id}}({{$item->id}})"><input class="form-check-input" type="radio" name="myradio{{$item->id}}" id="myradiod{{$item->id}}">&nbsp;&nbsp;&nbsp;{{ $item->d }}</label></p>
                                            @endif
                                        @else
                                            <p class="optP2"><label onclick="ans_T{{$item->id}}({{$item->id}})"><input class="form-check-input" type="radio" name="myradio{{$item->id}}" id="myradio1t{{$item->id}}">&nbsp;&nbsp;&nbsp;True</label></p>
                                            <p class="optP2"><label onclick="ans_F{{$item->id}}({{$item->id}})"><input class="form-check-input" type="radio" name="myradio{{$item->id}}" id="myradio2t{{$item->id}}">&nbsp;&nbsp;&nbsp;False</label></p>
                                        @endif

                                        <div class="modal fade" id="diagram{{$item->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <img width="100%" src="/storage/classified/lect_uploads/{{$item->diagram}}">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="ex_id{{$item->id}}" value="{{$item->exam_id}}">
                                        <input type="hidden" name="ans_val" id="ans{{$item->id}}">
                                        <button type="button" onclick="flagQue({{$exam->id.$y+1}},{{$item->id}})" class="btn_red"><i class="fa fa-flag"></i>&nbsp;&nbsp;flag question</button>
                                        
                                    </div>
                                    
                                    <script>

                                        gen_ans = document.getElementById('gen_ans{{$exam->id}}');
                                        if (sessionStorage.getItem("exx1{{$exam->id}}") === null) {
                                            sessionStorage.setItem("exx1{{$exam->id}}", 'started');
                                            gen_ans.value = sessionStorage.getItem('exx1{{$exam->id}}');
                                            // } else {
                                            // alert(sessionStorage.getItem('exx1{{$exam->id}}'));
                                        }
                                            
                                        
                                        function checkduplicates(final_ans) {
                                            gen_ans = document.getElementById('gen_ans{{$exam->id}}');
                                            if (final_ans.includes('(A)')) {
                                                final_ans = final_ans.replace('(A)', '');
                                            }else if (final_ans.includes('(B)')) {
                                                final_ans = final_ans.replace('(B)', '');
                                            }else if (final_ans.includes('(C)')) {
                                                final_ans = final_ans.replace('(C)', '');
                                            }else if (final_ans.includes('(D)')) {
                                                final_ans = final_ans.replace('(D)', '');
                                            }else if (final_ans.includes('(True)')) {
                                                final_ans = final_ans.replace('(True)', '');
                                            } else if (final_ans.includes('(False)')) {
                                                final_ans = final_ans.replace('(False)', '');
                                            }
                                            sessionStorage.setItem("final_ans1{{$exam->id}}", final_ans);
                                            // alert(sessionStorage.getItem("final_ans1{{$exam->id}}"));
                                            // gen_ans.value = final_ans;
                                            gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                        }
                                        function ans_a{{$item->id}}(x) {
                                            document.getElementById('ans{{$item->id}}').value = 'A';
                                            gen_ans = document.getElementById('gen_ans{{$exam->id}}');

                                            if (sessionStorage.getItem("exx1{{$exam->id}}") == 'started') {
                                                gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                            }

                                            xcont = '('+x+'=';
                                            xreplace = '('+x+'=A)(';
                                            if (gen_ans.value.includes(xcont)) {
                                                final_ans = gen_ans.value.replace(xcont, xreplace);
                                                checkduplicates(final_ans);
                                                // gen_ans.value = final_ans;
                                            } else {
                                                sessionStorage.setItem("final_ans1{{$exam->id}}", gen_ans.value + '('+x+'=A)');
                                                gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                                // gen_ans.value = gen_ans.value + '('+x+'=A)';
                                            }
                                        }
                                        function ans_b{{$item->id}}(x) {
                                            document.getElementById('ans{{$item->id}}').value = 'B';
                                            gen_ans = document.getElementById('gen_ans{{$exam->id}}');
                                            
                                            if (sessionStorage.getItem("exx1{{$exam->id}}") == 'started') {
                                                gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                            }

                                            xcont = '('+x+'=';
                                            xreplace = '('+x+'=B)(';
                                            if (gen_ans.value.includes(xcont)) {
                                                final_ans = gen_ans.value.replace(xcont, xreplace);
                                                checkduplicates(final_ans);
                                                // gen_ans.value = final_ans;
                                            } else {
                                                sessionStorage.setItem("final_ans1{{$exam->id}}", gen_ans.value + '('+x+'=B)');
                                                gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                                // gen_ans.value = gen_ans.value + '('+x+'=B)';
                                            }
                                        }
                                        function ans_c{{$item->id}}(x) {
                                            document.getElementById('ans{{$item->id}}').value = 'C';
                                            gen_ans = document.getElementById('gen_ans{{$exam->id}}');

                                            if (sessionStorage.getItem("exx1{{$exam->id}}") == 'started') {
                                                gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                            }
                                            
                                            xcont = '('+x+'=';
                                            xreplace = '('+x+'=C)(';
                                            if (gen_ans.value.includes(xcont)) {
                                                final_ans = gen_ans.value.replace(xcont, xreplace);
                                                checkduplicates(final_ans);
                                                // gen_ans.value = final_ans;
                                            } else {
                                                sessionStorage.setItem("final_ans1{{$exam->id}}", gen_ans.value + '('+x+'=C)');
                                                gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                                // gen_ans.value = gen_ans.value + '('+x+'=C)';
                                            }
                                        }
                                        function ans_d{{$item->id}}(x) {
                                            document.getElementById('ans{{$item->id}}').value = 'D';
                                            gen_ans = document.getElementById('gen_ans{{$exam->id}}');
                                            
                                            if (sessionStorage.getItem("exx1{{$exam->id}}") == 'started') {
                                                gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                            }
                                            
                                            xcont = '('+x+'=';
                                            xreplace = '('+x+'=D)(';
                                            if (gen_ans.value.includes(xcont)) {
                                                final_ans = gen_ans.value.replace(xcont, xreplace);
                                                checkduplicates(final_ans);
                                                // gen_ans.value = final_ans;
                                            } else {
                                                sessionStorage.setItem("final_ans1{{$exam->id}}", gen_ans.value + '('+x+'=D)');
                                                gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                                // gen_ans.value = gen_ans.value + '('+x+'=D)';
                                            }
                                        }
                                        function ans_T{{$item->id}}(x) {
                                            document.getElementById('ans{{$item->id}}').value = 'True';
                                            gen_ans = document.getElementById('gen_ans{{$exam->id}}');
                                            
                                            if (sessionStorage.getItem("exx1{{$exam->id}}") == 'started') {
                                                gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                            }
                                            
                                            xcont = '('+x+'=';
                                            xreplace = '('+x+'=True)(';
                                            if (gen_ans.value.includes(xcont)) {
                                                final_ans = gen_ans.value.replace(xcont, xreplace);
                                                checkduplicates(final_ans);
                                                // gen_ans.value = final_ans;
                                            } else {
                                                sessionStorage.setItem("final_ans1{{$exam->id}}", gen_ans.value + '('+x+'=True)');
                                                gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                                // gen_ans.value = gen_ans.value + '('+x+'=True)';
                                            }
                                        }
                                        function ans_F{{$item->id}}(x) {
                                            document.getElementById('ans{{$item->id}}').value = 'False';
                                            gen_ans = document.getElementById('gen_ans{{$exam->id}}');
                                            
                                            if (sessionStorage.getItem("exx1{{$exam->id}}") == 'started') {
                                                gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                            }
                                            
                                            xcont = '('+x+'=';
                                            xreplace = '('+x+'=False)(';
                                            if (gen_ans.value.includes(xcont)) {
                                                final_ans = gen_ans.value.replace(xcont, xreplace);
                                                checkduplicates(final_ans);
                                                // gen_ans.value = final_ans;
                                            } else {
                                                sessionStorage.setItem("final_ans1{{$exam->id}}", gen_ans.value + '('+x+'=False)');
                                                gen_ans.value = sessionStorage.getItem("final_ans1{{$exam->id}}");
                                                // gen_ans.value = gen_ans.value + '('+x+'=False)';
                                            }
                                        }
                                    </script>
                                @endif
                            @endforeach
                        @endfor

                        @if ($exam->randomize != 'yes')
                            {{ $ques->links() }}
                        @endif
                            
                        <form action="{{ action('StdDashController@update', auth()->user()->student_id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            {{-- <input class="form-check-input" type="radio" name="myradz" id="myradz"> --}}
                            {{-- <button type="button" onclick="anscheck{{$exam->id}}()" class="btn_red_inverse"><i class="fa fa-check"></i>&nbsp;&nbsp;Ex Check</button> --}}
                            <button onclick="get_gen_ans()" type="submit" name="update_action" value="submit_exam" class="btn_red_inverse"></i>&nbsp;&nbsp;Save & Submit Exam</button>&nbsp;&nbsp;
                            <span class="small_p"><i class="fa fa-warning"></i>&nbsp;&nbsp;Note: By clicking on this link, you agree to submit and close exam.</span>
                            
                            <input type="hidden" name="gen_ans_val" id="gen_ans{{$exam->id}}"> 
                        </form>
                        
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div id="que_nav_cont">
        {{-- <div class="col-md-7 que_nav"> --}}
        <div class="que_nav">
            <p class="small_p"><i class="fa fa-flag"></i>&nbsp;Navigate to Question</p>
            @for ($i = 1; $i <= $exam->no_of_qs; $i++)
                <p id="unflag_p{{$exam->id.$i}}" style="display: inline" class="que_p"><a class="que_nav_a" href="#Q{{$exam->id.$i}}">{{$i}}</a></p>
                <p id="flag_p{{$exam->id.$i}}" style="display: none" class="que_p"><a class="que_nav_flag" href="#Q{{$exam->id.$i}}"><i class="fa fa-flag"></i>&nbsp;{{$i}}</a></p>
            @endfor
        </div>
    </div>


    <script>
        // sessionStorage.setItem("flagged_ques{{$exam->id}}", '');
        // sessionStorage.setItem("final_ans1{{$exam->id}}", '');
        // sessionStorage.setItem("qid_str{{$exam->id}}", '');
        if (sessionStorage.getItem("flagged_ques{{$exam->id}}") === null) {
            sessionStorage.setItem("flagged_ques{{$exam->id}}", '');
            sessionStorage.setItem("qid_str{{$exam->id}}", '');
        }

        get_final_ans = sessionStorage.getItem("final_ans1{{$exam->id}}");
        function flagQue(fq,qid) {
            fqs = sessionStorage.getItem("flagged_ques{{$exam->id}}");
            qids = sessionStorage.getItem("qid_str{{$exam->id}}");
            // alert ('Q'+fq);
            document.getElementById('unflag_p'+fq).style.display = 'none';
            document.getElementById('flag_p'+fq).style.display = 'inline';

            newfq = fq+',';
            // fqreplace = '('+x+'=A)(';
            if (fqs.includes(newfq)) {
            } else {
                // final_ans = gen_ans.value.replace(newfq, '');
                sessionStorage.setItem("flagged_ques{{$exam->id}}", fqs + newfq);
            }
            // alert ('Q Nos = '+sessionStorage.getItem("flagged_ques{{$exam->id}}"));

            // alert(qid);
            newqid = qid+',';
            if (qids.includes(newqid)) {
            } else {
                sessionStorage.setItem("qid_str{{$exam->id}}", qids + newqid);
            }
            // alert ('Q Ids = '+sessionStorage.getItem("qid_str{{$exam->id}}"));


            split_fqs = fqs.split(',');
            split_qids = qids.split(',');
            for (i = 0; i < split_fqs.length-1; i++) {
                Qno2 = '('+split_qids[i]+'=';
                if (get_final_ans.includes(Qno2)) {
                    a = split_fqs[i]+',';
                    final_fqs = fqs.replace(a, '');
                    sessionStorage.setItem("flagged_ques{{$exam->id}}", final_fqs);
                    
                    b = split_qids[i]+',';
                    final_qid = qids.replace(b, '');
                    sessionStorage.setItem("qid_str{{$exam->id}}", final_qid);
                }else{
                    document.getElementById('unflag_p'+split_fqs[i]).style.display = 'none';
                    document.getElementById('flag_p'+split_fqs[i]).style.display = 'inline';
                }
            }

        }

        $(document).ready(function() {
            // alert ('Final Ans = '+sessionStorage.getItem("final_ans1{{$exam->id}}"));
            // alert ('Q Ids = '+sessionStorage.getItem("qid_str{{$exam->id}}"));
            // alert ('Q Nos = '+sessionStorage.getItem("flagged_ques{{$exam->id}}"));
            fqs = sessionStorage.getItem("flagged_ques{{$exam->id}}");
            qids = sessionStorage.getItem("qid_str{{$exam->id}}");
            split_fqs = fqs.split(',');
            split_qids = qids.split(',');
            for (i = 0; i < split_fqs.length-1; i++) {
                Qno2 = '('+split_qids[i]+'=';
                if (get_final_ans.includes(Qno2)) {
                    // alert ('contains '+Qno2);
                    // document.getElementById('unflag_p'+qs[0]).style.display = 'inline';
                    // document.getElementById('flag_p'+qs[0]).style.display = 'none';
                    a = split_fqs[i]+',';
                    final_fqs = fqs.replace(a, '');
                    // alert(a);
                    sessionStorage.setItem("flagged_ques{{$exam->id}}", final_fqs);
                    
                    b = split_qids[i]+',';
                    final_qid = qids.replace(b, '');
                    // alert(b);
                    sessionStorage.setItem("qid_str{{$exam->id}}", final_qid);
                }else{
                    // alert ('Does not contain '+Qno2);
                    document.getElementById('unflag_p'+split_fqs[i]).style.display = 'none';
                    document.getElementById('flag_p'+split_fqs[i]).style.display = 'inline';
                }
            }
        });

        // document.getElementById('myradioa'+qs[0]).checked = true;

        // $(document).ready(function() {
            // sessionStorage.setItem("final_ans1{{$exam->id}}", "(9=B)(10=False)(2=True)");
            // xcont = '(9=A)';
            // get_final_ans = "(9=C)(10=True)(2=True)";
            // alert(get_final_ans);
            if (get_final_ans.includes('(')) {
                final_ans = get_final_ans.replaceAll('(', '');
                fa = final_ans.split(')');
                for (c = 0; c < fa.length-1; c++) {
                    qs = fa[c];
                    qs = qs.split('=');

                    // document.getElementById('unflag_p'+qs[0]).style.display = 'inline';
                    // document.getElementById('flag_p'+qs[0]).style.display = 'none';
                    
                    if (qs[1] == 'A') {
                        document.getElementById('myradioa'+qs[0]).checked = true;
                    } else if (qs[1] == 'B') {
                        document.getElementById('myradiob'+qs[0]).checked = true;
                    } else if (qs[1] == 'C') {
                        document.getElementById('myradioc'+qs[0]).checked = true;
                    } else if (qs[1] == 'D') {
                        document.getElementById('myradiod'+qs[0]).checked = true;
                    } else if (qs[1] === 'True') {
                        document.getElementById('myradio1t'+qs[0]).checked = true;
                    } else if (qs[1] === 'False') {
                        document.getElementById('myradio2t'+qs[0]).checked = true;
                    }
                }
                // alert(qs[1]);
            } else {
            }
        // })
    </script>

    <script type="text/javascript">
        $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type : 'get',
                url : '{{URL::to('quesearch')}}',
                data:{'search':$value},
                success:function(data){
                $('#tb').html(data);
                }
            });
        })
    </script>
    <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>

    <script>


        function get_gen_ans() {
            // sessionStorage.setItem('ex_complete', 'yes');
            document.getElementById('gen_ans{{$exam->id}}').value = sessionStorage.getItem("final_ans1{{$exam->id}}");
        }

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

 