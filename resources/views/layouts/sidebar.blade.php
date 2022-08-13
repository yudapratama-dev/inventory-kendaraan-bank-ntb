<aside class="main-sidebar">
    <section class="sidebar">

        {{--  Panel SIDE BAR NAMA  --}}
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('user.png') }} " class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ \Auth::user()->name  }}</p>
                <!-- Status -->
                <p class="text-green"><i class="glyphicon glyphicon-user"></i> {{ \Auth::user()->role  }}</p>
            </div>
        </div>

        {{--  SEACRHMENU  --}}
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>

        {{--  SIDEBAR MENU  --}}
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

                <li class="active"><a href="{{ url('/') }}"><i class="fa fa-home"></i>
                <span>Dashboard</span></a></li>

                <li><a href="{{ url('/divisi') }}"><i class="fa fa-suitcase"></i>
                <span>Divisi</span></a></li>

                <li><a href="{{ url('/driver') }}"><i class="fa fa-user"></i>
                <span>Driver</span></a></li>

                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-car"></i> <span>Kendaraan</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="{{ url('/kendaraan') }}"><i class="fa fa-car"></i>Master Kendaraan</a></li>
                      <li><a href="{{ url('/jenis_kendaraan') }}"><i class="fa fa-th-large"></i>Jenis Kendaraan</a></li>
                      <li><a href="{{ url('/status_kendaraan') }}"><i class="fa fa-check-square-o"></i>Status Kendaraan</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                      <i class="fa fa-exchange"></i> <span>Activity</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu">
                      <li class="active"><a href="{{ url('/activity_kendaraan') }}"><i class="fa fa-exchange"></i>Activity Kendaraan</a></li>
                      <li><a href="{{ url('/status_kendaraan') }}"><i class="fa fa-check-square-o"></i>Status Activity</a></li>
                    </ul>
                </li>


            
        </ul>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">SETTINGS</li>
            <li class="active"><a href="{{ url('/users') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
        </ul>
        
    </section>
    <!-- /.sidebar -->
</aside>

{{--  <li class="treeview active">
                <a href="#"><i class="fa fa-car"></i> <span>Kendaraan</span></a>
              <ul class="treeview-menu">
                <li><a href="{{ route('categories.index') }}"><i class="fa fa-list"></i> <span>Kategori</span></a></li>
                <li><a href="{{ route('stocks.index') }}"><i class="fa fa-database"></i> <span>Stock</span></a></li>
                <li><a href="{{ route('transports.index') }}"><i class="fa fa-car"></i> <span>Items</span></a></li>
              </ul>
            </li>  --}}

            