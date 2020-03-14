@extends('layouts.user')
@section('title')
@lang('home.groups')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-payment-inner-st">
        <div class="product-tab-list tab-pane fade active in" id="description">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="review-content-section">
                            <form id="add-department" action="/group/{{$sectiongroup->id}}" method="POST" class="add-department" novalidate="novalidate">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group">
                                        <label>@lang('home.name')</label>
                                        <input name="name" type="text" class="form-control" placeholder="@lang('home.name')" value="{{$sectiongroup->name}}">
                                    </div>
                                   <div class="form-group">
                                      <label>@lang('home.namegroup')</label>
                                       <select name="group_id" class="form-control" >
                                           @foreach (gettable('App\group') as $group)
                                            <option value="{{$group->id}}" {{$sectiongroup->group_id==$group->id?'selected':''}}>{{$group->name}}</option>
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
