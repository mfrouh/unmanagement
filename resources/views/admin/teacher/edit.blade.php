@extends('layouts.user')
@section('title')
@lang('home.teachers')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-payment-inner-st">
        <div class="product-tab-list tab-pane fade active in" id="description">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <form id="add-department" action="/teacher/{{$teacher->id}}" method="post" class="add-department" novalidate="novalidate">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                  <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label>@lang('home.teachername')</label>
                                        <input name="name" type="text" class="form-control" placeholder="@lang('home.teachername')" value="{{$teacher->name}}">
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                     <div class="form-group">
                                       <label>@lang('home.email')</label>
                                        <input name="email" type="email" class="form-control" placeholder="@lang('home.email')" value="{{$teacher->email}}">
                                     </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="form-group">
                                      <label>@lang('home.password')</label>
                                       <input name="password" type="password" class="form-control" placeholder="@lang('home.password')">
                                    </div>
                              </div>
                              <div class="col-lg-6">
                                    <div class="form-group">
                                      <label>@lang('home.password_confirmation')</label>
                                       <input name="password_confirmation" type="password" class="form-control" placeholder="@lang('home.password_confirmation')">
                                    </div>
                              </div>
                                  <div class="col-lg-6">
                                        <div class="form-group">
                                          <label>@lang('home.address')</label>
                                           <input name="address" type="text" class="form-control" placeholder="@lang('home.address')"  value="{{$teacher->address}}">
                                        </div>
                                  </div>
                                  <div class="col-lg-6">
                                        <div class="form-group">
                                          <label>@lang('home.phone_number')</label>
                                           <input name="phone_number" type="text" class="form-control" placeholder="@lang('home.phone_number')"  value="{{$teacher->phone_number}}">
                                        </div>
                                  </div>
                                  <div class="col-lg-6">
                                        <div class="form-group">
                                          <label>@lang('home.date_of_birth')</label>
                                           <input name="date_of_birth" type="date" class="form-control" placeholder="@lang('home.date_of_birth')"  value="{{$teacher->date_of_birth}}">
                                        </div>
                                  </div>
                                  <div class="col-lg-6">
                                        <div class="form-group">
                                          <label>@lang('home.gender')</label><br>
                                           <input name="gender" type="radio" @if ($teacher->gender =='male'){{'checked'}} @endif  value="male"  placeholder="">@lang('home.male')
                                           <input name="gender" type="radio"  @if ($teacher->gender =='female'){{'checked'}} @endif value="female"  placeholder="">@lang('home.female')

                                        </div>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="payment-adress">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">@lang('home.save')</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
