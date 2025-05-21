<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">
        <a class="flex items-center" href="{{ route('dashboard') }}">
            <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">D4 Manajemen
                Informatika</span>
        </a>
        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow"
        class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
    opacity-0">
    </div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50"
        id="sidebar_menus">
        @php
            $route = Route::currentRouteName();
        @endphp
        <ul class="sidebar-menu">
            <li class="">
                <a href="{{ route('admin.dashboard') }}"
                    class="navItem {{ $route == 'admin.dashboard' ? 'active' : '' }}">
                    <span class="flex items-center">
                        <iconify-icon class=" nav-icon" icon="heroicons-outline:home"></iconify-icon>
                        <span>Dashboard</span>
                    </span>
                </a>
            </li>
            <li class="sidebar-menu-title">Menu</li>
            <li class="">
                @can('iku 1 lihat')
                    <a href="{{ route('admin.iku-1.index') }}"
                        class="navItem {{ $route == 'admin.iku-1.index' ? 'active' : '' }}">
                        <span class="flex items-center">
                            <iconify-icon class=" nav-icon" icon="heroicons-outline:bookmark"></iconify-icon>
                            <span>IKU 1</span>
                        </span>
                    </a>
                @endcan
                @can('iku 2 lihat')
                    <a href="{{ route('admin.iku-2.index') }}"
                        class="navItem {{ $route == 'admin.iku-2.index' ? 'active' : '' }}">
                        <span class="flex items-center">
                            <iconify-icon class=" nav-icon" icon="heroicons-outline:bookmark"></iconify-icon>
                            <span>IKU 2</span>
                        </span>
                    </a>
                @endcan
                @can('iku 3 lihat')
                    <a href="{{ route('admin.iku-3.index') }}"
                        class="navItem {{ $route == 'admin.iku-3.index' ? 'active' : '' }}">
                        <span class="flex items-center">
                            <iconify-icon class=" nav-icon" icon="heroicons-outline:bookmark"></iconify-icon>
                            <span>IKU 3</span>
                        </span>
                    </a>
                @endcan
                @can('iku 4 lihat')
                    <a href="{{ route('admin.iku-4.index') }}"
                        class="navItem {{ $route == 'admin.iku-4.index' ? 'active' : '' }}">
                        <span class="flex items-center">
                            <iconify-icon class=" nav-icon" icon="heroicons-outline:bookmark"></iconify-icon>
                            <span>IKU 4</span>
                        </span>
                    </a>
                @endcan
                @can('iku 5 lihat')
                    <a href="{{ route('admin.iku-5.index') }}"
                        class="navItem {{ $route == 'admin.iku-5.index' ? 'active' : '' }}">
                        <span class="flex items-center">
                            <iconify-icon class=" nav-icon" icon="heroicons-outline:bookmark"></iconify-icon>
                            <span>IKU 5</span>
                        </span>
                    </a>
                @endcan
                @can('iku 6 lihat')
                    <a href="{{ route('admin.iku-6.index') }}"
                        class="navItem {{ $route == 'admin.iku-6.index' ? 'active' : '' }}">
                        <span class="flex items-center">
                            <iconify-icon class=" nav-icon" icon="heroicons-outline:bookmark"></iconify-icon>
                            <span>IKU 6</span>
                        </span>
                    </a>
                @endcan
                @can('iku 7 lihat')
                    <a href="{{ route('admin.iku-7.index') }}"
                        class="navItem {{ $route == 'admin.iku-7.index' ? 'active' : '' }}">
                        <span class="flex items-center">
                            <iconify-icon class=" nav-icon" icon="heroicons-outline:bookmark"></iconify-icon>
                            <span>IKU 7</span>
                        </span>
                    </a>
                @endcan
                @can('iku 8 lihat')
                    <a href="{{ route('admin.iku-8.index') }}"
                        class="navItem {{ $route == 'admin.iku-8.index' ? 'active' : '' }}">
                        <span class="flex items-center">
                            <iconify-icon class=" nav-icon" icon="heroicons-outline:bookmark"></iconify-icon>
                            <span>IKU 8</span>
                        </span>
                    </a>
                @endcan
            </li>

            <li class="sidebar-menu-title">Pengaturan</li>
            <li class="">
                @can('user lihat')
                    <a href="{{ route('admin.user.index') }}"
                        class="navItem {{ $route == 'admin.user.index' ? 'active' : '' }}">
                        <span class="flex items-center">
                            <iconify-icon class=" nav-icon" icon="heroicons-outline:users"></iconify-icon>
                            <span>User</span>
                        </span>
                    </a>
                @endcan
                @can('hak akses lihat')
                    <a href="{{ route('admin.role.index') }}"
                        class="navItem {{ $route == 'admin.role.index' ? 'active' : '' }}">
                        <span class="flex items-center">
                            <iconify-icon class=" nav-icon" icon="heroicons-outline:shield-check"></iconify-icon>
                            <span>Hak Akses</span>
                        </span>
                    </a>
                @endcan
            </li>
        </ul>
    </div>
</div>
<!-- End: Sidebar -->
