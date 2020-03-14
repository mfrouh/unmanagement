@extends('layouts.user')
@section('title')
@lang('home.myinformation')
@endsection
@section('content')
<div class="container">
        <div class="row">
          <div class="col-md-8" >
           <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
           <form action="/information" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="form-group">
                  <label>@lang('home.name')</label>
                  <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
              </div>
              <div class="form-group">
                    <label>@lang('home.email')</label>
                    <input type="text" class="form-control" name="email" value="{{auth()->user()->email}}">
              </div>
              <div class="form-group">
                    <label>@lang('home.image')</label>
                    <input type="file" class="form-control"  name="image" >
            </div>
            <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary"  value="@lang('home.save')" >
            </div>
          </form>
          </div>
          </div>
          <div class="col-md-4" >
            <div class="sparkline11-list mt-b-30" style="border:1px solid black ">
              <form action="/changepassword" method="POST" >
                      @csrf
                      @method('PUT')
                   <div class="form-group">
                         <label>@lang('home.oldpassword')</label>
                         <input type="password" class="form-control" name="oldpassword"  required  >
                    </div>
                    <div class="form-group">
                          <label>@lang('home.newpassword')</label>
                          <input type="password" class="form-control" name="password" required autocomplete="new-password" >
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                    <div class="form-group">
                          <label>@lang('home.confirmpassword')</label>
                          <input type="password" class="form-control"  name="password_confirmation" required autocomplete="new-password">
                  </div>
                  <div class="form-group text-center">
                          <input type="submit" class="btn btn-primary"  value="@lang('home.save')" >
                  </div>
                </form>
           </div>
          </div>
        </div>
</div>
@endsection
