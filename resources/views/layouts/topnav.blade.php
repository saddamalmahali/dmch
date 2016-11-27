<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        
    </div>
        <ul class="nav navbar-top-links navbar-right">
            
            <li class="pull-right">
                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Keluar
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                   
            </li>
            
        </ul>

    </nav>
    </div>
    
    <div class="wrapper wrapper-content">
        <div class="row">
            @yield('content')
        </div>    
    </div>
    

    <div class="row">
        <div class="col-lg-12">
            
            <div class="footer fixed">
                
                <div>
                    <strong>Copyright</strong> Donat Madu Cihanjuang Garut &copy; {{date('Y')}}
                </div>
            </div>
        </div>
    </div>

</div>