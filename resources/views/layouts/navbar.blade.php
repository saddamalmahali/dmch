<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header" >
                <div class="dropdown profile-element wrapper" align="center"> 
                {{-- <span>
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
                    </ul> --}}
                    <a href="{{url('/')}}"><img alt="image" src="{{url('/img/dmch-logo.png')}}" draggable="false" style="max-width: 70%; padding-bottom: 0px;"></a>
                    {{-- <span >
                        <div class="dmch-logo">
                            
                        </div>
                    </span> --}}
                </div>
                <div class="logo-element">
                    DMCH
                </div>
            </li>
            
            <li>
                <a href="#"><i class="fa fa-database"></i> <span class="nav-label">Master Data</span><span class="fa arrow"></span></a>
                
                <ul class="nav nav-second-level collapse">
                    <li class="{{url()->full() == url('data_toko') ? 'active' : ''}}"><a href="{{url('data_toko')}}">Data Toko</a></li>
                    <li class="{{url()->full() == url('barang') ? 'active' : ''}}"><a href="{{url('barang')}}">Barang</a></li>
                    <li class="{{url()->full() == url('index_karyawan') ? 'active' : ''}}"><a href="{{url('index_karyawan')}}">Karyawan</a></li>
                    <li class="{{url()->full() == url('index_satuan') ? 'active' : ''}}"><a href="{{url('index_satuan')}}">Satuan</a></li>
                    <li class="{{url()->full() == url('index_konversi') ? 'active' : ''}}"><a href="{{url('index_konversi')}}">Konversi Satuan</a></li>


                    <li class="divider"></li>
                    <li class="{{url()->full() == url('index_donat') ? 'active' : ''}}"><a href="{{url('index_donat')}}">Donat</a></li>
                    <li class="{{url()->full() == url('harga_jual') ? 'active' : ''}}"><a href="{{url('harga_jual')}}">Harga Jual</a></li>
                    <li class="{{url()->full() == url('index_komisi') ? 'active' : ''}}"><a href="{{url('index_komisi')}}">Komisi</a></li>

                    <li>
                        <a href="#"><span class="nav-label">Transaksi</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level collapse">
                            <li class="{{url()->full() == url('master_jenis_pengeluaran') ? 'active' : ''}}"><a  href="{{url('master_jenis_pengeluaran')}}">Jenis Pengeluaran</a></li>
                            <li><a href="{{url('index_donat')}}">Jenis Pemasukan</a></li>
                        </ul>
                    </li>

                    <li class="{{url()->full() == url('index_jabatan') ? 'active' : ''}}"><a href="{{url('index_jabatan')}}">Jabatan</a></li>

                    <li class="{{url()->full() == url('index_tunjangan_jabatan') ? 'active' : ''}}"><a href="{{url('index_tunjangan_jabatan')}}">Tunjangan Jabatan</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-cubes"></i> <span class="nav-label">Dapur & Gudang</span><span class="fa arrow"></span></a>
                
                <ul class="nav nav-second-level collapse">
                    <li ><a href="{{url('daftar_harga')}}">Daftar Harga</a></li>
                    
                    <li ><a href="{{url('index_olah')}}">Olah Donat</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="{{url('/kas_bank/index')}}" class="{{url()->full() == url('/kas_bank/index') ? 'active' : ''}}"><i class="fa fa-money"></i> <span class="nav-label">Kas & Bank</span></a>
                
            </li>
            <li>
                <a href="#"><i class="fa fa-retweet"></i> <span class="nav-label">Transaksi</span><span class="fa arrow"></span></a>
                
                <ul class="nav nav-second-level collapse">
                    
                    <li ><a class="{{url()->full() == url('pengeluaran') ? 'active' : ''}}" href="{{url('pengeluaran')}}">Pengeluaran</a></li>
                    <li ><a class="{{url()->full() == url('index_penjualan') ? 'active' : ''}}" href="{{url('index_penjualan')}}">Penjualan</a></li>
                    
                </ul>
            </li>

            <li class="divider"></li>
            <li>
                <a href="#"><i class="fa fa-list-alt"></i> <span class="nav-label">Laporan</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    
                    <li ><a class="{{url()->full() == url('index_pengeluaran') ? 'active' : ''}}" href="{{url('index_pengeluaran')}}">Pengeluaran</a></li>
                    <li ><a class="{{url()->full() == url('index_pemasukan') ? 'active' : ''}}" href="{{url('index_pemasukan')}}">Pemasukan</a></li>
                    
                    
                </ul>
                
                
            </li>
           
        </ul>

    </div>
</nav>