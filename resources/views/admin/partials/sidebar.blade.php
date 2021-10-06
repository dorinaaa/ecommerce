<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>


        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.orders.index' ? 'active' : '' }}"
                href="{{ route('admin.orders.index') }}">
                <i class="app-menu__icon fa fa-bar-chart"></i>
                <span class="app-menu__label">Porosite</span>
            </a>
        </li>

        <!-- <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.categories.index' ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Categories</span>
            </a>
        </li> -->
        @if(auth()->user()->email == 'admin@admin.com')
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.categories' ? 'active' : '' }}"
                href="{{ route('admin.categories') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Kategorite</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.products' ? 'active' : '' }}"
                href="{{ route('admin.products') }}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Produktet</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.orders' ? 'active' : '' }}" href="{{ route('admin.orders') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Porosite</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}"
                href="{{ route('admin.settings') }}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
        @endif
    </ul>
</aside>