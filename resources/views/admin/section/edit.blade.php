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
                            <form id="add-department" action="\section\{{$section->id}}" method="post" class="add-department" novalidate="novalidate">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                  <div class="form-group">
                                      <label>@lang('home.name')</label>
                                      <input name="name" type="text" class="form-control" placeholder="@lang('home.name')" value="{{$section->name}}">
                                  </div>
                                  <div class="form-group">
                                    <label>@lang('home.sectiongroup')</label>
                                    <select name="sectiongroup_id" class="form-control">
                                        @php
                                            $sectiongroups=App\sectiongroup::all();
                                            $name=__('home.nametr');
                                        @endphp
                                        @foreach ($sectiongroups as $sectiongroup)
                                          <option value="{{$sectiongroup->id}}" {{$section->sectiongroup_id==$sectiongroup->id?'selected':''}} >{{$sectiongroup->name}}</option>
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
                                          <option value="{{$subject->id}}" {{$section->subject_id==$subject->id?'selected':''}} >{{$subject->name}}</option>
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
                                              <option value="{{$user->id}}" {{$section->user_id==$user->id?'selected':''}} >{{$user->name}}</option>
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
