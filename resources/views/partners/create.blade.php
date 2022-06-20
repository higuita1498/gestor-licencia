@extends('layouts.app', ['page' => __('Crear socio'), 'pageSlug' => 'create-partners'])

@section('content')
<form method="post" action="{{ route('partners.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Crear socio</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="mx-md-1 col-md-5">
                            <div class="form-group">
                                <label>{{ __('Name') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Company') }}" name="PartnerName" value="{{ old('PartnerName') }}">
                                @include('alerts.feedback', ['field' => 'PartnerName'])
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('Contact Name') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Contact Name') }}" name="PartnerContactName" value="{{ old('PartnerContactName') }}">
                                @include('alerts.feedback', ['field' => 'PartnerContactName'])
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="mx-md-1 col-md-5">
                            <div class="form-group">
                                <label>{{ __('Phone Number') }}</label>
                                <input type="number" class="form-control" placeholder="{{ __('Phone Number') }}" name="PartnerContactNumber" value="">
                                @include('alerts.feedback', ['field' => 'PartnerContactNumber'])
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('PartnerID') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('PartnerID') }}" name="PartnerID" value="{{ old('PartnerID') }}" required>
                                @include('alerts.feedback', ['field' => 'PartnerID'])
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="mx-md-1 col-md-5">
                            <div class="form-group">
                                <label>{{ __('E-Mail Address') }}</label>
                                <input type="email" class="form-control" placeholder="{{ __('E-Mail Address') }}" name="PartnerEmail" value="{{ old('PartnerEmail') }}" required>
                                @include('alerts.feedback', ['field' => 'PartnerEmail'])
                            </div>
                        </div>
                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary float-right mx-1">{{ __('Save') }}</button>
                    <a href="{{ route('partners.index') }}" class="btn btn-fill btn-default float-right mx-1">{{ __('Cancel') }}</a>
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
</form>
@endsection