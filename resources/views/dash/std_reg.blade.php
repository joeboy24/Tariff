
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

            <li class="my_sidebar-item active">
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
        <h2>Course Registration</h2>
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

                            {{-- {{count($check)}} --}}

                            @if (count($check) > 0)
                                <p><h6 class="">REGISTRATION SUCCESSFUL</h6>
                                    @if ($company->reg_status == 'open')
                                        <p class="small_p">Click below <!--a href="#"><button type="button" style="font-size: 0.9em!important" class="my_trash">
                                            <i class="fa fa-th-large"></i> &nbsp;Here
                                        </button></a--> to Edit/Update Course Registration</p>
                                    @else
                                        <p class="small_p">Click below to print registration slip for current semester</p>
                                    @endif
                                </p>
                                <a href="/registration_slip"><button type="button" class="btn_red_inverse"><i class="fa fa-print"></i>&nbsp;&nbsp;PRINT SLIP</button></a>
                            @endif

                                <p><h6 class="">{{ $company->ac_year }}
                                    @if ($company->ac_term == 1)
                                        FIRST
                                    @else
                                        SECOND
                                    @endif
                                    SEMESTER REGISTRATION</h6>
                                    <p class="small_p " style="margin-top: -10px">{{ $program->program_name }}</p>
                                </p>

                                <div class="">
                                </div>

                                <!-- Program View -->
                                <div class="table-responsive">
                                    <table class="table mb-0 table-lg">
                                        <tbody>
                                            @foreach ($course_reg as $sub_item)
                                                @if ($sub_item->optional == 'no')
                                                    
                                                    <tr class="cust_row">
                                                        <td class="text-bold-500 small_space_left">
                                                            <div class="form-check">
                                                                <div class="custom-control custom-checkbox">
                                                                    <label class="form-check-label">
                                                                        <input id="tick{{$sub_item->id}}" onclick="tick{{$sub_item->id}}()" type="checkbox" class="form-check-input form-check-info" value="{{$sub_item->course->id}}" name="customCheck">
                                                                        {{ $sub_item->course->course_code.' - '.$sub_item->course->course_name }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <script>

                                                        function tick{{$sub_item->id}}() {

                                                            $tick_id = 'tick{{$sub_item->id}}';
                                                            $myVal = '{{$sub_item->course->id}},';
                                                            $val1 = document.getElementById('val1');
                                                            
                                                            if (document.getElementById($tick_id).checked) {
                                                                // Add value if checked & not empty
                                                                if($val1.value == ''){
                                                                    $val1.value = $myVal;
                                                                }else{
                                                                    $val1.value = $val1.value + $myVal;
                                                                }
                                                            }else{
                                                                $val1.value = $val1.value.replace($myVal, '');
                                                            }
                                                            
                                                        }


                                                    </script>

                                                @endif
                                            @endforeach
                                            <tr>
                                                <td><b>OPTIONAL</b><br><span class="small_p">Select one or many from this list</span></td>
                                            </tr>
                                            @foreach ($course_reg as $sub_item)
                                                @if ($sub_item->optional == 'yes')
                                                    
                                                    <tr class="cust_row">
                                                        <td class="text-bold-500 small_space_left">
                                                            <div class="form-check">
                                                                <div class="custom-control custom-checkbox">
                                                                    <label class="form-check-label">
                                                                        <input id="tick{{$sub_item->id}}" onclick="tick{{$sub_item->id}}()" type="checkbox" class="form-check-input form-check-info" value="{{$sub_item->course->id}}" name="customCheck">
                                                                        {{ $sub_item->course->course_code.' - '.$sub_item->course->course_name }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <script>

                                                        function tick{{$sub_item->id}}() {

                                                            $tick_id = 'tick{{$sub_item->id}}';
                                                            $myVal = '{{$sub_item->course->id}},';
                                                            $val1 = document.getElementById('val1');
                                                            
                                                            if (document.getElementById($tick_id).checked) {
                                                                // Add value if checked & not empty
                                                                if($val1.value == ''){
                                                                    $val1.value = $myVal;
                                                                }else{
                                                                    $val1.value = $val1.value + $myVal;
                                                                }
                                                            }else{
                                                                $val1.value = $val1.value.replace($myVal, '');
                                                            }
                                                            
                                                        }


                                                    </script>

                                                @endif
                                            @endforeach
                                                    
                                            {{-- @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>

                                {{-- <div class="alert alert-danger">
                                    No Staff Records Found 
                                </div> --}}

                                <form action="{{ action('StdDashController@store') }}" method="POST">
                                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                                    @csrf
                                    <p></p>
                                    <input type="hidden" name="reg_vals" id="val1">
                                    @if (count($check) > 0)
                                        <button type="submit" name="store_action" value="std_course_reg" class="btn_green float_right2"><i class="fa fa-save"></i>&nbsp;&nbsp;UPDATE</button>
                                        <p>&nbsp;</p>
                                    @else
                                        <button type="submit" name="store_action" value="std_course_reg" class="btn_red_inverse float_right2"><i class="fa fa-save"></i>&nbsp;&nbsp;REGISTER</button>
                                    @endif
                                </form>
                            {{-- @endif --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

 