@extends('layouts.main')

@section('content')
    <h1>This is home page</h1>

    <h3>{{$num1}} + {{$num2}} = {{$result}}</h3>

    <img src="{{asset('image/profile.jpg')}}" alt="profile" width="100px">
@endsection

@section('homePageFooter')
    <h3 style="background-color: red">This is home page footer section.</h3>

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. A eaque, exercitationem libero cupiditate deserunt aut illum eligendi tempora. Sit veritatis quod temporibus nihil incidunt? Ullam fugit commodi cupiditate dolore aliquid.</p>
@endsection

{{-- @push('javascript')
    <script type="text/javascript">
        window.alert('hello');
    </script>
@endpush --}}