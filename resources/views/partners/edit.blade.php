@extends('layouts.app', ['page' => __('Modificar socio'), 'pageSlug' => 'edit-partners'])

@section('content')
<form method="post" action="{{ route('partners.update', $partner) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Editar socio</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="mx-md-1 col-md-5">
                            <div class="form-group">
                                <label>{{ __('Name') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Company') }}" name="name" value="{{ $partner->name }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('Address') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Address') }}" name="address" value="{{ $partner->address }}">
                                @include('alerts.feedback', ['field' => 'address'])
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="mx-md-1 col-md-5">
                            <div class="form-group">
                                <label>{{ __('Phone Number') }}</label>
                                <input type="number" class="form-control" placeholder="{{ __('Phone Number') }}" name="phone_number" value="{{ $partner->phone_number }}">
                                @include('alerts.feedback', ['field' => 'phone_number'])
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('Document Number') }}</label>
                                <input type="number" class="form-control" placeholder="{{ __('Document Number') }}" name="identification_number" value="{{ $partner->identification_number }}">
                                @include('alerts.feedback', ['field' => 'identification_number'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 pr-md-1">
                            <div class="form-group">
                                <label>{{ __('Partner Type') }}</label>
                                <select type="text" class="form-control" name="partner_type_id" style="background-color: #2b3553;" title="{{ __('Partner Type') }}">
                                    @foreach ($partnerTypes as $partnerType)
                                    <option value="{{ $partnerType->id }}" {{ $partnerType->id == $partner->partner_type_id ? 'selected' : ''}}>{{ $partnerType->name }}</option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'partner_type_id'])
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary float-right">{{ __('Update') }}</button>
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
                            <img class="avatar" src="#" alt="">
                            <h5 class="title"><i class="tim-icons icon-button-power mr-1"></i> {{ $partner->name }}</h5>
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
</form>
@endsection