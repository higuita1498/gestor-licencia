@extends('layouts.app', ['page' => __('Lista de licencias'), 'pageSlug' => 'licences'])

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
                        <thead class="text-primary">
                            <tr>
                                <th>Llave de licencia</th>
                                <th>Producto</th>
                                <th>Socio</th>
                                <th>Código Maestro</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th>Fecha de expiración</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($licences as $licence)
                            <tr>
                                <td>{{ $licence->LicenseKey }}</td>
                                <td>{{ optional($licence->product)->ProductName }} - {{optional($licence->product)->ProductID}}</td>
                                <td>{{ optional($licence->partner)->PartnerName }} - {{optional($licence->partner)->PartnerID}}</td>
                                <td>{{ $licence->MasterCode }}</td>
                                <td>{{ optional($licence->user)->UserID }}</td>
                                <td><span class="badge badge-default">{{ $licence->status_name }}</span></td>
                                <td>{{ $licence->format_expiration_date  }}</td>
                                <td>
                                    <a href="{{ route('licences.show', $licence)     }}" class=""><i class="tim-icons icon-zoom-split"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $licences->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    function deleteLicence(partner) {
        Swal.fire({
            title: '¿Estas seguro?',
            text: "Se eliminará la licencia seleccionada",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
                $(`#${partner}`).submit();
            }
        })
    }
</script>
@endpush