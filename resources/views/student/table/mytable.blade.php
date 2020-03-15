@extends('layouts.user')
@section('title')
@lang('home.mytable')
@endsection
@section('content')
<div class="container">
  <table class="table table-bordered text-center" style="background:white;">
    <thead>
        <tr>
          <th class="text-center">....</th>
          <th class="text-center">8:00</th>
          <th class="text-center">10:00</th>
          <th class="text-center">12:00</th>
          <th class="text-center">2:00</th>
          <th class="text-center">4:00</th>
        </tr>
    </thead>
    <tbody>
            @for ($i = 0; $i <6; $i++)
         <tr>
            <?php $day =["sat", "sun","mon", "thus", "wed","thur"];?>
            <th class="text-center">{{$day[$i]}}</th>

                @for ($j = 1; $j <= 5; $j++)
                 @php
                 $y=$day[$i];
                 $tables=App\subjecttable::where('tid',$j)->get($y);
                 $sectiontables=App\sectiontable::where('tid',$j)->get($y);
                 @endphp
                <td>
                @foreach (auth()->user()->group->subject as $subject)
                   @if(in_array($subject->id,$tables->pluck($y)->toarray()))
                   {{$subject->name}}
                   @endif
                @endforeach
                @foreach (auth()->user()->sectiongroup->section as $section)
                   @if(in_array($section->id,$sectiontables->pluck($y)->toarray()))
                   {{$section->name}}
                   @endif
                @endforeach
                </td>
                @endfor
                {{-- @if(auth()->user()->sectiongroup->section->pluck('id')->toarray())
                 <td> {{ $sectiontables->pluck($y)->toarray()}}</td>
                 @else
                 </td> </td>
                 @endif --}}

                 {{-- @foreach (auth()->user()->group->subject as $subject)
                 {{ dd())}}
                   @if (in_array($subject->id,$tables->pluck($y)->toarray()))
                   @endif
                 @endforeach --}}
         </tr>
         @endfor
    </tbody>
  </table>
</div>
@endsection
