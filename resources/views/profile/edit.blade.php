@extends('layouts.app')
@section('title', "| Profile")

@section('content')

<div class="row justify-content-center">
    <div class="col-md-12 col-lg-12 col-xl-10">
        <div class="card">
            <div class="card-header">
                {{ __('Edit your profile information') }}
                <a href="{{ route('getWithSlug', [$user->slug]) }}" class="float-right">Back To Profile &raquo;</a>
            </div>

            <div class="card-body">
                <form action="{{ route('profile.update', ['id' => $user->id]) }}" class="app-edit-user-profile" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <div class="form-row">
                        
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input type="text" 
                                name="city" 
                                id="city" 
                                value="{{ $profile->city }}" 
                                class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}">

                            @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-md-6">
                            <label for="country">Country</label>
                            <input type="text" 
                                name="country" 
                                id="country" 
                                value="{{ $profile->country }}" 
                                class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}">
                        
                            @if ($errors->has('country'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                    </div>

                    <div class="form-group">

                        <label for="about">About</label>
                        <textarea name="about" 
                                  id="about" 
                                  class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}">{{ $profile->about }}
                        </textarea>

                        @if ($errors->has('about'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('about') }}</strong>
                            </span>
                        @endif

                    </div>

                    <div class="form-group">

                        <div class="my-4 text-center d-inline-block app-user-profile">
                            @include('layouts.profile-pic')
                        </div>
                        <div class="mb-2">Change image</div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input{{ $errors->has('image') ? ' is-invalid' : '' }}"
                                   id="image"
                                   name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>

                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert" style="display: block;">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif

                    </div>

                    <p class="mt-4">
                        <a class="btn btn-outline-primary" 
                           data-toggle="collapse" 
                           href="#collapseExample" 
                           role="button" 
                           aria-expanded="false" 
                           aria-controls="collapseExample">You can change your password
                        </a>
                    </p>

                    <div class="collapse {{ $errors->has('current-password') || $errors->has('new-password') || $errors->has('new-password_confirmation')? 'show' : '' }}" id="collapseExample">

                        <div class="form-row">
                            
                            <div class="form-group col-md-4">

                                <label for="current-password"><span class="app-form-required">Current password</span></label>
                                <input type="password" 
                                    name="current-password" 
                                    id="current-password" 
                                    class="form-control{{ $errors->has('current-password') ? ' is-invalid' : '' }}">

                                @if ($errors->has('current-password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group col-md-4">

                                <label for="new-password"><span class="app-form-required">New password</span></label>
                                <input type="password" 
                                    name="new-password" 
                                    id="new-password" 
                                    class="form-control{{ $errors->has('new-password') ? ' is-invalid' : '' }}">
                            
                                @if ($errors->has('new-password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group col-md-4">

                                <label for="new-password-confirm"><span class="app-form-required">Confirm new password</span></label>
                                <input type="password" 
                                    name="new-password_confirmation" 
                                    id="new-password-confirm" 
                                    class="form-control{{ $errors->has('new-password_confirmation') ? ' is-invalid' : '' }}">

                                @if ($errors->has('new-password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new-password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                    </div>

                    <button type="submit" name="button" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection