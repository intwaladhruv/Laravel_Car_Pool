<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RideShareLanding</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>

    <!-- Header Section -->
    <header class="site-header">
        <nav class="navbar">
            <div class="logo">
                <a href="#hero">RideShareLanding</a>
            </div>
            <ul class="nav-links">
                <li><a href="#hero">Home</a></li>
                @auth
                    @if (auth()->user()->role->name === 'driver')
                        <li><a href="/rides">My Rides</a></li>
                    @else
                        <li><a href="/rides">Rides</a></li>
                        <li><a href="/bookings">Bookings</a></li>
                    @endif
                    <li><a href="/user/edit">Edit User</a></li>
                    <li><a href="/logout">Logout</a></li>
                @else
                    <li><a href="#about">About</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="/login">Login/Sign Up</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title">Embark on New Journeys with RideShareLanding</h1>
            <p class="hero-subtitle">Connecting riders and drivers on the go.</p>
            <a href="#about" class="btn btn-primary">Discover More</a>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <h2 class="section-title">About RideShareLanding</h2>
            <p class="section-description">
                At RideShareLanding, we believe in simplifying travel. Our platform connects you with
                fellow travelers to share rides, save costs, and reduce our carbon footprint. Join our
                community of explorers and make every journey memorable.
            </p>
            <!-- Add an image related to 'About Us' here -->
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="section-title">Why Choose Us?</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <h3 class="feature-title">Eco-Friendly Rides</h3>
                    <p class="feature-description">
                        Share your journey, reduce emissions, and take a step towards a greener planet.
                    </p>
                </div>
                <div class="feature-item">
                    <h3 class="feature-title">Affordable Travel</h3>
                    <p class="feature-description">
                        Split costs with fellow riders and enjoy the most economical way to travel.
                    </p>
                </div>
                <div class="feature-item">
                    <h3 class="feature-title">Community Trust</h3>
                    <p class="feature-description">
                        A trusted network of members ensures safety and a pleasant travel experience.
                    </p>
                </div>
                <div class="feature-item">
                    <h3 class="feature-title">Seamless Booking</h3>
                    <p class="feature-description">
                        Our intuitive platform makes finding and offering rides completely hassle-free.
                    </p>
                </div>
            </div>
        </div>
    </section>

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
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="#features">Our Features</a></li>
                </ul>
            </div>
            <div class="footer-social">
                <h3>Follow Us</h3>
                <!-- Add social media links here -->
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 RideShareLanding. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
