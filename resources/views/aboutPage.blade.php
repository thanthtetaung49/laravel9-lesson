@extends('layouts.main')

@section('content')
    <h1>This is about page.</h1>

    <h3>Date method {{date('d-m-Y')}}</h3>

    <hr>

    @php
        echo date('d/m/Y');
    @endphp

    <hr>

    @if (true)
        <h3>This is if status.</h3>
    @endif

    @if (false)
        <h3>This is if status.</h3>
    @elseif (true)
        <h3>This is elseif status.</h3>
    @else
        <h3>This is else status</h3>
    @endif

    @if (false)
        <h3>This is if status.</h3>
    @else
        <h3>This is else status.</h3>
    @endif

    <hr>

    @for ($i = 0; $i <= 5; $i++)
        <h3>This is heading number {{$i}}</h3>
    @endfor

    <hr>

    @for ($i = 0; $i < count($fruits); $i++)
        <h3>For fruits name : {{$fruits[$i]}}</h3>
    @endfor

    <hr>

    @foreach ($fruits as $value)
        <p>For each fruits : {{$value}}</p>
    @endforeach

    <hr>

    @isset($hasValue)
        <p>paragraph has value.</p>
    @endisset

    <hr>

    @empty($emptyValue)
        <p>paragraph has null value.</p>
    @endempty
@endsection