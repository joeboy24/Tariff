
@extends('layouts.dashlay')

@section('header_nav')
    @include('inc.header_nav')  
@endsection

@section('sidebar_menu')
    
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>

            <li class="sidebar-item">
                <a href="/dashboard" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="/admin_homepage" class='sidebar-link'>
                    <i class="fa fa-home"></i>
                    <span>Homepage</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="/admin_about" class='sidebar-link'>
                    <i class="fa fa-edit"></i>
                    <span>About</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="/admin_news" class='sidebar-link'>
                    <i class="bi bi-pen-fill"></i>
                    <span>News Blog</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="/admin_events" class='sidebar-link'>
                    <i class="fa fa-calendar"></i>
                    <span>Events</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="/admin_contacts" class='sidebar-link'>
                    <i class="fa fa-envelope-square"></i>
                    <span>Inbox</span>
                </a>
            </li>

            <li class="sidebar-item ">
                <a href="/admin_newsletter" class='sidebar-link'>
                    <i class="fa fa-share-alt"></i>
                    <span>Newsletter</span>
                </a>
            </li>

            <li class="sidebar-item active has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="fa fa-cogs"></i>
                    <span>Settings</span>
                </a>
                <ul class="submenu active">
                    <li class="submenu-item">
                        <a href="/companysetup">Company Setup</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/adduser">Add User</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/programs">Add Programs/Courses</a>
                    </li>
                    <li class="submenu-item active">
                        <a href="/programs_outline">Course Registration</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/departments">Register Faculty/Dept.</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/add_staff">Add Staff</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/addstudent">Add Student</a>
                    </li>
                    {{-- <li class="submenu-item ">
                        <a href="#">Accounts</a>
                    </li> --}}
                </ul>
            </li>
        </ul>
    </div>

@endsection

@section('content')

    <div class="page-heading">
        <h3>Course Registration</h3>
    </div>


    <div class="row">
        <div class="col-12 col-xl-10">
            @include('inc.messages')
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$program->department->dept_name}}</h4>
                    <p class="small_p">Select courses for registration by clicking on related checkboxes</p>
                </div>
                <div class="card-body">

                    <div class="col-12">
                        <form action="{{ action('DashController@store') }}" method="POST">
                            @csrf 
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="input-group mb-8">
                                        <label class="input-group-text" for="inputGroupSelect01">Select Year</label>
                                        <select name="reg_year" class="form-select" id="inputGroupSelect01">
                                            <option value="1">1st Year</option>
                                            <option value="2">2nd Year</option>
                                            <option value="3">3rd Year</option>
                                            <option value="4">4th Year</option>
                                        </select>
                                        {{-- <select name="role" class="form-select" id="inputGroupSelect01">
                                            @for ($i = 0; $i < 10; $i++)
                                                @if ($i+2021 == date('Y'))
                                                    <option selected>{{$i+2021}}</option>
                                                @else
                                                    <option>{{$i+2021}}</option>
                                                @endif
                                            @endfor
                                            <option>Other</option>
                                        </select> --}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group mb-8">
                                        <label class="input-group-text" for="inputGroupSelect01">Semester</label>
                                        <select name="reg_sem" class="form-select" id="inputGroupSelect01">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" name="store_action" value="programs_course_reg" class="btn btn-primary me-1 mb-1">Register</button>
                                    <input type="hidden" name="reg_vals" id="val1">
                                </div>
                            </div>
                        </form>

                        <!-- Program View -->
                        <div class="table-responsive">
                            <table class="table mb-0 table-lg">
                                <tbody>
                                    {{-- @foreach ($programs as $item) --}}
                                        @if ($program->del == 'yes')
                                            <tr class="col-12 col-xl-6 del_danger">
                                        @else
                                            <tr class="col-12 col-xl-6">
                                        @endif
                                                <td class="text-bold-500"><b>{{ $program->program_name }}</b>
                                                    <br><p class="small_p">{{ $program->department->dept_name }}</p>
                                                </td>
                                                <td></td>
                                                <form action="{{ action('DashController@update', $program->id) }}" method="POST">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    @csrf
                                                    @if ($program->del == 'yes')
                                                        <td class="text-bold-500 action_size_big float_right">
                                                            <button type="submit" name="update_action" value="restore_program" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                        </td>
                                                    @else
                                                        <td class="text-bold-500 action_size_big float_right">
                                                            {{-- <a href="/admincr/{{$program->id}}"><button type="button" name="showTry" value="regMe" class="my_trash_small">Register</button></a> --}}
                                                            <button type="button" data-bs-toggle="modal" data-bs-target="#mod{{$program->id}}" class="my_trash"><i class="fa fa-pencil"></i></button>
                                                            {{-- <button type="submit" name="update_action" value="del_program" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button> --}}
                                                        </td>
                                                    @endif
                                                    {{-- <button type="submit" name="store_action" value="del_item" rel="tooltip" title="Delete Item" class="close2" onclick="return confirm('Are you sure you want to delete selected item?');"><i class="fa fa-close"></i></button> --}}
                                                </form>
                                            </tr>
                                            
                                        @foreach ($program->course as $sub_items)
                                        
                                            @if ($sub_items->del == 'yes')
                                                <tr class="del_danger cust_row">
                                            @else
                                                <tr class="cust_row">
                                            @endif
                                                <td class="text-bold-500 small_space_left">
                                                    <div class="form-check">
                                                        <div class="custom-control custom-checkbox">
                                                            <label class="form-check-label">
                                                                <input id="tick{{$sub_items->id}}" onclick="tick{{$sub_items->id}}()" type="checkbox" class="form-check-input form-check-info" value="{{$sub_items->id}}" name="customCheck">
                                                                {{ $sub_items->course_code.' - '.$sub_items->course_name }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check nullP">
                                                        <div class="custom-control custom-checkbox">
                                                            <label class="form-check-label">
                                                                <input id="tickopt{{$sub_items->id}}" onclick="tickopt{{$sub_items->id}}()" type="checkbox" class="form-check-input form-check-warning" id="optional{{$sub_items->id}}">
                                                                Optional
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-bold-500 action_size float_right">
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#mod3{{$sub_items->id}}" class="my_trash"><i class="fa fa-pencil"></i></button>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="mod3{{$sub_items->id}}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenterTitle">
                                                                Edit - {{$sub_items->course_name}}
                                                            </h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </div>
                                                        <form action="{{ action('DashController@update', $sub_items->id) }}" method="POST">
                                                            <input type="hidden" name="_method" value="PUT">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="">
                                                                    <label>Course Name</label>
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="text" name="course_name" value="{{$sub_items->course_name}}" class="form-control" placeholder="eg. Statistics 1" id="first-name-icon" autofocus required>
                                                                            <div class="form-control-icon"><i class="fa fa-building"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <label>Course Code</label>
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="text" name="course_code" value="{{$sub_items->course_code}}" class="form-control" placeholder="eg. MIT201" id="first-name-icon" required>
                                                                            <div class="form-control-icon"><i class="fa fa-building"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                                </button>
                                                                <button type="submit" name="update_action" value="course_update" class="btn btn-primary me-1 mb-1">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>

                                                function tick{{$sub_items->id}}() {

                                                    $tick_id = 'tick{{$sub_items->id}}';
                                                    $myVal = '{{$sub_items->id}},';
                                                    $val1 = document.getElementById('val1');

                                                    $tickopt_id = 'tickopt{{$sub_items->id}}';
                                                    $myValComp = '{{$sub_items->id}}=opt,'
                                                    
                                                    if (document.getElementById($tick_id).checked) {
                                                        // Add value if checked & not empty
                                                        if($val1.value == ''){
                                                            $val1.value = $myVal;
                                                        }else{
                                                            $val1.value = $val1.value + $myVal;
                                                        }
                                                    }else{
                                                        if (document.getElementById($tickopt_id).checked) {
                                                            // Remove all if unchecked
                                                            document.getElementById($tickopt_id).checked = false;
                                                            $val1.value = $val1.value.replace($myValComp, '');
                                                        }else{
                                                            // Remove only $myVal
                                                            $val1.value = $val1.value.replace($myVal, '');
                                                        }
                                                    }
                                                    
                                                }

                                                function tickopt{{$sub_items->id}}() {

                                                    $tick_id = 'tick{{$sub_items->id}}';
                                                    $myVal = '{{$sub_items->id}},';
                                                    $val1 = document.getElementById('val1');

                                                    $tickopt_id = 'tickopt{{$sub_items->id}}';
                                                    $myValComp = '{{$sub_items->id}}=opt,'
                                                    
                                                    
                                                    if (document.getElementById($tickopt_id).checked) {
                                                        document.getElementById($tick_id).checked = true;
                                                        // Add value if checked & not empty
                                                        if($val1.value == ''){
                                                            $val1.value = $myValComp;
                                                        }else{
                                                            // Remove and replace with =;
                                                            if ($val1.value.includes($myVal) == true) {
                                                                $val1.value = $val1.value.replace($myVal, '');
                                                            }
                                                            $val1.value = $val1.value + $myValComp;
                                                        }

                                                    }else{
                                                        // Remove if unchecked
                                                        if ($val1.value.includes($myValComp) == true) {
                                                            $val1.value = $val1.value.replace($myValComp, $myVal);
                                                            // alert($val1.value + ' - ' + $myValComp);
                                                        }
                                                    }

                                                }

                                            </script>

                                        @endforeach

                                        <div class="modal fade" id="mod{{$program->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                                            Edit - {{$program->program_name}}
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <form action="{{ action('DashController@update', $program->id) }}" method="POST">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="">
                                                                <label>Faculty/Department Name</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <input type="text" name="program_name" value="{{$program->program_name}}" class="form-control" placeholder="eg. Administration / Math Department" id="first-name-icon" autofocus required>
                                                                        <div class="form-control-icon"><i class="fa fa-building"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="">
                                                                <label>Department</label>
                                                                <fieldset class="form-group">
                                                                    <select name="dept" class="form-select" id="basicSelect">
                                                                        @foreach ($departments as $dept)
                                                                            @if($dept->del == 'no')
                                                                                @if ($dept->id == $program->department_id)
                                                                                    <option value="{{$dept->id}}" selected>{{$dept->dept_name}}</option>
                                                                                @else
                                                                                    <option value="{{$dept->id}}">{{$dept->dept_name}}</option>
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                    </select>
                                                                </fieldset>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                            </button>
                                                            <button type="submit" name="update_action" value="program_update" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                            
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        {{-- <div class="col-12 col-xl-10">
            <div class="card">
                <div class="card-body">
            hjk
                </div>
            </div>
        </div> --}}
    </div>

@endsection

 