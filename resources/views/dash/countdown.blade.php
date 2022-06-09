
@extends('layouts.app')


@section('navlist')

  <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
  <li class="nav-item dropbtn"><a href="/about" class="nav-link">About</a></li>
  <li class="nav-item dropdown"><a href="" class="nav-link dropbtn">Admissions</a>
    <div class="dropdown-content">
      <a class="nav-item dropdown" href="/admissions#apply"><i class="fa fa-send li_icon"></i>&nbsp;&nbsp; How to Apply</a>
      <a class="nav-item dropdown" href="/admissions#programs"><i class="fa fa-graduation-cap li_icon"></i>&nbsp; Programs Offered</a>
    </div>
  </li>
  <li class="nav-item"><a href="/news" class="nav-link">News</a></li>
  {{-- <li class="nav-item dropdown"><a href="" class="nav-link dropbtn">Programs</a>
    <div class="dropdown-content">
      @foreach (session('program') as $program)
        <a href="/student_portal">{{ $program->program_name }}</a>
      @endforeach
    </div>
  </li> --}}
  <li class="nav-item dropdown"><a href="" class="nav-link dropbtn">Portals</a>
    <div class="dropdown-content">
      <a href="/student_portal">Student Portal</a>
      <a href="/staff_portal">Staff Portal</a>
      <a href="/admin_portal">Administration</a>
    </div>
  </li>
  <li class="nav-item"><a href="/#my_footer" class="nav-link">Contact</a></li>
  {{-- <li class="nav-item"><a href="/gallery" class="nav-link">Gallery</a></li> --}}
  <li class="nav-item cta"><a href="https://apply.healthtraining.gov.gh/application" class="nav-link"><span>Apply Now</span></a></li>
  
  <li class="nav-item cta"><a href="" class="nav-link" data-toggle="modal" data-target="#modalRequest"><span>Make an Appointment</span></a></li>
	        
@endsection


@section('content')

  <h2 id="countdown_text">10:00</h2>

  <script>
    // const startingMinutes = "<%=session('ctime')%>";

    const startingMinutes = "{{session('ctime')}}";
    alert(startingMinutes);
    let time = startingMinutes * 60;

    const timeDisplay = document.getElementById('countdown_text');

    setInterval(function countdownFunc() {
        const mins = Math.floor(time / 60);
        let secs = time % 60;

        // timeDisplay.innerHTML = `${mins}:${secs}`;
        timeDisplay.innerHTML = mins+':'+secs;
        if (mins == 0 && secs == 55) {
            clearInterval(myInterval);
        }

        time--;
    }, 1000);

    
  </script>
{{-- <script src="/maindir/js/countdown.js"></script> --}}

@endsection