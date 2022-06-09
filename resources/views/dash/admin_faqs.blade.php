
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

            <li class="sidebar-item active">
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
        <h3>Inbox</h3>
    </div>


    <div class="row">
        <div class="col-12 col-xl-12">
            @include('inc.messages')

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Frequently Asked Questions (FaQs)</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        
                        <form action="{{action('DashController@store')}}" method="POST">
                            @csrf 

                            <div class="form-body">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <label>Question</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-group with-title mb-3">
                                                    <textarea name="message" class="form-control" rows="2" required></textarea>
                                                    {{-- <textarea name="company_add" class="form-control" rows="3" placeholder="Address" required></textarea> --}}
                                                    <label>Ask Question Here</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="col-md-4">
                                        <label>Answer</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <div class="form-group with-title mb-3">
                                                    <textarea name="answer" class="form-control" rows="3" required></textarea>
                                                    {{-- <textarea name="company_add" class="form-control" rows="3" placeholder="Address" required></textarea> --}}
                                                    <label>Provide Answer to Question Here</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" name="store_action" value="Ask_Us" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>


                <!-- User View -->
                <div class="table-responsive">
                    @if (count($faqs) > 0)
                        <table class="table mb-0 table-lg">
                            <thead>
                                <tr>
                                    <th>NAME/CONTACT</th>
                                    <th>MESSAGE</th>
                                    <th class="float_right">ACTION</th>
                                </tr>
                            </thead>   
                            <tbody>
                                @foreach ($faqs as $faq)
                                    @if ($faq->del == 'yes')
                                        <tr class="del_danger">
                                    @else
                                        <tr>
                                    @endif
                                        <td class="text-bold-500">{{ $faq->name }}
                                            <p class="gray_p">Contact: {{ $faq->phone }}</p>
                                            <p class="small_p">{{ $faq->email }}</p>
                                        </td>
                                        <td class="text-bold-500">Question: {{ $faq->message }}<p class="gray_p">Answer: {{ $faq->answer }}</p><p class="small_p"></p></td>
                                            <form action="{{ action('DashController@update', $faq->id) }}" method="POST">
                                                {{-- <input type="hidden" name="_method" value="DELETE"> --}}
                                                <input type="hidden" name="_method" value="PUT">
                                                @csrf


                                                @if ($faq->del == 'yes')
                                                    <td class="text-bold-500 float_right">
                                                        <button type="submit" name="update_action" value="restore_faq" class="my_trash" onclick="return confirm('Do you want to restore this record?')"><i class="fa fa-reply"></i></button>
                                                    </td>
                                                @else
                                                    <td class="text-bold-500 float_right">
                                                        <button type="button" data-bs-toggle="modal" data-bs-target="#mod{{$faq->id}}" class="my_trash"><i class="fa fa-pencil"></i></button>
                                                        <button type="submit" name="update_action" value="del_faq" class="my_trash" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                @endif
                                            </form>
                                        </tr>

                                        <div class="modal fade" id="mod{{$faq->id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                                            Edit {{$faq->dept_name}} Here
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                    <form action="{{ action('DashController@update', $faq->id) }}" method="POST">
                                                        <input type="hidden" name="_method" value="PUT">
                                                        @csrf
                                                        <div class="modal-body">
                                                            
                                                            <div class="col-md-12">
                                                                <label>Question</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <div class="form-group with-title mb-3">
                                                                            <textarea name="message" class="form-control" rows="2" required>{{ $faq->message }}</textarea>
                                                                            {{-- <textarea name="company_add" class="form-control" rows="3" placeholder="Address" required></textarea> --}}
                                                                            <label>Ask Question Here</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                            
                                                            <div class="col-md-12">
                                                                <label>Answer</label>
                                                                <div class="form-group has-icon-left">
                                                                    <div class="position-relative">
                                                                        <div class="form-group with-title mb-3">
                                                                            <textarea name="answer" class="form-control" rows="3" required>{{ $faq->answer }}</textarea>
                                                                            {{-- <textarea name="company_add" class="form-control" rows="3" placeholder="Address" required></textarea> --}}
                                                                            <label>Provide Answer to Question Here</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i><span class="d-none d-sm-block">Close</span>
                                                            </button>
                                                            <button type="submit" name="update_action" value="update_faq" class="btn btn-primary me-1 mb-1">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $faqs->links() }}
                    @else
                        <div class="alert alert-danger">
                            No Records Found on Inbox/FaQs
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

 