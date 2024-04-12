<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Ride</title>
    <link rel="stylesheet" href="/css/index.css">
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        /* Container styles */
        .container {
            max-width: 400px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .ride-details {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }

        .ride-details h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .ride-details p {
            font-size: 16px;
            margin-bottom: 8px;
        }

        /* Form input styles */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="time"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 24px 24px;
        }

        /* Submit button styles */
        button[type="submit"] {
            background-color: #3CBC8D;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #2b9660;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header class="site-header">
        <nav class="navbar">
            <div class="logo">
                <a href="/"><img src="/images/ride-share.png" alt="Ride Sharing"></a>
            </div>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                @auth
                    <li><a href="/rides">Rides</a></li>
                    <li><a href="/user/edit">Edit User</a></li>
                    <li><a href="/logout">Logout</a></li>
                @endauth
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="ride-details">
            <h2>Ride Details</h2>
            <p><strong>Start Point:</strong> {{ ucfirst($ride->start) }}</p>
            <p><strong>Destination:</strong> {{ ucfirst($ride->destination) }}</p>
            <p><strong>Start Time:</strong> {{ $ride->start_at }}</p>
            <p><strong>Date:</strong> {{ $ride->date }}</p>
            <p><strong>Seats Available:</strong> {{ $ride->seats }}</p>
            <p><strong>Price:</strong> ${{ $ride->price }}</p>
        </div>

        <h3>Book a Ride</h3>
        @if ($errors->any())
            <div class="error-section">
                <div class="error-message">
                    <h3>Errors</h3>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <form action="{{ route('bookings.store', $ride->id) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="seats">Seats:</label>
                <input type="number" name="seats" id="seats" required>
            </div>
            <button type="submit">Book Ride</button>
        </form>
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
</body>

</html>
