@php
    $collection = collect($menus);
    $dashboard = $collection->where('menu', 'Dashboard')->first();
@endphp

<!-- BEGIN Aside -->
<div class="aside">
    <div class="aside-header">
        <h3 class="aside-title">Smart Kasir</h3>
        <div class="aside-addon">
            <button class="btn btn-label-primary btn-icon btn-lg" data-toggle="aside">
                <i class="fa fa-times aside-icon-minimize"></i>
                <i class="fa fa-thumbtack aside-icon-maximize"></i>
            </button>
        </div>
    </div>
    <div class="aside-body" data-simplebar="data-simplebar">
        <!-- BEGIN Menu -->
        <div class="menu">
            @if (!$dashboard)
                <div class="menu-item singgle-item">
                    <a href="{{ url('/dashboard') }}" class="menu-item-link">
                        <div class="menu-item-icon">
                            <i class="fas fa-desktop"></i>
                        </div>
                        <span class="menu-item-text">Dashboard</span>
                    </a>
                </div>
            @endif
            @foreach ($menus as $menu)
                @if ($menu->number_of_child <> 0)
                    @if (isset($menu->childs))
                        <div class="menu-item">
                            <button class="menu-item-link menu-item-toggle">
                                <div class="menu-item-icon">
                                    <i class="fa {{ $menu->icon }}"></i>
                                </div>
                                <span class="menu-item-text">{{ $menu->menu }}</span>
                                <div class="menu-item-addon">
                                    <i class="menu-item-caret caret"></i>
                                </div>
                            </button>
                            <div class="menu-submenu">
                                @foreach ($menu->childs as $child)
                                    <div class="menu-item">
                                        <a href="{{ url($child->url) }}" class="menu-item-link">
                                            <i class="menu-item-bullet"></i>
                                            <span class="menu-item-text">{{ $child->menu }}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                @else
                    <div class="menu-item singgle-item">
                        <a href="{{ url($menu->url) }}" class="menu-item-link">
                            <div class="menu-item-icon">
                                <i class="fas {{ $menu->icon }} fa-fw"></i>
                            </div>
                            <span class="menu-item-text">{{ $menu->menu }}</span>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        <!-- END Menu -->
    </div>
</div>
