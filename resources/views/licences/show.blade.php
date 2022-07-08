@extends('layouts.app', ['page' => __('Consultar licencia'), 'pageSlug' => 'show-licences'])

@section('content')
<div class="row">
    <div class="col-md-12">
        @include('alerts.success')
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> Licencias</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive ps">
                    <table class="table tablesorter w-100" id="">
                        <tbody>

                            <tr>
                                <th class="title text-white">Llave de licencia</th>
                                <td>{{ $licence->LicenseKey }}</td>
                            </tr>
                            <tr>
                                <th class="title text-white">Producto</th>
                                <td>{{ optional($licence->product)->ProductName }} - {{optional($licence->product)->ProductID}}</td>
                            </tr>

                            <tr>
                                <th class="title text-white"> Socio</th>
                                <td>{{ optional($licence->partner)->PartnerName }} - {{optional($licence->partner)->PartnerID}}</td>
                            </tr>
                            <tr>
                                <th class="title text-white"> Código Maestro</th>
                                <td>{{ $licence->MasterCode }}</td>
                            </tr>
                            <tr>
                                <th class="title text-white"> Usuario</th>
                                <td>{{ optional($licence->user)->UserID }}</td>
                            </tr>
                            <tr>
                                <th class="title text-white"> Estado</th>
                                <td><span class="badge badge-default">{{ $licence->status_name }}</span></td>
                            </tr>
                            <tr>
                                <th class="title text-white"> Fecha de expiración</th>
                                <td>{{ $licence->format_expiration_date  }}</td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('licences.index') }}" class="btn btn-fill btn-default float-right mx-1">{{ __('Cancel') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection