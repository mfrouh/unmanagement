@extends('layouts.user')
@section('title')
@lang('home.exam')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-payment-inner-st">
        <div class="product-tab-list tab-pane fade active in" id="description">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <form id="add-department" action="\exam" method="post" class="add-department" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                  <div class="form-group" >
                                          <label>@lang('home.name')</label>
                                          <input name="name"  class="form-control" placeholder="@lang('home.name')">
                                  </div>
                                  <div class="form-group">
                                      <label>@lang('home.duration')</label>
                                      <input name="duration" type="number" min="1" class="form-control" placeholder="@lang('home.duration')">
                                  </div>
                                  <div class="form-group">
                                    <label>@lang('home.gradepass')</label>
                                    <input name="gradepass" type="number" min="1"  class="form-control" placeholder="@lang('home.gradepass')">
                                </div>
                                <div class="form-group">
                                    <label>@lang('home.start')</label>
                                    <input name="start" type="date"  class="form-control" placeholder="@lang('home.start')">
                                </div>
                                <div class="form-group">
                                  <label>@lang('home.end')</label>
                                  <input name="end" type="date"   class="form-control" placeholder="@lang('home.end')">
                                </div>
                                  <div class="form-group">
                                        <label>@lang('home.subject')</label>
                                        <select name="subject_id" class="form-control">
                                            @foreach (auth()->user()->subject as $subject)
                                              <option value="{{$subject->id}}" >{{$subject->name}}  ,{{$subject->group->name}}</option>
                                            @endforeach
                                        </select>
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
