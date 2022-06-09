
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
        <h3>Exams & Quizes</h3>
    </div>


    <div class="row">
        <div class="col-12 col-xl-8">
            @include('inc.messages')
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Setup Exam Here</h4>
                    {{-- <p class="small_p">EX211 - Python Class Test {{date('d-M-Y')}}</p> --}}
                </div>
                <div class="card-body">

                    {{-- <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Question 1</h4>
                                <p class="small_p">EX211 - Python Class Test {{date('d-M-Y')}}</p>
                            </div>
                            <div class="card-contentr">
                                <div class="card-body"> --}}
                                    
                                    <form action="{{action('DashController@store')}}" method="POST">
                                        @csrf 

                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <div class="input-group mb-8">
                                                        <label class="input-group-text" for="exam_type">Exam Type</label>
                                                        <select name="exam_type" class="form-select" id="exam_type">
                                                            {{-- <option>-- Choose from uploads --</option> --}}
                                                            <option>Assignment</option>
                                                            <option>Class Test</option>
                                                            <option>Mid - Semester Examination</option>
                                                            <option>End of Semester Examination</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <p></p>

                                                <div class="col-md-12">
                                                    <div class="input-group mb-8">
                                                        <label class="input-group-text" for="exam_type">Course</label>
                                                        <select name="course_id" class="form-select" id="exam_type">
                                                            @foreach ($courses as $crs)
                                                                <option value="{{$crs->id}}">{{$crs->course_code.' - '.$crs->course_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <p></p>

                                                <div class="col-md-12">
                                                    <div class="input-group mb-8">
                                                        <label class="input-group-text" for="exam_type">Duration</label>
                                                        <select name="duration" class="form-select" id="">
                                                            <option value="30">30mins</option>
                                                            <option value="60">1hr</option>
                                                            <option value="90">1hr:30mins</option>
                                                            <option value="120">2hrs</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <p></p>

                                                <div class="col-md-12">
                                                    <label for="que_inst">Exam Title</label>
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <div class="form-group with-title mb-3">
                                                                <textarea id="que_inst" name="exam_title" class="form-control" rows="1" required></textarea>
                                                                {{-- <textarea name="company_add" class="form-control" rows="3" placeholder="Address" required></textarea> --}}
                                                                <label>May include course name)</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="input-group mb-8">
                                                        <label class="input-group-text" for="exam_type">Randomize Questions</label>
                                                        <select onchange="checkRandomize()" id="randomize" name="randomize" class="form-select">
                                                            <option value="yes" selected>Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <p></p>
                                                
                                                <div id="no_of_qs" class="col-md-12">
                                                    <div class="col-lg-12 mb-1">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">No. of Questions</span>
                                                            <input type="number" name="no_of_qs" min="1" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>

                                                <script>
                                                    function checkRandomize() {
                                                        if (document.getElementById('randomize').value == 'yes') {
                                                            document.getElementById('que_per_page').style.display = 'none';
                                                        } else {
                                                            document.getElementById('que_per_page').style.display = 'block';
                                                        }
                                                    }
                                                </script>
                                                
                                                <div id="que_per_page" class="col-md-12">
                                                    <div class="col-lg-12 mb-1">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Questions Per Page</span>
                                                            <input type="number" name="que_per_page" min="1" value="10" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="col-lg-12 mb-1">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Open Date</span>
                                                            <input type="date" name="duration_from" min="1" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="col-lg-12 mb-1">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Close Date</span>
                                                            <input type="date" name="duration_to" min="1" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="input-group mb-8">
                                                        <label class="input-group-text" for="exam_type">Display Result After Completion</label>
                                                        <select name="display_ans" class="form-select" id="">
                                                            <option value="yes" selected>Yes</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <p></p>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit" name="store_action" value="reg_exam" class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                {{-- </div>
                            </div>
                        </div>
                    </div> --}}


                </div>

            </div>

        </div>
    </div>

    <!-- Exam View -->
    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        @if (count($exams) > 0)
                            <table class="table mb-0 table-lg">
                                <thead>
                                    <tr>
                                        <th>EXAM TITLE</th>
                                        <th>SUBMITIONS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach ($exams as $exam)
                                        @if ($exam->del == 'yes')
                                            <tr class="del_danger">
                                        @else
                                            <tr>
                                        @endif
                                            <form action="{{ action('DashController@update', $exam->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf
                                                <td class="text-bold-500">{{ $exam->exam_title }}
                                                    <br>
                                                        <p class="small_p">{{ 'Ex'.$exam->id.' - '.$exam->exam_type }}</p>
                                                        <p class="small_p">
                                                        @if ($exam->del == 'no')
                                                            @if ($exam->status == 'open')
                                                                <button type="submit" name="update_action" value="close_exam" class="btn_red"><i class="fa fa-close"></i> &nbsp; CLOSE EXAM</button>&nbsp;
                                                            @else
                                                                <button type="submit" name="update_action" value="open_exam" class="btn_green"><i class="fa fa-folder-open"></i> &nbsp; OPEN EXAM</button>
                                                            @endif
                                                        @endif
                                                        </p>
                                                </td>
                                                <td>
                                                    {{count($exam->examsub)}} Submitted 
                                                    <p class="small_p">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#submitions{{$exam->id}}"> View</a>
                                                    </p>
                                                            
                                                    <div class="modal fade" id="submitions{{$exam->id}}" tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{$exam->exam_title}} Submitions</h5>
                                                                    {{-- <p style="clear: both" class="small_p"></p> --}}
                                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>
                                                                </div>

                                                                <div class="col-md-12 modal-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table mb-0 table-lg">  
                                                                            {{-- <thead><th>Name & Score</th></thead> --}}
                                                                            <tbody>
                                                                                @foreach ($exam->examsub as $item)
                                                                                    <tr>
                                                                                        <td class="text-bold-500">{{$item->student->fname.' '.$item->student->sname}} <span class="small_p float_right2">{{$item->score}}</span></td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                    
                                                <td class="text-bold-500 action_size">
                                                    @if ($exam->del == 'yes')
                                                        <button type="submit" name="update_action" value="restore_exam" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                    @else
                                                        <a href="/dash/{{$exam->id}}"><button type="button" class="my_trash"><i class="fa fa-plus-circle"></i></button></a>
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#editexam{{$exam->id}}" class="my_trash"><i class="fa fa-pencil"></i></button>
                                                        <button type="submit" name="update_action" value="del_exam" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                                                    @endif 
                                                </td>
                                            </form>
                                        </tr>


                                        <div class="modal fade" id="editexam{{$exam->id}}" tabindex="-1" role="dialog"
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

                                                    <div class="card">
                                                        <div class="card-body">
                                                            <form action="{{ action('DashController@update', $exam->id) }}" method="POST">
                                                                <input type="hidden" name="_method" value="PUT">
                                                                @csrf
                                                                
                                                                <div class="row">

                                                                    <div class="col-md-12">
                                                                        <div class="input-group mb-8">
                                                                            <label class="input-group-text" for="exam_type">Exam Type</label>
                                                                            <select name="exam_type" class="form-select" id="exam_type">
                                                                                @if ($exam->exam_type == 'Assignment')
                                                                                    <option selected>Assignment</option>
                                                                                    <option>Class Test</option>
                                                                                    <option>Mid - Semester Examination</option>
                                                                                    <option>End of Semester Examination</option>
                                                                                @elseif ($exam->exam_type == 'Class Test')
                                                                                    <option>Assignment</option>
                                                                                    <option selected>Class Test</option>
                                                                                    <option>Mid - Semester Examination</option>
                                                                                    <option>End of Semester Examination</option>
                                                                                @elseif ($exam->exam_type == 'Mid - Semester Examination')
                                                                                    <option>Assignment</option>
                                                                                    <option>Class Test</option>
                                                                                    <option selected>Mid - Semester Examination</option>
                                                                                    <option>End of Semester Examination</option>
                                                                                @elseif ($exam->exam_type == 'End of Semester Examination')
                                                                                    <option>Assignment</option>
                                                                                    <option>Class Test</option>
                                                                                    <option>Mid - Semester Examination</option>
                                                                                    <option selected>End of Semester Examination</option>
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <p></p>

                                                                    <div class="col-md-12">
                                                                        <div class="input-group mb-8">
                                                                            <label class="input-group-text" for="exam_type">Course</label>
                                                                            <select name="course_id" class="form-select" id="exam_type">
                                                                                @foreach ($courses as $crs)
                                                                                    @if ($exam->course_id == $crs->id)
                                                                                        <option value="{{$crs->id}}" selected>{{$crs->course_code.' - '.$crs->course_name}}</option>
                                                                                    @else
                                                                                        <option value="{{$crs->id}}">{{$crs->course_code.' - '.$crs->course_name}}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </select>
                                                                        </div> 
                                                                    </div>
                                                                    <p></p>

                                                                    <div class="col-md-12">
                                                                        <div class="input-group mb-8">
                                                                            <label class="input-group-text" for="exam_type">Duration</label>
                                                                            <select name="duration" class="form-select" id="">
                                                                                {{-- <option value="30" selected>{{$exam->duration}}</option> --}}
                                                                                @if ($exam->duration == 30)
                                                                                    <option value="30" selected>30mins</option>
                                                                                    <option value="60">1hr</option>
                                                                                    <option value="90">1hr:30mins</option>
                                                                                    <option value="120">2hrs</option>
                                                                                @elseif ($exam->duration == 60)
                                                                                    <option value="30">30mins</option>
                                                                                    <option value="60" selected>1hr</option>
                                                                                    <option value="90">1hr:30mins</option>
                                                                                    <option value="120">2hrs</option>
                                                                                @elseif ($exam->duration == 90)
                                                                                    <option value="30">30mins</option>
                                                                                    <option value="60">1hr</option>
                                                                                    <option value="90" selected>1hr:30mins</option>
                                                                                    <option value="120">2hrs</option>
                                                                                @elseif ($exam->duration == 120)
                                                                                    <option value="30">30mins</option>
                                                                                    <option value="60">1hr</option>
                                                                                    <option value="90">1hr:30mins</option>
                                                                                    <option value="120" selected>2hrs</option>
                                                                                @endif
                                                                                {{-- @if ($exam->duration == 30)
                                                                                    <option value="00:30" selected>30mins</option>
                                                                                    <option value="01:00">1hr</option>
                                                                                    <option value="01:30">1hr:30mins</option>
                                                                                    <option value="02:00">2hrs</option>
                                                                                @elseif ($exam->duration == 60)
                                                                                    <option value="00:30">30mins</option>
                                                                                    <option value="01:00" selected>1hr</option>
                                                                                    <option value="01:30">1hr:30mins</option>
                                                                                    <option value="02:00">2hrs</option>
                                                                                @elseif ($exam->duration == 90)
                                                                                    <option value="0:30">30mins</option>
                                                                                    <option value="01:00">1hr</option>
                                                                                    <option value="01:30" selected>1hr:30mins</option>
                                                                                    <option value="02:00">2hrs</option>
                                                                                @elseif ($exam->duration == 120)
                                                                                    <option value="00:30">30mins</option>
                                                                                    <option value="01:00">1hr</option>
                                                                                    <option value="01:30">1hr:30mins</option>
                                                                                    <option value="02:00" selected>2hrs</option>
                                                                                @endif --}}
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

                                                                    <div class="col-md-12">
                                                                        <div class="input-group mb-8">
                                                                            <label class="input-group-text" for="exam_type">Randomize Questions</label>
                                                                            <select onchange="checkRandomize2()" id="randomize2" name="randomize" class="form-select">
                                                                                <option value="yes" selected>Yes</option>
                                                                                <option value="no">No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <p></p>


                                                                    <script>
                                                                        function checkRandomize2() {
                                                                            // alert('Changed');
                                                                            if (document.getElementById('randomize2').value == 'yes') {
                                                                                document.getElementById('que_per_page2').style.display = 'none';
                                                                            } else {
                                                                                document.getElementById('que_per_page2').style.display = 'block';
                                                                            }
                                                                        }
                                                                    </script>
                    
                                                                    <div id="que_per_page2" class="col-md-12">
                                                                        <div class="col-lg-12 mb-1">
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text" id="basic-addon1">No. of Questions</span>
                                                                                <input type="number" value="{{$exam->no_of_qs}}" name="no_of_qs" min="1" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                    
                                                                    <div class="col-md-12">
                                                                        <div class="col-lg-12 mb-1">
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text" id="basic-addon1">Questions Per Page</span>
                                                                                <input type="number" value="{{$exam->que_per_page}}" name="que_per_page" min="1" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                    
                                                                    <div class="col-md-12">
                                                                        <div class="col-lg-12 mb-1">
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text" id="basic-addon1">Open Date</span>
                                                                                <input type="date" value="{{$exam->duration_from}}" name="duration_from" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                    
                                                                <div class="col-md-12">
                                                                    <div class="col-lg-12 mb-1">
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">Close Date</span>
                                                                            <input type="date" value="{{$exam->duration_to}}" name="duration_to" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p></p>

                                                                <div class="col-md-12">
                                                                    <div class="input-group mb-8">
                                                                        <label class="input-group-text" for="exam_type">Display Result After Completion</label>
                                                                        <select name="display_ans" class="form-select" id="">
                                                                            @if ($exam->display_ans == 'yes')
                                                                                <option value="yes" selected>Yes</option>
                                                                                <option value="no">No</option>
                                                                            @else
                                                                                <option value="yes">Yes</option>
                                                                                <option value="no" selected>No</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                                    </button>
                                                                    <button type="submit" name="update_action" value="update_reg_exam" class="btn btn-primary me-1 mb-1">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger">
                                No Exam Records Found 
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function answer_check(){
            if (document.getElementById("ans_sel").value == 'Multiple Choice') {
                // alert('working');
                document.getElementById("multichoice").style.display = "block";
                document.getElementById("truefalse").style.display = "none";
            }else{
                document.getElementById("truefalse").style.display = "block";
                document.getElementById("multichoice").style.display = "none";
            }
        }

    </script>

@endsection

 