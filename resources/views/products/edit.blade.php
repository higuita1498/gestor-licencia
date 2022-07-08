@extends('layouts.app', ['page' => __('Editar producto'), 'pageSlug' => 'create-partners'])

@section('content')
<form method="post" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('alerts.success')
    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Editar producto</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="mx-md-1 col-md-5">
                            <div class="form-group">
                                <label>{{ __('Name') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Nombre prodcuto') }}" name="ProductName" value="{{$product->ProductName}}">
                                @include('alerts.feedback', ['field' => 'ProductName'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('Estado') }}</label>
                                <select type="text" class="form-control" name="ProductStatus" style="background-color: #2b3553;" title="{{ __('Estado') }}">
                                    <option value="1" {{$product->ProductStatus == 1 ? 'selected' : ''}}>Activo</option>
                                    <option value="0" {{$product->ProductStatus == 0 ? 'selected' : ''}}>Desactivado</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'ProductStatus'])
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="mx-md-1 col-md-5">
                            <div class="form-group">
                                <label>{{ __('Numero de licencias') }}</label>
                                <input type="number" class="form-control" placeholder="{{ __('Numero de licencias') }}" name="NumberOfLicenses" value="{{ $product->NumberOfLicenses }}">
                                @include('alerts.feedback', ['field' => 'NumberOfLicenses'])
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('Cantidad de meses') }}</label>
                                <input type="number" class="form-control" placeholder="{{ __('Cantidad de meses') }}" name="LicenseDuration" value="{{ $product->LicenseDuration }}">
                                @include('alerts.feedback', ['field' => 'LicenseDuration'])
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="mx-md-1 col-md-5">
                            <div class="form-group">
                                <label>{{ __('ID del producto') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('ID del producto') }}" name="ProductID" value="{{ $product->ProductID }}">
                                @include('alerts.feedback', ['field' => 'ProductID'])
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary float-right mx-1">{{ __('Save') }}</button>
                </form>
                    <a href="{{ route('products.index') }}" class="btn btn-fill btn-default float-right mx-1">{{ __('Cancel') }}</a>
                    <form method="POST" action="{{ route('products.destroy', $product) }}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-fill btn-danger float-left mx-1">{{ __('Eliminar') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                    <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="#">
                            <img class="avatar" src="}" alt="">
                            <h5 class="title"><i class="tim-icons icon-button-power mr-1"></i> </h5>
                        </a>
                        <p class="description">
                            {{ __('Ceo/Co-Founder') }}
                        </p>
                    </div>
                    </p>
                    <div class="card-description">

                    </div>
                </div>
                <div class="card-footer">
                    <div class="button-container">
                        <button class="btn btn-icon btn-round btn-facebook">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-twitter">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-google">
                            <i class="fab fa-google-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection