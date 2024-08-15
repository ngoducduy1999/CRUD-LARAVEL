<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f7f7;
        }
        .register-container {
            max-width: 500px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .register-container h1 {
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-custom {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group .form-control:focus {
            border-color: #28a745;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        }
        .alert {
            margin-top: 15px;
        }
        .password-info,
        .password-match-info {
            font-size: 0.875rem;
            color: #6c757d;
            display: none; /* Hidden by default */
        }
        .password-info span,
        .password-match-info span {
            font-weight: bold;
        }
        .password-info.visible,
        .password-match-info.visible {
            display: block; /* Show when input focused */
        }
        .password-info.valid,
        .password-match-info.match {
            color: #28a745; /* Green color for valid */
        }
        .password-info.invalid,
        .password-match-info.unmatch {
            color: #dc3545; /* Red color for invalid */
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Register</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Hiển thị lỗi cho tất cả các trường -->
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" class="form-control" value="{{ old('fullname') }}" required>
                @error('fullname')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" required>
                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div id="passwordInfo" class="password-info">
                    <p>Password must be at least <span id="minLength">8</span> characters long. Current length: <span id="currentLength">0</span></p>
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                <div id="passwordMatchInfo" class="password-match-info">
                    <p>Passwords <span></span></p>
                </div>
            </div>

            <button type="submit" class="btn btn-custom btn-block">Register</button>
        </form>

        <p class="mt-3">Already have an account? <a href="{{ route('login') }}">Login here</a></p>
    </div>

    <script>
        document.getElementById('password').addEventListener('focus', function() {
            document.getElementById('passwordInfo').classList.add('visible');
            updatePasswordInfo();
        });

        document.getElementById('password').addEventListener('blur', function() {
            document.getElementById('passwordInfo').classList.remove('visible');
        });

        document.getElementById('password').addEventListener('input', function() {
            updatePasswordInfo();
        });

        document.getElementById('password_confirmation').addEventListener('focus', function() {
            document.getElementById('passwordMatchInfo').classList.add('visible');
            checkPasswordMatch();
        });

        document.getElementById('password_confirmation').addEventListener('blur', function() {
            document.getElementById('passwordMatchInfo').classList.remove('visible');
        });

        document.getElementById('password_confirmation').addEventListener('input', function() {
            checkPasswordMatch();
        });

        function updatePasswordInfo() {
            const passwordField = document.getElementById('password');
            const minLength = parseInt(document.getElementById('minLength').textContent);
            const currentLength = passwordField.value.length;
            const currentLengthElement = document.getElementById('currentLength');

            currentLengthElement.textContent = currentLength;
            if (currentLength >= minLength) {
                currentLengthElement.classList.remove('invalid');
                currentLengthElement.classList.add('valid');
            } else {
                currentLengthElement.classList.remove('valid');
                currentLengthElement.classList.add('invalid');
            }
        }

        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const passwordMatchInfo = document.getElementById('passwordMatchInfo');
            const matchText = passwordMatchInfo.querySelector('span');

            if (password === confirmPassword) {
                matchText.textContent = 'match';
                passwordMatchInfo.classList.remove('unmatch');
                passwordMatchInfo.classList.add('match');
            } else {
                matchText.textContent = 'do not match';
                passwordMatchInfo.classList.remove('match');
                passwordMatchInfo.classList.add('unmatch');
            }
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
