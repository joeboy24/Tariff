
@extends('layouts.app')

@section('header_text')
  <div class="header_top_col">
    <p class="logo_text1"><i class="fa fa-shopping-bag" style="font-size:1.4em"></i>&nbsp; SG<b class="logo_text2">MALL</b></p>
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

  <div class="top_content">
    <h5><i class="fa fa-file-text color6"></i>&nbsp;&nbsp;Data History </h5>
    {{-- <a href="/dailyreport"><p class="view_daily_report">&nbsp;<i class="fa fa-calendar"></i>&nbsp; View Daily Report</p></a>
    <a data-toggle="modal" data-target="#filter"><p class="view_daily_report">&nbsp;<i class="fa fa-filter color6"></i>&nbsp; Filter</p></a>
    <a href="/reports"><button type="submit" class="print_btn_small"><i class="fa fa-refresh"></i></button></a> --}}
  </div>

  {{-- <div class="my_container_nospace">
    <div class="pagination_div">
      {{ $sch_feeding->links() }}
    </div>
  </div> --}}

  <section class="main_content">
    <table class="myTable">
      <!--thead>
        <th>School Details</th>
        <th>Region & District</th>
        {{-- <th class="float_right2">Actions</th> --}}
      </thead-->
      <tbody>

        @foreach ($tariffs as $item)
            <tr>
              <td><p class="small_p">Entry {{ $item->id }}</p>
                {{-- <form action="">
                  <button type="submit" name="store_action" value="kwh_submit" class="print_btn_small"><i class="fa fa-close"></i></button>
                </form> --}}
                
                User: <span>{{ $item->user->name }}</span><br>
                Consumption: <span>{{ $item->kcons }}</span><br>
                Service Charge: <span>{{ $item->serv_chrg }}</span><br>
                Vat: <span>{{ number_format($item->vat, 2) }}</span><br>
                NHIL: <span>{{ number_format($item->nhil, 2) }}</span><br>
                Getfund: <span>{{ number_format($item->getfund, 2) }}</span><br>
                Street Light Levi: <span>{{ number_format($item->strl_levi, 2) }}</span><br>
                Government Levi: <span>{{ number_format($item->gov_levi, 2) }}</span><br>
                Total Charge: <span class="tot_chrg2">{{ number_format($item->total_chrg, 2) }}</span>
              </td>
            </tr>
        @endforeach

        {{-- @for ($i = 1; $i <= count($sch_feeding); $i++)
            
          <tr>
            <td class="">{{$sch_feeding[$i-1]->sch_name}} 
              <p class="small_p">Caterer: {{$sch_feeding[$i-1]->caterer_name}}</p>
            </td>

            <td>
              Ashanti Region
              <br><p class="small_p">{{$sch_feeding[$i-1]->district}}</p>
             </td> --}}

            <!-- Modal -->
            {{-- <div class="modal fade" id="editRequest{{$sch_feeding[$i-1]->id}}" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalRequestLabel">Edit {{$sch_feeding[$i-1]->sch_name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="#">
                      <div class="form-group">
                        <input type="text" class="form-control" id="appointment_name" placeholder="School Name">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="appointment_email" placeholder="District">
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" id="caterer" placeholder="Caterer's Name">
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" class="form-control appointment_date" placeholder="Caterer's Ezwich">
                          </div>    
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" class="form-control appointment_time" placeholder="Enrollment">
                          </div>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <input type="submit" value="Submit" class="btn btn-info">
                      </div>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div> --}}
 
      </tbody>
    </table>

    <div class="my_container_nospace">
      <p></p>
      {{ $tariffs->links() }}
      @if (count($tariffs) == 0)
        <div class="alert alert-danger">
          No records to display
        </div>
      @endif
    </div>


  </section>



  <!-- Filter Modal -->
  {{-- <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalRequestLabel">Filter Options</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ action('SchFeedingController@index') }}">
            
            <div class="filter_div">
              <i class="fa fa-list"></i>
              <select onchange="report_script()" name="report_type" id="report_id">
                <option>School Reports</option>
                <option>Caterer Reports</option>
                <option>Payment Reports</option>
              </select>
            </div>
      
            <div class="filter_div">
              <i class="fa fa-globe"></i>
              <select name="region" id="region">
                <option>All Regions</option>
                @foreach ($regions as $region)
                  <option value="{{$region->id}}">{{$region->reg_name}} Region</option>
                @endforeach
              </select>
            </div>

            <script>
              function report_script() {
                report_id = document.getElementById('report_id').value;
                // alert(report_id);
                if (report_id == 'Payment Reports') {
                  document.getElementById('from').style.display = "block";
                  document.getElementById('to').style.display = "block";
                } else {
                  document.getElementById('from').style.display = "none";
                  document.getElementById('to').style.display = "none";
                }
              }
            </script>
      
            <div class="filter_div" id="from">
              From &nbsp;<i class="fa fa-arrow-right"></i>
              <input type="date" name="from">
            </div>
            
            <div class="filter_div" id="to">
              <i class="fa fa-arrow-left"></i>&nbsp; To
              <input type="date" name="to">
            </div>
            
            <div class="filter_div">
              <i class="fa fa-filter"></i>
              <select name="order" id="report_id">
                <option value="Asc">Ascending</option>
                <option value="Desc">Descending</option>
              </select>
            </div>
            
            <div class="form-group modal_footer">
              <button type="submit" class="load_btn"><i class="fa fa-refresh"></i>&nbsp; Load</button>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div> --}}


@endsection

@section('footer_menu')
  <section class="mobile_footer">
    <div class="menu_icons_container">
      <a href="/"><div class="my_col">
        <i class="fa fa-refresh"></i>
        <p class="menu_p">Refresh</p>
      </div></a>
      
      <a href="/"><div class="my_col">
        <i class="fa fa-home"></i>
        <p class="menu_p">Home</p>
      </div></a>
      
      <a href="#"><div class="my_col activ_menu_col">
        <i class="fa fa-file-text active_icon"></i>
        <p class="menu_p active_p">History</p>
      </div></a>

      <a href="/"><div class="my_col">
        <i class="fa fa-gear"></i>
        <p class="menu_p">Settings</p>
      </div></a>
    </div>
  </section>
@endsection


    
  