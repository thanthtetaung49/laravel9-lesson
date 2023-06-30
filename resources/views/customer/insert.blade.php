<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        .form-group {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Client home page</h1>

    <form action="{{ route('client#insert') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="">Name : </label>
            <input type="text" name="clientName" required />
        </div>
        <div class="form-group">
            <label for="">Address : </label>
            <input type="text" name="clientAddress" required />
        </div>
        <div class="form-group">
            <label for="">Phone number : </label>
            <input type="number" name="clientPhoneNumber" required />
        </div>
        <input type="submit" value="Register">
    </form>
</body>

</html>
