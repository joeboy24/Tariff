
@extends('layouts.app')

@section('header_text')
  <div class="header_top_col">
    <p class="logo_text1"><i class="fa fa-grav" style="font-size:1.4em"></i>&nbsp; PIVO<b class="logo_text2">APPS</b></p>
  </div>
@endsection

@section('main_content')


  <section class="home_top">
    <div class="col_A">
      <p><i class="fa fa-building"></i>&nbsp;&nbsp; Total Amt.Due (GhC)</p>
      <h3 title="Enr.: {{$enrolment}} for {{$days}} days">{{$due_amt}}</h3>
      {{-- <p class="ghc">&nbsp; Enr./ {{$enrolment}} for {{$days}} days</p> --}}
    </div>

    <div class="col_B">
      <i class="fa fa-file-text"></i>
      <p>Expand File</p>
    </div>

    <div class="col_C"></div>
  </section>

  <div class="top_content">
    <h5><i class="fa fa-home"></i>&nbsp;&nbsp;Home</h5>
  </div>

  <section class="menu_content">
    <a href="/schmgt"><button class="menu_btn"><i class="fa fa-university color2"></i><p>School Mgt</p></button></a>
    <button class="menu_btn"><i class="fa fa-address-book color5"></i><p>Caterer Mgt</p></button>
    <button class="menu_btn"><i class="fa fa-credit-card-alt"></i><p>Ezwich Mgt</p></button>
    <button class="menu_btn"><i class="fa fa-cc-visa"></i><p>Payments</p></button>
    <a href="/reports"><button class="menu_btn"><i class="fa fa-file-text color6"></i><p>Reports</p></button></a>
    <button class="menu_btn"><i class="fa fa-gears color3"></i><p>Settings</p></button>
  </section>

  <div style="height: 100px"></div>

  {{-- <section class="main_content">
    <table class="activity_table">
      <tbody>
        <tr><td class="td1"><i class="fa fa-file-text color1"></i>Activity <span class="greater_than">></span></td></tr>
        <tr onclick="window.location.replace('/uploads')"><td class="td1"><i class="fa fa-upload color2"></i>File Uploads <span class="greater_than">></span></td></tr>
        <tr onclick="window.location.replace('/overview')"><td class="td1"><i class="fa fa-bar-chart color3"></i>Overview <span class="greater_than">></span></td></tr>
        <tr><td class="td1"><i class="fa fa-users color5"></i>Caterer Info. <span class="greater_than">></span></td></tr>
        <tr><td class="td1"><i class="fa fa-dot-circle-o color4"></i>Districts <span class="greater_than">></span></td></tr>
        <tr><td class="td1"><i class="fa fa-briefcase color2"></i>Schools Info. <span class="greater_than">></span></td></tr>
        <tr><td class="td1"><i class="fa fa-bed color5"></i>Caterer Info. <span class="greater_than">></span></td></tr>
        <tr><td class="td1"><i class="fa fa-automobile color6"></i>Cycle Tracking <span class="greater_than">></span></td></tr>
        <tr><td class="td1"><i class="fa fa-shower color4"></i>Anything Here <span class="greater_than">></span></td></tr>
      </tbody>
    </table>
  </section> --}}


@endsection

@section('footer_menu')
  <section class="mobile_footer">
    <div class="menu_icons_container">
      <div class="my_col">
        <i class="fa fa-dashboard"></i>
        <p class="menu_p">Summary</p>
      </div>
      
      <a href="/"><div class="my_col activ_menu_col">
        <i class="fa fa-home active_icon"></i>
        <p class="menu_p active_p">Home</p>
      </div></a>

      <a href="/browse"><div class="my_col">
        <i class="fa fa-th-large"></i>
        <p class="menu_p">Browse</p>
      </div></a>
    </div>
  </section>
@endsection
    
  