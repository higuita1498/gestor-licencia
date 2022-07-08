@extends('layouts.app', ['page' => __('Crear licencia'), 'pageSlug' => 'create-licences'])

@section('content')
<form method="post" action="{{ route('licences.store') }}" enctype="multipart/form-data">
    @csrf

    @include('alerts.success')

    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Crear licencia</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 pr-md-1">
                            <div class="form-group">
                                <label>{{ __('Company') }}</label>
                                <select type="text" class="form-control" name="partner_id" style="background-color: #2b3553;" title="{{ __('City') }}">
                                    @foreach ($partners as $partner)
                                    <option value="{{ $partner->id }}" {{ $partner->id == old('partner_id') ? ' selected="selected"' : ''}}>{{ $partner->PartnerName }} - {{$partner->PartnerID}}</option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'partner_id'])
                            </div>
                        </div>
                        <div class="col-md-4 px-md-1">
                            <div class="form-group">
                                <label>{{ __('Product') }}</label>
                                <select type="text" class="form-control" name="product_id" style="background-color: #2b3553;" title="{{ __('Products') }}">
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $product->id == old('product_id') ? ' selected="selected"' : ''}}>{{ $product->ProductName }} - {{$product->ProductID}}</option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'product_id'])
                            </div>
                        </div>
                        <div class="col-md-3 px-md-1">
                            <div class="form-group">
                                <label>Número de licencias</label>
                                <input type="number" class="form-control" placeholder="Ingrese el número de licencias" name="licencesNumber" id="licencesNumber" required min="1">
                                @include('alerts.feedback', ['field' => 'licencesNumber'])
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary float-right mx-1">{{ __('Save') }}</button>
                    <a href="{{ route('licences.index') }}" class="btn btn-fill btn-default float-right mx-1">{{ __('Cancel') }}</a>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection