@extends('layouts.app', ['page' => __('Crear licencia'), 'pageSlug' => 'create-licences'])

@section('content')
<form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
    @csrf

    @include('alerts.success')

    <div class="row">

        

    </div>
</form>
@endsection