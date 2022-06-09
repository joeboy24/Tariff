
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
                    <li class="submenu-item">
                        <a href="/lexam">Exams & Quizes</a>
                    </li>
                    <li class="submenu-item active">
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
                                                                                        <td class="text-bold-500">{{$item->student->fname.' '.$item->student->sname}} <span class="small_p float_right2">Marks: &nbsp; {{$item->score.'/'.$exam->no_of_qs}}</span></td>
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
                                            </form>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger">
                                No Records Found on Exam Scores
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

 