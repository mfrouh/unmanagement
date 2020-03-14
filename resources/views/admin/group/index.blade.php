@extends('layouts.user')
@section('title')
@lang('home.groups')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-status-wrap drp-lst">
        <h4>@lang('home.groups')</h4>
        <div class="add-product">
            <a href="/group/create">@lang('home.addgroup')</a>
        </div>
        <div class="asset-inner">
            <table>
                <tbody>
                <tr>
                    <th></th>
                    <th class="text-center">@lang('home.namegroup')</th>
                    <th class="text-center">@lang('home.parentgroupname')</th>
                    <th class="text-center">@lang('home.countofsection')</th>
                    <th>#</th>
                </tr>
                @php
                $groups=App\group::all();
                @endphp
                @foreach($groups as $k => $group)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$group->name}}</td>
                    <td>{{$group->parentgroup->name}}</td>
                    <td>{{$group->countofsection}}</td>
                    <td>
                        <a data-toggle="tooltip" title="" href="/group/{{$group->id}}/edit" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash" onclick="event.preventDefault();document.getElementById('delete').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           <form id="delete" action="{{ route('group.destroy',['id'=>$group->id]) }}" method="POST" style="display: none;">
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
