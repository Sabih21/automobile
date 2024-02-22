<aside class="main-sidebar sidebar-theme-light elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="/images/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-solid" style="color: rgb(230, 36, 36); font-weight: bold">Mehak
            Automobile
        </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/images/user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"
                    style="color: rgb(228, 38, 38); font-weight: bold">{{ auth()->user()->f_name }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ url('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Employee/Customers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('employe.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employees Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('employe.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Employees</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('customers.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customers</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fas fa-car nav-icon"></i>
                        <p>
                            Vehicles
                            <i class="fas fa-angle-left right"></i>
                            {{-- <span class="badge badge-info right">6</span> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('vehicles.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Vehicles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('vehicles.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Vehicles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('vehicles.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vehicles Information</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('modifications.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Modification</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('modifications.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vehicles Modification</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Purchases
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('purchase.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Puchase Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('purchase.show') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Purchases</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('purchase.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Purchases Info</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon fas fa-comment-dollar"></i>
                                        <p>
                                            Sales
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{ url('sales') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Sales</p>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('sales.create') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Add Sale</p>
                                            </a>
                                        </li>
                
                                        <li class="nav-item">
                                            <a href="{{ route('sales.index') }}" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Sales</p>
                                            </a>
                                        </li>
                
                                    </ul>
                                </li>

                                
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Expenses/Incomes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('expences') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Expences</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('expence_types.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Expence Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('incomes.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Incomes</p>
                            </a>
                        </li>
                    </ul>
                </li>




                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Finance Reports
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('incomes.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Income</p>
                            </a>
                        </li>


                    </ul>
                </li>

                <li class="nav-header">Finance</li>
                <li class="nav-item">
                    <a href="{{ route('accounts.index') }}"
                        class="nav-link {{ request()->route()->named('accounts.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>
                            Accounts
                            <span class="badge badge-info right">2</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Roles
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/admin/roles') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/permissions') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permissions</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Extras
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/examples/login.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Login</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/register.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Register</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/forgot-password.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Forgot Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/recover-password.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Recover Password</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/lockscreen.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lockscreen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Legacy User Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/language-menu.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Language Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/404.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 404</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/500.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 500</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/pace.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pace</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/examples/blank.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blank Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="starter.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Starter Page</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
