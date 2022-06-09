
<html>

    <head>
        <meta charset="utf-8">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <link href="/dashdir/css/inv_style.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/dashdir/css/bootstrap.css">

    </head>
    
    <body style="background: #eee">
    
        <section id="invoice">
            <div class="invoiceContent">
    
                <div id="slip_top">
                    <h4>{{ $company->name }}</h4>
                    <p class="dark_col col_faint">{{ $program->department->dept_name }}</p>
                    <p>
                        <h6 class="">{{ $company->ac_year }}
                            @if ($current_sem == '')
                                @if ($company->ac_term == 1)
                                    FIRST
                                @else
                                    SECOND
                                @endif
                            @else
                                @if ($current_sem == 1)
                                    FIRST
                                @else
                                    SECOND
                                @endif
                            @endif
                            SEMESTER REGISTRATION
                        </h6>
                    </p>
                </div>

                <div id="slip_mid" class="row">
                    <div class="col-md-5" style="background: rgb(248, 248, 248)">
                        <p>Name:&nbsp; <b>{{ auth()->user()->student->fname.' '.auth()->user()->student->sname }}</b></p>
                        <p>Student ID: <h6>{{ auth()->user()->student->std_id }}</h6></p>
                        <p>Index Number: <h6>{{ auth()->user()->student->index_no }}</h6></p>
                    </div>
                    <div class="col-md-7 dark_col" style="background: rgb(245, 245, 245)">
                        <p>Programme:&nbsp; {{ $program->program_name }}a</p>
                        <p>Department:&nbsp; {{ $program->department->dept_name }}</p>
                        @if ($current_year == '')
                            <p>Year:&nbsp; {{ auth()->user()->student->class }}</p>
                        @else
                            <p>Year:&nbsp; {{ $current_year }}</p>
                        @endif
                        <p class="small_p">Date Printed:&nbsp; {{ date('d-m-Y') }}</p>
                    </div>
                </div>

                <div id="slip_center">
                    <table class="my_tbl1">
                        <thead>
                            <th><h6>Course Code</h6></th>
                            <th><h6>Course Name</h6></th>
                            <th><h6>Credits</h6></th>
                        </thead>
                        <tbody>
                            @foreach ($course_reg as $sub_item)
                                <tr>
                                    <td class="course_code">{{ $sub_item->course->course_code }}</td>
                                    <td>{{ $sub_item->course->course_name }}</td>
                                    <td>3</td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td><p></p></td>
                                    <td><p></p></td>
                                    <td><p></p></td>
                                </tr>
                        </tbody>
                    </table>
                </div>

                <div id="slip_bottom">
                    <div class="row">
                        <div class="col-md-8">
                            <p><h6>Number of Subjects: &nbsp;{{ count($course_reg) }}</h6></p>
                        </div>
                        <div class="col-md-4 dark_col">
                            <p><h6>Total Credits: &nbsp;{{ count($course_reg) * 3 }}</h6></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <p></p>
                            <p>..............................................</p>
                            <p class="small_p">Student's Signature</p>
                        </div>
                        <div class="col-md-4 dark_col">
                            <p></p>
                            <p>..............................................</p>
                            <p class="small_p">Academic Supervisor</p>
                        </div>
                    </div>
                </div>
    
            </div>
        </section>
    
    </body>
    
    </html>