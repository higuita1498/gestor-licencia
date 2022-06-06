<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('BD') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('Black Dashboard') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="javascript:void(0)">
                    <i class="tim-icons icon-badge"></i>
                    <p>Generar licencias</p>
                </a>
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="javascript:void(0)">
                    <i class="tim-icons icon-key-25"></i>
                    <p>Generar Keys</p>
                </a>
            </li>
            <li @if ($pageSlug == 'users') class="active " @endif>
                <a href="{{ route('user.index') }}">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Usuarios</p>
                </a>
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="javascript:void(0)">
                    <i class="tim-icons icon-single-02"></i>
                    <p>Socios</p>
                </a>
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="javascript:void(0)">
                    <i class="tim-icons icon-settings"></i>
                    <p>Configuración</p>
                </a>
            </li>
        </ul>
    </div>
</div>
