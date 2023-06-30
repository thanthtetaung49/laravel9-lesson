<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>This is user register page.</h1>

    {{-- post method  --}}
    <form action="{{route('pst',[11,'kit kit'])}}" method="post">
        @csrf
        {{-- {{ csrf_field() }} --}}
        <h1>This page is used by post method.</h1>

        <label for="">Name</label><input type="text" name="userName" id=""/>
        <br><br>
        <label for="">Age</label><input type="number" name="userAge" id=""/>
        <br><br>
        <label for="">Address</label><input type="text" name="userAddress" id=""/>
        <br><br>
        <select name="userGender" id="">
            <option value="M">male</option>
            <option value="F">female</option>
        </select>

        <input type="submit" value="Save">
    </form>
</body>
</html>