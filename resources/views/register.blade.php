<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h1>Register</h1>
    <div class="login-container" style="height: 22rem; width: 18rem">
        <form action="{{ route('register') }}" method="POST" class="login-form">
            @csrf

            <div>
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div>
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>