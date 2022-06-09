<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - PivoApps Hotel Assist</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/dashdir/css/bootstrap.css">

    <!-- Include Choices CSS -->
    <link rel="stylesheet" href="/dashdir/vendors/choices.js/choices.min.css" />
    <link rel="stylesheet" href="/dashdir/vendors/iconly/bold.css">

    <link rel="stylesheet" href="/dashdir/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/dashdir/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/dashdir/css/app.css">
    <link rel="stylesheet" href="/dashdir/css/main.css">
    <link rel="stylesheet" href="/maindir/css/feed_style_clean.css">
    <link rel="shortcut icon" href="/dashdir/images/favicon.svg" type="image/x-icon">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


</head>

<body>
    
    @yield('content')
    @yield('main_content')


    <section class="mobile_footer">
        <div class="menu_icons_container">
        <div class="my_col">
            <i class="fa fa-heart"></i>
            <p class="menu_p">Summary</p>
        </div>
        <div class="my_col activ_menu_col">
            <i class="fa fa-home active_icon"></i>
            <p class="menu_p active_p">Home</p>
        </div>
        <div class="my_col">
            <i class="fa fa-th-large"></i>
            <p class="menu_p">Browse</p>
        </div>
        </div>
    </section>
                
    <script src="/dashdir/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/dashdir/js/bootstrap.bundle.min.js"></script>

    <!-- Include Choices JavaScript -->
    <script src="/dashdir/vendors/choices.js/choices.min.js"></script>
    <script src="/dashdir/js/pages/form-element-select.js"></script>

    <script src="/dashdir/vendors/apexcharts/apexcharts.js"></script>
    <script src="/dashdir/js/pages/dashboard.js"></script>

    <script src="/dashdir/js/main.js"></script>

</body>

</html>