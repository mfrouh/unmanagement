@extends('layouts.user')
@section('title')
@lang('home.content')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-payment-inner-st">
        <div class="product-tab-list tab-pane fade active in" id="description">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <form id="add-department" action="\sectioncontent" method="post" class="add-department" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                  <div class="form-group" >
                                          <label>@lang('home.title')</label>
                                          <input name="title"  class="form-control" placeholder="@lang('home.title')">
                                  </div>
                                  <div class="form-group">
                                      <label>@lang('home.content')</label>
                                      <textarea name="content"  class="form-control" placeholder="@lang('home.content')"></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label>@lang('home.subject')</label>
                                    <select name="subject_id" class="form-control">
                                        @php
                                            $subjects=App\subject::whereIN('id',auth()->user()->section->pluck('subject_id'))->get();
                                        @endphp
                                        @foreach ($subjects as $subject)
                                          <option value="{{$subject->id}}" >{{$subject->name}}</option>
                                        @endforeach
                                    </select>
                              </div>
                              <div class="form-group">
                                <label>@lang('home.sections')</label>
                                <select name="sectiongroup[]" class="form-control" multiple>

                                    @foreach (auth()->user()->section as $section)
                                    <option value="{{$section->sectiongroup->id}}" >{{$section->sectiongroup->name}}</option>
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
