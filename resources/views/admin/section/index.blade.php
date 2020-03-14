@extends('layouts.user')
@section('title')
@lang('home.sections')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-status-wrap drp-lst">
        <h4>@lang('home.sections')</h4>
        <div class="add-product">
            <a href="/section/create">@lang('home.addsection')</a>
        </div>
        <div class="asset-inner">
            <table>
                <tbody>
                <tr>
                    <th></th>
                    <th>@lang('home.name')</th>
                    <th>@lang('home.group')</th>
                    <th>@lang('home.sectiongroup')</th>
                    <th>@lang('home.teacherassistant')</th>
                    <th>#</th>
                </tr>
                @php
                $name=__('home.nametr');
                $sections=App\section::all();
                @endphp
                @foreach($sections as $k => $section)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$section->name}}</td>
                    <td>{{$section->sectiongroup->group->name}}</td>
                    <td>{{$section->sectiongroup->name}}</td>
                    <td>{{$section->user->name}}</td>
                    <td>
                        <a data-toggle="tooltip" title="" href="/section/{{$section->id}}/edit" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash" onclick="event.preventDefault();document.getElementById('delete').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           <form id="delete" action="{{ route('section.destroy',['id'=>$section->id]) }}" method="POST" style="display: none;">
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
