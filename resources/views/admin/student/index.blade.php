@extends('layouts.user')
@section('title')
@lang('home.students')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-status-wrap drp-lst">
        <h4>@lang('home.students')</h4>
        <div class="add-product">
            <a href="/student/create">@lang('home.addstudent')</a>
        </div>
        <div class="asset-inner">
            <table>
                <tbody>
                <tr>
                    <th></th>
                    <th>@lang('home.name')</th>
                    <th>@lang('home.email')</th>
                    <th>@lang('home.phone_number')</th>
                    <th>@lang('home.date_of_birth')</th>
                    <th>@lang('home.address')</th>
                    <th>@lang('home.gender')</th>
                    <th>#</th>
                </tr>
                @php
                $name=__('home.nametr');
                $students=App\User::where('role','student')->get();
                @endphp
                @foreach($students as $k => $student)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->phone_number}}</td>
                    <td>{{$student->date_of_birth}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->gender}}</td>

                    <td>
                        <a data-toggle="tooltip" title="" href="/student/{{$student->id}}/edit" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash" onclick="event.preventDefault();document.getElementById('delete').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           <form id="delete" action="{{ route('student.destroy',['id'=>$student->id]) }}" method="POST" style="display: none;">
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
