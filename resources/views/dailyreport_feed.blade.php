
@extends('layouts.app')

@section('header_text')
  <div class="header_top_col">
    <p class="logo_text1"><i class="fa fa-grav" style="font-size:1.4em"></i>&nbsp; PIVO<b class="logo_text2">APPS</b></p>
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


  <section class="home_top">
    <div class="col_A">
      <p><i class="fa fa-building"></i>&nbsp;&nbsp; Total Amount Due</p>
      @if ($payment != '')
        @if (auth()->user()->status == 'Caterer')
          <p class="ghc">GhC &nbsp;</p><h3>{{ number_format($payment->sum('due_amt'), 2) }}</h3>
        @else
          <p class="ghc">GhC &nbsp;</p><h3>{{ number_format($payment->sum('due_amt'), 2) }}</h3>
        @endif
      @else
        <p class="ghc">GhC &nbsp;</p><h3>0.00</h3>
      @endif
    </div>

    <div class="col_B">
      <i class="fa fa-file-text"></i>
      <p>statements</p>
    </div>

    <div class="col_C"></div>
  </section>

  <div class="top_content">
    <h5><i class="fa fa-calendar color6"></i>&nbsp;&nbsp;Daily Report View </h5>
    <a href="/reports"><p class="view_daily_report">&nbsp;<i class="fa fa-file"></i>&nbsp; Reports Management</p></a>
    <span>&nbsp;</span>
  </div>

  {{-- <form action="{{ action('SchFeedingController@index') }}">

    <div class="my_container_nospace">
      <div class="filter_div">
        <i class="fa fa-filter"></i>
        <select onchange="report_type()" name="report_type" id="report_id">
          <option>School Reports</option>
          <option>Caterer Reports</option>
          <option>Payment Reports</option>
        </select>
      </div>

      <script>
        function report_type() {
          report_id = document.getElementById('report_id').value;
          if (report_id == 'Payment Reports') {
            document.getElementById('from').style.display = "block";
            document.getElementById('to').style.display = "block";
          } else {
            document.getElementById('from').style.display = "none";
            document.getElementById('to').style.display = "none";
          }
        }
      </script>

      <div class="filter_div">
        <i class="fa fa-globe"></i>
        <select name="region" id="region">
          <option>All Regions</option>
          @foreach ($regions as $region)
            <option value="{{$region->id}}">{{$region->reg_name}} Region</option>
          @endforeach
        </select>
      </div>
      
      <div class="filter_div" id="from">
        From &nbsp;<i class="fa fa-arrow-right"></i>
        <input type="date" name="from">
      </div>
      
      <div class="filter_div" id="to">
        <i class="fa fa-arrow-left"></i>&nbsp; To
        <input type="date" name="to">
      </div>
      <button type="submit" class="load_btn"><i class="fa fa-refresh"></i>&nbsp; Load</button>
      <button type="submit" class="print_btn"><i class="fa fa-print"></i>&nbsp; Print</button>

    </form>

    <div class="pagination_div">
      {{ $sch_feeding->links() }}
    </div>
  </div> --}}

  <section class="main_content_plain">

    @include('inc.messages')
    
    <div class="days_container">

      @if (auth()->user()->status == 'Administrator')

        @for ($i = 1; $i <= date('t'); $i++)
          @if (date('D', strtotime(date('Y-m').'-'.$i)) != 'Sat' && date('D', strtotime(date('Y-m').'-'.$i)) != 'Sun')
            @if ($i == (0 + date('d', strtotime(date('Y-m-d')))))
              <a href="/schfeed/{{$i}}"><div class="day day_active">
            @else
              <a href="/schfeed/{{$i}}"><div class="day">
            @endif
            {{-- <p>{{$i.' ||| '.(0 + date('d', strtotime(date('Y-m-d'))))}}</p> --}}
              {{-- {{$dates.' | '.date('Y-m').'-'.$i}} --}}
              <h2>{{$i}}</h2>
              <p>{{ date('D', strtotime('2022-'.date('m').'-'.$i)) }}</p>
            </div></a>
          @endif
        @endfor

      @else
        @for ($i = 1; $i <= date('t'); $i++)
          @if (date('D', strtotime(date('Y-m').'-'.$i)) != 'Sat' && date('D', strtotime(date('Y-m').'-'.$i)) != 'Sun')
            <!-- Convert $i to 0$i eg 5th to 05th -->
            @if ($i < 10)
              <input type="hidden" value="{{ $io = '0'.$i}}">
            @endif

            @if (strpos($dates, date('m').'-'.$io.',') == true)
              <a><div class="day day_inactive">
            @elseif ($i > date('d'))
              <a><div class="day day_inactive2">
            @else
              @if ($i == (0 + date('d', strtotime(date('Y-m-d')))))
                <a data-toggle="modal" data-target="#mod{{$i}}"><div class="day day_active">
              @else
                <a data-toggle="modal" data-target="#mod{{$i}}"><div class="day">
              @endif
            @endif
            {{-- <p>{{$i.' ||| '.(0 + date('d', strtotime(date('Y-m-d'))))}}</p> --}}
              {{-- {{$dates.' | '.date('Y-m').'-'.$i}} --}}
              <h2>{{$i}}</h2>
              <p>{{ date('D', strtotime('2022-'.date('m').'-'.$i)) }}</p>
            </div></a>
          @endif

          <!-- Days Modal -->
          <div class="modal fade" id="mod{{$i}}" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalRequestLabel"><i class="fa fa-calendar"></i>&nbsp;&nbsp; Daily Confirmation</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="{{ action('SchFeedingController@update', $i) }}" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                    
                    @foreach (auth()->user()->caterer->school as $sch)
                      <div class="feed_confirm" id="">
                        <p><label>
                          {{-- <input class="checkbox" type="checkbox" name=""> --}}
                          &nbsp; {{ $sch->sch_name }}</label></p>
                          <span>{{ date('D, '.$i.' - M - Y') }}</span><br>
                          <input class="feed_confirm_texts" id="food_type{{$i.$sch->id}}" onkeyup="setfoodtype{{$i.$sch->id}}({{$sch->id}})" type="text" placeholder="Type of Food" required><br>
                          <input class="feed_confirm_texts" id="emis_code" type="text" value="EMIS CODE: PIT0{{ $sch->id }}" placeholder="EMIS Code" readonly><br>
                          <input name="send_date" type="hidden" value="{{ date('Y-m-'.$i) }}"><br>
                        </div>

                      <script>
                        function setfoodtype{{$i.$sch->id}}(idt){
                          // alert(idt);
                          ft_save = document.getElementById('ft_save{{$i.$sch->id}}');
                          ft = document.getElementById("food_type{{$i.$sch->id}}");
                          // alert(ft.value);
                          ft_save.value = ft.value;
                          // document.getElementById("ft_save").value = ft.value;
                        }
                      </script>
                      <input type="hidden" name="ft_save{{$i.$sch->id}}" id="ft_save{{$i.$sch->id}}">
                    @endforeach
                    
                    
                    <div class="form-group modal_footer">
                      <button onclick="final_foods()" type="submit" name="update_action" value="confirm_daily" class="load_btn"><i class="fa fa-save"></i>&nbsp; Confirm</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>

        @endfor

      @endif

      <div class="space"></div>
    </div>

  </section>


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


    
  