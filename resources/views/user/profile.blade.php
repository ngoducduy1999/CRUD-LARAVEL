<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intatest - User Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #fafafa;
        }
        .profile-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            background-color: #e1e1e1;
            cursor: pointer;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .profile-avatar input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        .edit-icon {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: #fff;
            border-radius: 50%;
            padding: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }
        .edit-icon i {
            font-size: 20px;
            color: #0095f6;
        }
        .form-section {
            margin-bottom: 30px;
        }
        .btn-custom {
            background-color: #0095f6;
            border-color: #0095f6;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #007bb5;
            border-color: #007bb5;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 0.25rem;
            box-shadow: none;
        }
        .form-control:focus {
            border-color: #0095f6;
            box-shadow: 0 0 0 0.2rem rgba(0, 149, 246, 0.25);
        }
        .alert {
            margin-top: 15px;
        }
        .char-count {
            font-size: 0.85rem;
            color: #6c757d;
            display: none; /* Ẩn mặc định */
        }
        .char-count.valid {
            color: #28a745;
            display: inline; /* Hiển thị khi hợp lệ */
        }
        .char-count.invalid {
            color: #dc3545;
            display: inline; /* Hiển thị khi không hợp lệ */
        }
        .password-mismatch {
            color: #dc3545;
            display: none; /* Ẩn mặc định */
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <div class="profile-container">
              <!-- Log Out Button -->
<form action="{{ route('logout') }}" method="POST" class="form-section">
    @csrf
    <button type="submit" class="btn btn-danger btn-block">Log Out</button>
</form>
        <h1 class="text-center">User Profile</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @error('current_password')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror

        <!-- Form cập nhật thông tin người dùng -->
        <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="profile-header">
                <!-- Avatar Section -->
                <div class="profile-avatar">
                    <img id="avatarImage" src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://via.placeholder.com/150' }}" alt="Avatar">
                    <input type="file" id="avatar" name="avatar" accept="image/*" onchange="previewImage(event)">
                    <div class="edit-icon" title="Edit Avatar">
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <div class="form-group">
                        <label for="fullname">Full Name:</label>
                        <input type="text" id="fullname" name="fullname" class="form-control" value="{{ old('fullname', $user->fullname) }}" required>
                        <small id="fullnameCount" class="char-count">0/50 characters</small>
                    </div>

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                        <small id="usernameCount" class="char-count">0/30 characters</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $user->address) }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" class="form-control" value="{{ old('city', $user->city) }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="state">State:</label>
                        <input type="text" id="state" name="state" class="form-control" value="{{ old('state', $user->state) }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="zip_code">Zip Code:</label>
                        <input type="text" id="zip_code" name="zip_code" class="form-control" value="{{ old('zip_code', $user->zip_code) }}">
                    </div>

                    <button type="submit" class="btn btn-custom btn-block">Update Profile</button>
                </div>
            </div>
        </form>

        <!-- Form đổi mật khẩu -->
        <div class="form-section">
            <h3>Change Password</h3>
            <form action="{{ route('user.changePassword') }}" method="POST" id="changePasswordForm">
                @csrf
                <div class="form-group">
                    <label for="current_password">Current Password:</label>
                    <input type="password" id="current_password" name="current_password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                    <small id="newPasswordCount" class="char-count">0/8 characters</small>
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password:</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                    <small id="confirmPasswordCount" class="char-count">0/8 characters</small>
                    <div id="passwordMismatch" class="password-mismatch">Passwords do not match</div>
                </div>

                <button type="submit" class="btn btn-custom btn-block">Change Password</button>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatarImage').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }

        function updateCharCount() {
            const fullname = document.getElementById('fullname');
            const username = document.getElementById('username');
            const newPassword = document.getElementById('new_password');
            const confirmPassword = document.getElementById('new_password_confirmation');

            document.getElementById('fullnameCount').textContent = `${fullname.value.length}/50 characters`;
            document.getElementById('usernameCount').textContent = `${username.value.length}/30 characters`;
            document.getElementById('newPasswordCount').textContent = `${newPassword.value.length}/8 characters`;
            document.getElementById('confirmPasswordCount').textContent = `${confirmPassword.value.length}/8 characters`;

            // Update character count color based on length
            document.getElementById('fullnameCount').className = fullname.value.length > 0 ? 'char-count valid' : 'char-count';
            document.getElementById('usernameCount').className = username.value.length > 0 ? 'char-count valid' : 'char-count';
            document.getElementById('newPasswordCount').className = newPassword.value.length >= 8 ? 'char-count valid' : 'char-count invalid';
            document.getElementById('confirmPasswordCount').className = confirmPassword.value.length >= 8 ? 'char-count valid' : 'char-count invalid';

            // Check if new password and confirmation match
            const passwordsMatch = newPassword.value === confirmPassword.value;
            document.getElementById('passwordMismatch').style.display = (confirmPassword.value.length > 0) ? (passwordsMatch ? 'none' : 'block') : 'none';
        }

        document.getElementById('new_password').addEventListener('input', updateCharCount);
        document.getElementById('new_password_confirmation').addEventListener('input', updateCharCount);

        // Hide the mismatch message when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('#changePasswordForm')) {
                document.getElementById('passwordMismatch').style.display = 'none';
            }
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
