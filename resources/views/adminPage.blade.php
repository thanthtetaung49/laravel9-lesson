<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>This is Admin page.</h3>

    <form action="{{route('admin', ['HelloWorld', 27])}}" method="post">
        @csrf

        <label for="">User name : </label>
        <input type="text" name="userName">
        <label for="">Age : </label>
        <input type="number" name="userAge">
        <label for="">Address : </label>
        <input type="text" name="userAddress">
        <select name="userGender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <input type="submit" value="Save">
    </form>
</body>
</html>