@extends('layouts.app', ['page' => __('Editar usuario'), 'pageSlug' => 'users'])

@section('content')
<form method="post" action="{{ route('users.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Crear usuario</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 pr-md-1">
                            <div class="form-group">
                                <label>{{ __('Company') }}</label>
                                <select type="text" class="form-control" name="partner_id" style="background-color: #2b3553;" title="{{ __('City') }}">
                                    @foreach ($partners as $partner)
                                    <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'partner_id'])
                            </div>
                        </div>
                        <div class="col-md-3 px-md-1">
                            <div class="form-group">
                                <label>{{ __('Username') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Username') }}" name="username" value="">
                                @include('alerts.feedback', ['field' => 'username'])
                            </div>
                        </div>
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('E-Mail Address') }}</label>
                                <input type="email" class="form-control" placeholder="mike@email.com" name="email" value="">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('First Name') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Company') }}" name="name" value="">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <div class="form-group">
                                <label>{{ __('Last Name') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Last Name') }}" name="lastname" value="">
                                @include('alerts.feedback', ['field' => 'lastname'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ __('Address') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Address') }}" name="address" value="">
                                @include('alerts.feedback', ['field' => 'address'])
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <div class="form-group">
                                <label>{{ __('Document Number') }}</label>
                                <input type="number" class="form-control" placeholder="{{ __('Document Number') }}" name="identification_number" value="">
                                @include('alerts.feedback', ['field' => 'identification_number'])
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 pr-md-1">
                            <div class="form-group">
                                <label>{{ __('City') }}</label>
                                <select type="text" class="form-control" name="city_id" style="background-color: #2b3553;" title="{{ __('City') }}">
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @include('alerts.feedback', ['field' => 'city_id'])
                            </div>
                        </div>
                        <div class="col-md-4 px-md-1">
                            <div class="form-group">
                                <label>{{ __('Country') }}</label>
                                <input type="text" class="form-control" disabled placeholder="{{ __('Country') }}" value="">
                            </div>
                        </div>
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label>{{ __('Postal Code') }}</label>
                                <input type="number" class="form-control" placeholder="ZIP Code" name="postal_code" value="">
                                @include('alerts.feedback', ['field' => 'postal_code'])
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>{{ __('About Me') }}</label>
                                <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" name="biography"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary float-right">{{ __('Save') }}</button>
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