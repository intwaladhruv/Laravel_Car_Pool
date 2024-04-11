<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authenticate</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/auth.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>

    @auth
        <script>
            window.location = "/";
        </script>
    @else
        <!-- Header Section -->
        <header class="site-header">
            <nav class="navbar">
                <div class="logo">
                    <a href="/">RideShareLanding</a>
                </div>
                <ul class="nav-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/">About</a></li>
                    <li><a href="/">Features</a></li>
                    <li><a href="/login">Login/Sign Up</a></li>
                </ul>
            </nav>
        </header>
        <div class="form-container ">
            <div class="form-wrapper">
                <div class="form-column">
                    @if ($errors)
                        {{ var_dump($errors->all()) }}
                    @endif
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
                        <select name="role_id" id="role" required>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role['id'] }}">{{ ucfirst($role['name']) }}</option>
                            @endforeach
                        </select>
                        <div id="driverControls">
                            <input type="text" name="driving_license_number" id="driving_license_number"
                                placeholder="Driving License">
                            <input type="text" name="expiry_date" id="expiry_date" onfocus="(this.type='date')"
                                onblur="(this.type='text')" placeholder="Expiry Date">
                        </div>
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
        </div>
        <!-- Footer Section -->
        <footer class="site-footer">
            <div class="footer-content">
                <div class="footer-about">
                    <h3>About RideShareLanding</h3>
                    <p>Connecting journeys, creating experiences. Join us and make every trip an adventure.</p>
                </div>
                <div class="footer-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="/#hero">Home</a></li>
                        <li><a href="/#about">About Us</a></li>
                        <li><a href="/#features">Our Features</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 RideShareLanding. All rights reserved.</p>
            </div>
        </footer>
    @endauth
    <script>
        $(document).ready(function() {
            $("#driverControls").hide();
            $("#role").change(function() {
                var role = $(this).find(":selected").text();
                changeUI(role);
            });
        });

        function changeUI(role) {
            if (role == "Driver") {
                $("#driverControls").show();
            } else {
                $("#driverControls").hide();
            }
        }
    </script>
</body>

</html>
