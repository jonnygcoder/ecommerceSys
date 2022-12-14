<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li class="menu-title">Mantenimientos</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Proveedores</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.provider') }}">Listar Proveedores</a></li>
                        <li><a href="{{ route('add.provider') }}">Agregar Proveedores</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Categorías</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.category') }}">Listar Categorías</a></li>
                        <li><a href="{{ route('add.category') }}">Agregar Categoría</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-profile-line"></i>
                        <span>Producto</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.product') }}">Listar Productos</a></li>
                        <li><a href="{{ route('add.product') }}">Agregar Productos</a></li>
                    </ul>
                </li>

                <li class="menu-title">Trasacciones</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Órdenes de Compra</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.orderBuyPen') }}">Órdenes Pendientes</a></li>
                        <li><a href="{{ route('all.orderBuyApro') }}">Órdenes Aprobadas</a></li>
                        <li><a href="{{  route('all.orderBuyCan') }}">Órdenes Canceladas</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>