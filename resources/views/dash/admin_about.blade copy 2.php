
@extends('layouts.dashlay')

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

        <li class="sidebar-item active">
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
        <h3>About Page</h3>
    </div>

    <div class="row">
        <div class="col-12 col-xl-10">
            @include('inc.messages') 
            <div class="card">
                {{-- <div class="card-header">
                    <h4>Add Room Type</h4>
                </div> --}}
                <div class="card-body">

                    <form class="form form-horizontal" action="{{action('DashController@store')}}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">

                                <div class="col-md-4">
                                    <label>Header</label>
                                </div>
                                <div class="col-md-8">
                                    <fieldset class="form-group">
                                        <select name="header" class="form-select" id="basicSelect">
                                            <option>What we do</option>
                                            <option>Our mission</option>
                                            <option>Our Goal</option>
                                        </select>
                                    </fieldset>
                                </div>

                                <div class="col-md-4">
                                    <label>Title</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input name="title" type="text" class="form-control" placeholder="Title" id="first-name-icon">
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label>Text</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <div class="form-group with-title mb-3">
                                                <textarea name="text" class="form-control" rows="3"></textarea>
                                                {{-- <textarea name="company_add" class="form-control" rows="3" placeholder="Address" required></textarea> --}}
                                                <label>Body text goes here</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1" name="store_action" value="about">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        


    <!-- About View -->
    @if (count($about) != 0)
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
    @endif

@endsection

 