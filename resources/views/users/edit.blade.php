@extends('layouts.app', ['page' => __('Editar usuario'), 'pageSlug' => 'users'])

@section('content')
<div class="row">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <h5 class="title">Modificar usuario</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-5 pr-md-1">
                            <div class="form-group">
                                <label>{{ __('Company') }}</label>
                                <input type="text" class="form-control" disabled="" placeholder="{{ __('Company') }}" value="{{ optional($user->partner)->name }}">
                            </div>
                        </div>
                        <div class="col-md-3 px-md-1">
                            <div class="form-group">
                                <label>{{ __('Username') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Username') }}" value="{{ $user->username }}">
                            </div>
                        </div>
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ __('E-Mail Address') }}</label>
                                <input type="email" class="form-control" placeholder="mike@email.com" value="{{ $user->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-md-1">
                            <div class="form-group">
                                <label>{{ __('First Name') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Company') }}" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-md-6 pl-md-1">
                            <div class="form-group">
                                <label>{{ __('Last Name') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Last Name') }}" value="{{ $user->lastname }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ __('Address') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Address') }}" value="{{ $user->address }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pr-md-1">
                            <div class="form-group">
                                <label>{{ __('City') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('City') }}" value="Mike">
                            </div>
                        </div>
                        <div class="col-md-4 px-md-1">
                            <div class="form-group">
                                <label>{{ __('Country') }}</label>
                                <input type="text" class="form-control" placeholder="{{ __('Country') }}" value="Andrew">
                            </div>
                        </div>
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label>{{ __('Postal Code') }}</label>
                                <input type="number" class="form-control" placeholder="ZIP Code">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>{{ __('About Me') }}</label>
                                <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">{{ __('Save') }}</button>
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <h5 class="title">{{ __('Password') }}</h5>
            </div>
            <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                <div class="card-body">
                    @csrf
                    @method('put')

                    @include('alerts.success', ['key' => 'password_status'])

                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                        <label>{{ __('Current Password') }}</label>
                        <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                        @include('alerts.feedback', ['field' => 'old_password'])
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <label>{{ __('New Password') }}</label>
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                    <div class="form-group">
                        <label>{{ __('Confirm New Password') }}</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">{{ __('Change password') }}</button>
                </div>
            </form>
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
                        <img class="avatar" src="{{ asset('dark/img/emilyz.jpg') }}" alt="">
                        <h5 class="title">{{ auth()->user()->name }}</h5>
                    </a>
                    <p class="description">
                        {{ __('Ceo/Co-Founder') }}
                    </p>
                </div>
                </p>
                <div class="card-description">
                    {{ __('Do not be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...') }}
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