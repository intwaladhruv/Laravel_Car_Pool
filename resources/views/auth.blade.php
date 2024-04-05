<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authenticate</title>
    <link rel="stylesheet" href="/css/auth.css">
</head>

<body>

    @auth
        <script>
            window.location = "/";
        </script>
    @else
        <div class="form-container clearfix">
            <div class="form-column">
                <h2>Registration</h2>
                <form action="/register" method="post">
                    @csrf
                    <input type="text" name="firstname" placeholder="First Name" required>
                    <input type="text" name="lastname" placeholder="Last Name" required>
                    <input type="text" name="contact_number" placeholder="Phone" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <select name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
                    <select name="role" required>
                        <option value="">Select Role</option>
                        <option value="driver">Driver</option>
                        <option value="passenger">Passenger</option>
                    </select>
                    <button type="submit" name="register">Register</button>
                </form>
            </div>
            <div class="form-column">
                <h2>Login</h2>
                <form action="/login" method="post">
                    @csrf
                    <input type="email" name="email" placeholder="Email"><br>

                    <input type="password" name="password" placeholder="Password"><br>
                    <button type="submit" name="login">Login</button>
                </form>
            </div>
        </div>
    @endauth
</body>

</html>
