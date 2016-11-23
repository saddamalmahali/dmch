<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                    <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">David Williams</strong>
                     </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    DMCH
                </div>
            </li>
            
            <li>
                <a href="#"><i class="fa fa-database"></i> <span class="nav-label">Master Data</span><span class="fa arrow"></span></a>
                
                <ul class="nav nav-second-level collapse">
                    <li class="{{url()->full() == url('barang') ? 'active' : ''}}"><a href="{{url('barang')}}">Barang</a></li>
                    <li class="{{url()->full() == url('index_karyawan') ? 'active' : ''}}"><a href="{{url('index_karyawan')}}">Karyawan</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-sign-language"></i> <span class="nav-label">Dapur & Gudang</span><span class="fa arrow"></span></a>
                
                <ul class="nav nav-second-level collapse">
                    <li ><a href="">Barang</a></li>
                    
                </ul>
            </li>
        </ul>

    </div>
</nav>