
@extends('layouts.app')

@section('header_text')
  <div class="header_top_col">
    <p class="logo_text1"><i class="fa fa-grav" style="font-size:1.4em"></i>&nbsp; SG<b class="logo_text2">MALL</b></p>
  </div>
  <div class="header_top_welcome">
    <p class="welcome">Welcome!&nbsp; <span>{{auth()->user()->name}}</span> 
      @if (auth()->user()->status == 'Administrator')
      | Administrator
      @endif
    </p>
    <a href="/logout"><button type="submit" class="logout_btn"><i class="fa fa-unlock-alt"></i>&nbsp; Logout</button></a>
  </div>
@endsection

@section('main_content')

  @include('inc.messages')

  <form action="{{ action('TariffController@store') }}" method="POST">
    @csrf
    <section class="home_top">
      <div class="col_A">
          <select name="grid" id="" class="">
            <option value="1" selected>Grid</option>
            <option value="2">None</option>
          </select>

          <select name="cust_class" id="" class="">
            <option value="1">Residential</option>
            <option value="2" selected>Non Residential</option>
          </select>
          <input type="number" name="Kconsumption" step="0.0001" min="0" class="kwh_txt" placeholder="Enter Consumption / KWH Here">
        {{-- <p><i class="fa fa-building"></i>&nbsp;&nbsp; Type KWH Here</p> --}}
        {{-- @if ($payment != '')
          <p class="ghc">GhC &nbsp;</p><h3>{{ number_format($payment->sum('due_amt'), 2) }}</h3>
        @else --}}
          {{-- <p class="ghc"> &nbsp;&nbsp;GhC &nbsp;</p><h3></h3> --}}
        {{-- @endif --}}
        <button type="submit" name="store_action" value="kwh_submit" class="print_btn_small"><i class="fa fa-check"></i> &nbsp;Submit &nbsp;</button>

      </div>

      {{-- <div class="col_B">
        <i class="fa fa-check"></i>
        <p>Submit</p>
      </div> --}}

      <div class="col_C"></div>
    </section>
  </form>

  <p>&nbsp;</p>

  <section class="main_content">

    <div class="row">
      <div class="col-md-6 offset-md-3 tariff_summary">
        <p>&nbsp;<span>GhC</span></p>
        <p>Service Charge <span>{{number_format(session('srv_chrg'), 2)}}</span></p>
        <p>VAT <span>{{number_format(session('vat'), 2)}}</span></p>
        <p>NHIL <span>{{number_format(session('nhil'), 2)}}</span></p>
        <p>Getfund <span>{{number_format(session('getfund'), 2)}}</span></p>
        <p class="tot_chrg">Total Charge <span class="tot_chrg">{{number_format(session('tot_charge'), 2)}}</span></p>
      </div>
    </div>

  </section>



  <section class="main_content_plain">
    {{-- <p>ert</p> --}}
    <span>&nbsp;</span>

    <div class="row">
      <div class="col-md-4">
        <div class="adv_cont_ovl">
          <i class="fa fa-globe"></i>
          <h3>Website<br> Development</h3>
          <p>PivoApps</p>
        </div>
        <div class="adv_cont">
          <img class="adv_img" src="/maindir/images/web_imgs/5.png" alt="">
        </div>
      </div>

      <div class="col-md-4">
        <div class="adv_cont_ovl">
          <i class="fa fa-briefcase"></i>
          <h3>24/7<br> Support</h3>
          <p>PivoApps</p>
        </div>
        <div class="adv_cont">
          <img class="adv_img" src="/maindir/images/web_imgs/3.jpg" alt="">
        </div>
      </div>

      <div class="col-md-4">
        <div class="adv_cont_ovl">
          <i class="fa fa-globe"></i>
          <h3>24/7<br> Support</h3>
          <p>PivoApps</p>
        </div>
        <div class="adv_cont">
          <img class="adv_img" src="/maindir/images/web_imgs/4.png" alt="">
        </div>
      </div>
    </div>

    <p>&nbsp;</p>

    {{-- <div class="my_container_nospace">
      <p></p>
      {{ $sch_feeding->links() }}
      @if (count($sch_feeding) == 0)
        <div class="alert alert-danger">
          No records to display
        </div>
      @endif
    </div> --}}

    <a href="/"><p class="view_daily_report">&nbsp;<i class="fa fa-globe"></i>&nbsp; Visit PivoApps</p></a>


  </section>


@endsection

@section('footer_menu')
  <section class="mobile_footer">
    <div class="menu_icons_container">
      <a href="/"><div class="my_col">
        <i class="fa fa-refresh"></i>
        <p class="menu_p">Refresh</p>
      </div></a>
      
      <a href="/"><div class="my_col activ_menu_col">
        <i class="fa fa-home active_icon"></i>
        <p class="menu_p active_p">Home</p>
      </div></a>
      
      <a href="/history"><div class="my_col">
        <i class="fa fa-file-text"></i>
        <p class="menu_p">History</p>
      </div></a>

      <a href="/"><div class="my_col">
        <i class="fa fa-gear"></i>
        <p class="menu_p">Settings</p>
      </div></a>
    </div>
  </section>
@endsection


    
  