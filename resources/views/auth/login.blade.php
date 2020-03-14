@extends('layouts.out')
@section('title')
@lang('home.login')
@endsection
@section('content')
<div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <h3>@lang('home.login')</h3>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <form action="#" method="POST" id="loginForm" action="{{route('login')}}" >
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="username">@lang('home.email')</label>
                            <input type="text" placeholder="@lang('home.email')" title="Please enter you email" required="" value="" name="email" id="username" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">@lang('home.password')</label>
                            <input type="password" title="Please enter your password" placeholder="@lang('home.password')" required="" value="" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button class="btn btn-success btn-block loginbtn">@lang('home.login')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
