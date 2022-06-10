@extends('layouts.app', ['page' => __('Lista de usuarios'), 'pageSlug' => 'users'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> Usuarios</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive ps">
                    <table class="table tablesorter w-100" id="">
                        <thead class="text-primary">
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Identificacion</th>
                                <th>Role</th>
                                <th>Partner</th>
                                <th>Estado</th>
                                <th>Creado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->identification_number }}</td>
                                <td>{{ optional($user->role)->name }}</td>
                                <td>{{ optional($user->partner)->name }}</td>
                                <td>
                                    @if ($user->status == 1)
                                    <span class="badge badge-success">Activo</span>
                                    @else
                                    <span class="badge badge-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-primary">Editar</a>
                                    <a class="btn btn-sm btn-danger" onclick="deleteUser('delete-{{ $user->id }}')">Eliminar</a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-none" id="delete-{{ $user->id }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    function deleteUser(user) {
        Swal.fire({
            title: '¿Estas seguro?',
            text: "Se eliminará el usuario seleccionado",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if (result.value) {
                $(`#${user}`).submit();
            }
        })
    }
</script>
@endpush