@extends('layouts.user')
@section('title')
@lang('home.exam')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-status-wrap drp-lst">
        <h4>@lang('home.exams')</h4>
        <div class="add-product">
            <a href="/exam/create">@lang('home.addexam')</a>
        </div>
        <div class="asset-inner">
            <table>
                <tbody>
                <tr>
                    <th></th>
                    <th>@lang('home.subject')</th>
                    <th>@lang('home.name')</th>
                    <th>@lang('home.duration')</th>
                    <th>@lang('home.gradepass')</th>
                    <th>@lang('home.start')</th>
                    <th>@lang('home.end')</th>
                    <th>Setting</th>
                </tr>
                @php
                $arr=array( );
                $name=__('home.nametr');
                foreach (auth()->user()->subject as $key => $value) {
                   $arr[]=$value->id;
                }

                $exams=App\exam::whereIn('subject_id',$arr)->get();
                @endphp
                @foreach($exams as $k => $exam)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$exam->subject->name}}</td>
                    <td>{{$exam->name}}</td>
                    <td>{{$exam->duration}}</td>
                    <td>{{$exam->gradepass}}</td>
                    <td>{{$exam->start}}</td>
                    <td>{{$exam->end}}</td>
                    <td>
                        <a data-toggle="tooltip" title="" href="/exam/{{$exam->id}}/edit" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash" onclick="event.preventDefault();document.getElementById('delete').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           <form id="delete" action="{{ route('exam.destroy',['id'=>$exam->id]) }}" method="POST" style="display: none;">
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
