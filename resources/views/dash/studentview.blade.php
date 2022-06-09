
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
                    <li class="submenu-item ">
                        <a href="/companysetup">Company Setup</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/addstudent">Add student</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/programs">Add Programs/Courses</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/programs_outline">Course Registration</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/departments">Register Faculty/Dept.</a>
                    </li>
                    <li class="submenu-item">
                        <a href="/add_staff">Add Staff</a>
                    </li>
                    <li class="submenu-item active">
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
        <h3>Manage Settings</h3>
    </div>


    <div class="row">
        <div class="col-12 col-xl-10">
            @include('inc.messages')
            <div class="card">
                <div class="card-body">

                    <!-- std View -->
                    <div class="table-responsive">
                        @if (count($students) > 0)
                            <table class="table mb-0 table-lg">
                                <thead>
                                    <tr>
                                        <th>PHOTO</th>
                                        <th>STUDENT INFO.</th>
                                        <th class="float_right">ACTION</th>
                                    </tr>
                                </thead>   
                                <tbody>
                                    @foreach ($students as $std)
                                    
                                        @if ($std->del == 'yes')
                                            <tr class="del_danger">
                                        @else
                                            <tr>
                                        @endif
                                            <td class="text-bold-500"><img src="/storage/classified/student/{{$std->photo}}" width="30px" style="border-radius: 50%">&nbsp; {{ $std->name }}</td>
                                            <td>{{ $std->fname.' '.$std->sname }}<br><p class="small_p">Year: {{ $std->class.' / Course: '.$std->program->program_name }}</p></td>
                                            <form action="{{ action('DashController@update', $std->id) }}" method="POST">
                                                <input type="hidden" name="_method" value="PUT">
                                                {{-- <input type="hidden" name="_method" value="PUT"> --}}
                                                @csrf

                                                @if ($std->del == 'yes')
                                                    <td class="text-bold-500 float_right"><button type="submit" name="update_action" value="restore_std" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button></td>
                                                @else
                                                    <td class="text-bold-500 float_right"><button type="button" data-bs-toggle="modal" data-bs-target="#std_mod{{$std->id}}" class="my_trash"><i class="fa fa-pencil"></i></button>
                                                    <button type="submit" name="update_action" value="del_std" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button></td>
                                                @endif
                                            </form>
                                        </tr>

                                        <div class="modal fade" id="std_mod{{$std->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                                            Edit Staff Here
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <form action="{{ action('DashController@update', $std->id) }}" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        @csrf
                                                        
                                                        <div class="col-md-12 modal-body">

                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    <label>Firstname</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input onkeyup="mailcon{{$std->id}}()" id="fname{{$std->id}}" type="text" name="fname" class="form-control" placeholder="eg. John" value="{{ $std->fname }}" required>
                                                                            <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                
                                                                <div class="col-md-4">
                                                                    <label>Othernames</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input onkeyup="mailcon{{$std->id}}()" id="sname{{$std->id}}" type="text" name="sname" class="form-control" placeholder="eg. Doe" value="{{ $std->sname }}" required>
                                                                            <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                
                                                                <div class="col-md-4">
                                                                    <label>Gender</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="input-group mb-8">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Select</label>
                                                                        <select name="sex" class="form-control" id="inputGroupSelect01">
                                                                            @if ($std->sex == 'M')
                                                                                <option value="M" selected>Male</option>
                                                                                <option value="F">Female</option>
                                                                            @else
                                                                                <option value="M">Male</option>
                                                                                <option value="F" selected>Female</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <p></p>
                                
                                                                <div class="col-md-4">
                                                                    <label>Date of Birth</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="date" name="dob" class="form-control" placeholder="dd/mm/yyyy" value="{{ $std->dob }}" required>
                                                                            <div class="form-control-icon"><i class="fa fa-calendar"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                
                                                                <div class="col-md-4">
                                                                    <label>Current Level</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="input-group mb-8">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Select</label>
                                                                        <select name="class" class="form-control" id="inputGroupSelect01">
                                                                            @if ($std->class == 1)
                                                                                <option value="1" selected>1st Year</option>
                                                                                <option value="2">2nd Year</option>
                                                                                <option value="3">3rd Year</option>
                                                                                <option value="4">4th Year</option>
                                                                            @elseif ($std->class == 2)
                                                                                <option value="1">1st Year</option>
                                                                                <option value="2" selected>2nd Year</option>
                                                                                <option value="3">3rd Year</option>
                                                                                <option value="4">4th Year</option>
                                                                            @elseif ($std->class == 3)
                                                                                <option value="1">1st Year</option>
                                                                                <option value="2">2nd Year</option>
                                                                                <option value="3" selected>3rd Year</option>
                                                                                <option value="4">4th Year</option>
                                                                            @elseif ($std->class == 4)
                                                                                <option value="1">1st Year</option>
                                                                                <option value="2">2nd Year</option>
                                                                                <option value="3">3rd Year</option>
                                                                                <option value="4" selected>4th Year</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <p></p>
                                                                    
                                                                <div class="col-md-4">
                                                                    <label>Email</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $std->email }}" required>
                                                                            <div class="form-control-icon"><i class="bi bi-envelope"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    
                                                                <div class="col-md-4">
                                                                    <label>School Email</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="email" id="sch_email{{$std->id}}" name="sch_email" class="form-control" value="{{ $std->sch_email }}" readonly>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    
                                                                <div class="col-md-4">
                                                                    <label>Mobile</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="number" name="contact" class="form-control" placeholder="Mobile" value="{{ $std->contact }}" required>
                                                                            <div class="form-control-icon"><i class="bi bi-phone"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    
                                                                <div class="col-md-4">
                                                                    <label>Residence</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="text" name="residence" class="form-control" placeholder="eg. Lapas, Accra" value="{{ $std->residence }}" required>
                                                                            <div class="form-control-icon"><i class="bi bi-building"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    
                                                                <div class="col-md-4">
                                                                    <label>Residential / Digital Address</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="text" name="res_address" class="form-control" placeholder="eg. Box AC3552, Accra or Dig. Address" value="{{ $std->res_address }}" required>
                                                                            <div class="form-control-icon"><i class="bi bi-globe"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                
                                                                <div class="col-md-4">
                                                                    <label>Guardian's Name</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="text" name="guardian" class="form-control" placeholder="Guardian's Full Name" value="{{ $std->guardian }}" required>
                                                                            <div class="form-control-icon"><i class="bi bi-person"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                
                                                                <div class="col-md-4">
                                                                    <label>Relation to Guardian</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="input-group mb-8">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Select</label>
                                                                        <select name="guard_rel" class="form-control" id="inputGroupSelect01">
                                                                            @if ($std->guard_rel == 'Father')
                                                                                <option selected>Father</option>
                                                                                <option>Mother</option>
                                                                                <option>Brother</option>
                                                                                <option>Sister</option>
                                                                                <option>Uncle</option>
                                                                                <option>Aunty</option>
                                                                            @elseif ($std->guard_rel == 'Mother')
                                                                                <option>Father</option>
                                                                                <option selected>Mother</option>
                                                                                <option>Brother</option>
                                                                                <option>Sister</option>
                                                                                <option>Uncle</option>
                                                                                <option>Aunty</option>
                                                                            @elseif ($std->guard_rel == 'Brother')
                                                                                <option>Father</option>
                                                                                <option>Mother</option>
                                                                                <option selected>Brother</option>
                                                                                <option>Sister</option>
                                                                                <option>Uncle</option>
                                                                                <option>Aunty</option>
                                                                            @elseif ($std->guard_rel == 'Sister')
                                                                                <option>Father</option>
                                                                                <option>Mother</option>
                                                                                <option>Brother</option>
                                                                                <option selected>Sister</option>
                                                                                <option>Uncle</option>
                                                                                <option>Aunty</option>
                                                                            @elseif ($std->guard_rel == 'Uncle')
                                                                                <option>Father</option>
                                                                                <option>Mother</option>
                                                                                <option>Brother</option>
                                                                                <option>Sister</option>
                                                                                <option selected>Uncle</option>
                                                                                <option>Aunty</option>
                                                                            @elseif ($std->guard_rel == 'Aunty')
                                                                                <option>Father</option>
                                                                                <option>Mother</option>
                                                                                <option>Brother</option>
                                                                                <option>Sister</option>
                                                                                <option>Uncle</option>
                                                                                <option selected>Aunty</option>
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <p></p>
                                                                    
                                                                <div class="col-md-4">
                                                                    <label>Guardian's Contact</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group has-icon-left">
                                                                        <div class="position-relative">
                                                                            <input type="number" name="guard_contact" class="form-control" placeholder="Mobile" value="{{ $std->guardian_cont }}" required>
                                                                            <div class="form-control-icon"><i class="bi bi-phone"></i></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                
                                                                <div class="col-md-4">
                                                                    <label>Program</label>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="input-group mb-8">
                                                                        <label class="input-group-text" for="inputGroupSelect01">Select</label>
                                                                        <select name="program" class="form-select" id="basicSelect">
                                                                            @foreach ($programs as $item)
                                                                                @if($item->del == 'no')
                                                                                    @if ($item->id == $std->program_id)
                                                                                        <option value="{{$item->id}}" selected>{{$item->program_name}}</option>
                                                                                    @else
                                                                                        <option value="{{$item->id}}">{{$item->program_name}}</option>
                                                                                    @endif
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <p></p>

                                                                    <script>
                                
                                                                        function mailcon{{$std->id}}() {
                                                                           fname = document.getElementById("fname{{$std->id}}").value;
                                                                           sname = document.getElementById("sname{{$std->id}}").value;
                                                                           sch_email = document.getElementById("sch_email{{$std->id}}");
                                
                                                                           fname = fname.replace(/\s/g, '');
                                                                           sname = sname.replace(/\s/g, '');
                                
                                                                           init = fname.charAt(0) + sname + '@chntc-akimoda.edu.gh';
                                                                           sch_email.value = init;
                                                                        }

                                                                    </script>
                                
                                                            </div>
            
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                            </button>
                                                            <button type="submit" name="update_action" value="student_update" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $students->links() }}
                        @else
                            <tr><td>No std Found</td></tr>
                        @endif
                    </div>

                </div>


            </div>
        </div>
    </div>

@endsection

 