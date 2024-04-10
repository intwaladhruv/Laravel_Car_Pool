<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ride Bookings</title>
    <link rel="stylesheet" href="/css/index.css">
    <style>

        h1 {
            margin-top: 20px;
            margin-left: 20px;
        }

        /* Flex container for cards */
        .cards-container {
            margin: 15px 25px 25px 25px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Adjust spacing between cards */
            justify-content: left;
            /* Center horizontally */
        }

        /* Individual card styles */
        .card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
            /* Set a fixed width for each card */
        }

        /* Card content styles */
        .card h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .card p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .card .price {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header class="site-header">
        <nav class="navbar">
            <div class="logo">
                <a href="/">RideShareLanding</a>
            </div>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
                @auth
                    <li><a href="/rides">Rides</a></li>
                    <li><a href="/logout">Logout</a></li>
                @endauth
            </ul>
        </nav>
    </header>
    <h1>My Bookings</h1>
    <div class="cards-container">
        @foreach ($bookings as $booking)
        @php
            $ride = $booking->ride;
            // var_dump($booking->ride->start);
        @endphp
        <div class="card">
            <h3>{{ucfirst($ride->start)}} - {{ucfirst($ride->destination)}}</h3>
            <p><strong>Booking Date:</strong> {{$booking->booking_date}}</p>
            <p><strong>Seats booked:</strong> {{$booking->seats}}</p>
            <p class="price"><strong>Price:</strong> ${{$ride->price*$booking->seats}}</p>
            <p><strong>Driver:</strong> {{$ride->user->firstname}} {{$ride->user->lastname}}</p>
        </div>
        @endforeach

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
