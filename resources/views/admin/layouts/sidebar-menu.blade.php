<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="<?=route('admin.home')?>" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>{{ __('messages.main') }}</p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-building"></i>
                <p>
                    {{ __('messages.company.plural') }}
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.companies.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('messages.company.list') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.companies.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>{{ __('messages.company.create') }}</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
