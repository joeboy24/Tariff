
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

        <li class="sidebar-item active">
            <a href="/admin_homepage" class='sidebar-link'>
                <i class="fa fa-home"></i>
                <span>Homepage</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="/admin_about" class='sidebar-link'>
                <i class="fa fa-edit"></i>
                <span>About</span>
            </a>
        </li>

        <li class="sidebar-item">
            <a href="/admin_news" class='sidebar-link'>
                <i class="bi bi-pen-fill"></i>
                <span>News Blog</span>
            </a>
        </li>

        <li class="sidebar-item">
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

        <li class="sidebar-item has-sub">
            <a href="#" class='sidebar-link'>
                <i class="fa fa-cogs"></i>
                <span>Settings</span>
            </a>
            <ul class="submenu">
                <li class="submenu-item">
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
        <h3>Homepage</h3>
    </div>

    <div class="row">
        <div class="col-12 col-xl-10">
            @include('inc.messages') 
            <div class="card">
                <div class="card-body">

                    <form class="form form-horizontal" action="{{action('DashController@store')}}" method="POST">
                        @csrf
                        <div class="row seablue_bottom">
                                    
                            <div class="row slider_div my_borders">
                                <h5>Slider - Section 1</h5>
                                {{-- <div class="col-md-2">
                                    <p>Select Slider Images</p>
                                </div> --}}
                                @if (count($gallery) > 0)
                                    @if ($homepage->img1_photo != '')
                                        <div id="bg_img1" class="col-md-3 slider_img_overlay_container" style="background-image: url(/storage/classified/system_use/{{$homepage->img1_photo}});">
                                    @else 
                                        <div id="bg_img1" class="col-md-3 slider_img_overlay_container" style="background-image: url(/storage/classified/noimage.jpg);">
                                    @endif
                                        <div class="slider_img_overlay my_dropdown">
                                            <li class="nav-item"><a href="" class="nav-link dropbtn">Image 1</a>
                                                <div class="my_dropdown-content">
                                                    @foreach ($sys_gallery as $item)
                                                        <a id="item{{$item->id}}" onclick="insertTestImg1{{$item->id}}()">Image {{$y++}} &nbsp; <img class="float_right2" src="/storage/classified/system_use/{{$item->photo}}" width="30px"></a>
                                                    
                                                        <script>
                                                            function insertTestImg1{{$item->id}}() {
                                                                document.getElementById('slider1').value = "{{$item->photo}}";
                                                                document.getElementById('bg_img1').style.backgroundImage = "url(/storage/classified/system_use/{{$item->photo}})";
                                                            }
                                                        </script>

                                                    @endforeach
                                                </div>
                                            </li>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$homepage->img1_photo}}" name="slider1" id="slider1">



                                    @if ($homepage->img1_photo != '')
                                        <div id="bg_img2" class="col-md-3 slider_img_overlay_container" style="background-image: url(/storage/classified/system_use/{{$homepage->img2_photo}});">
                                    @else 
                                        <div id="bg_img2" class="col-md-3 slider_img_overlay_container" style="background-image: url(/storage/classified/noimage.jpg);">
                                    @endif
                                        <div class="slider_img_overlay my_dropdown">
                                            <li class="nav-item"><a href="" class="nav-link dropbtn">Image 2</a>
                                                <div class="my_dropdown-content">
                                                    @foreach ($sys_gallery as $item)
                                                        <a id="item{{$item->id}}" onclick="insertTestImg2{{$item->id}}()">Image {{$y++}} &nbsp; <img class="float_right2" src="/storage/classified/system_use/{{$item->photo}}" width="30px"></a>
                                                    
                                                        <script>
                                                            function insertTestImg2{{$item->id}}() {
                                                                document.getElementById('slider2').value = "{{$item->photo}}";
                                                                document.getElementById('bg_img2').style.backgroundImage = "url(/storage/classified/system_use/{{$item->photo}})";
                                                            }
                                                        </script>

                                                    @endforeach
                                                </div>
                                            </li>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$homepage->img2_photo}}" name="slider2" id="slider2">



                                    @if ($homepage->img1_photo != '')
                                        <div id="bg_img3" class="col-md-3 slider_img_overlay_container" style="background-image: url(/storage/classified/system_use/{{$homepage->img3_photo}});">
                                    @else 
                                        <div id="bg_img3" class="col-md-3 slider_img_overlay_container" style="background-image: url(/storage/classified/noimage.jpg);">
                                    @endif
                                        <div class="slider_img_overlay my_dropdown">
                                            <li class="nav-item"><a href="" class="nav-link dropbtn">Image 3</a>
                                                <div class="my_dropdown-content">
                                                    @foreach ($sys_gallery as $item)
                                                        <a id="item{{$item->id}}" onclick="insertTestImg3{{$item->id}}()">Image {{$y++}} &nbsp; <img class="float_right2" src="/storage/classified/system_use/{{$item->photo}}" width="30px"></a>
                                                    
                                                        <script>
                                                            function insertTestImg3{{$item->id}}() {
                                                                document.getElementById('slider3').value = "{{$item->photo}}";
                                                                document.getElementById('bg_img3').style.backgroundImage = "url(/storage/classified/system_use/{{$item->photo}})";
                                                            }
                                                        </script>

                                                    @endforeach
                                                </div>
                                            </li>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{$homepage->img3_photo}}" name="slider3" id="slider3">
                                @endif

                                <div class="col-md-6 my_borders">
                                    <h6>Slider Image 1</h6>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Image 1 Title</span>
                                        <input type="text" maxlength="250" name="img1_title" @if ($homepage != '') value="{{$homepage->img1_title}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
    
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <div class="form-group with-title mb-3">
                                                <textarea maxlength="250" name="img1_text" class="form-control" rows="3" > @if ($homepage != '') {{$homepage->img1_text}} @else @endif</textarea>
                                                {{-- <textarea maxlength="250" name="company_add" class="form-control" rows="3" placeholder="Address" ></textarea> --}}
                                                <label>Type Meet 1 Text Here</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 my_borders">
                                    <h6>Slider Image 2</h6>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Image 2 Title</span>
                                        <input type="text" maxlength="250" name="img2_title" @if ($homepage != '') value="{{$homepage->img2_title}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                    </div>
    
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <div class="form-group with-title mb-3">
                                                <textarea maxlength="250" name="img2_text" class="form-control" rows="3" > @if ($homepage != '') {{$homepage->img2_text}} @else @endif</textarea>
                                                <label>Type Meet 2 Text Here</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 my_borders">
                                    <h6>Slider Image 3</h6>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Image 3 Title</span>
                                        <input type="text" maxlength="250" name="img3_title" @if ($homepage != '') value="{{$homepage->img3_title}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                    </div>
    
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <div class="form-group with-title mb-3">
                                                <textarea maxlength="250" name="img3_text" class="form-control" rows="3" >@if ($homepage != '') {{$homepage->img3_text}} @else @endif</textarea>
                                                {{-- <textarea maxlength="250" name="company_add" class="form-control" rows="3" placeholder="Address" ></textarea> --}}
                                                <label>Type Image 3 Text Here</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Goals -->
                            <div class="col-md-12">

                                <h5>Goals - Section2</h5>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Goals Header</span>
                                        <input type="text" maxlength="250" name="goals_header" @if ($homepage != '') value="{{session('homepage')->goals_header}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                        
                                        {{-- @if ($homepage != '') value="{{session('homepage')->goals_header}}" @else @endif --}}
                                </div>

                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <div class="form-group with-title mb-3">
                                            <textarea maxlength="250" name="goals_body" class="form-control" rows="2" >@if ($homepage != '') {{$homepage->goals_body}} @else @endif</textarea>
                                            {{-- <textarea maxlength="250" name="company_add" class="form-control" rows="3" placeholder="Address" ></textarea> --}}
                                            <label>Type Subheader If Any</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Goals -->
                                <div class="row">
                                    <div class="col-md-6 my_borders">
                                        <h6>Goal 1</h6>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Goal 1 Title</span>
                                            <input type="text" maxlength="250" name="goal1_title" @if ($homepage != '') value="{{$homepage->goal1_title}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                        </div>
        
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-group with-title mb-3">
                                                    <textarea maxlength="250" name="goal1_text" class="form-control" rows="3" > @if ($homepage != '') {{$homepage->goal1_text}} @else @endif</textarea>
                                                    {{-- <textarea maxlength="250" name="company_add" class="form-control" rows="3" placeholder="Address" ></textarea> --}}
                                                    <label>Type Goal 1 Text Here</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 my_borders">
                                        <h6>Goal 2</h6>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Goal 2 Title</span>
                                            <input type="text" maxlength="250" name="goal2_title" @if ($homepage != '') value="{{$homepage->goal2_title}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                        </div>
        
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-group with-title mb-3">
                                                    <textarea maxlength="250" name="goal2_text" class="form-control" rows="3" > @if ($homepage != '') {{$homepage->goal2_text}} @else @endif</textarea>
                                                    <label>Type Goal 2 Text Here</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 my_borders">
                                        <h6>Goal 3</h6>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Goal 3 Title</span>
                                            <input type="text" maxlength="250" name="goal3_title" @if ($homepage != '') value="{{$homepage->goal3_title}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                        </div>
        
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-group with-title mb-3">
                                                    <textarea maxlength="250" name="goal3_text" class="form-control" rows="3" > @if ($homepage != '') {{$homepage->goal3_text}} @else @endif</textarea>
                                                    <label>Type Goal 3 Text Here</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 my_borders">
                                        <h6>Goal 4</h6>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Goal 4 Title</span>
                                            <input type="text" maxlength="250" name="goal4_title" @if ($homepage != '') value="{{$homepage->goal4_title}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                        </div>
        
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-group with-title mb-3">
                                                    <textarea maxlength="250" name="goal4_text" class="form-control" rows="3" > @if ($homepage != '') {{$homepage->goal4_text}} @else @endif</textarea>
                                                    {{-- <textarea maxlength="250" name="company_add" class="form-control" rows="3" placeholder="Address" ></textarea> --}}
                                                    <label>Type Goal 4 Text Here</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                         
                            </div>

                            <!-- Meet -->
                            <div class="col-md-12">

                                <h5>Meet - Section3</h5>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Meet Header</span>
                                    <input type="text" maxlength="250" name="meet_header" @if ($homepage != '') value="{{$homepage->meet_header}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                </div>

                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <div class="form-group with-title mb-3">
                                            <textarea maxlength="250" name="meet_body" class="form-control" rows="2" > @if ($homepage != '') {{$homepage->meet_body}} @else @endif</textarea>
                                            {{-- <textarea maxlength="250" name="company_add" class="form-control" rows="3" placeholder="Address" ></textarea> --}}
                                            <label>Type Subheader If Any</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 my_borders">
                                        <h6>Meet 1</h6>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Meet 1 Title</span>
                                            <input type="text" maxlength="250" name="meet1_title" @if ($homepage != '') value="{{$homepage->meet1_title}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
        
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-group with-title mb-3">
                                                    <textarea maxlength="250" name="meet1_text" class="form-control" rows="3" > @if ($homepage != '') {{$homepage->meet1_text}} @else @endif</textarea>
                                                    {{-- <textarea maxlength="250" name="company_add" class="form-control" rows="3" placeholder="Address" ></textarea> --}}
                                                    <label>Type Meet 1 Text Here</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 my_borders">
                                        <h6>Meet 2</h6>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Meet 2 Title</span>
                                            <input type="text" maxlength="250" name="meet2_title" @if ($homepage != '') value="{{$homepage->meet2_title}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                        </div>
        
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-group with-title mb-3">
                                                    <textarea maxlength="250" name="meet2_text" class="form-control" rows="3" > @if ($homepage != '') {{$homepage->meet2_text}} @else @endif</textarea>
                                                    <label>Type Meet 2 Text Here</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 my_borders">
                                        <h6>Meet 3</h6>

                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Meet 3 Title</span>
                                            <input type="text" maxlength="250" name="meet3_title" @if ($homepage != '') value="{{$homepage->meet3_title}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                        </div>
        
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-group with-title mb-3">
                                                    <textarea maxlength="250" name="meet3_text" class="form-control" rows="3" >@if ($homepage != '') {{$homepage->meet3_text}} @else @endif</textarea>
                                                    {{-- <textarea maxlength="250" name="company_add" class="form-control" rows="3" placeholder="Address" ></textarea> --}}
                                                    <label>Type Meet 3 Text Here</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row col-md-6 my_borders">
                                        <h6>Headteacher's Photo</h6>

                                        @if ($homepage != '')
                                            @if ($homepage->headteacher_photo != '')
                                                <div id="bg_img4" class="col-md-6 slider_img_overlay_container" style="background-image: url(/storage/classified/system_use/{{$homepage->headteacher_photo}});">
                                            @else 
                                                <div id="bg_img4" class="col-md-6 slider_img_overlay_container" style="background-image: url(/storage/classified/noimage.jpg);">
                                            @endif
                                        @else
                                            <div id="bg_img4" class="col-md-6 slider_img_overlay_container" style="background-image: url(/storage/classified/noimage.jpg);">
                                        @endif
                                            <div class="slider_img_overlay my_dropdown">
                                                <li class="nav-item"><a href="" class="nav-link dropbtn">Select Image</a>
                                                <div class="my_dropdown-content">
                                                    @foreach ($sys_gallery as $item)
                                                        <a id="item{{$item->id}}" onclick="insertTestImg4{{$item->id}}()">Image {{$y++}} &nbsp; <img class="float_right2" src="/storage/classified/system_use/{{$item->photo}}" width="30px"></a>
                                                    
                                                        <script>
                                                            function insertTestImg4{{$item->id}}() {
                                                                // alert('{{$item->id}}');
                                                                document.getElementById('ht_photo').value = "{{$item->photo}}";
                                                                document.getElementById('bg_img4').style.backgroundImage = "url(/storage/classified/system_use/{{$item->photo}})";
                                                            }
                                                        </script>

                                                    @endforeach
                                                </div>
                                                </li>
                                            </div>
                                        </div>
                                        <input type="hidden" value="@if ($homepage != ''){{$homepage->headteacher_photo}}@endif" name="ht_photo" id="ht_photo">
                                        
                                    </div>
                                </div> 
                            </div>

                            <!-- Curius -->
                            <div class="col-md-12">
                                <h5>Curious - Section4</h5>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Header</span>
                                    <input type="text" maxlength="250" name="curious_header" @if ($homepage != '') value="{{$homepage->curious_header}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                </div>

                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <div class="form-group with-title mb-3">
                                            <textarea maxlength="250" name="curious_body" class="form-control" rows="2" > @if ($homepage != '') {{$homepage->curious_body}} @else @endif</textarea>
                                            {{-- <textarea maxlength="250" name="company_add" class="form-control" rows="3" placeholder="Address" ></textarea> --}}
                                            <label>Type Subheader If Any</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-check"></i>&nbsp;&nbsp;Bullet 1</span>
                                    <input type="text" maxlength="250" name="cur_bul1" @if ($homepage != '') value="{{$homepage->cur_bul1}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-check"></i>&nbsp;&nbsp;Bullet 2</span>
                                    <input type="text" maxlength="250" name="cur_bul2" @if ($homepage != '') value="{{$homepage->cur_bul2}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-check"></i>&nbsp;&nbsp;Bullet 3</span>
                                    <input type="text" maxlength="250" name="cur_bul3" @if ($homepage != '') value="{{$homepage->cur_bul3}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-check"></i>&nbsp;&nbsp;Bullet 4</span>
                                    <input type="text" maxlength="250" name="cur_bul4" @if ($homepage != '') value="{{$homepage->cur_bul4}}" @else @endif class="form-control" aria-label="Username" aria-describedby="basic-addon1" >
                                </div>
                            </div>

                            <div style="height: 10px"></div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-info me-1 mb-1" name="store_action" value="add_homepage">Save</button>
                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            </div>
                            <p class="small_p float_right">Click on save to update Section 1 - 3 &nbsp;</p>
                                    
                        </div>    
                    </form>


                    <div class="row black_bottom">
                        <!-- Testimony -->
                        <div class="col-md-12 my_borders">
                            <form class="form form-horizontal" action="{{action('DashController@store')}}" method="POST">
                                @csrf
                                <h5>Testimony - Section 5</h5>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Name</span>
                                    <input type="text" maxlength="250" name="name" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Position</span>
                                    <input type="text" maxlength="250" name="position" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <div class="form-group with-title mb-3">
                                            <textarea maxlength="250" name="message" class="form-control" rows="2" ></textarea>
                                            {{-- <textarea maxlength="250" name="company_add" class="form-control" rows="3" placeholder="Address" ></textarea> --}}
                                            <label>Type Message Here</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row slider_div">
                                    @if (count($gallery) > 0)
                                        <div id="bg_img" class="col-md-3 slider_img_overlay_container" style="background-image: url(/storage/classified/noimage.jpg);">
                                            {{-- <img src="/storage/classified/Nursing/n3.jpeg"> --}}
                                            <div class="slider_img_overlay my_dropdown">
                                                {{-- <p>Image 1</p> --}}
                                                <li class="nav-item"><a href="" class="nav-link dropbtn">Select Image</a>
                                                <div class="my_dropdown-content">
                                                    @foreach ($gallery as $item)
                                                        <a id="item{{$item->id}}" onclick="insertTestImg{{$item->id}}()">Image {{$y++}} &nbsp; <img class="float_right2" src="/storage/classified/gallery/{{$item->photo}}" width="30px"></a>
                                                    
                                                        <script>
                                                            function insertTestImg{{$item->id}}() {
                                                                // alert('{{$item->id}}');
                                                                document.getElementById('test_img').value = "{{$item->photo}}";
                                                                document.getElementById('bg_img').style.backgroundImage = "url(/storage/classified/gallery/{{$item->photo}})";
                                                            }
                                                        </script>

                                                    @endforeach
                                                </div>
                                                </li>
                                            </div>
                                        </div>
                                        <input type="hidden" name="test_img" id="test_img">
                                    @endif
                                </div>

                                <div style="height: 10px"></div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1" name="store_action" value="add_testimony">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                                        
                            </form>
                        </div>
                        
                        <!-- Uploads -->
                        <div class="col-md-12 my_borders">
                            <form class="form form-horizontal" action="{{action('DashController@store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h5>Uploads - Section 6</h5>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupFile01"><i class="bi bi-upload"></i></label>
                                    <input type="file" name="photo[]" multiple class="form-control" id="inputGroupFile01" >
                                </div>

                                <div class="input-group mb-8">
                                    <label class="input-group-text" for="inputGroupSelect01">Upload For</label>
                                    <select name="use" class="form-select" id="inputGroupSelect01">
                                        <option selected>Gallery Use</option>
                                        <option>System Use</option>
                                    </select>
                                </div>

                                <div style="height: 20px"></div>
                                <h6>NOTE</h6>
                                <p class="gray_p">"Gallery Use" means image will be available to the public. ie. on gallery page</p>
                                <p class="small_p">"System Use" means image will be available for system use only. ie. website interface design</p>
                                <p class="mid_p">Ex. Slider 1 - 3 images will be for "System Use" and not to be seen on the gallery page.</p>

                                <div style="height: 10px"></div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-dark me-1 mb-1" name="store_action" value="gallery_uploads">Upload</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
        


    <!-- About View -->
    {{-- @if (count($about) != 0)
        <div class="row">
            <div class="col-12 col-xl-10">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-lg">
                                <tbody>
                                    @foreach ($about as $item)
                                        <tr>
                                            <td class="text-bold-500">{{ $item->header }}</td>
                                            <td class="text-bold-500"><p class="small_p">Title: <b style="text-transform: uppercase">{{ $item->title }}</b></p>
                                                <p class="gray_p">{{ $item->text }}</p>
                                                <p class="small_p">Date Updated: {{ $item->updated_at }}</p>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif --}}

@endsection

 