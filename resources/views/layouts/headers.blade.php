<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('./')}}" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Coches</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>
                <li class="nav-item has-treeview">
                    <a href="{{ url('usuarios')}}" class="nav-link">
                        <i class="fas fa-user-friends"></i>
                        <p>
                            Usuarios
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ url('marcas')}}" class="nav-link">
                        <i class="fas fa-car"></i>
                        <p>
                            Marcas
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ url('modelos')}}" class="nav-link">
                        <i class="fab fa-gitlab"></i>
                        <p>
                            Modelos
                        </p>
                    </a>
                </li> 
                @if ( Auth::user()->rol_id=="2" )
                <li class="nav-item has-treeview">
                    <a href="{{ url('grafica')}}" class="nav-link">
                        <i class="fas fa-chart-pie"></i>
                        <p>
                            Grafica
                        </p>
                    </a>
                </li>      
            @endif             
            </ul>


        </nav>
    </div>
</aside>
