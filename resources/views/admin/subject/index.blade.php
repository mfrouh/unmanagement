@extends('layouts.user')
@section('title')
@lang('home.subjects')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-status-wrap drp-lst">
        <h4>@lang('home.subjects')</h4>
        <div class="add-product">
            <a href="/subject/create">@lang('home.addsubject')</a>
        </div>
        <div class="asset-inner">
            <table>
                <tbody>
                <tr>
                    <th></th>
                    <th>@lang('home.name')</th>
                    <th>@lang('home.group')</th>
                    <th>@lang('home.teacher')</th>
                    <th>@lang('home.teacherassistant')</th>
                    <th>#</th>
                </tr>
                @php
                $name=__('home.nametr');
                $subjects=App\subject::all();
                @endphp
                @foreach($subjects as $k => $subject)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$subject->name}}</td>
                    <td>{{$subject->group->name}}</td>
                    <td>{{$subject->user->name}}</td>
                    <td>{{$subject->teacherassistant}}</td>
                    <td>
                        <a data-toggle="tooltip" title="" href="/subject/{{$subject->id}}/edit" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash" onclick="event.preventDefault();document.getElementById('delete').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           <form id="delete" action="{{ route('subject.destroy',['id'=>$subject->id]) }}" method="POST" style="display: none;">
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
