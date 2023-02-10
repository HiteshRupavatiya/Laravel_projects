<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Form</title>
</head>

<body>
    <h1 align="center">Create User</h1>
    <table align="center">
        <form action="{{url('/user/store')}}" method="post">
            @csrf
            @if ($errors)
                @foreach ($errors->all() as $error)
                    <li align="center">{{$error}}</li>
                @endforeach
                <br>
            @endif
            <tr>
                <td>User Name :</td>
                <td>
                    <input type="text" name="name" id="">
                    <span></span>
                </td>  
            </tr>
            <tr>
                <td>User Email :</td>
                <td>
                    <input type="email" name="email" id="">
                    <span></span>
                </td>
            </tr>
            <tr>
                <td>Password :</td>
                <td>
                    <input type="password" name="password" id="">
                    <span></span>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Create">
                </td>
            </tr>
        </form>
    </table>
</body>

</html>
