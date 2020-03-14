@extends('layouts.user')
@section('title')
@lang('home.sectiongroup')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-status-wrap drp-lst">
        <h4>@lang('home.groups')</h4>
        <div class="add-product">
            <a href="/sectiongroup/create">@lang('home.addsectiongroup')</a>
        </div>
        <div class="asset-inner">
            <table>
                <tbody>
                <tr>
                    <th></th>
                    <th class="text-center">@lang('home.name')</th>
                    <th class="text-center">@lang('home.namegroup')</th>
                    <th>#</th>
                </tr>
                @php
                $sectiongroups=App\sectiongroup::all();
                @endphp
                @foreach($sectiongroups as $k => $sectiongroup)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$sectiongroup->name}}</td>
                    <td>{{$sectiongroup->group->name}}</td>
                    <td>
                        <a data-toggle="tooltip" title="" href="/sectiongroup/{{$sectiongroup->id}}/edit" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash" onclick="event.preventDefault();document.getElementById('delete').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           <form id="delete" action="{{ route('sectiongroup.destroy',['id'=>$sectiongroup->id]) }}" method="POST" style="display: none;">
                               @csrf
                               @method('DELETE')
                           </form>
                    </td>
                </tr>
                 @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
