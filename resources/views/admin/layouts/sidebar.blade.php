<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route("dashboard")}}" class="brand-link" style="height:60px ;padding-top: 15px;">
        <img src="/styles/admin/dist/img/logo.jpg" alt="Pope Athanasius" class="brand-image">
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="padding-top: 20px;">
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route("dashboard")}}" class="nav-link {{areActiveRoutes(['dashboard'])}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('courses.index')}}" class="nav-link {{areActiveRoutes(['courses.*'])}}">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>Courses</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('lectures.index')}}" class="nav-link {{areActiveRoutes(['lectures.*'])}}">
                        <i class="nav-icon fas fa-sticky-note"></i>
                        <p>Lectures</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('reference-types.index')}}" class="nav-link {{areActiveRoutes(['reference-types.*'])}}">
                        <i class="nav-icon fas fa-sticky-note"></i>
                        <p>Reference Types</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
