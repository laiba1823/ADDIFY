<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Buyers</title>

</head>
<body>
    <form method="POST" action="{{ route('buyers.login') }}">
        @csrf
    
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <span class="text-danger">@error('email'){{$message}}@enderror</span>
    
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <span class="text-danger">@error('password'){{$message}}@enderror</span>
    
        <button type="submit">Login</button>
    </form>
    
    @if (Session::has('success'))
        <div class="alert alert-success some-space-upNdown" role="alert">
            <center style="">
                {{ session("success") }}
                <br>
            </center> 
        </div>
    @endif

    @if (Session::has('fail'))
        <div class="alert alert-danger some-space-upNdown" role="alert">
            <center style="">
                {{ session("fail") }}
                <br>
            </center> 
        </div>
    @endif

</body>
</html>
