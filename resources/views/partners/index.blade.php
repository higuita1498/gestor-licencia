@extends('layouts.app', ['page' => __('Lista de socios'), 'pageSlug' => 'partners'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> Socios</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive ps">
                    <table class="table tablesorter w-100" id="">
                        <thead class="text-primary">
                            <tr>
                                <th>Socio</th>
                                <th>Contacto</th>
                                <th>Identificación</th>
                                <th>Teléfono</th>
                                <th>Estado</th>
                                <th>Creado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partners as $partner)
                            <tr>
                                <td>{{ $partner->name }}</td>
                                <td>{{ $partner->contact_name }}</td>
                                <td>{{ $partner->identification_number }}</td>
                                <td>{{ $partner->phone_number }}</td>
                                <td>
                                    @if ($partner->status == 1)
                                    <span class="badge badge-success">Activo</span>
                                    @else
                                    <span class="badge badge-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>{{ $partner->created_at }}</td>
                                <td>
                                    <a href="{{ route('partners.edit', $partner) }}" class="btn btn-sm btn-primary">Editar</a>
                                    <a class="btn btn-sm btn-danger" onclick="deletePartner('partner-{{ $partner->id }}')">Eliminar</a>
                                    <form action="{{ route('partners.destroy', $partner) }}" method="POST" class="d-none" id="partner-{{ $partner->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $partners->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    function deletePartner(partner) {
        Swal.fire({
            title: '¿Estas seguro?',
            text: "Se eliminará el socio seleccionado",
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