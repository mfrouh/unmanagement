@extends('layouts.user')
@section('title')
@lang('home.sections')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-payment-inner-st">
        <div class="product-tab-list tab-pane fade active in" id="description">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <form id="add-department" action="\section" method="post" class="add-department" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                  <div class="form-group">
                                      <label>@lang('home.name')</label>
                                      <input name="name" type="text" class="form-control" placeholder="@lang('home.name')">
                                  </div>
                                  <div class="form-group">
                                    <label>@lang('home.sectiongroup')</label>
                                    <select name="sectiongroup_id" class="form-control">
                                        @php
                                            $sectiongroups=App\sectiongroup::all();
                                        @endphp
                                        @foreach ($sectiongroups as $sectiongroup)
                                          <option value="{{$sectiongroup->id}}" >{{$sectiongroup->name}}</option>
                                        @endforeach
                                    </select>
                              </div>
                              <div class="form-group">
                                    <label>@lang('home.subject')</label>
                                    <select name="subject_id" class="form-control">
                                        @php
                                            $subjects=App\subject::all();
                                            $name=__('home.nametr');
                                        @endphp
                                        @foreach ($subjects as $subject)
                                          <option value="{{$subject->id}}"  >{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                                 </div>
                                <div class="form-group">
                                        <label>@lang('home.teacherassistant')</label>
                                        <select name="user_id" class="form-control">
                                            @php
                                                $users=App\User::where('role','teacherassistant')->get();
                                                $name=__('home.nametr');
                                            @endphp
                                            @foreach ($users as $user)
                                              <option value="{{$user->id}}" >{{$user->name}}</option>
                                            @endforeach
                                        </select>
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
