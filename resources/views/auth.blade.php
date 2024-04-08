<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authenticate</title>
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/auth.css">
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
                    <a href="#hero">RideShareLanding</a>
                </div>
                <ul class="nav-links">
                    <li><a href="/#hero">Home</a></li>
                    <li><a href="/#about">About</a></li>
                    <li><a href="/#features">Features</a></li>
                    @auth
                        <li><a href="/rides/create">Add Ride</a></li>
                        <li><a href="/logout">Logout</a></li>
                    @else
                        <li><a href="/login">Login/Sign Up</a></li>
                    @endauth
                </ul>
            </nav>
        </header>
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
</body>

</html>
