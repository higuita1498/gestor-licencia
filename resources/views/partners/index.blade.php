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
                                <th>Nombre</th>
                                <th>Identificacion</th>
                                <th>Estado</th>
                                <th>Creado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partners as $partner)
                            <tr>
                                <td>{{ $partner->name }}</td>
                                <td>{{ $partner->identification_number }}</td>
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
                                    <form action="{{ route('partners.destroy', $partner) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
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