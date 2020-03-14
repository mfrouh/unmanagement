@extends('layouts.user')
@section('title')
@lang('home.content')
@endsection

@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-status-wrap drp-lst">
        <h4>@lang('home.sectioncontents')</h4>
        <div class="add-product">
            <a href="/sectioncontent/create">@lang('home.addcontent')</a>
        </div>
        <div class="asset-inner">
            <table>
                <tbody>
                <tr>
                    <th></th>
                    <th>@lang('home.title')</th>
                    <th>@lang('home.content')</th>
                    <th>@lang('home.subject')</th>
                    <th>@lang('home.teacherassistant')</th>
                    <th>@lang('home.sectiongroup')</th>
                    <th>#</th>
                </tr>
                @foreach(auth()->user()->contents as $k => $content)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$content->title}}</td>
                    <td>{{$content->content}}</td>
                    <td>{{$content->subject->name}}</td>
                    <td>{{$content->user->name}}</td>
                    <td>{{$content->sectiongroup}}</td>
                    <td>
                        <a data-toggle="tooltip" title="" href="/sectioncontent/{{$content->id}}/edit" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash" onclick="event.preventDefault();document.getElementById('delete').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           <form id="delete" action="{{ route('sectioncontent.destroy',['id'=>$content->id]) }}" method="POST" style="display: none;">
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
