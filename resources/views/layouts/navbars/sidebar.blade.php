<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('LM') }}</a>
            <a href="#" class="simple-text logo-normal">{{ __('License Manager') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug=='dashboard' ) class="active" @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="{{ $pageSlug == 'licences' ?  true : false }}">
                    <i class="tim-icons icon-badge"></i>
                    <span class="nav-link-text">Gestión de licencias</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="{{ $pageSlug == 'create-licences' ?  'collapse show' : 'collapse' }}" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='create-licences' ) class="active" @endif>
                            <a href="{{ route('licences.create') }}">
                                <i class="tim-icons icon-simple-add"></i>
                                <p>Nueva licencia</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='licences' ) class="active" @endif>
                            <a href="{{ route('licences.index') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>Licencias</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li @if ($pageSlug=='maps' ) class="active" @endif>
                <a href="javascript:void(0)">
                    <i class="tim-icons icon-key-25"></i>
                    <p>Generar Keys</p>
                </a>
            </li>

            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="{{ $pageSlug == 'users' ?  true : false }}">
                    <i class="tim-icons icon-single-02"></i>
                    <span class="nav-link-text">Gestión de Usuarios</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="{{ $pageSlug == 'create-users' ?  'collapse show' : 'collapse' }}" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='create-users' ) class="active" @endif>
                            <a href="{{ route('users.create') }}">
                                <i class="tim-icons icon-simple-add"></i>
                                <p>Nuevo usuario</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='users' ) class="active" @endif>
                            <a href="{{ route('users.index') }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#partner-module" aria-expanded="{{ $pageSlug == 'partners' ?  true : false }}">
                    <i class="tim-icons icon-badge"></i>
                    <span class="nav-link-text">Gestión de Socios</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="{{ $pageSlug == 'partners' ?  'collapse show' : 'collapse' }}" id="partner-module">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='create-partner' ) class="active" @endif>
                            <a href="{{ route('partners.create') }}">
                                <i class="tim-icons icon-simple-add"></i>
                                <p>Nuevo socio</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='partners' ) class="active" @endif>
                            <a href="{{ route('partners.index') }}">
                                <i class="tim-icons icon-badge"></i>
                                <p>Socios</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#product-module" aria-expanded="{{ $pageSlug == 'prodcuts' ?  true : false }}">
                    <i class="tim-icons icon-cart"></i>
                    <span class="nav-link-text">Productos</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="{{ $pageSlug == 'products' ?  'collapse show' : 'collapse' }}" id="product-module">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug=='create-product' ) class="active" @endif>
                            <a href="{{ route('products.create') }}">
                                <i class="tim-icons icon-simple-add"></i>
                                <p>Nuevo producto</p>
                            </a>
                        </li>
                        <li @if ($pageSlug=='products' ) class="active" @endif>
                            <a href="{{ route('products.index') }}">
                                <i class="tim-icons icon-cart"></i>
                                <p>Productos</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li @if ($pageSlug=='maps' ) class="active" @endif>
                <a href="javascript:void(0)">
                    <i class="tim-icons icon-settings"></i>
                    <p>Configuración</p>
                </a>
            </li>
        </ul>
    </div>
</div>