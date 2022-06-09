
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

            <li class="sidebar-item active">
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
        <h3>File Uploads</h3>
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
                            
                            <form action="{{action('DashController@store')}}" method="POST" enctype="multipart/form-data">
                                @csrf 

                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-4">
                                            <label>Title</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" name="title" class="form-control" placeholder="eg. Economics Slide PPT" id="first-name-icon" autofocus required>
                                                    <div class="form-control-icon"><i class="fa fa-book"></i></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label>Select Type</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group mb-8">
                                                <label class="input-group-text" for="sel1">Slide/Diagram</label>
                                                <select name="type" class="form-select" id="sel1">
                                                    <option value="Slide">Lecture Slide</option>
                                                    <option value="Diagram">Diagram</option>
                                                </select>
                                            </div>
                                        </div><p></p>

                                        <div class="col-md-4">
                                            <label>Select Course</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group mb-8">
                                                <label class="input-group-text"for="inputGroupSelect01">Options</label>
                                                <select name="course_id" class="form-select" id="basicSelect">
                                                    @foreach ($courses as $course)
                                                        @if($course->del == 'no')
                                                           <option value="{{$course->id}}">{{$course->course_name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div><p></p>

                                        <div class="col-md-4">
                                            <label>Upload File Here</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group mb-3">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                                    <input name="photo" type="file" class="form-control" id="inputGroupFile01" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" name="store_action" value="lect_uploads" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-xl-10">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        @if (count($uploads) > 0)
                            <table class="table mb-0 table-lg">
                                <thead>
                                    <tr>
                                        <th>File</th>
                                        <th>Type/Course</th>
                                        <th class="action_size">ACTION</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach ($uploads as $upload)
                                        @if ($upload->del == 'yes')
                                            <tr class="del_danger">
                                        @else
                                            <tr>
                                        @endif
                                            <td class="text-bold-500">{{ $upload->title }}
                                                <p class="small_p">{{ $upload->created_at }}</p>
                                            </td>
                                            <td class="text-bold-500">{{ $upload->type }}
                                                <p class="small_p">{{ $upload->course->course_name }}</p>
                                            </td>
                                            <td class="text-bold-500 action_size">
                                                <form action="{{ action('DashController@update', $upload->id) }}" method="POST">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    @csrf
                                                    
                                                    @if ($upload->del == 'yes')
                                                        <button type="submit" name="update_action" value="restore_lect_upload" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                    @else
                                                        {{-- <a href="/dash/{{$que->id}}"><button type="button" class="my_trash"><i class="fa fa-plus-circle"></i></button></a> --}}
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#viewfile{{$upload->id}}" class="my_trash"><i class="fa fa-pencil"></i></button>
                                                        <button type="submit" name="update_action" value="del_lect_upload" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                                                    @endif 
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="viewfile{{$upload->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                                            {{$upload->title}}
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>

                                                    <form action="{{ action('DashController@update', $upload->id) }}" method="POST">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        @csrf 

                                                        <div class="modal-body">
                                                            
                                                            <div class="col-md-12">

                                                                <p></p>
                                                                <p  style="text-align:center"><img src="/storage/classified/lect_uploads/{{$upload->photo}}" width="90%" style="border-radius: 5%"></p>
                                                                <p></p>

                                                                <div class="col-md-12">
                                                                    <label>Title</label>
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            {{-- <input type="hidden" value="{{$up_split = explode('.', $upload->photo)}}"> --}}
                                                                            
                                                                            <input type="text" name="title" value="{{$upload->title}}" class="form-control" placeholder="eg. Economics Slide PPT" id="first-name-icon" autofocus required>
                                                                            <div class="form-control-icon"><i class="fa fa-book"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                        
                                                                <div class="col-md-12">
                                                                    <label>Select Type</label>
                                                                    <div class="input-group mb-8">
                                                                        <label class="input-group-text" for="sel1">Slide/Diagram</label>
                                                                        <select name="type" class="form-select" id="sel1">
                                                                            @if ($upload->type == 'Slide')
                                                                                <option value="Slide" selected>Lecture Slide</option>
                                                                                <option value="Diagram">Diagram</option>
                                                                            @else
                                                                                <option value="Slide">Lecture Slide</option>
                                                                                <option value="Diagram" selected>Diagram</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div><p></p>
                        
                                                                <div class="col-md-12">
                                                                    <label>Select Course</label>
                                                                    <div class="input-group mb-8">
                                                                        <label class="input-group-text"for="inputGroupSelect01">Options</label>
                                                                        <select name="course_id" class="form-select" id="basicSelect">
                                                                            @foreach ($courses as $course)
                                                                                @if($course->del == 'no')
                                                                                    @if ($course->id == $upload->course_id)    
                                                                                        <option value="{{$course->id}}" selected>{{$course->course_name}}</option>
                                                                                    @else
                                                                                        <option value="{{$course->id}}">{{$course->course_name}}</option>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                                    </button>
                                                                    <button type="submit" name="update_action" value="update_file_upload" class="btn btn-primary me-1 mb-1">Update</button>
                                                                </div>
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
                                No Files Uploaded Yet 
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

 