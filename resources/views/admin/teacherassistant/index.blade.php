@extends('layouts.user')
@section('title')
@lang('home.teacherassistants')
@endsection
@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="product-status-wrap drp-lst">
        <h4>@lang('home.teacherassistants')</h4>
        <div class="add-product">
            <a href="/teacherassistant/create">@lang('home.addteacherassistant')</a>
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
                $teacherassistants=App\User::where('role','teacherassistant')->get();
                @endphp
                @foreach($teacherassistants as $k => $teacherassistant)
                <tr>
                    <td>{{$k+1}}</td>
                    <td>{{$teacherassistant->name}}</td>
                    <td>{{$teacherassistant->email}}</td>
                    <td>{{$teacherassistant->phone_number}}</td>
                    <td>{{$teacherassistant->date_of_birth}}</td>
                    <td>{{$teacherassistant->address}}</td>
                    <td>{{$teacherassistant->gender}}</td>

                    <td>
                        <a data-toggle="tooltip" title="" href="/teacherassistant/{{$teacherassistant->id}}/edit" class="pd-setting-ed" data-original-title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a data-toggle="tooltip" title="" class="pd-setting-ed" data-original-title="Trash" onclick="event.preventDefault();document.getElementById('delete').submit();"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           <form id="delete" action="{{ route('teacherassistant.destroy',['id'=>$teacherassistant->id]) }}" method="POST" style="display: none;">
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
