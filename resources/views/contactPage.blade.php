@extends('layouts.main')

@section('content')
    <h1>This is Contact Page.</h1>

    {{-- calculating in client side  --}}
    <h2>{{ $num1 }} + {{ $num2 }} = {{ $num1 + $num2 }}</h2>
@endsection