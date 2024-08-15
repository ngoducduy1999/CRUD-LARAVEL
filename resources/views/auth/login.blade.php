<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .login-container h1 {
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-custom {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            border-color: #004a9b;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
        .alert {
            margin-top: 15px;
        }
        .password-info {
            display: none;
            margin-top: 10px;
        }
        .password-info span {
            display: block;
        }
        .password-info .valid {
            color: green;
        }
        .password-info .invalid {
            color: red;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required oninput="checkPassword()">
                <div class="password-info" id="passwordInfo">
                    <span id="minLength" class="invalid">At least 8 characters</span>
                    <span id="uppercase" class="invalid">{{-- At least one uppercase letter --}}</span>
                    <span id="number" class="invalid">At least one number</span>
                </div>
            </div>

            <button type="submit" class="btn btn-custom btn-block">Login</button>
        </form>

        <p class="mt-3">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
    </div>

    <script>
        function checkPassword() {
            const password = document.getElementById('password').value;
            const minLength = document.getElementById('minLength');
            const uppercase = document.getElementById('uppercase');
            const number = document.getElementById('number');
            const passwordInfo = document.getElementById('passwordInfo');

            const isMinLength = password.length >= 8;
            const hasUppercase = /[A-Z]/.test(password);
            const hasNumber = /[0-9]/.test(password);

            minLength.classList.toggle('valid', isMinLength);
            minLength.classList.toggle('invalid', !isMinLength);

            uppercase.classList.toggle('valid', hasUppercase);
            uppercase.classList.toggle('invalid', !hasUppercase);

            number.classList.toggle('valid', hasNumber);
            number.classList.toggle('invalid', !hasNumber);

            if (isMinLength && hasUppercase && hasNumber) {
                passwordInfo.style.display = 'none';
            } else {
                passwordInfo.style.display = 'block';
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
