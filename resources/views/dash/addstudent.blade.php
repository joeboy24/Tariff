
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
                        <a href="/adduser">Add User</a>
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
                {{-- <div class="card-header">
                    <h4>Add Room Type</h4>
                </div> --}}
                <div class="card-body">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Student Here</h4><p class="small_p">Click here to <a href="/studentview"><button type="button" style="font-size: 0.9em!important" class="my_trash">
                                    <i class="fa fa-th-large"></i> &nbsp;View Student List
                                </button></a></p>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    
                                    <form action="{{action('DashController@store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf 

                                        <div class="form-body">
                                            <div class="row">

                                                <div class="col-md-4">
                                                    <label>Firstname</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input onkeyup="mailcon()" id="fname" type="text" name="fname" class="form-control" placeholder="eg. John" required>
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
                                                            <input onkeyup="mailcon()" id="sname" type="text" name="sname" class="form-control" placeholder="eg. Doe" required>
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
                                                            <option value="M" selected>Male</option>
                                                            <option value="F">Female</option>
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
                                                            <input type="date" name="dob" class="form-control" placeholder="dd/mm/yyyy" required>
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
                                                            <option value="1" selected>1st Year</option>
                                                            <option value="2">2nd Year</option>
                                                            <option value="3">3rd Year</option>
                                                            <option value="4">4th Year</option>
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
                                                            <input type="email" name="email" class="form-control" placeholder="Email" required>
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
                                                            <input type="email" id="sch_email" name="sch_email" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                    <p class="small_p"> NOTE: This email will be used to login to the Students Portal</p>
                                                </div>
                                                    
                                                <div class="col-md-4">
                                                    <label>Mobile</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="number" name="contact" class="form-control" placeholder="Mobile" required>
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
                                                            <input type="text" name="residence" class="form-control" placeholder="eg. Lapas, Accra" required>
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
                                                            <input type="text" name="res_address" class="form-control" placeholder="eg. Box AC3552, Accra or Dig. Address" required>
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
                                                            <input type="text" name="guardian" class="form-control" placeholder="Guardian's Full Name" required>
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
                                                            <option selected>Father</option>
                                                            <option>Mother</option>
                                                            <option>Brother</option>
                                                            <option>Sister</option>
                                                            <option>Uncle</option>
                                                            <option>Aunty</option>
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
                                                            <input type="number" name="guard_contact" class="form-control" placeholder="Mobile" required>
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
                                                                    <option value="{{$item->id}}">{{$item->program_name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <p></p>

                                                <div class="col-md-4">
                                                    <label>Choose Passport Photo</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group">
                                                            <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                                            <input name="pass_photo" type="file" class="form-control" id="inputGroupFile01" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                <div class="col-md-4">
                                                    <label>Choose Password</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required autocomplete="current-password">
                                                            <div class="form-control-icon"><i class="bi bi-key"></i></div>
                                                        </div>
                                                    </div>
                                                    <p class="small_p"> NOTE: This password will be required to login to the Students Portal</p>
                                                </div>
                                                    
                                                    
                                                <div class="col-md-4">
                                                    <label>Confirm Password</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input onkeyup="passCheck()" type="password" id="confirm_password" class="form-control" placeholder="Confirm Password" name="confirm_password" required autocomplete="current-password">
                                                            <div class="form-control-icon"><i class="bi bi-key"></i></div>
                                                        </div>
                                                    </div>
                                                    <p style="display: none" id="note1" class="warn_p">jj</p>
                
                                                    <script>
                
                                                        function mailcon() {
                                                           fname = document.getElementById("fname").value;
                                                           sname = document.getElementById("sname").value;
                                                           sch_email = document.getElementById("sch_email");
                
                                                           fname = fname.replace(/\s/g, '');
                                                           sname = sname.replace(/\s/g, '');
                
                                                           init = fname.charAt(0) + sname + '@chntc-akimoda.edu.gh';
                                                           sch_email.value = init;
                                                        }
                
                                                        // document.getElementById("password").value = "5678";
                                                        function passCheck() {
                                                            note2 = document.getElementById("note2");
                                                            pass1 = document.getElementById("password").value;
                                                            pass2 = document.getElementById("confirm_password").value;
                                                            // text = 'Hello World!';
                                                            //     alert(pass2.length);
                                                            // alert(document.getElementById("password").value);
                
                                                            if (pass1.length == pass2.length && pass1 != pass2) {
                                                                alert('Oops..! Passwords do not match');
                                                                // document.getElementById("note2").style.display = "block";
                                                                // document.getElementById("note2").innerHtml = "Passwords do not match";
                                                            }
                                                        }
                                                    </script>
                
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <button type="submit" name="store_action" value="add_student" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User View -->

                </div>


            </div>
        </div>
    </div>

@endsection

 