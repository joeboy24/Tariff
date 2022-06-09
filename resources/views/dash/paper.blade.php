
@extends('layouts.dashlay')

@section('header_nav')
    @include('inc.header_nav')  
@endsection

@section('sidebar_menu')
    
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item">
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

            <li class="sidebar-item active has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-edit"></i>
                    <span>Exam</span>
                </a>
                <ul class="submenu active">
                    <li class="submenu-item active">
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
        <h3>Manage Questions</h3>
    </div>

    <div class="row">

        <div class="col-12 col-xl-6">
            @include('inc.messages')


            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Use this section to add multiple question</h3>
                        <p class="small_p">Select File Format</p>
                    <div class="multi_qs">
                        <form action="{{ action('DashController@store') }}" method="POST" enctype="multipart/form-data">
                            @csrf 

                            <div class="col-md-12">
                                <div class="input-group mb-8">
                                    <label class="input-group-text" for="sel1">File Format</label>
                                    <select name="file_format" class="form-select" id="file_format" onchange="upload_check()">
                                        <option>-- Choose --</option>
                                        <option value="0">Text</option>
                                        <option value="1">Excel</option>
                                    </select>
                                </div>
                            </div>
                            <p></p>
                            
                            <div id="ques_box" class="col-md-12">
                                {{-- <label for="que" class="form-label">Paste Questions Here</label> --}}
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <div class="form-group with-title mb-3">
                                            <textarea id="ques" name="txt" class="form-control" rows="3"></textarea>
                                            <label>Paste Questions Here</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="file_box" class="col-md-12">
                                <div class="input-group mb-3">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                        <input name="ex_file" type="file" class="form-control" id="inputGroupFile01">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="ex_id" value="{{$exam->id}}">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" name="store_action" value="add_multiple_questions" class="btn btn-primary me-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Clear</button>
                            </div>
                            {{-- <p class="small_p">Click here to &nbsp;<button type="submit" name="store_action" value="add_multiple_questions" class="my_trash"><i class="fa fa-upload"></i>&nbsp; Upload Multiple Questions</button></p> --}}
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Question {{count($ques)+1}}</h4>
                    <p class="small_p">Ex{{$exam->id.' - '.$exam->exam_title.' / '.substr($exam->created_at, 0, 10)}}</p>
                </div>
                <div class="card-body">

                    <form action="{{ action('DashController@store', $exam->id) }}" method="POST">
                        @csrf 

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="que" class="form-label">Type Question Here</label>
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <div class="form-group with-title mb-3">
                                                <input type="hidden" name="ex_id" value="{{$exam->id}}">
                                                <textarea id="que" name="question" class="form-control" rows="4" required>{{session('question')}}</textarea>
                                                <label>Anything</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <div class="form-group with-title mb-3">
                                                <textarea id="que_inst" name="question_inst" class="form-control" rows="1">{{session('que_inst')}}</textarea>
                                                <label>Question Instructions</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group mb-8">
                                        <label class="input-group-text" for="sel1">Attach Diagram</label>
                                        <select name="diagram" class="form-select" id="sel1">
                                            <option>-- Choose from uploads --</option>
                                            @foreach ($myups as $up)
                                                @if($up->del == 'no')
                                                    <option value="{{$up->photo}}">{{$up->title}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <p></p>

                                <div class="col-md-12">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <div class="form-group with-title mb-3">
                                                <textarea id="diagram_inst" name="diagram_inst" class="form-control" rows="1"></textarea>
                                                <label>Diagram Instructions</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group mb-8">
                                        <label class="input-group-text" for="sel1">Answer Type</label>
                                        <select name="ans_type" class="form-select" id="ans_sel" onchange="answer_check()">
                                            <option>-- Choose --</option>
                                            <option value="0">True/False</option>
                                            <option value="1">Multiple Choice</option>
                                        </select>
                                    </div>
                                </div>
                                <p></p>

                                <div id="truefalse" class="col-md-12 my_panel">
                                    <div class="input-group mb-8">
                                        <label class="input-group-text" for="sel1">Choose Correct Answer</label>
                                        <select name="true_false" class="form-select" id="sel1">
                                            <option>-- Choose --</option>
                                            <option>True</option>
                                            <option>False</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="multichoice" class="col-md-12 my_panel">
                                    <p></p>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">A</span>
                                        <input type="text" name="multi_a" value="{{session('a')}}" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">B</span>
                                        <input type="text" name="multi_b" value="{{session('b')}}" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">C</span>
                                        <input type="text" name="multi_c"{{session('c')}} class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">D</span>
                                        <input type="text" name="multi_d"{{session('d')}} class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="input-group mb-8">
                                        <label class="input-group-text" for="sel1">Choose Correct Answer</label>
                                        <select name="qans" class="form-select" id="sel1">
                                            <option>-- Choose Option --</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                            <option>D</option>
                                        </select>
                                    </div>
                                </div>
                                <p></p><p></p><p></p>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" name="store_action" value="add_question" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>


            </div>
        </div>
        

        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        @if (count($ques) > 0)
                            <table class="table mb-0 table-lg">
                                <thead>
                                    <tr>
                                        <th>Questions for {{ 'Ex'.$exam->id.' - '.$exam->exam_type }}</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach ($ques as $que)
                                        @if ($que->del == 'yes')
                                            <tr class="del_danger">
                                        @else
                                            <tr>
                                        @endif
                                            <td class="text-bold-500">Question {{ $que->que_no }}
                                                @if ($que->que_inst != '')
                                                    <p class="mid_p">{{ $que->que_inst }}</p>
                                                @endif
                                                <br>{{ $que->question }}
                                                @if ($que->diagram != '')
                                                    @if ($que->dia_inst != '')
                                                        <p class="small_p">{{ $que->dia_inst }}</p>
                                                        {{-- {{ $que->diagram }} --}}
                                                        <p></p>
                                                        <p  style=""><img src="/storage/classified/lect_uploads/{{$que->diagram}}" width="50%" style="border-radius: 5%"></p>
                                                        <p></p>
                                                    @endif
                                                @endif
                                                @if ($que->a != '')
                                                    @if ($que->a == 1 && $que->b == 0)
                                                        <p class="mid_p">A - True</p>
                                                    @else
                                                        <p class="mid_p">A - {{ $que->a }}</p>
                                                    @endif
                                                @endif
                                                @if ($que->b != '')
                                                    @if ($que->a == 1 && $que->b == 0)
                                                        <p class="mid_p">B - False</p>
                                                    @else
                                                        <p class="mid_p">B - {{ $que->b }}</p>
                                                    @endif
                                                @endif
                                                @if ($que->c != '')
                                                    <p class="mid_p">C - {{ $que->c }}</p>
                                                @endif
                                                @if ($que->d != '')
                                                    <p class="mid_p">D - {{ $que->d }}</p>
                                                @endif
                                                <br>Answer - {{ $que->answer }}<br>
                                                <br><p class="small_p">Date: {{ $que->created_at}}</p>
                                            
                                                <form action="{{ action('DashController@update', $que->id) }}" method="POST">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    @csrf
                                                    
                                                    @if ($que->del == 'yes')
                                                        <button type="submit" name="update_action" value="restore_question" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                    @else
                                                        {{-- <a href="/dash/{{$que->id}}"><button type="button" class="my_trash"><i class="fa fa-plus-circle"></i></button></a> --}}
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#editque{{$que->id}}" class="my_trash font8"><i class="fa fa-pencil"></i>&nbsp; Edit Question</button>
                                                        <button type="submit" name="update_action" value="del_question" class="my_trash" onclick="return confirm('Are you sure you want to delete this question?')"><i class="fa fa-trash"></i></button>
                                                    @endif 
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="editque{{$que->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                                            Edit Question {{$que->que_no}}
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>

                                                    <form action="{{ action('DashController@update', $que->id) }}" method="POST">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        @csrf 

                                                        <div class="modal-body">
                                                            
                                                            <div class="col-md-12">
                                                                <label for="que" class="form-label">Type Question Here</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <div class="form-group with-title mb-3">
                                                                            <input type="hidden" name="ex_id" value="{{$que->id}}">
                                                                            <textarea id="que" name="question" class="form-control" rows="4" required>{{$que->question}}</textarea>
                                                                            <label>Anything</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
            
                                                            <div class="col-md-12">
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <div class="form-group with-title mb-3">
                                                                            <textarea id="que_inst" name="question_inst" class="form-control" rows="1">{{$que->que_inst}}</textarea>
                                                                            <label>Question Instructions</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
            
                                                            <div class="col-md-12">
                                                                <div class="input-group mb-8">
                                                                    <label class="input-group-text" for="sel1">Attach Diagram</label>
                                                                    <select name="diagram" class="form-select" id="sel1">
                                                                        <option>-- Choose from uploads --</option>
                                                                        @foreach ($myups as $up)
                                                                            @if($up->del == 'no')
                                                                                @if ($up->photo == $que->diagram)    
                                                                                    <option value="{{$up->photo}}" selected>{{$up->title}}</option>
                                                                                @else
                                                                                    <option value="{{$up->photo}}">{{$up->title}}</option>
                                                                                @endif
                                                                            @endif
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <p></p>
            
                                                            <div class="col-md-12">
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <div class="form-group with-title mb-3">
                                                                            <textarea id="diagram_inst" name="diagram_inst" class="form-control" rows="1">{{$que->dia_inst}}</textarea>
                                                                            <label>Diagram Instructions</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
            
                                                            <div class="col-md-12" onload="disp_none{{$que->id}}()">
                                                                <div class="input-group mb-8">
                                                                    <label class="input-group-text" for="sel1">Answer Type</label>
                                                                    <select name="ans_type" class="form-select" id="ans_sel{{$que->id}}" onchange="answer_check{{$que->id}}()">
                                                                        
                                                                        @if ($que->answer == 'True' or $que->answer == 'False')
                                                                            <option value="0" selected>True/False</option>
                                                                            <option value="1">Multiple Choice</option>
                                                                        @else
                                                                            <option value="0">True/False</option>
                                                                            <option value="1" selected>Multiple Choice</option>
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                                <script>
                                                            
                                                                    //     document.getElementById("truefalse{{$que->id}}").style.display = "none";
                                                                    //     document.getElementById("multichoice{{$que->id}}").style.display = "none";
                                                                    
                                                                    // function answer_check{{$que->id}}(){
                                                                    //     if (document.getElementById("ans_sel{{$que->id}}").value == 1) {
                                                                    //         // alert('working');
                                                                    //         document.getElementById("multichoice{{$que->id}}").style.display = "block";
                                                                    //         document.getElementById("truefalse{{$que->id}}").style.display = "none";
                                                                    //     }else{
                                                                    //         document.getElementById("truefalse{{$que->id}}").style.display = "block";
                                                                    //         document.getElementById("multichoice{{$que->id}}").style.display = "none";
                                                                    //     }
                                                                    // }
                                                            
                                                                </script>
                                                            </div>
                                                            <p></p>
            
                                                            @if ($que->answer == 'True' or $que->answer == 'False')
                                                                <div id="" class="col-md-12 my_panel">

                                                                    @if ($que->a == 1 && $que->b == 0)
                                                                        <p class="small_p">NOTE: 1 = True, 0 = False</p>
                                                                    @endif
                                                                    <div class="input-group mb-8">
                                                                        <label class="input-group-text" for="sel1">Choose Correct Answer</label>
                                                                        <select name="true_false" class="form-select" id="sel1">
                                                                            @if ($que->answer == 'True')
                                                                                <option selected>True</option>
                                                                                <option>False</option>
                                                                            @else
                                                                                <option>True</option>
                                                                                <option selected>False</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div id="" class="col-md-12 my_panel">
                                                                    <p></p>

                                                                    @if ($que->a == 1 && $que->b == 0)
                                                                        <p class="small_p">NOTE: 1 = True, 0 = False</p>
                                                                    @endif
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text" id="basic-addon1">A</span>
                                                                        <input type="text" name="multi_a" value="{{$que->a}}" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text" id="basic-addon1">B</span>
                                                                        <input type="text" name="multi_b" value="{{$que->b}}" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text" id="basic-addon1">C</span>
                                                                        <input type="text" name="multi_c" value="{{$que->c}}" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text" id="basic-addon1">D</span>
                                                                        <input type="text" name="multi_d" value="{{$que->d}}" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                    </div>
                
                                                                    <div class="input-group mb-8">
                                                                        <label class="input-group-text" for="sel1">Choose Correct Answer</label>
                                                                        <select name="qans" class="form-select" id="sel1">
                                                                            @if ($que->answer == 'A')
                                                                                <option selected>A</option>
                                                                                <option>B</option>
                                                                                <option>C</option>
                                                                                <option>D</option>
                                                                            @elseif ($que->answer == 'B')
                                                                                <option>A</option>
                                                                                <option selected>B</option>
                                                                                <option>C</option>
                                                                                <option>D</option>
                                                                            @elseif ($que->answer == 'C')
                                                                                <option>A</option>
                                                                                <option>B</option>
                                                                                <option selected>C</option>
                                                                                <option>D</option>
                                                                            @else
                                                                                <option>A</option>
                                                                                <option>B</option>
                                                                                <option>C</option>
                                                                                <option selected>D</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            @endif
            
            
                                                            <p></p><p></p><p></p>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="submit" name="update_action" value="update_question" class="btn btn-primary me-1 mb-1">Update</button>
                                                            </div>
                                                            
                                                        </div>
                                                    </form>
                                                       
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger">
                                No Questions Added Yet 
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Upload Multiple Questions Modal -->
    <div class="modal fade" id="upload_questions" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">
                        Edit {{$exam->exam_title}}
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                        aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="col-md-12">
                        <div class="input-group mb-8">
                            <label class="input-group-text" for="exam_type">Course</label>
                            <select name="course_id" class="form-select" id="exam_type">
                                {{-- @foreach ($courses as $crs)
                                    @if ($exam->course_id == $crs->id)
                                        <option value="{{$crs->id}}" selected>{{$crs->course_code.' - '.$crs->course_name}}</option>
                                    @else
                                        <option value="{{$crs->id}}">{{$crs->course_code.' - '.$crs->course_name}}</option>
                                    @endif
                                @endforeach --}}
                            </select>
                        </div> 
                    </div>
                    <p></p>

                    <div class="col-md-12">
                        <label for="que_inst">Exam Title</label>
                        <div class="form-group has-icon-left">
                            <div class="position-relative">
                                <div class="form-group with-title mb-3">
                                    <textarea id="que_inst" name="exam_title" class="form-control" rows="1" required>{{$exam->exam_title}}</textarea>
                                    {{-- <textarea name="company_add" class="form-control" rows="3" placeholder="Address" required></textarea> --}}
                                    <label>May include course name)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script>

        function answer_check(){
            if (document.getElementById("ans_sel").value == 1) {
                // alert('working');
                document.getElementById("multichoice").style.display = "block";
                document.getElementById("truefalse").style.display = "none";
            }else{
                document.getElementById("truefalse").style.display = "block";
                document.getElementById("multichoice").style.display = "none";
            }
        }

        function upload_check(){
            if (document.getElementById("file_format").value == 1) {
                // alert('working');
                document.getElementById("file_box").style.display = "block";
                document.getElementById("ques_box").style.display = "none";
            }else if (document.getElementById("file_format").value == 0) {
                document.getElementById("ques_box").style.display = "block";
                document.getElementById("file_box").style.display = "none";
            }else {
                document.getElementById("file_box").style.display = "none";
                document.getElementById("ques_box").style.display = "none";
            }
        }

    </script>

@endsection

 