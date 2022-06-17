@extends('layouts.app', ['page' => __('Lista de productos'), 'pageSlug' => 'products'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h4 class="card-title"> Productos</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive ps">
                    <table class="table tablesorter w-100" id="">
                        <thead class="text-primary">
                            <tr>
                                <th>Producto</th>
                                <th>ID</th>
                                <th>Estado</th>
                                <th># Licencias</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->ProductName }}</td>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->getStatus() }}</td>
                                <td>{{ $product->NumberOfLicenses }}  | <a href="{{ route('products.edit', $product) }}">edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>

</script>
@endpush