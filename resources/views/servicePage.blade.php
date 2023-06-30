@extends('layouts.main')

@section('content')
    <h1 style="color:gold">This is service page.</h1>

    <h1>{{ $message }}</h1>

    <h3>{{ url("servicePage") }}</h3>
    <h3>{{ route("svp")}}</h3>
@endsection