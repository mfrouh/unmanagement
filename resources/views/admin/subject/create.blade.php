@extends('layouts.user')
@section('title')
@lang('home.subjects')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-payment-inner-st">
        <div class="product-tab-list tab-pane fade active in" id="description">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <form id="add-department" action="\subject" method="post" class="add-department" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                  <div class="form-group">
                                      <label>@lang('home.name')</label>
                                      <input name="name" type="text" class="form-control" placeholder="@lang('home.name')">
                                  </div>
                                 <div class="form-group">
                                        <label>@lang('home.group')</label>
                                        <select name="group_id" class="form-control">
                                            @php
                                                $groupes=App\group::all();
                                                $name=__('home.nametr');
                                            @endphp
                                            @foreach ($groupes as $group)
                                              <option value="{{$group->id}}" >{{$group->name}}</option>
                                            @endforeach
                                        </select>
                                  </div>
                                <div class="form-group">
                                        <label>@lang('home.teacher')</label>
                                        <select name="user_id" class="form-control">
                                            @php
                                                $users=App\User::where('role','teacher')->get();
                                                $name=__('home.nametr');
                                            @endphp
                                            @foreach ($users as $user)
                                              <option value="{{$user->id}}" >{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                  </div>
                                  <div class="form-group">
                                    <label>@lang('home.teacherassistant')</label>
                                    <select name="teacherassistant[]" class="form-control" multiple>
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
