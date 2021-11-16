<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @role('Admin')
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Manage User
                        </p>
                    </a>
                </li>
                @endrole
                @role('Admin')
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-tag"></i>
                        <p>
                            Manage Role
                        </p>
                    </a>
                </li>
                @endrole
                @hasanyrole('Admin|User') 
                <li class="nav-item">
                    <a href="{{ route('products.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-pills"></i>
                        <p>
                            Manage Obat
                        </p>
                    </a>
                </li>
                @endhasanyrole
                @role('Admin')
                <li class="nav-item">
                    <a href="{{ route('notes.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Manage Notes
                        </p>
                    </a>
                </li>
                @endrole
            </ul>
        </nav>
    </div>
</aside>