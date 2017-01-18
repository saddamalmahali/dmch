<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIM DMCH</title>

    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{URL::asset('css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/plugins/jQueryUI/jquery-ui.css')}}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{URL::asset('js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">

    <link href="{{URL::asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    
    <link href="{{URL::asset('css/plugins/chosen/chosen.css')}}" rel="stylesheet">

    <link href="{{URL::asset('css/plugins/select2/select2.min.css')}}" rel="stylesheet">

    <link href="{{URL::asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/app.css')}}" rel="stylesheet">


    {{-- Script --}}
    <script src="{{url('js/jquery-2.1.1.js')}}"></script>
    <!-- jQuery UI -->
    <script src="{{url('js/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- Flot -->
    <script src="{{url('js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{url('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{url('js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{url('js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{url('js/plugins/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{url('js/plugins/flot/jquery.flot.symbol.js')}}"></script>
    <script src="{{url('js/plugins/flot/jquery.flot.time.js')}}"></script>


    <!-- Chartjs -->
    <script src="{{url('js/plugins/chartJs/Chart.js')}}"></script>
    <script src="{{url('js/plugins/chartJs/Chart.bundle.min.js')}}"></script>

    <script src="{{url('js/plugins/iCheck/icheck.min.js')}}"></script>

    <script src="{{url('js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{url('js/plugins/footable/footable.all.min.js')}}"></script>
    <script src="{{url('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    
</head>

<body class="pace-done fixed-nav fixed-nav-basic">
    <div id="wrapper">
        
        @include('layouts.navbar')
        <div id="page-wrapper" class="gray-bg dashboard-1">
            @include('layouts.topnav')
            @yield('content')
            @include('layouts.footer')
        </div>

        
        
        
        
        
    </div>

    <!-- Mainly scripts -->
    
    <script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    


    <script src="{{url('js/plugins/chosen/chosen.jquery.js')}}"></script>   

    

    <!-- Peity -->
    <script src="{{url('js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{url('js/demo/peity-demo.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{url('js/inspinia.js')}}"></script>
    <script src="{{url('js/plugins/pace/pace.min.js')}}"></script>

    

    <!-- GITTER -->
    <script src="{{url('js/plugins/gritter/jquery.gritter.min.js')}}"></script>

    <!-- Sparkline -->
    <script src="{{url('js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{url('js/demo/sparkline-demo.js')}}"></script>

    <!-- ChartJS-->
    <script src="{{url('js/plugins/chartJs/Chart.min.js')}}"></script>

    
    

    <!-- Toastr -->
    <script src="{{url('js/plugins/toastr/toastr.min.js')}}"></script>

    <script type="text/javascript" src="{{url('js/app.js')}}"></script>
    <script>
        $(document).ready(function() {

            
            // setTimeout(function() {
            //     toastr.options = {
            //         closeButton: true,
            //         progressBar: true,
            //         showMethod: 'slideDown',
            //         timeOut: 4000
            //     };
            //     toastr.success('Responsive Admin Theme', 'Welcome to DMCH');

            // }, 1300);


        });
    </script>
</body>
</html>
